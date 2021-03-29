@extends('backend/layouts/master')
@section('title')
   Edit Locale - {{config('app.name')}}
@endsection
@section('content')
<!-- Header -->
<div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-8"></span>
  <!-- Header container -->
  
</div>
<!-- Page content -->
<form action="{{route ('locale.update',$locale->id)}}" method="POST">
  @csrf
  @method('PUT')
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-xl-4 order-xl-2">
      <div class="card card-profile">
        {{-- <img src="../assets/img/theme/img-1-1000x600.jpg" alt="Image placeholder" class="card-img-top"> --}}
        {{-- <div class="row justify-content-center">
          <div class="col-lg-3 order-lg-2">
            <div class="card-profile-image">
              <a href="#">
                <img src="../assets/img/theme/team-4.jpg" class="rounded-circle">
              </a>
            </div>
          </div>
        </div> --}}
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
          <div class="d-flex justify-content-between">
            {{-- <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a> --}}
            <p></p>
            <button type="submit" class="btn btn-sm btn-default float-right">Publish</button>
          </div>
        </div>
        <div class="card-body pt-0">
          <div class="row">
            <div class="col-12">
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
        </div>
      </div>
    </div>
    <div class="col-xl-8 order-xl-1">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Edit Locale</h4>
        </div>
        <div class="card-body">
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

            <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
@endsection
