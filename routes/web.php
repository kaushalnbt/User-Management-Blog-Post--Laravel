<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Usercontroller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::group(['prefix' => '/'], function () {
    Route::view('/register', "register");
    Route::post('/register', [Usercontroller::class, 'store']);
    Route::get('index', [Usercontroller::class, 'index']);
    Route::delete('/destroy/{id}', [Usercontroller::class, 'destroy'])->name('deleteUser'); //Delete Data
    Route::get('/edit/{id}', [Usercontroller::class, 'edit']);
    Route::put('update-data/{id}', [Usercontroller::class, 'update']); //For Update Table
    Route::get('/blogs/{id}', [BlogController::class, 'store']);
    Route::post('/addBlog', [BlogController::class, 'addPost']);
    Route::get('blogsView/{id}',[BlogController::class, 'index']);
    Route::view('/blogsView',"blogsView")->name('blogsView');
    Route::delete('/destroyBlog/{id}', [BlogController::class, 'destroy'])->name('deleteblog');
    Route::get('/edit_blogs/{id}', [BlogController::class, 'edit']);
    Route::post('update_blogs/{id}', [BlogController::class, 'update']);

    Route::get('public/images/{image}', [Usercontroller::class, 'getImage']);
    Route::view('/image_view',"image_view")->name('imageView');
});
