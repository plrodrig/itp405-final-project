@extends('layout')
@section('content')
 <center>
   <h1>Welcome, Traveler {{Auth::user()->name}}. <br> Search a location you'd love to visit!  </h1>

 </center>

  <div class="container">


    <div class="content">

      <div class="row">
          <div class="col-xs-8 col-xs-offset-2">
            <form action="/results" method="get" role="form">
      	    <div class="input-group">
                  <input type="text" class="form-control" name="location" placeholder="Search">
                  <span class="input-group-btn">
                      <button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
                  </span>
            </div>
          </form>
          </div>
  	</div>

      <div id="contents"></div>

    </div>


    <footer class="colophon">
    </footer>

  </div>
  <!-- /close container -->

  <div id="popover"></div>
@endsection
