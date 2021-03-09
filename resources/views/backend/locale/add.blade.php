@extends('backend/layouts/master')
@section('title')
   Add Locale - Cooutfits
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
            <form action="{{route ('locale.store')}}" method="POST">
                @csrf

                <input type="hidden" name="user_id" value="{{Auth::user()->id}}" class="form-control" >
                <input type="hidden" name="site_id" value="{{ $site->site}}" class="form-control" >

                <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">

                        <select name="language_id" id=""  class="form-control">
                            <option value="" class="dropdown-item">Select Language</option>
                            @foreach ( $language as $languages )
                          <option value="{{ $languages->id }}" class="dropdown-item">{{ $languages->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">

                        <select name="currency_id" id=""  class="form-control">
                            <option value="" class="dropdown-item">Select Currency</option>
                            @foreach ( $currency as $currencies)
                          <option value="{{ $currencies->id }}" class="dropdown-item">{{ $currencies->name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                  </div>

              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">

                    <select name="status" id=""  class="form-control">
                      <option class="dropdown-item">Status</option>
                      <option value="1" class="dropdown-item">Enabled</option>
                      <option value="0" class="dropdown-item">Disabled</option>
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
