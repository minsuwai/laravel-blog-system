<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AdminBlogController extends Controller
{
    public function index()
    {
        return view('admin.blogs.index', [
            'blogs' => Blog::latest()->paginate(6)->withQueryString()
        ]);
    }

    public function create()
    {
        return view('admin.blogs.create', [
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

    public function destory(Blog $blog)
    {
        $blog->delete();
        return back();
    }

    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit', [
            'blog' => $blog,
            'categories' => Category::all()
        ]);
    }

    public function update(Blog $blog)
    {
        $formData = request()->validate([
            "title" => ["required"],
            "slug" => ["required", Rule::unique('blogs', 'slug')->ignore($blog->id)],
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

        $blog->update($formData);
        return redirect('/');
    }
}
