@extends('frontend/layouts/master')
@section('title')
   KAF JIU JITSU
@endsection
@section('content')

    @foreach ( $postcomplete as $posts )
        <div class="row mx-5 pb-4">
            <div class="col-lg-3 col-md-12 col-sm-12 ">
                <img class="ees" src="backend/img/postimages/{{ $posts['postimage'] }}"  alt="">
            </div>

            <div class="col-lg-9 col-md-12 col-sm-12 w-75 ">
                <h2 class="eed">{{ $posts['posttitle'] }}</h2>
                <span>yasir</span>  <span>12/13/14</span>
                <p class="rrf">{{Str::limit($posts['short_desc'],200 )}}<a href="{{ url('post', $posts['posturl']) }}">Read More</a></p>
                <hr>
            </div>

        </div>
    @endforeach

@endsection
