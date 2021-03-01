<?php

namespace App\Http\Controllers\User;

use App\Models\Product;
use App\Http\Controllers\Controller;

class UserController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $products = Product::get();
        return view('user.index', compact('products'));
    }
}
