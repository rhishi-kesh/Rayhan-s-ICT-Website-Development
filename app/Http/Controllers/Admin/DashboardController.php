<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\ApplyForDemoClass;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
//    Admission part
    public function dashboard(){
        $admission = Admission::paginate(30);
        return view('backend/pages/main', compact('admission'));
    }

    public function admissionDelete($id){
        Admission::findOrFail($id)->delete();
        return back()->with('error', 'Admission Delete Successfully');
    }

    public function AdmisionSearch(Request $request){
        $data = $request->input('searchA');
        $demoClass = Admission::where('name', 'like', '%'.$data.'%')->orwhere('email', 'like', '%'.$data.'%')->orwhere('number', 'like', '%'.$data.'%')->orwhere('subject', 'like', '%'.$data.'%')->get();
        return view('backend.pages.demoClasss.demoClass', compact('demoClass'));
    }
    // Admission part end    //

     // Apply Demo Class

     public function applyDemoClass(){
        $demoClass = ApplyForDemoClass::paginate(10); 
        return view('backend.pages.demoClasss.demoClass', compact('demoClass'));
    }
    public function demoClassDelete($id){
        ApplyForDemoClass::findOrFail($id)->delete();
        return back()->with('error', 'Demo Class Deleted Successfully');
    }
    public function DemoClsSearch(Request $request){
        $data = $request->input('searchD');
        $demoClass = ApplyForDemoClass::where('name', 'like', '%'.$data.'%')->orwhere('email', 'like', '%'.$data.'%')->orwhere('number', 'like', '%'.$data.'%')->orwhere('subject', 'like', '%'.$data.'%')->get();
        return view('backend.pages.demoClasss.demoClass', compact('demoClass'));
    }
    // Contact Us 

    public function ContactUs(){
        $contactUs = ContactUs::paginate(20);
        return view('backend.pages.contactUs.contactUs', compact('contactUs'));
    }
    public function ContactUsDelete($id){
        ContactUs::findOrFail($id)->delete();
        return back()->with('error', 'ContactUs Deleted Successfully');
    }
    public function ContactSearch(Request $request){
        $data = $request->input('search');
        $contactUs = ContactUs::where('name', 'like', '%'.$data.'%')->orwhere('email', 'like', '%'.$data.'%')->orwhere('number', 'like', '%'.$data.'%')->orwhere('subject', 'like', '%'.$data.'%')->get();
        return view('backend.pages.contactUs.contactUs', compact('contactUs'));
    }

}
