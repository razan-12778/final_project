<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Register</title>
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

<main class="form-register w-100">
    <form action="{{route('student.submit_register')}}" method="post" class=" p-5 shadow rounded-3" enctype="multipart/form-data" >
        @csrf

        <h1 class="h2 mb-4  fw-normal text-capitalize ">Register</h1>

        <div class=" mb-2">
            <label for="name" class="pb-2">Name</label>
            <input type="text" class="form-control @error('name') border-danger @enderror " id="name" name="name" placeholder="Ex: wafa">
        </div>
        <div class=" mb-2">
            <label for="id" class="pb-2">ID student</label>
            <input type="number" class="form-control @error('id') border-danger @enderror " id="id" name="id" placeholder="Ex: 439000000 ">
        </div>
        <div class=" mb-2">
            <label for="email" class="pb-2">Email address</label>
            <input type="email" class="form-control @error('email') border-danger @enderror " id="email" name="email" placeholder="mo@bu.edu.sa">
        </div>
        <div class=" mb-2">
            <label for="password" class="pb-2">Password</label>
            <input type="password" class="form-control @error('password') border-danger @enderror " id="password" name="password" placeholder="Enter your password">
        </div>
        <div class=" mb-2">
            <label for="password_confirmation" class="pb-2">Confirmation Password</label>
            <input type="password" class="form-control @error('password_confirmation') border-danger @enderror " id="password_confirmation" name="password_confirmation" placeholder="Enter your Confirmation password">
        </div>
        <div class=" mb-2">
            <label for="phone" class="pb-2">Phone</label>
            <input type="tel" class="form-control @error('phone') border-danger @enderror " id="phone" name="phone" placeholder="Ex: 055xxxxxx">
        </div>
        <div class=" mb-2">
            <label for="avatar" class="pb-2" >Avatar</label>
            <input type="file" class="form-control @error('avatar') border-danger @enderror " id="avatar" name="avatar"  placeholder="Password">
        </div>
        <button class="w-100 my-4 btn btn-lg btn-outline-primary" type="submit">Register</button>

        <hr>

        <p class="pt-3 m-0">
            If you have an account
            <br>
            <a href="{{route('student.login')}}"> <code>Sign in</code></a>
        </p>
    </form>
</main>



</body>
</html>
