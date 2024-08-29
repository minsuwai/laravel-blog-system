<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

Route::get('/', [BlogController::class, 'index']);

Route::get('/blogs/{blog:slug}', [BlogController::class, 'show'])->where('blog', '[A-z\d\-_]+');

Route::get('/users/{user:username}', function (User $user) {
    return view('blogs', [
        //eager load
        // 'blogs' => $user->blogs->load('category', 'author') 

        'blogs' => $user->blogs
    ]);
});
