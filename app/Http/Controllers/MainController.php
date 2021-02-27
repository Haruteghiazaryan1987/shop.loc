<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $products=Product::all();
        // dd($products);
        return view('guest.index',compact('products'));
    }

    public function categories(){
        return view('guest.categories');
    }

    public function category($code){
        $category=Category::where('code',$code)->first();
        return view('guest.category',compact('category'));
    }

    public function product($category,$product){
        dd(__METHOD__);
        return view('guest.product');
    }

    public function basket(){
       
        dd(__METHOD__);
        return view('guest.basket');
    }
    
    public function basketPlace(){
       
        dd(__METHOD__);
        return view('guest.order');
    }
}
