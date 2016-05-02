@extends('layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="timeline-centered">
      @foreach($images as $image)
      <article class="timeline-entry">
        <div class="timeline-entry-inner">
          <time class="timeline-time" datetime="2014-01-10T03:45"><span>  <?php echo date('M j, Y', 1462169096); ?></span> <span>Today</span></time>

          <div class="timeline-icon bg-success">
            <i class="entypo-camera"></i>
          </div>

          <div class="timeline-label">
             <center><h2><a href="#">This traveler {{$image['user']['full_name']}}</a> <span>was at</span> <a href="#">{{$image['location']['name']}} </a></h2>
            @if( ! empty($image['tags'][0]))
            <blockquote>#{{$image['tags'][0]}}</blockquote>
            @endif

             <img src="{{$image['images']['low_resolution']['url']}}" class="img-responsive img-rounded full-width">
            <form action="" method="post" role="form">
              <?php echo csrf_field() ?>
              @if( ! empty($image['location']['name']))
              <input type="hidden" class="form-control" name="location" value="{{$image['location']['name']}}">
              @endif
              @if( ! empty($image['user']['full_name']))
              <input type="hidden" class="form-control" name="full_name" value="{{$image['user']['full_name']}}">
              @endif

            <button href="#" class="myButton" type="submit"> Save </button> </center>
            </form>
          </div>
        </div>
      </article>
      @endforeach

    </div>
  </div>
</div>

@endsection
