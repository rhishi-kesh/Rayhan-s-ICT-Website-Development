<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;
use App\Models\ApplyForDemoClass;
use App\Models\ContactUs;
use App\Models\Seminar;
use App\Models\SeminerRegister;
use App\Models\Webinar;
use App\Models\WebinarRegister;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard(){
        $admission = Admission::paginate(50);
        return view('backend/pages/main', compact('admission'));
    }
    public function admissionDelete($id){
        Admission::findOrFail($id)->delete();
        return back()->with('error', 'Student Delete Successfully');
    }
    public function AdmisionSearch(Request $request){
        $data = $request->input('searchA');
        $demoClass = Admission::where('name', 'like', '%'.$data.'%')->orwhere('email', 'like', '%'.$data.'%')->orwhere('number', 'like', '%'.$data.'%')->paginate(50);
        return view('backend.pages.demoClasss.demoClass', compact('demoClass'));
    }

    // Apply Demo Class
    public function applyDemoClass(){
        $demoClass = ApplyForDemoClass::paginate(50);
        return view('backend.pages.demoClasss.demoClass', compact('demoClass'));
    }
    public function demoClassDelete($id){
        ApplyForDemoClass::findOrFail($id)->delete();
        return back()->with('error', 'Demo Class Deleted Successfully');
    }
    public function DemoClsSearch(Request $request){
        $data = $request->input('searchD');
        $demoClass = ApplyForDemoClass::where('name', 'like', '%'.$data.'%')->orwhere('email', 'like', '%'.$data.'%')->orwhere('number', 'like', '%'.$data.'%')->paginate(50);
        return view('backend.pages.demoClasss.demoClass', compact('demoClass'));
    }
    // Contact Us
    public function ContactUs(){
        $contactUs = ContactUs::paginate(50);
        return view('backend.pages.contactUs.contactUs', compact('contactUs'));
    }
    public function ContactUsDelete($id){
        ContactUs::findOrFail($id)->delete();
        return back()->with('error', 'ContactUs Deleted Successfully');
    }
    public function ContactSearch(Request $request){
        $data = $request->input('search');
        $contactUs = ContactUs::where('name', 'like', '%'.$data.'%')->orwhere('email', 'like', '%'.$data.'%')->orwhere('number', 'like', '%'.$data.'%')->paginate(50);
        return view('backend.pages.contactUs.contactUs', compact('contactUs'));
    }
    public function seminerData(){
        $seminer = Seminar::get();
        $seminerRegister = SeminerRegister::paginate(50);
        return view('backend.pages.seminars.seminerShow', compact('seminer','seminerRegister'));
    }
    public function seminarDataDelete($id){
        SeminerRegister::findOrFail($id)->delete();
        return back()->with('error', 'Data Deleted Successfully');
    }
    public function webinarData(){
        $webinar = Webinar::get();
        $WebinarRegister = WebinarRegister::paginate(50);
        return view('backend.pages.webinar.webinarShow', compact('webinar','WebinarRegister'));
    }
    public function webinarDataDelete($id){
        WebinarRegister::findOrFail($id)->delete();
        return back()->with('error', 'Data Deleted Successfully');
    }

}
