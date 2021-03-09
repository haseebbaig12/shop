@extends('backend/layouts/master')
@section('title')
  Cooutfits - Brand
@endsection
@section('content')
<div class="row">
  <div class="col-md-3">
    <div class="nav flex-column nav-pills card" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Basic</a>
      <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Text</a>
    </div>
  </div>

  <div class="col-md-9">
    <form action="{{route ('brand.store')}}" method="POST">
      @csrf
    <div class="tab-content" id="v-pills-tabContent">
      <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title">Add Brand</h4>
          </div>
          <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Brand Title</label>
                    <input type="text" name="name" class="form-control">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">SKU</label>
                    <input name="sku" type="text" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    {{-- <label class="bmd-label-floating">Language</label> --}}
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
          </div>
        </div>
      </div>
      <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">...</div>
    </div>
  </form>
  </div>
</div>














    

@endsection
