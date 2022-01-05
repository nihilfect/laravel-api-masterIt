<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SecretController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
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
    return view('auth');
});


Route::get('/home', function () {
    return view('home');
});

Route::get('/profile/{id}', function () {
    return view('profile');
});


Route::get('/post/{id}', function () {
    return view('post');
});

Route::group(['prefix'=>'api'], function(){
    Route::get('posts', [PostController::class, 'index']);
    Route::post('posts', [PostController::class, 'store']);
    Route::put('posts/{id}', [PostController::class, 'update']);
    Route::delete('posts/{id}', [PostController::class, 'destroy']);
    Route::get('posts/withusers', [PostController::class, 'indexwithusers']);
    Route::get('posts/withuser/{post_id}', [PostController::class, 'singlepost']);
    Route::get('posts/withuserv2/{post_id}', [PostController::class, 'singlepostv2']);

    Route::get('comments', [CommentController::class, 'index']);
    Route::post('comments', [CommentController::class, 'store']);
    Route::put('comments/{id}', [CommentController::class, 'update']);
    Route::delete('comments/{id}', [CommentController::class, 'destroy']);

    Route::get('users', [UserController::class, 'index']);
    Route::get('users/{id}', [UserController::class, 'singleUser']);
    Route::get('users/name/{name}', [UserController::class, 'userExists']);
    Route::get('userswithpost/{id}', [UserController::class, 'userwitharticle']);


});


