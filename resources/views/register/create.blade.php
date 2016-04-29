@extends('layout')
@section('content')
    <h2>Register</h2>
    <form action="\register" method="post"></form>
      Email: <input type="text" name="user">
      <input type="submit" value="Add">
    </form>
@endsection
