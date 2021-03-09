@extends('backend/layouts/master')
@section('title')
  Add Pages - Cooutfits
@endsection
@section('content')

<form action="{{url ('pages')}}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="row">
      <div class="col-md-3">
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
            <button type="submit" class="btn btn-primary pull-left">Publish</button>
          </div>
          <div class="col-md-12">
            <p style="font-size:10px;margin:0;">Please Upload Your Feature Image</p>
              <div class="input-group input-group-sm">
                <input type="file" name="image" class="form-control border-0" name="image" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="cheque-img-upload">
              </div>
          </div>
        </div>
      </div>
      <div class="col-md-9">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Add Pages</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">URL</label>
                        <input name="url" type="text" class="form-control">
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Code</label>
                          <input name="code" type="text" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          @foreach ($lang as $tabs)
                            <li class="nav-item">
                              <a class="nav-link " id="home-tab" data-toggle="tab" href="#{{$tabs['language'] }}" role="tab" aria-controls="home" aria-selected="true">{{ $tabs['language'] }}</a>
                            </li>
                            @endforeach
                          </ul>


                      <div class="tab-content" id="myTabContent">
                        @foreach ($lang as $tabs)
                        <div class="tab-pane fade " id="{{$tabs['language'] }}" role="tabpanel" aria-labelledby="home-tab">
                          <div class="row">
                            <div class="col-md-12">
                              <p class="my-3" style="font-size:10px;margin:0;">Please Upload Data in {{ $tabs['language'] }} </p>
                            </div>
                            <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">TITLE</label>
                                    <input type="text" name="title[]" class="form-control">
                                    <input type="hidden" name="language[]" value="{{ $tabs['id'] }}" class="form-control">
                                  </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="bmd-label-floating">Text</label>
                                  <textarea id=""  name="page_text[]" class="form-control pagecontent" cols="30" rows="10"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Meta TITLE</label>
                          <input type="text" name="meta_title" class="form-control">
                        </div>
                  </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Meta Description</label>
                          <textarea class="form-control" name="meta_desc" id="" cols="30" rows="10"></textarea>
                      </div>
                    </div>
                  </div>
                  <div class="clearfix"></div>
              </div>
            </div>
      </div>
    </div>
</form>
@endsection
