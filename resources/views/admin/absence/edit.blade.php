@extends('layouts.app')
@section('content')

    <h2 class="text-center pt-5">
        Absence
    </h2>
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <div class="card">
        <div class="card-body">
            <p>Name of student: {{$absence->student->name}}</p>
            <p>Id of student: {{$absence->student->id}}</p>
            <p>Email of student: {{$absence->student->email}}</p>
            <a href="{{asset('storage/'.$absence->file)}}">click here to show the file</a>
            <form action="{{route('admin.absence.update',$absence)}}" method="post">
                @csrf
                <div class=" my-3">
                    <label for="reply">Reply </label>
                    <textarea name="reply" class="form-control " id="reply" cols="30" rows="3">{{$absence->reply}}</textarea>
                </div>
                <div>
                    <label for="" class="form-label">Status: </label>
                    accept
                    <input type="radio" class="form-switch" name="status" @if($absence->status == 1) checked @endif value="1" id="">

                    decline
                    <input type="radio" class="form-switch" name="status" @if($absence->status == 2) checked @endif value="2" id="">
                </div>
                <button class="btn btn-success">
                    submit
                </button>
            </form>
        </div>
    </div>

@endsection