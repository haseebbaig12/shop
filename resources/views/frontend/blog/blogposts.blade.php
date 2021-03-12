@extends('frontend/layouts/master')
@section('title')
   KAF JIU JITSU
@endsection
@section('content')
<div class="card-group">
    @foreach ( $postcomplete as $posts )
    <div class="card">
     {{-- <a href="{{ route('single.post', array) }}" > --}}
     <img class="card-img-top" height="300px" width="100px" src="backend/img/postimages/{{ $posts['postimage'] }}" alt="Card image cap"> </a>
      <div class="card-body">
        <h3 class="card-title">{{ $posts['posttitle'] }}</h3>
        <p class="card-text">{{Str::limit($posts['short_desc'],100 )}}<a href="{{ url('post', $posts['posturl']) }}">Read More</a> </p>
        <p class="card-text"><small class="text-muted">{{ date('M j, Y', strtotime($posts['postdate'])) }}</small></p>
      </div>
    </div>
    @endforeach
  </div>
@endsection
