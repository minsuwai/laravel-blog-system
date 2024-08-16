<?php

use Illuminate\Support\Facades\Route;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

Route::get('/', function () {
    // DB::listen(function ($query) {
    //     logger($query->sql);
    // });
    return view('blogs', [
        'blogs' => Blog::with('category')->get() // eager load // lazy loading
    ]);
});

Route::get('/blogs/{blog:slug}', function (Blog $blog) {
    return view('blog', [
        'blog' => $blog
    ]);
})->where('blog', '[A-z\d\-_]+');

Route::get('/categories/{category:slug}', function (Category $category) {
    return view('blogs', [
        'blogs' => $category->blogs
    ]);
});
