@extends('backend/layouts/master')
@section('title')
Brands - Cooutfits
@endsection
@section('content')
<div class="row">
    <div class="col-12">
        <a class="btn btn-primary pull-right" href="{{route ('locale.create')}}">Add Locale</a>
    </div>
    <div class="col-md-12">
      <div class="card card-plain">
        <div class="card-header card-header-primary">
          <h4 class="card-title mt-0">Locale</h4>
          {{-- <p class="card-category"> Here is a sites</p> --}}
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover">
              <thead class="">
                <th>ID</th>
                <th>Language</th>
                <th>Currency</th>
                <th>Status</th>
                <th>Date</th>
                <th class="text-center">Action</th>
              </thead>
              <tbody>
                @foreach($locale as $locales)
                <tr>
                    <td>1</td>
                    <td>

                        @php
                        $language = DB::table('languages')->where('id',$locales->language_id)->get()->first();

                    @endphp

                    <a href="{{route('locale.edit',$locales->id)}}">
                    {{$language->name}}
                </td>
                @php
                $currency = DB::table('currencies')->where('id',$locales->currency_id)->get()->first();
                @endphp

                    </a>
                    <td>{{$currency->name}}</td>
                    <td>
                        @if($locales->status == 1)
                        Enabled
                        @else
                        Disabled
                        @endif
                    </td>
                    <td>{{$locales->created_at}}</td>
                    <td class="text-center">
                    <form action="{{ route('locale.destroy',$locales->id) }}" method="POST">
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
