<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuccessStory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SuccessStoryController extends Controller
{
    public function successStory(){

        $successStory = SuccessStory::paginate(10);
        return view('backend.pages.successStory.successStory', compact('successStory'));
    }
    // insert data
    public function successStoryPost(Request $request){
        $request->validateWithBag('inser',[
            'image'=> ['image', 'mimes:jpg,png,jpeg', 'required'],
            'video_link'=>'required'
        ]);
        if($request->file('image')){
            $image = $request->file('image');
            $filename = time().'.'.$image->extension();
            $request->image->storeAs('public/SuccessStory', $filename);

            SuccessStory::insert([
                'thumbnail' =>$filename,
                'video_link'=> $request->video_link,
                'created_at' => Carbon::now()
            ]);
            return back()->with('success', 'Success Story add successfully');

        }
    }
    public function successStoryEdit(Request $request){
        $request->validateWithBag('update',[
            'image'=> ['image', 'mimes:jpg,png,jpeg', 'required'],
            'video_link'=>'required'
        ]);
        $id = $request->id;
        $getData = SuccessStory::findOrFail($id);

        $filename = '';
        $imagePath = 'storage/SuccessStory/'.$getData->thumbnail;
        if($request->hasFile('image')){
            $filename =  time().'.'.$request->image->extension();
            unlink($imagePath);
            $request->image->storeAs('public/SuccessStory', $filename);
        }else{
            $filename = $getData->thumbnail;
        }

        SuccessStory::where('id', $id)->update([
            'thumbnail' =>$filename,
            'video_link'=> $request->video_link,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Success Story Update Successfully');
    }
    public function successStoryDelete($id){
        $successDelete = SuccessStory::findOrFail($id);
        unlink(public_path('storage/SuccessStory/').'/'.$successDelete->thumbnail);
        SuccessStory::findOrFail($id)->delete();

        return back()->with('error', 'Success Story Delete Successfully');
    }

}
