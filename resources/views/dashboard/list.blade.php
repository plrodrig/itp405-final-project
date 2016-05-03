@extends('layout')
@section('content')
<div class="container">
    <div class="row">
		<div class="well">
        <h1 class="text-center"> Wish List</h1>
        <h2 class="text-center">These are places you want to go!</h2>
        <div class="list-group">
          <a href="#" class="list-group-item">
                <div class="media col-md-3">
                    <figure class="pull-left">

                        <img src="{{$picture->link}}" class="img-responsive img-rounded full-width">
                    </figure>
                </div>
                <div class="col-md-6">
                    <h4 class="list-group-item-heading"> {{$picture->location}} </h4>
                    <p class="list-group-item-text"> No description here?
                    </p>
                </div>
                <div class="col-md-3 text-center">
                     <div class="radio">
                        <label><input type="radio" name="optradio">Dream Travels   </label>
                      </div>
                      <div class="radio">
                        <label><input type="radio" name="optradio">Reach Travels  </label>
                      </div>
                      <div class="radio">
                        <label><input type="radio" name="optradio">One Year Travels</label>
                      </div>
                </div>
          </a>
        </div>
        </div>
	</div>
</div> <!--end container-->

@endsection
