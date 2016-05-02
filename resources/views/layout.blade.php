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

</head>
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
