<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\FAQ;
use Carbon\Carbon;

class FAQController extends Controller
{
    
    public function faq(){
        $faqs = FAQ::paginate(10);
        return view('backend.pages.faq.faq', compact('faqs'));
    }

    public function faqPost(Request $request){
        $request->validate([
            'question'=>'required',
            'answer'=>'required'
        ]);

        FAQ::insert([
            'question'=> $request->question,
            'answer'=> $request->answer,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'FAQ add successfully');
    }
       
    public function faqEdit(Request $request){
        $request->validate([
            'question'=>'required',
            'answer'=>'required'
        ]);
        $id = $request->id;

        FAQ::where('id', $id)->update([
            'question'=> $request->question,
            'answer'=> $request->answer,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success', 'FAQ Update Successfully');
    
    }
    public function faqDelete($id){
        FAQ::findOrFail($id)->delete();

        return back()->with('error', 'FAQ Delete Successfully');
    }
}
