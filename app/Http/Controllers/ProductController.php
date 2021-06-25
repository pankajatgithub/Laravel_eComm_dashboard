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
}
