<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;

class MainController extends Controller {
    public function index() {
        $products = Product::all();
        return view('guest.index', compact('products'));
    }

    public function categories() {
        $categories = Category::all();
        return view('guest.categories', compact('categories'));
    }

    public function category($code) {
        $category = Category::where('code', $code)->first();
        //TODO $products=Product::where('category_id',$category->id)->get(); sra phoxaren svyazka Category modelum
        // $products=Product::where('category_id',$category->id)->get();
        // dd($category->products);
        return view('guest.category', compact('category'));
    }

    public function product($category, $product) {
        return view('guest.product');
    }
}
