@extends('layout')
@section('content')
 <h1>Dashboard</h1>
 Welcome, {{Auth::user()->name}}
 <a href="/logout"> Logout </a>

 <div class="masthead">
    <div class="container">
      <h1 class="title">Instagram Photo <span class="red">&hearts;</span> Checker</h1>
      <p class="subtitle">
        Find out who liked your Instagram photos the most.
      </p>
    </div>
  </div>

  <div class="container">


    <div class="content">

      <form class="form-inline">
        <div class="form-group">
          <div class="input-group">
            <div class="input-group-addon">Instagram Username:</div>
            <input type="text" class="form-control" id="input" placeholder="e.g. heiswayi.nrird">
          </div>
        </div>
        <button type="submit" class="btn btn-primary" id="button">Check</button>
      </form>

      <div id="contents"></div>

    </div>


    <footer class="colophon">
      <p>&copy; <a href="http://heiswayi.github.io">Heiswayi Nrird</a></p>
    </footer>

  </div>
  <!-- /close container -->

  <div id="popover"></div>
@endsection
