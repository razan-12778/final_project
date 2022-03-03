@extends('layouts.app')
@section('content')

    <h2 class="text-center pt-5">
        All Admins
    </h2>
    <a href="{{route('admin.user.create')}}" class="btn btn-link">Add Admin</a>
    @if(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    @if(session('delete'))
        <div class="alert alert-danger">
            {{session('delete')}}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table text-center">
            <tr>
                <td>#</td>
                <td>name</td>
                <td>email</td>
                <td>actions</td>

            </tr>
            @forelse($users as $user)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>

                    <td>
                        <a href="{{route('admin.user.destroy',$user)}}" class="btn btn-danger">
                            Delete
                        </a>
                        <a href="{{route('admin.user.edit',$user)}}" class="btn btn-primary">
                            Edit
                        </a>
                    </td>
                </tr>
            @empty
            @endforelse
        </table>
    </div>
@endsection