@extends('layout.app')

@section('content')
<form action="{{ route('login.postLogin') }}" method="post">
  @csrf
  <input type="username" name="username" placeholder="Username">
  <input type="text" name="password" placeholder="Password">
  <input type="submit" value="Login">
</form>
@endsection
