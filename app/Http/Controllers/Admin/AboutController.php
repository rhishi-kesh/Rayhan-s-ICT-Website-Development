<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyInformation;
use App\Models\HeroInformation;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function adminAbout(){
        return view('backend.pages.about.about');
    }
    public function companyInformation(){
        $companyInformation = CompanyInformation::first();
        return view('backend.pages.about.companyInformation', compact('companyInformation'));
    }
    public function companyInformationPost(Request $request){
        $request->validate([
            'logo' => [
                'image',
                'mimes:jpg,png,jpeg',
                'max:2048'
            ],
            'number' => 'required',
            'email' => 'required',
            'facebook' => 'required',
            'instragram' => 'required',
            'linkedin' => 'required',
            'youtube' => 'required',
            'locationText' => 'required',
            'locationLink' => 'required',
            'openClose' => 'required',
            'eTin' => 'required',
            'tradeLicence' => 'required',
            'footerAbout' => 'required',
        ]);

        $id = $request->id;
        $getData = CompanyInformation::findOrFail($id);

        $image = '';
        $imagePath = 'storage/CompanyInformation/'.$getData->logo;
        if ($request->hasFile('logo')) {
            $image = rand() . '.' . $request->logo->extension();
            unlink($imagePath);
            $request->logo->storeAs('public/CompanyInformation', $image);
        } else {
            $image = $getData->logo;
        }

        CompanyInformation::where('id',$id)->update([
            'number' => $request->number,
            'gmail' => $request->email,
            'logo' => $image,
            'facebook' => $request->facebook,
            'instragram' => $request->instragram,
            'linkedin' => $request->linkedin,
            'youtube' => $request->youtube,
            'locationText' => $request->locationText,
            'locationLink' => $request->locationLink,
            'openClose' => $request->openClose,
            'eTinNo' => $request->eTin,
            'tradeLienceNo' => $request->tradeLicence,
            'footerAbout' => $request->footerAbout,
            'updated_at' => Carbon::now()
        ]);

        return back()->with('success','Website Information Updated Successfull');
    }
    public function hero(){
        $heroInformation = HeroInformation::first();
        return view('backend.pages.about.hero', compact('heroInformation'));
    }
    public function heroPost(Request $request){
        $request->validate([
            'thumbnail' => [
                'image',
                'mimes:jpg,png,jpeg',
                'max:2048'
            ],
            'title' => 'required',
            'description' => 'required',
            'video' => 'required'
        ]);

        $id = $request->id;
        $getData = HeroInformation::findOrFail($id);

        $image = '';
        $imagePath = 'storage/heroInformation/'.$getData->thumbnail;
        if ($request->hasFile('thumbnail')) {
            $image = rand() . '.' . $request->thumbnail->extension();
            unlink($imagePath);
            $request->thumbnail->storeAs('public/HeroInformation', $image);
        } else {
            $image = $getData->thumbnail;
        }

        HeroInformation::where('id',$id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'video' => $request->video,
            'thumbnail' => $image,
            'updated_at' => Carbon::now()
        ]);

        return back()->with('success','Hero Information Updated Successfull');
    }
}
