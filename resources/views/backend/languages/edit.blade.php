@extends('backend/layouts/master')
@section('title')
   Edit Language - {{config('app.name')}}
@endsection
@section('content')





<!-- Header -->
<div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-8"></span>
  <!-- Header container -->
  
</div>
<!-- Page content -->
<form action="{{route ('language.update',$data->id)}}" method="POST">
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
                {{-- <label class="bmd-label-floating">Language</label> --}}
                <select name="status" id=""  class="form-control">
                  <option class="dropdown-item">Status</option>
                  @if($data->status == 1 )
                  <option selected value="1" class="dropdown-item">Enabled</option>
                  <option value="0" class="dropdown-item">Disabled</option>
                  @endif
                  @if($data->status == 0 )
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
          <h4 class="card-title">Add Language</h4>
        </div>
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">Site Title</label>
              <input type="text" name="name" value="{{$data->name}}" class="form-control">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label class="bmd-label-floating">SKU</label>
                <input type="text" value="{{$data->sku}}" name="sku" class="form-control">
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
