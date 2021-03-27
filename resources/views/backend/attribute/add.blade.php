@extends('backend/layouts/master')
@section('title')
Add Attribute Product - KAF JIU JITSU
@endsection
@section('content')
<form action="{{url ('attribute')}}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="row">
      <div class="col-md-9">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Add Attribute</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Code</label>
                        <input name="code" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach($language as $languages)
                        <li class="nav-item">
                          <a class="nav-link" id="home-tab" data-toggle="tab" href="#{{$languages['name']}}{{$languages['id']}}" role="tab" aria-controls="home" aria-selected="true">{{$languages['name']}}</a>
                        </li>
                        @endforeach
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        @foreach($language as $languages)
                        <div class="tab-pane fade" id="{{$languages['name']}}{{$languages['id']}}" role="tabpanel" aria-labelledby="home-tab">
                          <div class="row">
                            <div class="col-md-12">
                              <p class="my-3" style="font-size:10px;margin:0;">Please Upload Data in {{$languages['name']}} </p>
                            </div>
                            <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">TITLE</label>
                                    <input type="text" name="name[]" class="form-control">
                                    <input type="hidden" name="language[]" value="{{$languages['id']}}" class="form-control">
                                  </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>


                  <div class="clearfix"></div>
              </div>
            </div>
      </div>
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
        </div>
      </div>

    </div>
</form>
@endsection
