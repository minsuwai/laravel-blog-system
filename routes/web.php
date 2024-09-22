<?php

use App\Http\Controllers\AdminBlogController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

Route::get('/', [BlogController::class, 'index']);

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->where('blog', '[A-z\d\-_]+');

Route::get('/register', [AuthController::class, 'create'])->middleware('guest');
Route::post('/register', [AuthController::class, 'store'])->middleware('guest');

Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth');

Route::get('/login', [AuthController::class, 'login'])->middleware('guest');
Route::post('/login', [AuthController::class, 'post_login'])->middleware('guest');

Route::post('/blogs/{blog:slug}/comments', [CommentController::class, 'store']);

Route::post('/blogs/{blog:slug}/subscription', [BlogController::class, 'subscriptionHandler']);


// admin routes
use App\Http\Middleware\MustBeAdmin;

Route::middleware([MustBeAdmin::class])->group(function () {
    Route::get('/admin/blogs/create', [AdminBlogController::class, 'create']);
    Route::post('/admin/blogs/store', [AdminBlogController::class, 'store']);
    Route::post('/admin/blogs', [AdminBlogController::class, 'index']);
    Route::delete('/admin/blogs/{blog:slug}', [AdminBlogController::class, 'destroy']);
    Route::get('/admin/blogs/{blog:slug}/edit', [AdminBlogController::class, 'edit']);
    Route::patch('/admin/blogs/{blog:slug}/update', [AdminBlogController::class, 'update']);

    // Add other admin routes here
});

Route::get('/test', [BlogController::class, 'test']);
