<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  </head>
  <body>
    <div class="col-md-5">
      <div class="card">
        <div class="card-header">
          <h3>Login</h3>
        </div>
        <div class="card-body">
          <form class="form" action="{{ route('login.postLogin') }}" method="post">
            @csrf
            <label>Usename</label>
            <input class="form-control" type="username" name="username" placeholder="Username">
            <label>Password</label>
            <input class="form-control" type="password" name="password" placeholder="Password"><br>
            <input class="btn btn-primary" type="submit" value="Login">
          </form>
        </div>
      </div>

    </div>
  </body>
</html>
