@extends('layout')
@section('content')
<div class="container">
  <div class="row">
    <div class="timeline-centered">
      <center><h1 class="text-success">This is your {{$type}} #Goals</h1></center>
      @foreach($list as $item)
      <article class="timeline-entry">
        <div class="timeline-entry-inner">
          <time class="timeline-time" datetime="2014-01-10T03:45"><span>  <?php echo date('M j, Y', 1462169096); ?></span> <span>Today</span></time>

          <div class="timeline-icon bg-success">
            <i class="entypo-camera"></i>
          </div>

          <div class="timeline-label">
             <center><h2><a href="#">This traveler {{$item->name}}</a> <span>was at</span> <a href="#">{{$item->location}} </a></h2>
            @if( ! empty($item->description))
            <blockquote>My comment: {{$item->description}}</blockquote>
            @endif

             <img src="{{$item->link}}" class="img-responsive img-rounded full-width">

          </div>
        </div>
      </article>
      @endforeach

    </div>
  </div>
</div>



@endsection
