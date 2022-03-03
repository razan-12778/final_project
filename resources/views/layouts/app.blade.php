<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Absence aproval </title>
    <link rel="icon" href="https://img.icons8.com/external-kmg-design-glyph-kmg-design/32/000000/external-graduation-back-to-school-kmg-design-glyph-kmg-design-2.png">

    <!-- Bootstrap core CSS -->
    <link href="{{asset('front/assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/dashboard.css')}}" rel="stylesheet">
    <link href="{{asset('front/dashboard.rtl.css')}}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="dashboard.css" rel="stylesheet">
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Absence aproval</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false"
            aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a class="nav-link px-3"
               href="@if(auth('student')->check()) {{route('student.logout')}} @elseif(auth()->check()){{route('logout')}}@endif">Sign
                out</a>
        </div>
    </div>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
            <div class="position-sticky pt-0">
                <div class="text-center py-4 " style="background: rgb(42,61,30)">
                    @if(auth('student')->user()->avatar??false)
                        <img src="{{auth('student')->user()->getAvatar()}}" width="120" class="rounded-circle" alt="">
                    @else
                        <img src="https://img.icons8.com/external-flatart-icons-outline-flatarticons/120/000000/external-user-user-flatart-icons-outline-flatarticons-9.png"
                             class="bg-white rounded-circle"/>
                    @endif
                    <p class="my-3 text-white">@if(auth('student')->check()) {{auth('student')->user()->name}}@elseif(auth()->check()){{auth()->user()->name}} @endif</p>
                    <p class="my-3 text-white">@if(auth('student')->check()) {{auth('student')->user()->email}}@elseif(auth()->check()){{auth()->user()->email}} @endif</p>
                    <p class="my-3 text-white">@if(auth('student')->check()) {{auth('student')->user()->id}}@elseif(auth()->check()){{auth()->user()->id}} @endif</p>
                </div>
                <ul class="nav flex-column pt-3">
                    @if(auth()->check())
                        <li class="nav-item">
                            <a class="nav-link h5 " aria-current="page" href="{{route('admin.index')}}">
                                <span data-feather="home"></span>
                                Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link h5 " aria-current="page" href="{{route('admin.absence.index')}}">
                                <span data-feather="home"></span>
                                Absence
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link h5 " aria-current="page" href="{{route('admin.student.index')}}">
                                <span data-feather="home"></span>
                                Students
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link h5 " aria-current="page" href="{{route('admin.user.index')}}">
                                <span data-feather="home"></span>
                                Admins
                            </a>
                        </li>
                        @elseif(auth('student')->check())
                    <li class="nav-item">
                        <a class="nav-link h5 " aria-current="page" href="{{route('student.index')}}">
                            <span data-feather="home"></span>
                            Home
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h5" href="{{route('student.edit',auth('student')->user())}}">
                            <span data-feather="file"></span>
                            settings
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link h5" href="{{route('contactus')}}">
                            <span data-feather="file"></span>
                            contact us
                        </a>
                    </li>
                    @endif

                </ul>
            </div>
        </nav>

        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

            @yield('content')

        </main>
    </div>
</div>


<script src="{{asset('front/assets/dist/js/bootstrap.bundle.min.js')}}"></script>
</body>
</html>
