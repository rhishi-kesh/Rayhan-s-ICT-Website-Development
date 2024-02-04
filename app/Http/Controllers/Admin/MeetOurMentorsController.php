<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeetOurMentors;
use Carbon\Carbon;


class MeetOurMentorsController extends Controller
{
    
    public function meetOurMentors(){
        $MeetOurMentors = MeetOurMentors::paginate(7);
        return view('backend.pages.meetOurMentors.meetOurMentors', compact('MeetOurMentors'));
    }

    public function meetOurMentorsPost(Request $request){
        $request->validateWithBag('insert',[
            'name'=> 'required',
            'designation'=> 'required',
            'image'=> ['image', 'mimes:jpg,png,jpeg', 'required'],
            'thumbnail'=> ['image', 'mimes:jpg,png,jpeg', 'required'],
        ]);
        if($request->file('image') && $request->file('thumbnail')){
            $image = $request->file('image');
            $filename = time().'.'.$image->extension();
            $request->image->storeAs('public/mentors/image', $filename);

            $thumbnail = $request->file('thumbnail');
            $thumbnailname = time().'.'.$thumbnail->extension();
            $request->thumbnail->storeAs('public/mentors/thumbnail', $thumbnailname);

            MeetOurMentors::insert([
                'name'        => $request->name,
                'designation' => $request->designation,
                'image'       =>$filename,
                'thumbnail'   =>$thumbnailname,
                'created_at'  => Carbon::now()
            ]);
            return back()->with('success', 'Image add successfully');

        }
    }
    public function meetOurMentorsEdit(Request $request){
        $request->validateWithBag('update',[
            'name'=> 'required',
            'designation'=> 'required',
            'image'=> ['image', 'mimes:jpg,png,jpeg'],
            'thumbnail'=> ['image', 'mimes:jpg,png,jpeg'],
        ]);
        $id = $request->id;
        $getData = MeetOurMentors::findOrFail($id);

        $filename = '';
        if($request->hasFile('image') ){
            $filename = time().'.'.$request->image->extension();
            unlink('storage/mentors/image/'. $getData->image);
            $request->image->storeAs('public/mentors/image', $filename);
        }else{
            $filename = $getData->image;
        }

        $thumbnailname = '';
        if($request->hasFile('thumbnail') ){
            $thumbnailname = time().'.'.$request->thumbnail->extension();
            unlink('storage/mentors/thumbnail/'. $getData->thumbnail);
            $request->thumbnail->storeAs('public/mentors/thumbnail',$thumbnailname);
        }else{
            $thumbnailname = $getData->thumbnail;
        }
        
        MeetOurMentors::where('id', $id)->update([
            'name' => $request->name,
            'designation' => $request->designation,
            'image' => $filename,
            'thumbnail' => $thumbnailname,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Mentor Updated Successfully');
    }
    public function meetOurMentorsDelete($id){
        $mentorsDelete = MeetOurMentors::findOrFail($id);
        unlink(public_path('storage/mentors/image/').'/'.$mentorsDelete->image);
        unlink(public_path('storage/mentors/thumbnail/').'/'.$mentorsDelete->thumbnail);
        MeetOurMentors::findOrFail($id)->delete();

        return back()->with('error', 'Mentor Deleted Successfully');
    }

}
