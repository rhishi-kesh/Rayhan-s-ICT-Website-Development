<?php

namespace App\Http\Controllers\Mail;

use App\Mail\ContactFeedback;
use App\Utils;
use App\Http\Controllers\Controller;
use App\Mail\AdmissionMail;
use App\Mail\applyForDemoClassMail;
use App\Mail\ContactUsMail;
use App\Mail\SeminerMail;
use App\Mail\WebinerMail;
use App\Models\Admission;
use App\Models\ApplyForDemoClass;
use App\Models\ContactUs;
use App\Models\SeminerRegister;
use App\Models\WebinarRegister;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
class MailController extends Controller
{
    use Utils;
    public function admissionPost(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required|min:11|max:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'course' => 'required',
            'massage' => 'required',
        ]);

        $user_id = $this->generateCode('Admission', '202');
        $password = Str::random(8);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        }else {
            $details = [
                'name' => $request->name,
                'email' => $request->email,
                'number' => $request->number,
                'subject' => $request->course,
                'massage' => $request->massage,
                'user_id' => $user_id,
                'password' => $password,
            ];
            $done = Admission::insert([
                'name' => $request->name,
                'user_id' => $user_id,
                'password' => Hash::make($password),
                'email' => $request->email,
                'number' => $request->number,
                'subject' => $request->course,
                'massage' => $request->massage,
                'created_at' => Carbon::now()
            ]);
            if ($done) {
                // send mail
                Mail::to($request->email)->send(new AdmissionMail($details));
                // send sms
                $smsNumber = '88' . $request->number;
                $url = "https://880sms.com/smsapi";
                $data = [
                    "api_key" => "C20070576581b892abb538.40220352",
                    "type" => "text",
                    "contacts" => "$smsNumber",
                    "senderid" => "RAYHANS ICT",
                    "msg" => "Congratulations, $request->name, you have successfully enrolled in $request->course. Please log in with your auto-generated ID and password to access your course details and track your progress.",
                ];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                curl_close($ch);
                return response()->json(['status' => 1, 'msg' => 'Admission Successfully Done']);
            }
        }
    }
    public function applyForDemoClassPost(Request $request){
        $validator = validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required|min:11|max:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'address' => 'required',
            'course' => 'required',
            'profession' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $details = [
                'name' => $request->name,
                'email' => $request->email,
                'number' => $request->number,
                'address' => $request->address,
                'subject' => $request->course,
                'profession' => $request->profession,
            ];
            $done = ApplyForDemoClass::insert([
                'name' => $request->name,
                'email' => $request->email,
                'number' => $request->number,
                'address' => $request->address,
                'subject' => $request->course,
                'profession' => $request->profession,
                'created_at' => Carbon::now()
            ]);
            if ($done) {
                //send mail
                Mail::to($request->email)->send(new applyForDemoClassMail($details));
                //send message
                $smsNumber = '88' . $request->number;
                $url = "https://880sms.com/smsapi";
                $data = [
                    "api_key" => "C20070576581b892abb538.40220352",
                    "type" => "text",
                    "contacts" => "$smsNumber",
                    "senderid" => "RAYHANS ICT",
                    "msg" => "Congratulations, $request->name! We have successfully received your request for a demo class of $request->course. One of our executives from the communication team will contact you soon.",
                ];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                curl_close($ch);
                return response()->json(['status' => 1, 'msg' => 'Admission Successfully Done']);
            }
        }
    }
    public function ContactPost(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'number'=>'required|min:11|max:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'massage'=>'required',
            'course'=>'required',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0, 'error'=>$validator->errors()->toArray()]);
        }else{
            $details =[
                'name'=> $request->name,
                'email'=> $request->email,
                'number'=> $request->number,
                'subject'=> $request->course,
                'massage'=> $request->massage,
            ];
            $done = ContactUs::insert([
                'name'=> $request->name,
                'email'=> $request->email,
                'number'=> $request->number,
                'subject'=> $request->course,
                'massage'=> $request->massage,
                'created_at' => Carbon::now()
            ]);

            if( $done ){
                // send mail
                Mail::to('reshikash300@gmail.com')->send(new ContactUsMail($details));
                Mail::to($request->email)->send(new ContactFeedback($details));
                //send sms
                // $smsNumber = '88'.$request->number;
                // $url = "https://880sms.com/smsapi";
                // $data = [
                //     "api_key" => "C20070576581b892abb538.40220352",
                //     "type" => "text",
                //     "contacts" => "$smsNumber",
                //     "senderid" => "RAYHANS ICT",
                //     "msg" => "Thank you for reaching out! Our communication team will be in touch with you soon. We're eager to connect and discuss further",
                // ];
                // $ch = curl_init();
                // curl_setopt($ch, CURLOPT_URL, $url);
                // curl_setopt($ch, CURLOPT_POST, 1);
                // curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                // $response = curl_exec($ch);
                // curl_close($ch);
                return response()->json(['status'=>1, 'msg'=>'Thanks for Contact Us.']);
            }
        }
    }
    public function webinerRegistationPost(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required|min:11|max:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'address' => 'required',
        ]);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $details = [
                'name' => $request->name,
                'email' => $request->email,
                'number' => $request->number,
                'address' => $request->address,
                'webiner_id' => $request->webiner_id,
                'webiner_title' => $request->webiner_title,
                'date' => $request->date,
                'time' => $request->time,
            ];
            $done = WebinarRegister::insert([
                'webiner_id' => $request->webiner_id,
                'name' => $request->name,
                'email' => $request->email,
                'number' => $request->number,
                'address' => $request->address,
                'created_at' => Carbon::now()
            ]);
            if ($done) {
                // send mail
                Mail::to($request->email)->send(new WebinerMail($details));
                //send sms
                $smsNumber = '88' . $request->number;
                $url = "https://880sms.com/smsapi";
                $data = [
                    "api_key" => "C20070576581b892abb538.40220352",
                    "type" => "text",
                    "contacts" => "$smsNumber",
                    "senderid" => "RAYHANS ICT",
                    "msg" => "Congratulations, $request->name! We have successfully received your request for the $request->webiner_id. Our next seminar will be held on $request->date, at $request->time. If this time doesn't suit you, one of our executives will contact you soon to discuss alternatives.",
                ];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                curl_close($ch);
                return response()->json(['status' => 1, 'msg' => 'Admission Successfully Done']);
            }
        }
    }
    public function seminerRegistationPost(Request $request) {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email',
            'number' => 'required|min:11|max:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'address' => 'required',
        ]);

        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $details = [
                'name' => $request->name,
                'email' => $request->email,
                'number' => $request->number,
                'address' => $request->address,
                'seminer_id' => $request->seminer_id,
                'seminer_title' => $request->seminer_title,
                'date' => $request->date,
                'time' => $request->time,
            ];
            $done = SeminerRegister::insert([
                'seminer_id' => $request->seminer_id,
                'name' => $request->name,
                'email' => $request->email,
                'number' => $request->number,
                'address' => $request->address,
                'created_at' => Carbon::now()
            ]);

            if ($done) {
                // send mail
                Mail::to($request->email)->send(new SeminerMail($details));
                //send sms
                $smsNumber = '88' . $request->number;
                $url = "https://880sms.com/smsapi";
                $data = [
                    "api_key" => "C20070576581b892abb538.40220352",
                    "type" => "text",
                    "contacts" => "$smsNumber",
                    "senderid" => "RAYHANS ICT",
                    "msg" => "Congratulations, $request->name! We have successfully received your request for the $request->seminer_title. Our next seminar will be held on $request->date, at $request->time. If this time doesn't suit you, one of our executives will contact you soon to discuss alternatives.",
                ];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                curl_close($ch);
                return response()->json(['status' => 1, 'msg' => 'Registation Successfull']);
            }
        }
    }
}
