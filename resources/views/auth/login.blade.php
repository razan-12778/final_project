<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Admin Login</title>

    <!-- Bootstrap core CSS -->
    <link href="{{asset('front/assets/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('front/signin.css')}}" rel="stylesheet">

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
    <link href="signin.css" rel="stylesheet">
</head>
<body class="text-center">

<main class="form-signin w-100">
    <form action="{{route('login')}}" method="post" class=" p-5 shadow rounded-3" >
        @csrf
        <h1 class="h2 mb-5 fw-normal text-capitalize ">Login</h1>

        <div class="form-floating mb-4">
            <input type="email" class="form-control @error('email') border-danger @enderror" id="email" name="email" placeholder="name@example.com">
            <label for="email">Email address</label>
        </div>
        <div class="form-floating mb-4">
            <input type="password" class="form-control @error('password') border-danger @enderror" id="password" name="password" placeholder="Password">
            <label for="password">Password</label>
        </div>

        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" checked name="remember" value="remember-me"> Remember me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-outline-success" type="submit">Sign in</button>
    </form>
</main>

</body>
</html>
