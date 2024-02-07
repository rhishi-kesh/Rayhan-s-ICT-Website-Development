<?php

namespace App\Http\Controllers\Mail;

use App\Http\Controllers\Controller;
use App\Mail\AdmissionMail;
use App\Models\Admission;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class MailController extends Controller
{
    public function admissionPost(Request $request){
        $validator = Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required|email',
            'number'=>'required|min:11|max:11|regex:/^([0-9\s\-\+\(\)]*)$/',
            'course'=>'required',
            'massage'=>'required',
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
            $done = Admission::insert([
                'name'=> $request->name,
                'email'=> $request->email,
                'number'=> $request->number,
                'subject'=> $request->course,
                'massage'=> $request->massage,
                'created_at' => Carbon::now()
            ]);

            // return response()->json(['status'=>1, 'msg'=>$response]);

            if( $done ){
                // send mail
                Mail::to($request->email)->send(new AdmissionMail($details));
                //send sms
                $smsNumber = '88'.$request->number;
                $url = "https://880sms.com/smsapi";
                $data = [
                    "api_key" => "C20070576581b892abb538.40220352",
                    "type" => "text",
                    "contacts" => "$smsNumber",
                    "senderid" => "RAYHANS ICT",
                    "msg" => "Congratulations $request->name . You have Registation Complete.",
                ];
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, 1);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                $response = curl_exec($ch);
                curl_close($ch);
                return response()->json(['status'=>1, 'msg'=>'Admission Successfully Done']);
            }
        }
    }
}
