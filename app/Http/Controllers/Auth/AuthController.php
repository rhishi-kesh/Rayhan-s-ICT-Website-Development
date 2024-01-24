<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
use Symfony\Contracts\Service\Attribute\Required;
use  App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;


class AuthController extends Controller
{
    public function login()
    {
        return view('auth.admin.login');
    }
    public function loginPost(Request $request){
        $request->validate(
            [
                'email'=> 'required|email',
                'password'=> 'required|min:4| max:15'
            ] );
            $user = User::where('email', '=' , $request->email)->first();
            if($user){
                if(Hash::check($request->password, $user->password)){
                    $request->session()->put('loginId', $user->id);
                    return redirect()->route('dashboard');
                }else{
                    return back()->with('error', 'password not match, try again!');
                }
            }else{
                return back()->with('error', 'This Email is invalid!');
            }
    }

    public function logout(){
        if(Session::has('loginId')){
            Session::pull('loginId');
            return redirect()->route('login');
        }
    }
    
    public function register(){
        return view('auth.admin.register');
    }

    public function registerPost(Request $request){
        
        $request->validate([
            'name'=> 'required|string|max:20',
            'email'=> 'required|email|max:200',
            'role' => 'required',
            'password'=> 'required|min:4|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'role'=> $request->role,
            'password' => Hash::make($request->password)
        ]);
        $credentials = $request->only('email', 'password');
        Auth::attempt($credentials);
        $request->session()->regenerate();
        return redirect()->route('dashboard')->withSuccess('You have successfully registered & logged in!');
    }
}
