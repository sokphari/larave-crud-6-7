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
            'description' => 'required'
        ]);
        if($validate->fails()){
            return response()->json(['errorr'=>$validate]);
        }
        $user = Product::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description
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
    
}
