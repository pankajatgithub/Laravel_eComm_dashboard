<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    //
    function addProduct(Request $req){
        $products=new Product;
        $products->name=$req->input('name');
        $products->price=$req->input('price');
        $products->description=$req->input('description');
        $products->file_path=$req->file('file')->store('productsImage');
        $products->save();
        return $products;
    }
    function list(){
        return Product::all();
    }

   function delete($id){
       $delete=Product::where('id',$id)->delete();
       if($delete)
       return ["result"=>"Product is deleted"];
       else
       return ["result"=>"Operation Failed"];

   }

   function getProduct($id){

    return  Product::find($id);

   }
   function updateProduct($id,Request $req){
    $products=Product::find($id);
    $products->name=$req->input('name');
    $products->price=$req->input('price');
    $products->description=$req->input('description');
    $products->file_path=$req->file('file')->store('productsImage');
    $products->save();
    return $products;
     }
}
