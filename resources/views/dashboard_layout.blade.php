<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>{{ $page_title }}</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style type="text/css">
        .box {
            width: 600px;
            margin: 0 auto;
            border: 1px solid #ccc;
        }
    </style>
</head>
<body>
<br/>
<div class="container">
    <h3 align="center">{{ $page_title }}</h3><br/>
    @if(isset(Auth::user()->email_id))
        <div class="alert alert-danger success-block">
            <strong>Welcome {{ Auth::user()->user_name }}</strong>
            <br/>
            <a href="{{ url('/logout') }}">Logout</a>
        </div>
    @endif
    @yield('content')
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
    $('#datepicker').datepicker({
        format: 'yyyy-mm-dd'
    });
</script>
</body>
</html>
