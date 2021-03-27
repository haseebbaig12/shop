@extends('backend/layouts/master')
@section('title')
Posts - Cooutfits
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <a class="btn btn-primary pull-right" href="{{route ('posts.create')}}">Add Posts</a>
    </div>
    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">Posts</h4>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="">
                <th>ID</th>
                <th>Title</th>
                <th>Feature Image</th>
                <th>Auther</th>
                <th>Date</th>
                <th>Status</th>
                <th class="text-center">Action</th>
              </thead>
              <tbody>
                @foreach($indexdata as $postsdata)
                <tr>
                    <td>1</td>
                    <td>
                    <a href="{{route('posts.edit',$postsdata['id'])}}">
                    {{$postsdata['meta_title']}}</td>
                    </a>
                    <td> <img  height="50" width="70" src="backend/img/postimages/{{ $postsdata['image'] }}" ></td>

                    <td>{{$postsdata['username']}}</td>

                    <td>{{$postsdata['created_at']}}</td>
                        <td>
                        @if( $postsdata['status'] == 1 )
                        Published
                        @else
                        Unpublished
                        @endif

                    </td>
                    <td class="text-center">
                    <form action="{{ route('posts.destroy',$postsdata['id']) }}" method="POST">
                        <p class="m-0">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class=" btn btn-primary"><i class="far fa-trash-alt"></i></button>
                        </p>
                    </form>
                    </td>
                </tr>

                @endforeach

              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
</div>
@endsection
