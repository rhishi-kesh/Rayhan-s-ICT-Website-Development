<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
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
        $request->validateWithBag('insert',[
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
                'updated_at' => Carbon::now()
            ]);
        }
        return back()->with('success','Department insert Successfull');
    }
    public function departmentEdit(Request $request){
        $request->validateWithBag('update',[
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

        return back()->with('success','Department Update Successfull');
    }
    public function departmentDelete($id){
        $content = Department::findOrFail($id);
        unlink(public_path('storage/department/').'/'.$content->image);
        Department::findOrFail($id)->delete();

        return back()->with('error','Department Deleted Successfull');
    }
    public function courses(){
        $courses = Course::with(['department:id,departmentName'])->paginate(10);
        $departments = Department::select('departmentName','id')->get();
        return view('backend.pages.course.course', compact('courses', 'departments'));
    }
    public function coursePost(Request $request){
        $request->validateWithBag('insert',[
            'name' => 'required',
            'department_id' => 'required',
        ]);

        Course::insert([
            'department_id' => $request->department_id,
            'name' => $request->name,
            'created_at' => Carbon::now()
        ]);

        return back()->with('success','Course Insert Successfull');
    }
    public function courseEdit(Request $request){
        $request->validateWithBag('insert',[
            'name' => 'required',
            'department_id' => 'required',
        ]);

        $id = $request->id;
        Course::where('id', $id)->update([
            'department_id' => $request->department_id,
            'name' => $request->name,
            'updated_at' => Carbon::now()
        ]);
        return back()->with('success','Image Update Successfull');
    }
    public function courseDelete($id){
        Course::findOrFail($id)->delete();

        return back()->with('error','Course Deleted Successfull');
    }
    public function staus(Request $request){
        $id = $request->id;
        $courses = Course::where('id',$id)->first();
        if($courses->is_active == 0){
            Course::where('id',$id)->update([
                'is_active' => '1',
                'updated_at' => Carbon::now()
            ]);
        }else{
            Course::where('id',$id)->update([
                'is_active' => '0',
                'updated_at' => Carbon::now()
            ]);
        }
        return response()->json([
            'status' => "OK",
        ]);
    }
}
