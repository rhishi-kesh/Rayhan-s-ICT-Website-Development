<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Review;
use Carbon\Carbon;

class ReviewController extends Controller
{
    
    public function review(){
        $review = Review::paginate(10);
        return view('backend.pages.review.review', compact('review'));
    }

    public function reviewPost(Request $request){
        $request->validate([
            'review'=>'required'
        ]);

        Review::insert([
            'review'=> $request->review,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Image add successfully');
    }
       
    public function reviewEdit(Request $request){
        $request->validate([
            'review'=>'required'
        ]);
        $id = $request->id;

        Review::where('id', $id)->update([
            'review'=> $request->review,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'Edit Update Successfully');
    
    }
    public function ReviewDelete($id){
        $reviewDelete = Review::findOrFail($id);
        // unlink($reviewDelete->review);
        Review::findOrFail($id)->delete();

        return back()->with('error', 'Delete Successfully');
    }

}
