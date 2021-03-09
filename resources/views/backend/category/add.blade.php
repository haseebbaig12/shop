@extends('backend/layouts/master')
@section('title')
  Category Product - Cooutfits
@endsection
@section('content')
<form action="{{url ('category')}}" method="POST" enctype="multipart/form-data">
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
            <p style="font-size:10px;margin:0;">Please Upload Your Banner Image</p>
              <div class="input-group input-group-sm">
                <input type="file" name="image" class="form-control border-0" name="image" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="cheque-img-upload">
                {{-- <input type="hidden" name="image" value="1" class="form-control border-0" name="image" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="cheque-img-upload"> --}}
              </div>
          </div>
        </div>
        

      </div>

      <div class="col-md-9">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Add Product</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">SLUG</label>
                        <input name="code" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach($language as $languages)
                        <li class="nav-item">
                          <a class="nav-link" id="home-tab" data-toggle="tab" href="#{{$languages->language}}{{$languages->id}}" role="tab" aria-controls="home" aria-selected="true">{{$languages->language}}</a>
                        </li>
                        @endforeach
                      </ul>
                      <div class="tab-content" id="myTabContent">
                        @foreach($language as $languages)
                        <div class="tab-pane fade" id="{{$languages->language}}{{$languages->id}}" role="tabpanel" aria-labelledby="home-tab">
                          <div class="row">
                            <div class="col-md-12">
                              <p class="my-3" style="font-size:10px;margin:0;">Please Upload Data in {{$languages->language}} </p>
                            </div>
                            <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">TITLE</label>
                                    <input type="text" name="name[]" class="form-control">
                                    <input type="hidden" name="language[]" value="{{$languages->id}}" class="form-control">
                                  </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="bmd-label-floating">Short Description</label>
                                  <textarea name="short_description[]" class="form-control" name="" id="editor" cols="30" rows="10"></textarea>
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                <label class="bmd-label-floating">Price</label>
                                  <input class="form-control" name="" id="" >
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group">
                                  <select class="form-control" name="" id="" cols="30" rows="10">
                                    <option>Currency</option>
                                    <option>AE</option>
                                    <option>USD</option>
                                  </select>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
              
                      
                      
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Seo Title</label>
                        <input name="seo_title" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Seo Description</label>
                        <input name="seo_desc" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Meta Keyword</label>
                        <input name="meta_key" type="text" class="form-control">
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
