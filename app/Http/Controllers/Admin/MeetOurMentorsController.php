<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MeetOurMentors;
use Carbon\Carbon;


class MeetOurMentorsController extends Controller
{
    
    public function meetOurMentors(){
        $MeetOurMentors = MeetOurMentors::paginate(10);
        return view('backend.pages.meetOurMentors.meetOurMentors', compact('MeetOurMentors'));
    }

    public function meetOurMentorsPost(Request $request){
        $request->validate([
            'name'=> 'required|min:4',
            'designation'=> 'required|min:5',
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
        $request->validate([
            'name'=> 'required|min:4',
            'designation'=> 'required|min:5',
            'image'=> ['image', 'mimes:jpg,png,jpeg'],
            'thumbnail'=> ['image', 'mimes:jpg,png,jpeg'],
        ]);
        $id = $request->id;
        $getData = MeetOurMentors::findOrFail($id);

        $filename = '';
        if($request->hasFile('image') ){
            $filename = rand().'.'.$request->image->getClientOriginalExtension();
            unlink(public_path('storage/mentors/image').'/'. $getData->image);
            $request->image->move(public_path('storage/mentors/image'),$filename);
        }else{
            $filename = $getData->image;
        }

        $thumbnailname = '';
        if($request->hasFile('thumbnail') ){
            $thumbnailname = rand().'.'.$request->thumbnail->getClientOriginalExtension();
            unlink(public_path('storage/mentors/thumbnail').'/'. $getData->thumbnail);
            $request->thumbnail->move(public_path('storage/mentors/thumbnail'),$thumbnailname);
        }else{
            $thumbnailname = $getData->thumbnail;
        }
        
        MeetOurMentors::where('id', $id)->update([
            'name'        => $request->name,
            'designation' => $request->designation,
            'image'       =>$filename,
            'thumbnail'   =>$thumbnailname,
            'created_at'  => Carbon::now()
        ]);
        return back()->with('success', 'Edit Update Successfully');
    }
    public function meetOurMentorsDelete($id){
        $mentorsDelete = MeetOurMentors::findOrFail($id);
        unlink(public_path('storage/mentors/image/').'/'.$mentorsDelete->image);
        unlink(public_path('storage/mentors/thumbnail/').'/'.$mentorsDelete->thumbnail);
        MeetOurMentors::findOrFail($id)->delete();

        return back()->with('error', 'Delete Successfully');
    }

}
