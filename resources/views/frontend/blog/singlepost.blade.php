@extends('frontend/layouts/master')
@section('title')
   KAF JIU JITSU
@endsection
@section('content')
<div class="card-group">
    <div class="card">
        <h3 class="card-title">{{ $postdetail['posttitle'] }}</h3>
     <img class="card-img-top" height="300px" width="100px" src="{{ asset('backend/img/postimages')}}/{{$post['image']}}" alt="Card image cap"> </a>
     <p class="card-text"><small class="text-muted">{{ date('M j, Y', strtotime($postdetail['postdate'])) }}</small></p>
     <div class="card-body">
        {!! $postdetail->post_text !!}
      </div>
    </div>
  </div>
  @endsection
