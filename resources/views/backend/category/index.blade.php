@extends('backend/layouts/master')
@section('title')
Category - Cooutfits
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <a class="btn btn-primary pull-right" href="{{route ('category.create')}}">Add Category</a>
    </div>
    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">Category</h4>
          {{-- <p class="card-category"> Here is a sites</p> --}}
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="">
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Sku</th>
                <th>Status</th>
                <th>Date</th>
                <th class="text-center">Action</th>
              </thead>
              <tbody>
                @foreach($category as $categories)
                <tr>
                    <td>1</td>
                    <td>
                      <a href="{{route('category.edit',$categories->id)}}">
                      <img class="d-block" height="60px" width="60px" src="{{asset('backend/img/category')}}/{{$categories->image}}" alt="">
                      </a>
                    </td>
                    <td>
                    <a href="{{route('category.edit',$categories->id)}}">
                    {{$categories->seo_title}}</td>
                    </a>
                    <td>{{$categories->code}}</td>
                    <td>
                        @if($categories->status == 1)
                        Enabled
                        @else
                        Disabled
                        @endif
                    </td>
                    <td>{{$categories->created_at}}</td>
                    <td class="text-center">
                    <form action="{{ route('category.destroy',$categories->id) }}" method="POST">
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
