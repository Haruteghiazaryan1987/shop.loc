<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class MainController extends Controller {
    public function index() {
        $products = Product::all();
        $user = Auth::user();
        if(empty($user)){
            return view('guest.index')
            ->with('products', $products);
        }else{
            $userRole = $user->getRoleNames()->first();
            return view('guest.index')
            ->with('products', $products)
            ->with('userRole', $userRole);
        }
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
        // dd($category);
        if (is_null($category)) {
            dd(__METHOD__ . '  Not category');
        } else {
            return view('guest.category', compact('category'));
        }
    }

    public function product($product) {
        dd(__METHOD__);
        dd($product);
        return view('guest.product');
    }
}
