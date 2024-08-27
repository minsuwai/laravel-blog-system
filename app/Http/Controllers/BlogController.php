<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    function index()
    {
        // DB::listen(function ($query) {
        //     logger($query->sql);
        // });



        return view('blogs', [
            // eager load // lazy loading
            // 'blogs' => Blog::with('category', 'author')->get() 

            'blogs' => Blog::latest()->filter(request(['search']))->get(),
            'categories' => Category::all()
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blog', [
            'blog' => $blog,
            'randomBlogs' => Blog::inRandomOrder()->take(3)->get()
        ]);
    }

    // protected function getBlogs()
    // {
    //     return Blog::latest()->filter()->get();
    //     // $query = Blog::latest();
    //     // conditional query
    //     // if (request('search')) {
    //     //     $blogs = $blogs->where('title', 'like', '%' . request('search') . '%')
    //     //         ->orWhere('body', 'like', '%' . request('search') . '%');
    //     // }

    //     // $query->when(request('search'), function ($query, $search) {
    //     //     $query->where('title', 'like', '%' . $search . '%')
    //     //         ->orWhere('body', 'like', '%' . $search . '%');
    //     // });

    //     // return $query->get();
    // }
}
