<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\BasketController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\AdminController;

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
Route::get('/', [MainController::class, 'index'])->name('main');

Route::get('/categories', [MainController::class, 'categories'])->name('categories');

Route::prefix('/basket')->group(function () {
    Route::get('/', [BasketController::class, 'basket'])->name('basket');
    Route::get('/place', [BasketController::class, 'basketPlace'])->name('basket-place');
    Route::post('/place', [BasketController::class, 'basketConfirm'])->name('basket-confirm');
    Route::post('/add/{id}', [BasketController::class, 'basketAdd'])->name('basket-add');
    Route::post('/remove/{id}', [BasketController::class, 'basketRemove'])->name('basket-remove');
});

//Autenticate
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

//Admin page
Route::group(['middleware' => ['role:admin']], function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [AdminController::class, 'index'])->name('admin');
    });
});
//User page
Route::group(['middleware' => ['role:user']], function () {
    Route::prefix('user')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('user');
    });
});

Route::get('/logout',[LoginController::class,'logout'])->name('logout');
Route::get('/{category}', [MainController::class, 'category'])->name('category');
Route::get('/{category}/{code}', [MainController::class, 'product'])->name('product');



Route::match(['get', 'post'], '/not-function', function (Request $request) {
    $url = $request->all()['url'];
    return view('not_function', ['url' => $url]);
})->name('not_function');
