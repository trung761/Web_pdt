<?php

use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\User\TrangchuController;
use \App\Http\Controllers\Admin\DashboardController;
use \App\Http\Controllers\Admin\MenuController;
use \App\Http\Controllers\Admin\HomepageController;
use \App\Http\Controllers\Admin\PostsController;
use \App\Http\Controllers\Admin\UsersController;

// --------------------------USER---------------------------------------//
Route::get('', [TrangchuController::class, 'index']);
Route::get('/trangchu', [TrangchuController::class, 'trangchu']);
Route::get('/load_menu2', [TrangchuController::class, 'load_menu2']);
Route::get('/load_data', [TrangchuController::class, 'load_data']);
Route::get('/data_tintuc', [TrangchuController::class, 'data_tintuc']);

Route::get('/load_data_menu1', [TrangchuController::class, 'load_data_menu1']);
Route::get('/chitiettintuc/{id}', [TrangchuController::class, 'load_chitiettintuc']);


// --------------------------ADMIN---------------------------------------//
//Dashboard
// Route::prefix('/')->group(function(){
//     Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
//     Route::post('/login', [LoginController::class, 'login']);

//     // Route::get('/dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
    
//     Route::get('/dashboard', function () {
//         return view('dashboard');
//     })->middleware('auth'); // bảo vệ route
// });
// Route::prefix('login')->group(function(){
//     Route::get('/',[LoginController::class,'login'])->name('login');
// });


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware('auth'); // bảo vệ route




Route::prefix('dashboard')->group(function(){
    Route::get('/',[DashboardController::class,'dashboard'])->name('dashboard');
    








});



















//Users
Route::prefix('users')->group(function(){
    Route::get('/',[UsersController::class,'index'])->name('users');
});




//Menu
Route::prefix('menu')->group(function(){
    Route::get('/',[MenuController::class,'index'])->name('menu');
    Route::get('/list_menu', [MenuController::class, 'list_menu']);
    Route::post('/load_list_menu', [MenuController::class, 'load_list_menu']);
    Route::post('/delete_menu/{id}', [MenuController::class, 'delete_menu']);
    Route::get('/edit_menu/{id}',[MenuController::class,'edit_menu']);
    Route::post('/update_menu/{id}',[MenuController::class,'update_menu']);
    Route::post('/add_menu',[MenuController::class,'add_menu']);
    Route::get('/logs', [MenuController::class, 'logs']);

});







//Homepage
Route::prefix('homepage')->group(function(){
    Route::get('/',[HomepageController::class,'index'])->name('homepage');
});







//Posts
Route::prefix('posts')->group(function(){
    Route::get('/',[PostsController::class,'index'])->name('posts');
});