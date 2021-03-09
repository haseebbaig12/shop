@extends('backend/layouts/master')
@section('title')
   Add Site - Cooutfits
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
            <h4 class="card-title">Add Site</h4>
          </div>
          <div class="card-body">
            <form action="{{url ('slider')}}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Site Title</label>
                    <input type="text" name="name" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    {{-- <label class="bmd-label-floating">Language</label> --}}
                    <select name="status" id=""  class="form-control">
                      <option class="dropdown-item">Status</option>
                      <option value="1" class="dropdown-item">Enabled</option>
                      <option value="0" class="dropdown-item">Disabled</option>
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                  <p style="font-size:10px;margin:0;">Please Upload Your Banner Slider</p>
                    <div class="input-group input-group-sm">
                      <input type="file" name="image[]" class="form-control border-0" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="cheque-img-upload">
                      <input type="hidden" value="1" name="image_id[]">
                    </div>
                </div>
                <div class="col-md-12">
                  <p style="font-size:10px;margin:0;">Please Upload Your Banner Slider</p>
                    <div class="input-group input-group-sm">
                      <input type="file" name="image[]" class="form-control border-0"  aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="cheque-img-upload">
                      <input type="hidden" value="2" name="image_id[]">
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
