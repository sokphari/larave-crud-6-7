<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentController extends Controller
{
    //
    public function index(){
        $students = Student::all();
        return view('table',compact('students'));
    }

    public function create(){
        return view('create');
    }

    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'gender' => 'required',
            'address' => 'required',
        ]);
        Student::create([
            'name'=>$request->name,
            'gender'=>$request->gender,
            'address'=>$request->address
        ]);
        return redirect()->back()->with("success",'create success');
    }

    public function destroy($id){
        $students = Student::FindOrFail($id);
        $students->delete();
        return redirect()->route('table')->with('Success',"successfully");
    }
    

}
