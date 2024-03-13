<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\CompanyInformation;
use App\Models\HeroInformation;
use App\Models\WorkSpaceImage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function adminAbout(){
        $about = About::first();
        return view('backend.pages.about.about', compact('about'));
    }
    public function aboutPost(Request $request){
        $request->validate([
            'chooseUs' => 'required',
            'chooseUsImage' => [
                'image',
                'mimes:jpg,png,jpeg,gif',
                'max:2048'
            ],
            'missionVision' => 'required',
            'missionVisionImage' => [
                'image',
                'mimes:jpg,png,jpeg,gif',
                'max:2048'
            ],
            'successfullStudent' => 'required',
            'courseComplete' => 'required',
            'successRatio' => 'required',
        ]);

        $id = $request->id;
        $getData = About::findOrFail($id);

        $choose = '';
        $imagePath = 'storage/about/choose/'.$getData->chooseUsImage;
        if ($request->hasFile('chooseUsImage')) {
            $choose = rand() . '.' . $request->chooseUsImage->extension();
            unlink($imagePath);
            $request->chooseUsImage->storeAs('public/about/choose/', $choose);
        } else {
            $choose = $getData->chooseUsImage;
        }

        $missionVision = '';
        $imagePath = 'storage/about/missionVision/'.$getData->missionVisionImage;
        if ($request->hasFile('missionVisionImage')) {
            $missionVision = rand() . '.' . $request->missionVisionImage->extension();
            unlink($imagePath);
            $request->missionVisionImage->storeAs('public/about/missionVision', $missionVision);
        } else {
            $missionVision = $getData->missionVisionImage;
        }

        About::where('id',$id)->update([
            'chooseUs' => $request->chooseUs,
            'chooseUsImage' => $choose,
            'missionVision' => $request->missionVision,
            'missionVisionImage' => $missionVision,
            'successfullStudent' => $request->successfullStudent,
            'courseComplete' => $request->courseComplete,
            'successRatio' => $request->successRatio,
            'updated_at' => Carbon::now()
        ]);

        return back()->with('success','About Us Updated Successfull');
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
            'fontdesk' => 'required',
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
            'googlemap' => 'required',
        ]);

        $id = $request->id;
        $getData = CompanyInformation::findOrFail($id);

        $filename = '';
        $imagePath = 'storage/CompanyInformation/'.$getData->logo;
        if ($request->hasFile('logo')) {
            $filename = rand() . '.' . $request->logo->extension();
            unlink($imagePath);
            $request->logo->storeAs('public/CompanyInformation', $filename);
        } else {
            $filename = $getData->logo;
        }

        CompanyInformation::where('id',$id)->update([
            'number' => $request->number,
            'fontdesk' => $request->fontdesk,
            'gmail' => $request->email,
            'logo' => $filename,
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
            'googlemap' => $request->googlemap,
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

        $filename = '';
        $imagePath = 'storage/heroInformation/'.$getData->thumbnail;
        if ($request->hasFile('thumbnail')) {
            $filename = rand() . '.' . $request->thumbnail->extension();
            unlink($imagePath);
            $request->thumbnail->storeAs('public/HeroInformation', $filename);
        } else {
            $filename = $getData->thumbnail;
        }

        HeroInformation::where('id',$id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'video' => $request->video,
            'thumbnail' => $filename,
            'updated_at' => Carbon::now()
        ]);

        return back()->with('success','Hero Information Updated Successfull');
    }
    public function workspace(){
        $workspace = WorkSpaceImage::paginate(7);
        return view('backend.pages.about.workspace', compact('workspace'));
    }
    public function workspacePost(Request $request){
        $request->validateWithBag('insert',[
            'image' => [
                'image',
                'mimes:jpg,png,jpeg',
                'max:2048',
                'required'
            ],
        ]);

        if($request->file('image')){
            $image = $request->file('image');
            $filename = time() . '.' . $image->extension();
            $request->image->storeAs('public/WorkSpace', $filename);

            WorkSpaceImage::insert([
                'image' => $filename,
                'created_at' => Carbon::now()
            ]);
        }
        return back()->with('success','Image Add Successfull');
    }
    public function workspaceEdit(Request $request){
        $request->validateWithBag('update',[
            'image' => [
                'image',
                'mimes:jpg,png,jpeg',
                'max:2048',
            ],
        ]);

        $id = $request->id;
        $getData = WorkSpaceImage::findOrFail($id);

        $filename = '';
        $imagePath = 'storage/WorkSpace/'.$getData->image;
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            unlink($imagePath);
            $request->image->storeAs('public/WorkSpace', $filename);
        } else {
            $filename = $getData->image;
        }

        WorkSpaceImage::where('id',$id)->update([
            'image' => $filename,
            'created_at' => Carbon::now()
        ]);

        return back()->with('success','Image Update Successfull');
    }
    public function workspaceDelete($id){
        $content = WorkSpaceImage::findOrFail($id);
        unlink(public_path('storage/WorkSpace/').'/'.$content->image);
        WorkSpaceImage::findOrFail($id)->delete();

        return back()->with('error','Gallery Image Deleted Successfull');
    }
}
