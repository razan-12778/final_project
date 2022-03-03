@extends('layouts.app')
@section('content')


    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif

    <main class=" m-5">
        <form action="{{route('admin.student.update',$student)}}" method="post" class=" " enctype="multipart/form-data" >
            @csrf

            <h1 class="h2 mb-4  fw-normal text-capitalize ">Edit Student</h1>

            <div class=" mb-2">
                <label for="name" class="pb-2">Name</label>
                <input type="text" class="form-control @error('name') border-danger @enderror " value="{{$student->name}}" id="name" name="name" placeholder="Ex: wafa">
            </div>
            @error('name')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class=" mb-2">
                <label for="id" class="pb-2">ID student</label>
                <input type="number" class="form-control @error('id') border-danger @enderror " value="{{$student->id}}" id="id" name="id" placeholder="Ex: 439000000 ">
            </div>
            @error('id')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class=" mb-2">
                <label for="email" class="pb-2">Email address</label>
                <input type="email" class="form-control @error('email') border-danger @enderror " value="{{$student->email}}" id="email" name="email" placeholder="mo@bu.edu.sa">
            </div>
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class=" mb-2">
                <label for="password" class="pb-2">Password</label>
                <input type="password" class="form-control @error('password') border-danger @enderror " id="password" name="password" placeholder="Enter your password">
            </div>
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class=" mb-2">
                <label for="password_confirmation" class="pb-2">Confirmation Password</label>
                <input type="password" class="form-control @error('password_confirmation') border-danger @enderror "  id="password_confirmation" name="password_confirmation" placeholder="Enter your Confirmation password">
            </div>
            @error('password_confirmation')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class=" mb-2">
                <label for="phone" class="pb-2">Phone</label>
                <input type="tel" class="form-control @error('phone') border-danger @enderror " value="{{$student->phone}}" id="phone" name="phone" placeholder="Ex: 055xxxxxx">
            </div>
            @error('phone')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <div class=" mb-2">
                <label for="avatar" class="pb-2" >Avatar</label>
                <input type="file" class="form-control @error('avatar') border-danger @enderror " id="avatar" name="avatar"  placeholder="Password">
            </div>
            @error('avatar')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <button class="w-100 my-4 btn btn-lg btn-outline-success" type="submit">Submit</button>

        </form>
    </main>


@endsection