@extends('backend/layouts/master')
@section('title')
Brands - Cooutfits 
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <a class="btn btn-primary pull-right" href="{{route ('brand.create')}}">Add Brand</a>
    </div>
    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">Brands</h4>
          {{-- <p class="card-category"> Here is a sites</p> --}}
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="">
                <th>ID</th>
                <th>Name</th>
                <th>Sku</th>
                <th>Status</th>
                <th>Date</th>
                <th class="text-center">Action</th>
              </thead>
              <tbody>
                @foreach($brand as $brands)
                <tr>
                    <td>1</td>
                    <td>
                    <a href="{{route('brand.edit',$brands->id)}}">  
                    {{$brands->name}}</td>
                    </a>
                    <td>{{$brands->sku}}</td>
                    <td>
                        @if($brands->status == 1)
                        Enabled
                        @else
                        Disabled
                        @endif
                    </td>
                    <td>{{$brands->created_at}}</td>
                    <td class="text-center">
                    <form action="{{ route('brand.destroy',$brands->id) }}" method="POST">
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