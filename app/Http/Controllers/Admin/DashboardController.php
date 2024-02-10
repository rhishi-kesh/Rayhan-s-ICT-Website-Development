<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admission;

class DashboardController extends Controller
{
    public function dashboard(){

        $admission = Admission::paginate(30);
        return view('backend/pages/main', compact('admission'));
    }
   
    public function admissionDelete($id){
        Admission::findOrFail($id)->delete();
        return back()->with('error', 'Admission Delete Successfully');
    }
}
