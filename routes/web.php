<?php

use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FollowActionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeUnlikeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\PostController;

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

Route::get('/',[HomeController::class,'index'])->name('home');

Route::get('profile/{username}/edit',[ProfileController::class,'show'])->name('editprofile');


Route::get('profile/{id}/{username}',[ProfileController::class,'getProfile'])->name('show');

Route::get('profile',[ProfileController::class,'index'])->name('profile');
Route::put('update/{username}',[ProfileController::class,'update'])->name('update');

Route::get('register',[RegisterController::class,'index'])->name('register');
Route::post('register',[RegisterController::class,'store']);

Route::get('login',[LoginController::class,'index'])->name('login');
Route::post('login',[LoginController::class,'login']);

Route::post('logout',[LogoutController::class,'store'])->name('logout');

Route::post('follow/{profile_id}',[FollowActionController::class,'follow'])->name('follow');
Route::delete('unfollowfollow/{profile_id}',[FollowActionController::class,'unfollow'])->name('unfollow');
Route::get('followers/{id}',[FollowActionController::class,'followers'])->name('followers');
Route::get('following/{id}',[FollowActionController::class,'following'])->name('following');

Route::get('post',[PostController::class,'index'])->name('post');
Route::post('post',[PostController::class,'store']);

Route::post('liked/{id}',[LikeUnlikeController::class,'like'])->name('like');
Route::post('unliked/{id}',[LikeUnlikeController::class,'unlike'])->name('unlike');

Route::post('createcomment',[CommentController::class,'store'])->name('newcomment');
Route::get('comment/{id}',[CommentController::class,'index'])->name('add');

Route::get('query',[HomeController::class, 'searchResults'])->name('results');
