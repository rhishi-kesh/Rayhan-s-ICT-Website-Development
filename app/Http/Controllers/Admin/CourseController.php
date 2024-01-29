<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseDetails;
use App\Models\CourseLearnings;
use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
                'created_at' => Carbon::now()
            ]);
        }
        return back()->with('success','Department Add Successfull');
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
            'updated_at' => Carbon::now()
        ]);

        return back()->with('success','Department Update Successfull');
    }
    public function departmentDelete($id){
        $content = Department::findOrFail($id);
        unlink(public_path('storage/department/').'/'.$content->image);
        Department::findOrFail($id)->delete();

        return back()->with('delete','Department Deleted Successfull');
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
            'price' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'lecture' => 'required',
            'project' => 'required',
            'thumbnail' => ['image', 'mimes:jpg,png,jpeg', 'required'],
            'video' => 'required',
        ]);

        DB::beginTransaction();
        try{
            if($request->file('thumbnail')){
                $image = $request->file('thumbnail');
                $filename = time().'.'.$image->extension();
                $request->thumbnail->storeAs('public/CourseDetails', $filename);

                $course = new Course();
                $course->department_id = $request->department_id;
                $course->name = $request->name;
                $course->created_at = Carbon::now();
                $course->save();

                $course_detlils = new CourseDetails();
                $course_detlils->course_id = $course->id;
                $course_detlils->price = $request->price;
                $course_detlils->description = $request->description;
                $course_detlils->duration = $request->duration;
                $course_detlils->lecture = $request->lecture;
                $course_detlils->project = $request->project;
                $course_detlils->thumbnail = $filename;
                $course_detlils->video = $request->video;
                $course_detlils->created_at = Carbon::now();
                $course_detlils->save();
            }
            DB::commit();
            return back()->with('success','Course Successfully Added');
        }catch(\Throwable $e){
            DB::rollBack();
            return back()->with('error','Course Add Faild');
        }
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
        return back()->with('success','Course Update Successfull');
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
    public function courseDetailes($id){
        $courseDetails = CourseDetails::where('course_id',$id)->with(['course:id,name'])->first();
        return view('backend.pages.course.courseDetails', compact('courseDetails'));
    }
    public function courseDetailesEdit($id, Request $request){
        $request->validateWithBag('insert',[
            'price' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'lecture' => 'required',
            'project' => 'required',
            'thumbnail' => ['image', 'mimes:jpg,png,jpeg'],
            'video' => 'required',
        ]);

        $getData = CourseDetails::where('course_id',$id)->first();

        $filename = '';
        $imagePath = 'storage/CourseDetails/'.$getData->thumbnail;
        if($request->hasFile('thumbnail')){
            $filename =  time().'.'.$request->thumbnail->extension();
            unlink($imagePath);
            $request->thumbnail->storeAs('public/CourseDetails', $filename);
        }else{
            $filename = $getData->thumbnail;
        }

        CourseDetails::where('course_id', $id)->update([
            'price' => $request->price,
            'description' => $request->description,
            'duration' => $request->duration,
            'lecture' => $request->lecture,
            'project' => $request->project,
            'thumbnail' => $filename,
            'video' => $request->video,
            'updated_at' => Carbon::now()
        ]);
        return back()->with('success', 'CourseDetails Update Successfully');
    }
    public function CourseLearnings($id){
        $courseDetails = CourseLearnings::where('course_id',$id)->with(['course:id,name'])->paginate();
        $courseid = $id;
        return view('backend.pages.course.courseLearning', compact('courseDetails','courseid'));
    }
    public function CourseLearningsPost($id, Request $request){
        $request->validateWithBag('insert',[
            'content' => 'required',
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
            $request->image->storeAs('public/Learnings', $filename);

            CourseLearnings::insert([
                'course_id' => $id,
                'content' => $request->content,
                'image' => $filename,
                'created_at' => Carbon::now()
            ]);
        }
        return back()->with('success','Learning Add Successfull');
    }
    public function CourseLearningsEdit(Request $request){
        $request->validateWithBag('update',[
            'content' => 'required',
            'image' => [
                'image',
                'mimes:jpg,png,jpeg',
                'max:2048'
            ],
        ]);

        $id = $request->id;
        $getData = CourseLearnings::findOrFail($id);

        $filename = '';
        $imagePath = 'storage/Learnings/'.$getData->image;
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            unlink($imagePath);
            $request->image->storeAs('public/Learnings', $filename);
        } else {
            $filename = $getData->image;
        }

        CourseLearnings::where('id',$id)->update([
            'content' => $request->content,
            'image' => $filename,
            'updated_at' => Carbon::now()
        ]);

        return back()->with('success','Course Learning Update Successfull');
    }
    public function CourseLearningsDelete($id){
        $content = CourseLearnings::findOrFail($id);
        unlink(public_path('storage/Learnings/').'/'.$content->image);
        CourseLearnings::findOrFail($id)->delete();

        return back()->with('error','Course Learning Deleted Successfull');
    }
}
