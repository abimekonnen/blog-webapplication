<?php

use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\TagsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Blog\PostsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\WelcomeController;
use GuzzleHttp\Promise\Create;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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

Route::get('/', [WelcomeController::class,'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
Route::get('/posts/{post}');
Route::get('blog/categories/{category}',[PostsController::class,'category'])->name('blog.category');
Route::get('blog/tags/{tag}',[PostsController::class,'tag'])->name('blog.tag');
Route::get('blog/posts/{post}', [PostsController::class,'show'])->name('blog.show');
Route::resource('tags', TagsController::class)->middleware(['auth']);
Route::resource('categories', CategoriesController::class)->middleware(['auth']);
Route::resource('post', PostController::class)->middleware(['auth','verifyCategoriesCount']);
Route::get('/trashed-posts', [PostController::class,'trashed'])->name('trashed-posts.index')->middleware(['auth']);
Route::put('/restore-post/{post}', [PostController::class,'restore'])->name('restore-post')->middleware(['auth']);
Route::get('users', [UsersController::class,'index'])->name('users.index')->middleware(['auth','admin']);
Route::post('users/[user]/make-admin',[UsersController::class,'makeAdmin'])->name('users.make-admin');
Route::put('users/profile',[UsersController::class,'update'])->name('user.update-profile')->middleware(['auth']);;
Route::get('users/profile',[UsersController::class,'edit'])->name('users.edit-profile');
//Route::post('logout',[uthenticatedSessionController::class,'destroy'])->name('logout');
require __DIR__.'/auth.php';
// Route::middleware(['auth', 'second'])->group(function () {
    
// Route::resource('categories', CategoriesController::class)->middleware(['auth']);
// Route::resource('post', PostController::class)->middleware(['auth','verifyCategoriesCount']);
// Route::get('/trashed-posts', [PostController::class,'trashed'])->name('trashed-posts.index')->middleware(['auth']);
// Route::put('/restore-post/{post}', [PostController::class,'restore'])->name('restore-post')->middleware(['auth']);
// });