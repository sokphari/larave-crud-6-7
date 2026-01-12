<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function RegisterForm(){
        return view('auth.register');
    }
    public function RegisterStore(Request $request){

        $validate = Validator::make($request->all(),[
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required'
        ]);

        if($validate->fails()){
            return redirect()->back()->withErrors($validate)->withInput();
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password) //123456 =>&2qwsdfgvbndfg
        ]);

        return redirect()->route('login')->with('','');

    }
    public function index(){
        
        return view('dashboard');
    }
    public function loginStore(Request $request){
        $validate = Validator::make($request->all(),[
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if($validate->fails()){
            return back()->withErrors($validate)->withInput();
        }

        $credetail = $request->only('email','password');
        $request->session()->regenerate(); //vbn1234567 =?$2esdrfghsjgfsedhrbg

        if(Auth::attempt($credetail)){

            return redirect('/dashboard');
            // return redirect('login');
        }else{
            return redirect()->route('login');
        }

    }
    public function login(){
        return view('auth.login');
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken(); // @csrf 
        return redirect()->route('login');
    }
}
