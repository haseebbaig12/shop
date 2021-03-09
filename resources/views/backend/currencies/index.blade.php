@extends('backend/layouts/master')
@section('title')
Brands - Cooutfits
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <a class="btn btn-primary pull-right" href="{{route ('currency.create')}}">Add Language</a>
    </div>
    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">currency</h4>
          {{-- <p class="card-category"> Here is a sites</p> --}}
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="">
                <th>ID</th>
                <th>Name</th>
                <th>Code</th>
                <th>Status</th>
                <th>Date</th>
                <th class="text-center">Action</th>
              </thead>
              <tbody>
                @foreach($currency as $currency)
                <tr>
                    <td>1</td>
                    <td>
                    <a href="{{route('currency.edit',$currency->id)}}">
                    {{$currency->name}}</td>
                    </a>
                    <td>{{$currency->code}}</td>
                    <td>
                        @if($currency->status == 1)
                        Enabled
                        @else
                        Disabled
                        @endif
                    </td>
                    <td>{{$currency->created_at}}</td>
                    <td class="text-center">
                    <form action="{{ route('currency.destroy',$currency->id) }}" method="POST">
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
