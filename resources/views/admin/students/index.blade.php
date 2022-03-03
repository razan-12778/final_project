@extends('layouts.app')
@section('content')

    <h2 class="text-center pt-5">
        All Students
    </h2>
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
        <table class="table text-center table-striped align-middle">
            <tr>
                <th class="text-capitalize">#</th>
                <th class="text-capitalize">id</th>
                <th class="text-capitalize">name</th>
                <th class="text-capitalize">email</th>
                <th class="text-capitalize">phone</th>
                <th class="text-capitalize">avatar</th>
                <th class="text-capitalize">actions</th>
            </tr>
            @forelse($students as $student)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$student->id}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->phone}}</td>
                    <td>
                        @if($student->avatar)
                            <a href="{{$student->getAvatar()}}" target="_blank">
                                <img src="{{$student->getAvatar()}}" class="img-fluid" width="60" alt="">
                            </a>
                        @else
                            -
                        @endif
                    </td>

                    <td>
                        <a href="{{route('admin.student.destroy',$student)}}" class="btn btn-danger">
                            Delete
                        </a>
                        <a href="{{route('admin.student.edit',$student)}}" class="btn btn-primary">
                            Edit
                        </a>
                    </td>
                </tr>
            @empty
            @endforelse
        </table>
    </div>
@endsection