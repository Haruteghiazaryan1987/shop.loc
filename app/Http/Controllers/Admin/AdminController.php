<?php

namespace App\Http\Controllers\Admin;

use App\Models\Product;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller {
    protected $title;
    protected $user;
    protected $template;
    protected $content = FALSE;
    protected $vars;

    public function __construct() {
        $this->middleware('auth');
        $this->user = Auth::user();
    }

    public function renderOutput() {
        $this->vars=Arr::add($this->vars,'title',$this->title);
        if ($this->content) {
            $this->vars=Arr::add($this->vars,'contnt',$this->content);
        }
        return view($this->template)->with($this->vars);
    }

    public function index() {
        $products = Product::get();
        return view('admin.index', compact('products'));
    }
}
