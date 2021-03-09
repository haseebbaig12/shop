@extends('backend/layouts/master')
@section('title')
  Edit Product - Cooutfits
@endsection
@section('content')
<form action="{{url('products',$product->id)}}" method="POST" enctype="multipart/form-data" name="wowow">
  @csrf
    <div class="row">
      <div class="col-md-3">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              {{-- <label class="bmd-label-floating">Language</label> --}}
              <select name="status" id=""  class="form-control">
                <option class="dropdown-item">Status</option>
                @if($product->status == 1 )
                <option selected value="1" class="dropdown-item">Enabled</option>
                <option value="0" class="dropdown-item">Disabled</option>
                @endif
                @if($product->status == 0 )
                <option value="1" class="dropdown-item">Enabled</option>
                <option selected value="0" class="dropdown-item">Disabled</option>
                @endif
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary pull-left">Publish</button>
          </div>
          @foreach ($product_image as $image)
          <div class="col-md-12">
            <img class="d-block" height="200px" width="200px" src="{{asset('backend/img/category')}}/{{$image->image}}" alt="">
            <p style="font-size:10px;margin:0;">Please Upload Your Banner Image</p>
              <div class="input-group input-group-sm">
                <input type="file" name="image[]" class="form-control border-0" name="image" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="cheque-img-upload">
                <input type="hidden" name="image_id[]" value="{{$image->image_id}}"  class="form-control border-0" name="image" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="cheque-img-upload">
              </div>
              <img src="" alt="">
          </div>
          @endforeach
        </div>
        

      </div>

      <div class="col-md-9">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Product</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">SLUG</label>
                      <input name="slug" type="text" value="{{$product->slug}}" class="form-control">
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
                        @foreach ($product_text as $text)
                            {{-- @dd($text['language']); --}}
  
                        @foreach($language as $languages)
                        @if($languages->id == $text['language'])
                        <div class="tab-pane fade show active" id="{{$languages->language}}{{$languages->id}}" role="tabpanel" aria-labelledby="home-tab">
                          <div class="row">
                            <div class="col-md-12">
                              <p class="my-3" style="font-size:10px;margin:0;">Please Upload Data in {{$languages->language}} </p>
                            </div>
                            <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">TITLE</label>
                                  <input type="text" value="{{isset($text->name) ? $text->name : '' }}" name="name[]" class="form-control">
                                    <input type="hidden" name="language[]" value="{{$languages->id}}" class="form-control">
                                  </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="bmd-label-floating">Short Description</label>
                                  <textarea name="short_description[]" class="form-control" name="" id="" cols="30" rows="10">{{isset($text->short_description) ? $text->short_description : '' }}</textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="bmd-label-floating">Long Description</label>
                                  <textarea class="form-control" name="long_description[]" id="" cols="30" rows="10">{{isset($text->long_description) ? $text->long_description : '' }}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endif
                        @endforeach
                        @endforeach
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
