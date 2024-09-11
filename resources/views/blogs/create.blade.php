<x-layout>
    <h3 class="my-3 text-center">Create Blog</h3>

    <div class="col-md-8 mx-auto">
        <x-card-wrapper>
            <form enctype="multipart/form-data" action="/admin/blogs/store" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" required name="title" value="{{old('title')}}">
                    <x-error name="title"></x-error>
                </div>

                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" class="form-control" required name="slug" value="{{old('slug')}}">
                    <x-error name="slug"></x-error>
                </div>

                <div class="mb-3">
                    <label for="intro" class="form-label">Intro</label>
                    <input type="text" class="form-control" required name="intro" value="{{old('intro')}}">
                    <x-error name="intro"></x-error>
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <textarea name="body" id="body" cols="30" rows="10" class="form-control">{{old('body')}}</textarea>
                    <x-error name="body"></x-error>
                </div>

                <div class="mb-3">
                    <label for="thumbnail" class="form-label">Body</label>
                    <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                    <x-error name="thumbnail"></x-error>
                </div>

                <div>
                    <label for="category" class="form-label">Category</label>
                    <select name="category_id" id="category" class="form-control">
                        @foreach ($categories as $category)
                        <option {{$category->id==old('category_id') ? 'selected':''}}
                            value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                    <x-error name="category_id"></x-error>
                </div>

                <div class="d-flex justify-content-start mt-3">
                    <button type="submit" class="btn btn-primary">Submit</button>

                </div>
            </form>
        </x-card-wrapper>
    </div>
</x-layout>