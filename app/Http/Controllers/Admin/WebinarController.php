<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Webinar;
use Carbon\Carbon;

class WebinarController extends Controller
{

    public function webinar(){
        $webinars = Webinar::paginate(5);
        return view('backend.pages.webinar.webinar', compact('webinars'));
    }
    public function webinarPost(Request $request){
        $request->validate([
            'title' =>'required',
            'thumbnail'=> ['image', 'mimes:jpg,png,jpeg', 'required'],
            'date'=> 'required',
            'time'=> 'required'
        ]);
        if($request->file('thumbnail')){
            $image = $request->file('thumbnail');
            $filename = time().'.'.$image->extension();
            $request->thumbnail->storeAs('public/webinar', $filename);

            Webinar::insert([
                'title' => $request->title,
                'thumbnail' => $filename,
                'date' => $request->date,
                'time' => $request->time,
                'created_at' => Carbon::now()
            ]);
            return back()->with('success', 'Thumbnail add successfully');

        }
    }
    public function webinarEdit(Request $request){
        $request->validate([
            'title' =>'required',
            'thumbnail'=> ['image', 'mimes:jpg,png,jpeg'],
            'date'=> 'required',
            'time'=> 'required'
        ]);
        $id = $request->id;
        $getData = Webinar::findOrFail($id);

        $filename = '';
        $imagePath = 'storage/webinar/'.$getData->thumbnail;
        if($request->hasFile('thumbnail')){
            $filename =  time().'.'.$request->thumbnail->extension();
            unlink($imagePath);
            $request->thumbnail->storeAs('public/webinar', $filename);
        }else{
            $filename = $getData->thumbnail;
        }

        Webinar::where('id', $id)->update([
            'title' => $request->title,
            'thumbnail' => $filename,
            'date' => $request->date,
            'time' => $request->time,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Edit Update Successfully');
    }
    public function seminarDelete($id){
        $seminarDelete = Webinar::findOrFail($id);
        unlink(public_path('storage/seminar/').'/'.$seminarDelete->thumbnail);
        Webinar::findOrFail($id)->delete();

        return back()->with('error', 'Delete Successfully');
    }

}
