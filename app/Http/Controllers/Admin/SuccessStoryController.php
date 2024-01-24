<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuccessStory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class SuccessStoryController extends Controller
{
    public function successStory(){

        return view('backend.pages.successStory.successStory');
    }
    public function successStoryPost(Request $request){
        $request->validate([
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
            return back()->with('success', 'Image add successfully');

        }

    }
    
}
