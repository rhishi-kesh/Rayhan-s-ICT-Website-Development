<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function profile(){
        return view('backend.pages.profile.userProfile');
    }

    public function profileEdit(Request $request)
    {
        $id = $request->id;
        User::where('id',$id)->update([
            "name" => $request->name,
            "email" => $request->email,
            "position" => $request->position,
            'updated_at' => Carbon::now()
        ]);

     return redirect()->route('profile');
    }

    public function profileImagae(Request $request)
    {
        $validate = $request->validate([
            'profile_image' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048']
        ]);

        $filename = '';
        if($request->hasFile('profile_image')){
            $filename = rand().'.'.$request->profile_image->extension();
            if(Auth::user()->profile)
                {
                    unlink(public_path('storage/profile/').'/'.Auth::user()->profile);
                }
                $request->profile_image->storeAs('public/profile', $filename);
        }else{
            $filename = Auth::user()->profile;
        }

        $user_update = Auth::user();
        $user_update->profile = $filename;
        $user_update->updated_at = Carbon::now();
        $user_update->update();

        return back()->with('success', 'profile updated successfully');
    }

    //  Changing Password

    public function changePassword(){
        return view('backend.pages.profile.userProfile');
    }
    public function updatePassword(Request $request){
        $request->validate([
            'current_password' => ['required', 'string', 'min:8'],
            'password' => ['required', 'string', 'min:8', 'same:password_confirmation']
        ]);

        if(Hash::check($request->current_password, Auth::user()->password)){
            $user_update = Auth::user();
            $user_update->password = Hash::make($request->password);
            $user_update->update();
        }else{
            return back()->with('old','Old Password Not Correct');
        }
        return back()->with('success','Password Change Successfull');
    }
}
