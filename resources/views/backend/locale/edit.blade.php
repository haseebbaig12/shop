@extends('backend/layouts/master')
@section('title')
   Update Locale - Cooutfits
@endsection
@section('content')
<div class="row">
  <div class="col-md-3 ">
    <div class="nav flex-column nav-pills card" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Basic</a>
      <p class="px-2 m-0" style="font-size:11px;color:#a9afbbd1;">Modified:</p>
      <p class="px-2 m-0" style="font-size:11px;color:#a9afbbd1;">Created:</p>
    </div>
  </div>
  <div class="col-md-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Add Locale</h4>
          </div>
          <div class="card-body">
            <form action="{{route ('locale.update',$locale->id)}}" method="POST">
                @csrf
                @method('PUT')
                <input type="hidden" name="user_id" value="{{Auth::user()->id}}" class="form-control" >
                <input type="hidden" name="site_id" value="{{ $site->site}}" class="form-control" >
                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <select name="language_id" id=""  class="form-control">
                            @foreach ( $language as $languages )
                            @if ($locale->language_id == $languages->id )
                            @php
                          $selectlanguage = 'selected';
                            @endphp
                            @else
                            @php
                            $selectlanguage = '';
                        @endphp
                          @endif
                          <option {{ $selectlanguage }} value="{{ $languages->id }}" class="dropdown-item" name="language_id">{{ $languages->name }}</option>
                          @endforeach
                          @error('language_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">

                        <select name="currency_id" id=""  class="form-control">
                            @foreach ( $currency as $currencies)
                            @if ($locale->currency_id == $currencies->id )
                            @php
                                $selectedcurrency = 'selected';
                            @endphp
                            @else
                            @php
                            $selectedcurrency = '';
                        @endphp
                          @endif
                          <option {{ $selectedcurrency }} value="{{ $currencies->id }}" class="dropdown-item">{{ $currencies->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                        <select name="status" id=""  class="form-control">
                          @if($locale->status == 1 )
                          <option selected value="1" class="dropdown-item">Enabled</option>
                          <option value="0" class="dropdown-item">Disabled</option>
                          @endif
                          @if($locale->status == 0 )
                          <option value="1" class="dropdown-item">Enabled</option>
                          <option selected value="0" class="dropdown-item">Disabled</option>
                          @endif
                        </select>
                      </div>
                    </div>
                  </div>
              <button type="submit" class="btn btn-primary pull-right">Publish</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
