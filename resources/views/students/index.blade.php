@extends('layouts.app')
@section('content')


    <ul class="nav nav-tabs border-1 py-3 justify-content-around" id="myTab" role="tablist">
        <li class="nav-item " role="presentation">
            <button class="nav-link text-dark  bg-transparent border-0 fs-5 active" id="home-tab"
                    data-bs-toggle="tab" data-bs-target="#home"
                    type="button" role="tab" aria-controls="home" aria-selected="true">Send
            </button>
        </li>
        <li class="nav-item  " role="presentation">
            <button class="nav-link text-dark  bg-transparent border-0 fs-5 " id="profile-tab"
                    data-bs-toggle="tab" data-bs-target="#profile"
                    type="button" role="tab" aria-controls="profile" aria-selected="false">replays
            </button>
        </li>

    </ul>
    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
            <div class="row ">
                @if(session('success'))
                    <div class="alert alert-success my-3 text-center">
                        {{session('success')}}
                    </div>
                @endif
                @if(session('delete'))
                    <div class="alert alert-danger my-3 text-center">
                        {{session('delete')}}
                    </div>
                @endif
                <form action="{{route('absence.store')}}" method="post" enctype="multipart/form-data"
                      class="d-flex align-items-center justify-content-center mt-5">
                    @csrf
                    <div class="text-center mt-5">
                        <img class="my-4"
                             src="https://img.icons8.com/external-kiranshastry-lineal-kiranshastry/120/000000/external-add-file-interface-kiranshastry-lineal-kiranshastry.png"/>
                        <p class="text-capitalize h3 mb-4">Enter your file</p>

                        <input type="file" class="form-control" name="file">
                        @error('file')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        <button class="btn btn-outline-success my-4 col-5"> submit</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="tab-pane show " id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <div class="table-responsive">
                <table class="table text-center">
                    <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">abssence</th>
                        <th scope="col">reply</th>
                        <th scope="col">reply by</th>
                        <th scope="col">status</th>
                        <th scope="col">created at</th>
                        <th scope="col">action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse(\App\Models\Absence::where('student_id',auth('student')->id())->get() as $absence)
                        <tr>
                            <td>{{$loop->index+1}}</td>
                            <td><a href="{{'storage/'.$absence->file}}">
                                    click here
                                </a></td>
                            <td>{{$absence->reply ?? '-'}}</td>
                            <td>{{$absence->admin->name ?? '-'}}</td>
                            <td class=" @if($absence->status == 1) text-success @elseif($absence->status == 2) text-danger @elseif($absence->status == 0) text-dark @endif">{{$absence->status == 1 ?'accepted' : ($absence->status == 2 ? 'decline': 'under review')}}</td>
                            <td>{{$absence->created_at->diffforhumans()}}</td>
                            <td>
                                <a href="{{route('absence.destroy',$absence)}}" class="btn btn-danger">
                                    Delete
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7"> There are no Absence</td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection