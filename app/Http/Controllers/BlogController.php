<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function index()
    {
        return view('blogs.index', [
            'blogs' => Blog::latest()
                ->filter(request(['search', 'category', 'username']))
                ->paginate(6)
                ->withQueryString()
        ]);
    }

    public function show(Blog $blog)
    {
        return view('blogs.show', [
            'blog' => $blog,
            'randomBlogs' => Blog::inRandomOrder()->take(3)->get()
        ]);
    }

    public function subscriptionHandler(Blog $blog)
    {
        if (User::find(auth()->id())->isSubscribed($blog)) {
            $blog->unSubscribe();
        } else {
            $blog->subscribe();
        }

        return back();
    }

    public function create()
    {
        return view('blogs.create', [
            'categories' => Category::all()
        ]);
    }

    public function store()
    {
        $formData = request()->validate([
            "title" => ["required"],
            "slug" => ["required", Rule::unique('blogs', 'slug')],
            "intro" => ["required"],
            "body" => ["required"],
            "category_id" => ["required", Rule::exists('categories', 'id')]
        ]);
        $formData['user_id'] = auth()->user()->id;
        // $formData['thumbnail'] = request()->file('thumbnail')->store('thumbnails');
        // image
        if (request()->hasFile('thumbnail')) {
            $image = request()->file('thumbnail');
            $ext = $image->getClientOriginalExtension();
            $filename = uniqid('blog') . '.' . $ext; // Generate a unique filename
            $image->move(public_path('assets/img/blog/'), $filename); // Save the file to the pub
            $formData['thumbnail'] = $filename;
        }


        Blog::create($formData);

        return redirect('/');
    }

    public function test()
    {
        $blogs = Blog::all();
        return view('blogs.test', compact('blogs'));
    }
}
