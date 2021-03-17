@extends('backend/layouts/master')
@section('title')
  Add Product - Cooutfits
@endsection
@section('content')
<form action="{{url ('product')}}" method="POST" enctype="multipart/form-data">
  @csrf
    <div class="row">


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
                        <input name="slug" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <ul class="nav nav-tabs p-0" id="myTab" role="tablist">
                        @foreach($language as $languages)
                        <li class="nav-item">
                          <a class="nav-link" id="home-tab" data-toggle="tab" href="#{{$languages['name']}}{{$languages->id}}" role="tab" aria-controls="home" aria-selected="true">{{$languages['name']}}</a>
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
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="bmd-label-floating">Short Description</label>
                                  <textarea name="short_description[]" class="form-control" name="" id="editor" cols="30" rows="10"></textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="bmd-label-floating">Long Description</label>
                                  <textarea class="form-control" name="long_description[]" id="editor2" cols="30" rows="10"></textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label class="bmd-label-floating">Meta Title</label>
                          <input name="meta_title" type="text" class="form-control">
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label class="bmd-label-floating">Meta Description</label>
                          <textarea class="form-control" name="meta_description" id="editor2" cols="30" rows="10"></textarea>
                      </div>
                  </div>
                  <div class="clearfix"></div>
              </div>
            </div>
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Option</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-6">
                      <div class="form-group">
                          <label for="">Type</label>
                      </div>
                    </div>
                    <div class="col-md-5">
                      <div class="form-group">
                         <label for="">Configurable</label>
                      </div>
                    </div>
                    <div class="col-md-1">
                      <div class="form-group">
                        <a href="javascript:void(0);" class="add_button" title="Add field"><i class="fas fa-plus"></i></a>
                      </div>
                    </div>
                      <div class="col-md-12">
                           <div class="ajeeb2">
                               <div class="input-group mb-3">

                              </div>
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
            <div class="form-group">
                <select class="form-control " name="category[]" id="" cols="30" rows="10">
                  <option  class="dropdown-item">Select Category</option>
                  @foreach ($category as $categories)
                  <option  class="dropdown-item"  value="{{$categories->id}}">{{$categories->code}}</option>
                  @endforeach
                </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary pull-left">Publish</button>
          </div>
          <div class="col-md-12">
            <p style="font-size:10px;margin:0;">Please Upload Your Banner Image</p>
              <div class="input-group input-group-sm">
                <input type="file" name="image[]" class="form-control border-0" name="image" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="cheque-img-upload">
                <input type="hidden" name="image_id[]" value="1" class="form-control border-0" name="image" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="cheque-img-upload">
              </div>
          </div>
          <div class="col-md-12">
            <p style="font-size:10px;margin:0;">Please Upload Your Main Image</p>
              <div class="input-group input-group-sm">
                <input type="file" name="image[]" class="form-control border-0" name="image" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="cheque-img-upload">
                <input type="hidden" name="image_id[]" value="2"  class="form-control border-0" name="image" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="cheque-img-upload">
              </div>
          </div>
        </div>


      </div>
    </div>
</form>
<div class="d-none">
  <div class="multiple_branches ">
   <div class="row">
    <div class="col-md-5">
      <div class="form-group">
          <select class="form-control " name="attribute[]" id="" cols="30" rows="10">
            <option  class="dropdown-item">Type</option>
            @foreach ($attribute as $attributes)
            <option  class="dropdown-item"  value="{{$attributes->id}}">{{$attributes->code}}</option>
            @endforeach
          </select>
      </div>
    </div>
    <div class="col-md-5">
      <div class="form-group">
          <select class="form-control " name="variation[]" id="" cols="30" rows="10">
            <option  class="dropdown-item">Configurable</option>
            @foreach ($variation as $variations)
            <option  class="dropdown-item" value="{{$variations->id}}">{{$variations->code}}</option>
            @endforeach
          </select>
      </div>
    </div>
    <div class="col-md-2">
      <div class="form-group">
        <label class="bmd-label-floating">Price</label>
        <input type="text" name="price[]" class="form-control">
      </div>
</div>
   </div>
  </div>
</div>


@endsection
