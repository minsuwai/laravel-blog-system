<x-layout>
    <!-- single blog section -->
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto text-center">
                <img src="{{asset('assets/img/blog/'.$blog->thumbnail)}}" class="card-img-top" alt="..." />
                <h3 class="my-3">{{$blog->title}}</h3>
                <div>
                    <div>Author - <a href="/users/{{$blog->author->username}}">{{$blog->author->name}}</a></div>
                    <div><a href="/categories/{{$blog->category->slug}}"><span
                                class="badge bg-primary">{{$blog->category->name}}</span></a></div>
                    <div class="text-secondary">{{$blog->created_at->diffForHumans()}}</div>

                    <div class="text-secondary">
                        <form action="/blogs/{{$blog->slug}}/subscription" method="POST">
                            @csrf
                            @auth
                            @if (auth()->user()->isSubscribed($blog))
                            <button class="btn btn-danger">unsubsribe</button>
                            @else
                            <button class="btn btn-warning">subsribe</button>
                            @endif
                            @endauth
                        </form>
                    </div>
                </div>
                <p class="lh-md mt-3">
                    {!!$blog->body!!}
                </p>
            </div>
        </div>
    </div>

    <section class="container">
        <div class="col-md-8 mx-auto">
            @auth
            <x-comment-form :blog="$blog" />
            @else
            <p class="text-center">Please <a href="/login">login</a> to comment</p>
            @endauth
        </div>
    </section>

    {{-- Comments section --}}
    @if ($blog->comments->count())
    <x-comments :comments="$blog->comments()->latest()->paginate(3)"></x-comments>
    @endif

    <x-blogs_you_may_like_section :randomBlogs="$randomBlogs" />
</x-layout>