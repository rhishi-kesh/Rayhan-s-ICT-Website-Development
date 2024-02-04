<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seminar;
use Carbon\Carbon;

class SeminarController extends Controller
{

    public function seminar(){
        $seminars = Seminar::paginate(10);
        return view('backend.pages.seminars.seminar', compact('seminars'));
    } 
    // insert datasaminar
    public function seminarPost(Request $request){
        $request->validateWithBag('insert',[
            'title' =>'required',
            'thumbnail'=> ['image', 'mimes:jpg,png,jpeg', 'required'],
            'date'=> 'required',
            'time'=> 'required'
        ]);
        if($request->file('thumbnail')){
            $image = $request->file('thumbnail');
            $filename = time().'.'.$image->extension();
            $request->thumbnail->storeAs('public/seminar', $filename);

            Seminar::insert([
                'title' => $request->title,
                'thumbnail' => $filename,
                'date' => $request->date,
                'time' => $request->time,
                'created_at' => Carbon::now()
            ]);
            return back()->with('success', 'Thumbnail add successfully');

        }
    }
    public function seminarEdit(Request $request){
        $request->validateWithBag('update',[
            'title' =>'required',
            'thumbnail'=> ['image', 'mimes:jpg,png,jpeg'],
            'date'=> 'required',
            'time'=> 'required'
        ]);
        $id = $request->id;
        $getData = Seminar::findOrFail($id);

        $filename = '';
        $imagePath = 'storage/seminar/'.$getData->thumbnail;
        if($request->hasFile('thumbnail')){
            $filename =  time().'.'.$request->thumbnail->extension();
            unlink($imagePath);
            $request->thumbnail->storeAs('public/seminar', $filename);
        }else{
            $filename = $getData->thumbnail;
        }

        Seminar::where('id', $id)->update([
            'title' => $request->title,
            'thumbnail' => $filename,
            'date' => $request->date,
            'time' => $request->time,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Edit Update Successfully');
    }
    public function seminarDelete($id){
        $seminarDelete = Seminar::findOrFail($id);
        unlink(public_path('storage/seminar/').'/'.$seminarDelete->thumbnail);
        Seminar::findOrFail($id)->delete();

        return back()->with('error', 'Delete Successfully');
    }
}
