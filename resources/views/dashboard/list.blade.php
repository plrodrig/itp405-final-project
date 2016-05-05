@extends('layout')
@section('content')
<div class="container">
    <div class="row">
		<div class="well">
        <h1 class="text-center"> Wish List</h1>
        <h2 class="text-center">Add details and categorize this future travel! </h2>
        <div class="list-group">
          <a href="#" class="list-group-item">
            <form action="/wishlist" method="post" role="form">
                    <?php echo csrf_field() ?>
                <div class="media col-md-3">
                    <figure class="pull-left">

                        <img src="{{$picture->link}}" class="img-responsive img-rounded full-width">
                    </figure>
                </div>
                <div class="col-md-6">
                    <h4 class="list-group-item-heading"> Location: </h4>
                     {{$picture->location}}

                </div>
                <div class="col-md-6">
                <div class="form-group">
                    <label for="comment">Add a Comment:</label>
                    <textarea class="form-control" rows="4" id="comment" name="comments"></textarea>
                </div>
                </div>
                <div class="col-md-3">
                     <div class="radio">
                        <label><input type="radio" name="optradio" value="1">Dream Travels   </label>
                      </div>
                      <div class="radio">
                        <label><input type="radio" name="optradio" value="2">Reach Travels  </label>
                      </div>
                      <div class="radio">
                        <label><input type="radio" name="optradio" value="3">Within Year Travels</label>
                      </div>
                </div>
                  <input type="hidden" name="pic_id" value="{{$picture->id}}">
                <div class="col-md-3">
                <button href="#" class="myButton" type="submit"> Save </button> </center>
                </div>
                </form>
          </a>
        </div>
        </div>
	</div>
</div> <!--end container-->

@endsection
