@extends('backend/layouts/master')
@section('title')
Pages - Cooutfits
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <a class="btn btn-primary pull-right" href="{{route ('pages.create')}}">Add Pages</a>
    </div>
    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">Pages</h4>
          {{-- <p class="card-category"> Here is a sites</p> --}}
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
                <th class="text-center">Action/Delete</th>
              </thead>
              <tbody>

                @foreach($indexdata as $pagesdata)
                <tr>
                    <td>1</td>
                    <!-- {{$pagesdata['title']}} -->
                    <td>
                    <a href="{{route('pages.edit',$pagesdata['id'])}}">
                    {{$pagesdata['title']}}</td>
                    </a>
                    <td> <img  height="50" width="70" src="backend/img/pagesimages/{{ $pagesdata['image'] }}" ></td>

                    <td>{{$pagesdata['username']}}</td>

                    <td>{{$pagesdata['created_at']}}</td>
                        <td>
                        @if( $pagesdata['status'] == 1 )
                        Published
                        @else
                        Unpublished
                        @endif

                    </td>
                    <td class="text-center">
                    <form action="{{ route('pages.destroy',$pagesdata['id']) }}" method="POST">
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
