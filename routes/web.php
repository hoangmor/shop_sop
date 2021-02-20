<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout', [App\Http\Controllers\AdminController::class, 'logout'])->name('logout');
// Route::match(['get', 'post'], '/admin', function () {
//     //
// });
Route::get('/admin', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.home');
Route::post('/admin', [App\Http\Controllers\AdminController::class, 'login'])->name('admin.home');
Route::group(['middleware' => ['auth']], function(){
    Route::get('/admin/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('admin.dashboard');
    
    //Categories Routes (Admin)
    Route::match(['get', 'post'], '/admin/add-category', [App\Http\Controllers\CategoryController::class, 'addCategory'])->name('admin.category');
});
