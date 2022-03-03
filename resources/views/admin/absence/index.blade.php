@extends('layouts.app')
@section('content')

    <h2 class="text-center pt-5">
        All Absence
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
        <table class="table text-center">
            <tr>
                <td>#</td>
                <td>Student name</td>
                <td>Student id</td>
                <td>Student email</td>
                <td>file</td>
                <td>reply</td>
                <td>reply by</td>
                <td>status</td>
                <td>created at</td>
                <td>actions</td>
            </tr>
            @forelse($absences as $absence)
                <tr>
                    <td>{{$loop->index+1}}</td>
                    <td>{{$absence->student->name}}</td>
                    <td>{{$absence->student->id}}</td>
                    <td>{{$absence->student->email}}</td>
                    <td>
                        <a href="{{asset('storage/'.$absence->file)}}">click here</a>
                    </td>
                    <td>{{$absence->reply ?? '-'}}</td>
                    <td>{{$absence->admin->name ?? '-'}}</td>
                    <td class=" @if($absence->status == 1) text-success @elseif($absence->status == 2) text-danger @elseif($absence->status == 0) text-dark @endif">{{$absence->status == 1 ? 'accepted' : ($absence->status == 2 ? 'decline': 'under review')}}</td>
                    <td>{{$absence->created_at->diffforhumans()}}</td>
                    <td>
                        <a href="{{route('admin.absence.destroy',$absence)}}" class="btn btn-danger">
                            Delete
                        </a>
                        <a href="{{route('admin.absence.edit',$absence)}}" class="btn btn-primary">
                            reply
                        </a>
                    </td>
                </tr>
            @empty
            @endforelse
        </table>
    </div>
@endsection