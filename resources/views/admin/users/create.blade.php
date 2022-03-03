@extends('layouts.app')

@section('content')

    @if(session('success'))
        <div class="alert alert-success mt-3">
            {{session('success')}}
        </div>
    @endif
    <main class="m-5 ">
        <form action="{{route('admin.user.store')}}" method="post" class=" " enctype="multipart/form-data">
            @csrf

            <h1 class="h2 mb-4  fw-normal text-capitalize ">Add Admin</h1>

            <div class=" mb-2">
                <label for="name" class="pb-2">Name</label>
                <input type="text" class="form-control @error('name') border-danger @enderror "
                       id="name" name="name" placeholder="Ex: wafa">
            </div>
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class=" mb-2">
                <label for="email" class="pb-2">Email address</label>
                <input type="email" class="form-control @error('email') border-danger @enderror "
                       id="email" name="email" placeholder="mo@bu.edu.sa">
            </div>
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class=" mb-2">
                <label for="password" class="pb-2">Password</label>
                <input type="password" class="form-control @error('password') border-danger @enderror " id="password"
                       name="password" placeholder="Enter your password">
            </div>
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class=" mb-2">
                <label for="password_confirmation" class="pb-2">Confirmation Password</label>
                <input type="password" class="form-control @error('password_confirmation') border-danger @enderror "
                       id="password_confirmation" name="password_confirmation"
                       placeholder="Enter your Confirmation password">
            </div>
            @error('password_confirmation')
            <span class="text-danger">{{$message}}</span>
            @enderror

            <button class="w-100 my-4 btn btn-lg btn-outline-success" type="submit">Submit</button>

        </form>
    </main>


@endsection