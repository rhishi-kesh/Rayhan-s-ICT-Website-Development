<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CourseController extends Controller
{
    public function department(){
        $departments = Department::paginate(10);
        return view('backend.pages.course.department', compact('departments'));
    }
    public function departmentPost(Request $request){
        $request->validate([
            'name' => 'required',
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
            $request->image->storeAs('public/department', $filename);

            Department::insert([
                'departmentName' => $request->name,
                'image' => $filename,
                'created_at' => Carbon::now()
            ]);
        }
        return back()->with('success','Image Update Successfull');
    }
    public function departmentEdit(Request $request){
        $request->validate([
            'name' => 'required',
            'image' => [
                'image',
                'mimes:jpg,png,jpeg',
                'max:2048',
            ],
        ]);

        $id = $request->id;
        $getData = Department::findOrFail($id);

        $filename = '';
        $imagePath = 'storage/department/'.$getData->image;
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            unlink($imagePath);
            $request->image->storeAs('public/department', $filename);
        } else {
            $filename = $getData->image;
        }

        Department::where('id',$id)->update([
            'departmentName' => $request->name,
            'image' => $filename,
            'created_at' => Carbon::now()
        ]);

        return back()->with('success','Image Update Successfull');
    }
    public function departmentDelete($id){
        $content = Department::findOrFail($id);
        unlink(public_path('storage/department/').'/'.$content->image);
        Department::findOrFail($id)->delete();

        return back()->with('delete','Gallery Image Deleted Successfull');
    }
}
