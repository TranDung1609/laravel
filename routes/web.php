<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CkeditorController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

// Route::get('/', function () {
//     return view('user.index');
// });

Route::prefix('home')->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home.index');
    Route::get('show-category/{id}', [CategoryController::class, 'showCategory'])->name('category.show');
    Route::get('show-post/{id}', [PostController::class, 'postDetail'])->name('post.show');
    Route::post('register-user', [HomeController::class, 'register'])->name('register.user');
    Route::post('login-user', [HomeController::class, 'create'])->name('login.user');
    Route::post('logout-user', [HomeController::class, 'logout'])->name('logout.user');
    Route::post('send-comment', [CommentController::class, 'sendComment'])->name('send.comment');
    Route::get('send-mail',[HomeController::class,'sendMail'])->name('send.mail');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('image-upload', [CkeditorController::class, 'storeImage'])->name('image.upload');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('add-user', [UserController::class, 'addUser'])->name('user.add');
    Route::get('list-user', [UserController::class, 'index'])->name('user.list');
    Route::post('save-user', [UserController::class, 'insert'])->name('user.save');
    Route::get('edit-user/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::post('update-user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::get('delete-user/{id}', [UserController::class, 'delete'])->name('user.delete');
    Route::get('user-deleted-at', [UserController::class, 'isDeleted'])->name('user.deleted.at');
    Route::get('rollback-user/{id}', [UserController::class, 'rollbackUser'])->name('user.rollback');
});

Route::middleware('auth')->prefix('category')->group(function () {
    Route::get('add-category', [CategoryController::class, 'addCategory'])->name('category.add');
    Route::get('list-category', [CategoryController::class, 'index'])->name('category.list');
    Route::post('save-category', [CategoryController::class, 'insert'])->name('category.save');
    Route::get('edit-category/{id}', [CategoryController::class, 'edit'])->name('category.edit');
    Route::get('delete-category/{id}', [CategoryController::class, 'delete'])->name('category.delete');
    Route::post('update-category/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::get('category-deleted-at', [CategoryController::class, 'isDeleted'])->name('category.deleted.at');
    Route::get('rollback-category/{id}', [CategoryController::class, 'rollbackCate'])->name('category.rollback');
});

Route::middleware('auth')->prefix('post')->group(function () {
    Route::get('add-post', [PostController::class, 'addPost'])->name('post.add');
    Route::get('list-post', [PostController::class, 'index'])->name('post.list');
    Route::post('save-post', [PostController::class, 'insert'])->name('post.save');
    Route::get('edit-post/{id}', [PostController::class, 'edit'])->name('post.edit');
    Route::post('update-post/{id}', [PostController::class, 'update'])->name('post.update');
    Route::post('upload', [PostController::class, 'ckeditor'])->name('ckeditor.upload');
    Route::get('delete-post/{id}', [PostController::class, 'delete'])->name('post.delete');
    Route::get('post-deleted-at', [PostController::class, 'isDeleted'])->name('post.deleted.at');
    Route::get('rollback-post/{id}', [PostController::class, 'rollbackPost'])->name('post.rollback');
});
//home page

require __DIR__ . '/auth.php';
