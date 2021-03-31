@extends('backend/layouts/master')
@section('title')
   Edit Site - Cooutfits
@endsection
@section('content')
<div class="row">
  <div class="col-md-3 ">
    <div class="nav flex-column nav-pills card" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Basic</a>
    <p class="px-2 m-0" style="font-size:11px;color:#a9afbbd1;">Created: {{$data->created_at}}</p>
    <p class="px-2 m-0" style="font-size:11px;color:#a9afbbd1;">Modified: {{$data->updated_at}}</p>
    </div>
  </div>
  <div class="col-md-9">
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Edit Site</h4>
          </div>
          <div class="card-body">
            <form action="{{route ('brand.update',$data->id)}}" method="POST">
                @csrf
                @method('PUT')
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
              <div class="row">
                <div class="col-md-6">
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
              <button type="submit" class="btn btn-primary pull-right">Update</button>
              <div class="clearfix"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
