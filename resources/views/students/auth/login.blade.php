<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Sign in</title>
    <link rel="icon" href="https://img.icons8.com/external-kmg-design-glyph-kmg-design/32/000000/external-graduation-back-to-school-kmg-design-glyph-kmg-design-2.png">

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

</head>
<body class="text-center">

<main class="form-signin w-100">
    <form action="{{route('student.submit_login')}}" method="post" class=" p-5 shadow rounded-3" >
        @csrf
        <h1 class="h2 mb-5 fw-normal text-capitalize ">Login</h1>

        <div class="form-floating mb-4">
            <input type="text" class="form-control @error('id') border-danger @enderror" id="id" name="id" placeholder="Ex: 430000000">
            <label for="id">ID Student</label>
        </div>
        <div class="form-floating mb-4">
            <input type="password" class="form-control @error('password') border-danger @enderror" id="floatingPassword" name="password" placeholder="Password">
            <label for="floatingPassword">Password</label>
        </div>


        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" checked name="remember" value="remember-me"> Remember me
            </label>
        </div>
        <button class="w-100 btn btn-lg btn-outline-success" type="submit">Sign in</button>
        <hr>
        <p class="pt-3 m-0">
            If you don't have an account
            <br>
            <a href="{{route('student.register')}}"> <code>Register Now</code></a>
        </p>
    </form>
</main>



</body>
</html>
