<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Register</title>
  <!-- Latest compiled and minified CSS -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <script type="text/javascript" src="{{ URL::asset('js/registerJS.js') }}"></script>
  <link rel="stylesheet" href="{{ URL::asset('css/registerCSS.css') }}" />
  <script type="text/javascript" src="{{ URL::asset('js/instaJS.js') }}"></script>
  <script type="text/javascript" src="{{ URL::asset('js/list.js') }}"></script>
  <link rel="stylesheet" href="{{ URL::asset('css/instaCSS.css') }}" />
  <link rel="stylesheet" href="{{ URL::asset('css/results.css') }}" />
  <link rel="stylesheet" href="{{ URL::asset('css/button.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('css/list.css') }}" />
     <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/dashboard">InstaTraveler</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="/dream">Dream Travels <span class="sr-only">(current)</span></a></li>
        <li><a href="/reach">Reach Travels</a></li>
        <li><a href="/within">One Year Travels</a></li>

      </ul>

      <ul class="nav navbar-nav navbar-right">
       @if(Auth::check())
        <li><a href="/logout">Logout</a></li>
        @endif
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>
<body>
  <div class="masthead">
     <div class="container">
       <h1 class="title">InstaTraveler<span class="red">&hearts;</span></h1>
       <p class="subtitle">
         Record your future trips here. #Traveler.
       </p>
     </div>
   </div>
  @yield('content')
</body>
</html>
</html>
