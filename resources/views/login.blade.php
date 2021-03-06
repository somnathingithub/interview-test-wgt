<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Login</title>
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
      <link href="{{asset('style.css')}}" rel="stylesheet">
      <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
      <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <!------ Include the above in your HEAD tag ---------->
   </head>
   <!------ Include the above in your HEAD tag ---------->
   <body>
      <div id="login">
         <h3 class="text-center text-white pt-5">Login form</h3>
         <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
               <div id="login-column" class="col-md-6">
                  <div id="login-box" class="col-md-12">
                    @if ($message = Session::get('error'))
                       <div class="alert alert-danger alert-block">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <strong>{{ $message }}</strong>
                       </div>
                       @endif

                       @if (count($errors) > 0)
                        <div class="alert alert-danger">
                         <ul>
                         @foreach($errors->all() as $error)
                          <li>{{ $error }}</li>
                         @endforeach
                         </ul>
                        </div>
                       @endif
                     <form action="{{ url('/login/check') }}" id="login-form" class="form" method="post" autocomplete="off">
                      {{ csrf_field() }}
                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group">
                           <label for="email_id" class="text-info">Email:</label><br>
                           <input type="email_id" name="email_id" id="email_id" class="form-control">
                        </div>
                        <div class="form-group">
                           <label for="password" class="text-info">Password:</label><br>
                           <input type="password" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                           <input type="submit" name="submit" class="btn btn-info btn-md" value="submit">
                        </div>
                     </form>
                        <p class="text-center">Create an account? <a href="{{ url('registration') }}">Registration</a></p>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>
