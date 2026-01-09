<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
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

        return redirect()->back();

    }

    public function index(){
        
        return view('dashboard');
    }
}
