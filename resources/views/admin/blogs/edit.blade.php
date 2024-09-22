<x-admin-layout>
    <h3 class="my-3 text-center">Edit Blog</h3>

    <x-card-wrapper>
        <form enctype="multipart/form-data" action="/admin/blogs/{{$blog->slug}}/update" method="POST">
            @method('patch')
            @csrf
            <x-form.input name="title" value="{{old('title',$blog->title)}}"></x-form.input>
            <x-form.input name="slug" value="{{old('slug',$blog->slug)}}"></x-form.input>
            <x-form.input name="intro" value="{{old('intro',$blog->intro)}}"></x-form.input>
            <x-form.textarea name="body" value="{{old('body',$blog->body)}}"></x-form.textarea>
            <x-form.input name="thumbnail" type="file">
            </x-form.input>

            <img src="{{asset('assets/img/blog/'.$blog->thumbnail)}}" alt="" width="200px" height="100px">

            <x-form.input-wrapper>
                <x-form.label name="category" />
                <select name="category_id" id="category" class="form-control">
                    @foreach ($categories as $category)
                    <option {{$category->id==old('category_id',$blog->category_id) ? 'selected':''}}
                        value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                <x-error name="category_id"></x-error>
            </x-form.input-wrapper>

            <div class="d-flex justify-content-start mt-3">
                <button type="submit" class="btn btn-primary">Submit</button>

            </div>
        </form>
    </x-card-wrapper>
</x-admin-layout>