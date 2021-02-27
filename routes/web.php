<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\MainController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Main page
Route::get('/',[MainController::class,'index'], function () {
    
})->name('main');

Route::get('/categories',[MainController::class,'categories'], function () {
    
})->name('categories');

Route::get('/{category}/{product}',[MainController::class,'product'], function () {
    
})->name('product');

Route::prefix('/basket')->group(function () {
    Route::get('/',[MainController::class,'basket'], function () {
        
    })->name('basket');

    Route::get('/place',[MainController::class,'basketPlace'], function () {
        
    })->name('basket-place');
});

//Autenticate
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['role:admin']], function () {

    Route::prefix('/admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin');
    });

    Route::get('/test', function () {
        return view('test');
    })->name('test');
});

Route::group(['middleware' => ['role:user']], function () {

    Route::prefix('/user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user');
    });

    Route::get('/test', function () {
        return view('test');
    })->name('test');
});

Route::get('/{category}',[MainController::class,'category'], function () {
    
})->name('category');







// Route::get('/admin', function () {
//     return view('test');
// })->name('test');
Route::match(['get', 'post'], '/not-function', function (Request $request) {
    $url = $request->all()['url'];
    return view('not_function', ['url' => $url]);
})->name('not_function');
