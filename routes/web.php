<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    // DB::listen(function ($query) {
    //     logger($query->sql);
    // });

    return view('blogs', [
        // eager load // lazy loading
        // 'blogs' => Blog::with('category', 'author')->get() 

        'blogs' => Blog::latest()->get()
    ]);
});

Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    return view('blog', [
        'blog' => $blog
    ]);
})->where('blog', '[A-z\d\-_]+');

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blogs', [
        //eager load
        // 'blogs' => $category->blogs->load('category', 'author')

        'blogs' => $category->blogs
    ]);
});

Route::get('/users/{user:username}', function (User $user) {
    return view('blogs', [
        //eager load
        // 'blogs' => $user->blogs->load('category', 'author') 

        'blogs' => $user->blogs
    ]);
});
