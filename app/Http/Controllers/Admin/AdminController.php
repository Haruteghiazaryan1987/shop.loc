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
    protected $content;
    protected $vars;

    public function __construct() {
        $this->middleware('auth');
        $this->user = Auth::user();
        $this->vars = Arr::add($this->vars, 'user', $this->user);
    }

    public function renderOutput() {
        $this->vars = Arr::add($this->vars, 'title', $this->title);
        if ($this->content) {
            $this->vars = Arr::add($this->vars, 'content', $this->content);
        }
        // dd($this->vars);
        return view($this->template)->with($this->vars);
    }
}
