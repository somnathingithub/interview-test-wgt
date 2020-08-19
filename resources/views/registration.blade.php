<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Login</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/all.css">
    <script src="{{ asset('css/style.css') }}"></script>
</head>
<body>

<div class="container">

    <div class="card bg-light">
        <article class="card-body mx-auto" style="max-width: 600px;">
            <h4 class="card-title mt-3 text-center">Create Account</h4>
            <p class="text-center">Get started with your free account</p>
            @if(Session::has('success'))
                <div class="alert alert-success">
                    {{ Session::get('success') }}
                    @php
                        Session::forget('success');
                    @endphp
                </div>
            @endif
            <form action="{{ url('registration/save') }}" method="post">
                @csrf
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-user"></i> </span>
                </div>
                <input name="user_name" class="form-control" placeholder="User name" type="text" value="{{ old('user_name') }}">
                @error('user_name')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-envelope"></i> </span>
                </div>
                <input name="email_id" class="form-control" placeholder="Email address" type="email" value="{{ old('email_id') }}">
                @error('email_id')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input name="password" class="form-control" placeholder="Create password" type="password">
                @error('password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div> <!-- form-group// -->
            <div class="form-group input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text"> <i class="fa fa-lock"></i> </span>
                </div>
                <input name="repeat_password" class="form-control" placeholder="Repeat password" type="password">
                @error('repeat_password')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div> <!-- form-group// -->
            <div class="form-group">
                <button type="submit" class="btn btn-primary btn-block"> Create Account</button>
            </div> <!-- form-group// -->
            <p class="text-center">Have an account? <a href="{{ url('login') }}">Log In</a></p>
            </form>
        </article>
    </div> <!-- card.// -->
</div>
<!--container end.//-->
</body>
</html>
