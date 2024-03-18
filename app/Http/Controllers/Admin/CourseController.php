<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseDetails;
use App\Models\CourseLearnings;
use App\Models\Department;
use App\Models\CourseForThose;
use App\Models\BenefitsOfCourse;
use App\Models\CreativeProject;
use App\Models\CourseModule;
use App\Models\CourseFAQ;
use App\Models\MeetOurMentors;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CourseController extends Controller
{
    public function department(){
        $departments = Department::paginate(10);
        return view('backend.pages.course.department', compact('departments'));
    }
    public function departmentPost(Request $request){
        $request->validateWithBag('insert',[
            'departmentName' => 'required|unique:departments',
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

            $slug = Str::slug($request->departmentName);

            Department::insert([
                'departmentName' => $request->departmentName,
                'image' => $filename,
                'slug' => $slug,
                'created_at' => Carbon::now()
            ]);
        }
        return back()->with('success','Department Add Successfull');
    }
    public function departmentEdit(Request $request){
        $request->validateWithBag('update',[
            'departmentName' => 'required',
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

        $slug = Str::slug($request->departmentName);

        Department::where('id',$id)->update([
            'departmentName' => $request->departmentName,
            'image' => $filename,
            'slug' => $slug,
            'updated_at' => Carbon::now()
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
        $mentors = MeetOurMentors::select('name','id')->get();
        return view('backend.pages.course.course', compact('courses', 'departments', 'mentors'));
    }
    public function coursePost(Request $request){
        $request->validateWithBag('insert',[
            'name' => 'required|unique:courses',
            'department_id' => 'required',
            'price' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'lecture' => 'required',
            'mentor_id' => 'required',
            'thumbnail' => ['image', 'mimes:jpg,png,jpeg', 'required'],
            'video' => 'required',
        ]);

        DB::beginTransaction();
        try{
            if($request->file('thumbnail')){
                $image = $request->file('thumbnail');
                $filename = time().'.'.$image->extension();
                $request->thumbnail->storeAs('public/CourseDetails', $filename);
                $slug = Str::slug($request->name);

                $course = new Course();
                $course->department_id = $request->department_id;
                $course->name = $request->name;
                $course->slug = $slug;
                $course->created_at = Carbon::now();
                $course->save();

                $course_detlils = new CourseDetails();
                $course_detlils->course_id = $course->id;
                $course_detlils->mentor_id = $request->mentor_id;
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
        $slug = Str::slug($request->name);
        $id = $request->id;
        Course::where('id', $id)->update([
            'department_id' => $request->department_id,
            'name' => $request->name,
            'slug' => $slug,
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
    public function is_footer(Request $request){
        $id = $request->id;
        $courses = Course::where('id',$id)->first();
        if($courses->is_footer == 0){
            Course::where('id',$id)->update([
                'is_footer' => '1',
                'updated_at' => Carbon::now()
            ]);
        }else{
            Course::where('id',$id)->update([
                'is_footer' => '0',
                'updated_at' => Carbon::now()
            ]);
        }
        return response()->json([
            'status' => "OK",
        ]);
    }
    public function courseDetailes($id){
        $courseDetails = CourseDetails::where('course_id',$id)->with(['course:id,name'])->first();
        $mentors = MeetOurMentors::select('name','id')->get();
        return view('backend.pages.course.courseDetails', compact('courseDetails','mentors'));
    }
    public function courseDetailesEdit($id, Request $request){
        $request->validateWithBag('insert',[
            'price' => 'required',
            'description' => 'required',
            'duration' => 'required',
            'lecture' => 'required',
            'mentor_id' => 'required',
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
            'mentor_id' => $request->mentor_id,
            'thumbnail' => $filename,
            'video' => $request->video,
            'updated_at' => Carbon::now()
        ]);
        return back()->with('success', 'CourseDetails Update Successfully');
    }
    // Course Learning
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
        return back()->with('success','Course Learning Add Successfull');
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
    // Course For Those
    public function courseForThose($id){
        $courseForThose = CourseForThose::where('course_id',$id)->with(['course:id,name'])->paginate();
        $courseid = $id;
        return view('backend.pages.course.courseForThose', compact('courseForThose','courseid'));
    }
    public function courseForThosePost($id, Request $request){
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
            $request->image->storeAs('public/courseThose', $filename);

            CourseForThose::insert([
                'course_id' => $id,
                'content' => $request->content,
                'image' => $filename,
                'created_at' => Carbon::now()
            ]);
        }
        return back()->with('success','CourseForThose Add Successfull');
    }
    public function courseForThoseEdit(Request $request){
        $request->validateWithBag('update',[
            'content' => 'required',
            'image' => [
                'image',
                'mimes:jpg,png,jpeg',
                'max:2048'
            ],
        ]);

        $id = $request->id;
        $getData = CourseForThose::findOrFail($id);

        $filename = '';
        $imagePath = 'storage/courseThose/'.$getData->image;
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            unlink($imagePath);
            $request->image->storeAs('public/courseThose', $filename);
        } else {
            $filename = $getData->image;
        }

        CourseForThose::where('id',$id)->update([
            'content' => $request->content,
            'image' => $filename,
            'updated_at' => Carbon::now()
        ]);

        return back()->with('success','CourseForThose Update Successfull');
    }
    public function courseForThoseDelete($id){
        $content = CourseForThose::findOrFail($id);
        unlink(public_path('storage/courseThose/').'/'.$content->image);
        CourseForThose::findOrFail($id)->delete();

        return back()->with('error','CourseForThose Deleted Successfull');
    }
    // Benefits Of Course
     public function benefitsOfCourse($id){
        $benefitsOfCourse = BenefitsOfCourse::where('course_id',$id)->with(['course:id,name'])->paginate(7);
        $courseid = $id;
        return view('backend.pages.course.benefitsOfCourse', compact('benefitsOfCourse','courseid'));
    }
    public function benefitsOfCoursePost($id, Request $request){
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
            $request->image->storeAs('public/benefitsOfCourse', $filename);

            BenefitsOfCourse::insert([
                'course_id' => $id,
                'content' => $request->content,
                'image' => $filename,
                'created_at' => Carbon::now()
            ]);
        }
        return back()->with('success','BenefitsOfCourse Add Successfull');
    }
    public function benefitsOfCourseEdit(Request $request){
        $request->validateWithBag('update',[
            'content' => 'required',
            'image' => [
                'image',
                'mimes:jpg,png,jpeg',
                'max:2048'
            ],
        ]);

        $id = $request->id;
        $getData = BenefitsOfCourse::findOrFail($id);

        $filename = '';
        $imagePath = 'storage/benefitsOfCourse/'.$getData->image;
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            unlink($imagePath);
            $request->image->storeAs('public/benefitsOfCourse', $filename);
        } else {
            $filename = $getData->image;
        }

        BenefitsOfCourse::where('id',$id)->update([
            'content' => $request->content,
            'image' => $filename,
            'updated_at' => Carbon::now()
        ]);

        return back()->with('success','BenefitsOfCourse Update Successfull');
    }
    public function benefitsOfCourseDelete($id){
        $content = BenefitsOfCourse::findOrFail($id);
        unlink(public_path('storage/benefitsOfCourse/').'/'.$content->image);
        BenefitsOfCourse::findOrFail($id)->delete();

        return back()->with('error','BenefitsOfCourse Deleted Successfull');
    }
    //  Creative Products
    public function creativeProject($id){
        $creativeProject = CreativeProject::where('course_id',$id)->with(['course:id,name'])->paginate(7);
        $courseid = $id;
        return view('backend.pages.course.creativeProject', compact('creativeProject','courseid'));
    }
    public function creativeProjectPost($id, Request $request){
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
            $request->image->storeAs('public/creativeProject', $filename);

            CreativeProject::insert([
                'course_id' => $id,
                'image' => $filename,
                'created_at' => Carbon::now()
            ]);
        }
        return back()->with('success','CreativeProject Add Successfull');
    }
    public function creativeProjectEdit(Request $request){
        $request->validateWithBag('update',[
            'image' => [
                'image',
                'mimes:jpg,png,jpeg',
                'max:2048'
            ],
        ]);

        $id = $request->id;
        $getData = CreativeProject::findOrFail($id);

        $filename = '';
        $imagePath = 'storage/creativeProject/'.$getData->image;
        if ($request->hasFile('image')) {
            $filename = time() . '.' . $request->image->extension();
            unlink($imagePath);
            $request->image->storeAs('public/creativeProject', $filename);
        } else {
            $filename = $getData->image;
        }

        CreativeProject::where('id',$id)->update([
            'image' => $filename,
            'updated_at' => Carbon::now()
        ]);

        return back()->with('success','CreativeProject Update Successfull');
    }
    public function creativeProjectDelete($id){
        $content = CreativeProject::findOrFail($id);
        unlink(public_path('storage/creativeProject/').'/'.$content->image);
        CreativeProject::findOrFail($id)->delete();

        return back()->with('error','CreativeProject Deleted Successfull');
    }
    // Course Module
    public function courseModule($id){
        $courseModule = CourseModule::where('course_id',$id)->with(['course:id,name'])->paginate(15);
        $courseid = $id;
        return view('backend.pages.course.courseModule', compact('courseModule', 'courseid') );
    }
    public function courseModulePost($id, Request $request){
        $request->validateWithBag('insert',[
            'class_no' => 'required',
            'class_topics' => 'required',
        ]);

        CourseModule::insert([
            'course_id' => $id,
            'class_no' => $request->class_no,
            'class_topics' => $request->class_topics,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success','Course Module Add Successfull');
    }
    public function courseModuleEdit(Request $request){
        $request->validateWithBag('insert',[
            'class_no' => 'required',
            'class_topics' => 'required',
        ]);

        $id = $request->id;
        CourseModule::where('id',$id)->update([
            'class_no' => $request->class_no,
            'class_topics' => $request->class_topics,
            'updated_at' => Carbon::now()
        ]);

        return back()->with('success','Course Module Updated Successfully');
    }
    public function courseModuleDelete($id){
        CourseModule::findOrFail($id)->delete();

        return back()->with('error', 'course Module Delete successfully');
    }
    // Course FAQ
    public function courseFAQ($id){
        $CourseFAQ = CourseFAQ::where('course_id',$id)->with(['course:id,name'])->paginate(7);
        $courseid = $id;
        return view('backend.pages.course.courseFAQ', compact('CourseFAQ', 'courseid') );
    }
    public function courseFAQPost($id, Request $request){
        $request->validateWithBag('insert',[
            'question' => 'required',
            'answer' => 'required',
        ]);

        CourseFAQ::insert([
            'course_id' => $id,
            'question' => $request->question,
            'answer' => $request->answer,
            'created_at' => Carbon::now()
        ]);
        return back()->with('success','Course FAQ Add Successfull');
    }
    public function courseFAQEdit(Request $request){
        $request->validateWithBag('insert',[
            'question' => 'required',
            'answer' => 'required',
        ]);

        $id = $request->id;
        CourseFAQ::where('id',$id)->update([
            'question' => $request->question,
            'answer' => $request->answer,
            'updated_at' => Carbon::now()
        ]);

        return back()->with('success','Course FAQ Updated Successfully');
    }
    public function courseFAQDelete($id){
        CourseFAQ::findOrFail($id)->delete();

        return back()->with('error', 'Course FAQ Delete successfully');
    }

}
