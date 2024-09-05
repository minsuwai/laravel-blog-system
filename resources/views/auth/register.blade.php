<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto">
                <h3 class="text-primary text-center my-3">Register Form</h3>
                <div class="card p-4 my-5 shadow-sm">
                    <form method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Name</label>
                            <input type="text" required class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="name" value="{{old('name')}}">
                            <x-error name="name"></x-error>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Username</label>
                            <input type="text" required class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="username" value="{{old('username')}}">
                            <x-error name="username"></x-error>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Email address</label>
                            <input type="email" required class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" name="email" value="{{old('email')}}">
                            <x-error name="email"></x-error>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password</label>
                            <input type="password" required class="form-control" id="exampleInputPassword1"
                                name="password">
                            <x-error name="password"></x-error>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                        {{-- <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{$error}}</li>
                            @endforeach

                        </ul> --}}
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-layout>