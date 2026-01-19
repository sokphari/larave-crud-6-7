<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    public function index(){
        return response()->json([
            'message' => "All Product",
            "data"    => Product::all()
        ],200);
    }
    public function store(Request $request){
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg'
        ]);
        if($validate->fails()){
            return response()->json(['errorr'=>$validate]);
        }

        $imageName = null;
        if($request->hasFile('image')){
            $path = $request->file('image')->store('products','public');
            $imageName = asset('storage/'.$path);

            // $path = $request->file('image');
            // $imageName = time().'_'.$path->getClientOriginalExtension();
            // $path->storeAs('products',$imageName,'public');
            // $imageUrl = asset('storage/products/'.$imageName);


        }

        $user = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'image' => $imageName,
        ],201);
        return response()->json([
            'message' => "Create Success",
            'data' => $user,
            'status' => 201
        ],201);

    }
    public function destroy($id){
        $product = Product::FindOrFail($id);
        $product->delete();
        return response()->json([
            'message' => "Delete Successfully",
            "data" => $product,
        ],200);
    }
    public function edit($id){
        $product = Product::FindOrFail($id);
        return response()->json([
            "message" => "Product Edit ",
            "data"    => $product 
        ],200);
    }
    public function update(Request $request,$id){
        $validate = Validator::make($request->all(),[
            'name' => 'required',
            'price' => 'required',
            'description' => 'required'
        ]);
        if($validate->fails()){
            return response()->json([
                'message' => 'Validate is not found',
                'data' => $validate->errors()
            ],422);
        }

        $product = Product::FindOrFail($id);

        $product->update([
            'name' => $request->name,
            'price'=> $request->price,
            'description' => $request->description,
        ]);
        return response()->json([
            'message'=>'Update successfully',
            'data' => $product,
        ],200);
    }  
}
