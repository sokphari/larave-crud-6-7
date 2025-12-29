<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
    //

    public function table(){
        $customer = Customer::all();
        return view('table',compact('customer'));
    }
    public function create(){
        return view('create');
    }
    public function store(Request $request){
        $validate = Validator::make($request->all(),[

            'name' => 'required|string',
            'gender' => 'required|string',
            'phone' => 'required|string',
            'address' => 'required|string',
            'image' => 'nullable|image',
        ]);

        $imageName=null;

        if($request->file('image')){
            $imageName = time().'.'.$request->image->extension();
            //23456786.     jpg,png,pdf,psn
            $request->image->move(public_path('images'),$imageName);
        }

        Customer::create([
            'name' => $request->name,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'address' => $request->address,
            'image'=>$imageName
        ]);
        return redirect()->route('create.get');

    }
    public function destroy($id){
        $student = Customer::FindOrFail($id);
        if($student->image && file_exists(public_path('images/'.$student->image))){
            unlink(public_path('images/'.$student->image));
        }
        $student->delete();
        return redirect()->route('table.get');
    }
    public function edit($id){
        $student=Customer::FindOrFail($id);
        return view('edit',compact('student'));
    }
    public function update(Request $request,$id){

    }
}
