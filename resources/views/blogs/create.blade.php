<x-layout>
    <h3 class="my-3 text-center">Create Blog</h3>

    <div class="col-md-8 mx-auto">
        <x-card-wrapper>
            <form action="" method="POST">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Title</label>
                    <input type="text" class="form-control" required name="title" value="{{old('title')}}">
                    <x-error name="title"></x-error>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Slug</label>
                    <input type="text" class="form-control" required name="slug" value="{{old('slug')}}">
                    <x-error name="slug"></x-error>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Intro</label>
                    <input type="text" class="form-control" required name="intro" value="{{old('intro')}}">
                    <x-error name="intro"></x-error>
                </div>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Body</label>
                    <textarea name="body" id="" cols="30" rows="10" class="form-control">{{old('body')}}</textarea>
                    <x-error name="body"></x-error>
                </div>

                <div>
                    <select name="category_id" id="" class="form-control">
                        @foreach ($categories as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
            </form>
        </x-card-wrapper>
    </div>
</x-layout>