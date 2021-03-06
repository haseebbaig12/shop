@extends('backend/layouts/master')
@section('title')
  Edit Product - {{config('app.name')}}
@endsection
@section('content')
<div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-8"></span>
  <!-- Header container -->
  
</div>
<form action="{{url('products',$product->id)}}" method="POST" enctype="multipart/form-data" name="wowow">
  @csrf
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
             <p></p>
              <button type="submit" class="btn btn-sm btn-default float-right">Publish</button>
            </div>
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
              <select name="status" id=""  class="form-control">
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
        <div class="form-group">

            <select class="form-control " name="category[]" id="" cols="30" rows="10">
              <option  class="dropdown-item">Select Category</option>

              @foreach ($product_category as $pro_cat)
              @foreach ($category as $categories)
              @php
              $Disible = "";
              $Enable = "";
              @endphp
              @if ($pro_cat->categoryID ==  $categories['id'])
              @php
                  $selected = "selected";
              @endphp
              @else
              @php
                  $selected = "";
              @endphp
              @endif


              <option {{$selected}}  class="dropdown-item"  value="{{$categories->id}}">{{$categories->code}}</option>
              @endforeach
              @endforeach
            </select>
        </div>
      </div>
          <div class="col-md-12">
            <img class="d-block" height="200px" width="200px" src="{{asset('backend/img/product')}}/{{$product->feature_image}}" alt="">
            <p style="font-size:10px;margin:0;">Please Upload Your Featured Image</p>
            <div class="input-group input-group-sm">
              <input type="file" name="image[]" class="form-control border-0" name="image" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="cheque-img-upload">
              <input type="hidden" name="image_id[]" value="1" class="form-control border-0" name="image" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="cheque-img-upload">
            </div>
        </div>
            {{-- <div class="col-md-12">
                <p>Please Upload Your Feature Image</p>
                <img class="d-block" height="200px" width="200px" src="{{asset('backend/img/product')}}/{{$product->feature_image}}" alt="">
                <div class="input-group input-group-sm">
                    <input type="file" name="feature_image"  class="form-control border-0" name="image" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="cheque-img-upload">
                </div>
            </div> --}}
            
          @foreach ($product_image as $image)
          <div class="col-md-12">
            <img class="d-block" height="200px" width="200px" src="{{asset('backend/img/product')}}/{{$image->image}}" alt="">
            <p style="font-size:10px;margin:0;">Please Upload Your Product Gallery</p>
              <div class="input-group input-group-sm">
                <input type="file" name="image[]" class="form-control border-0" name="image" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="cheque-img-upload">
                <input type="hidden" name="image_id[]" value="{{$image->image_id}}"  class="form-control border-0" name="image" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="cheque-img-upload">
              </div>
              <img src="" alt="">
          </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>

  <div class="col-xl-8 order-xl-1">
    <div class="card">
      <div class="card-header">
        <div class="row align-items-center">
          <div class="col-8">
            <h3 class="mb-0">Edit Product </h3>
          </div>
          {{-- <div class="col-4 text-right">
            <a href="#!" class="btn btn-sm btn-primary">Settings</a>
          </div> --}}
        </div>
      </div>
      <div class="card-body">
   
          <h6 class="heading-small text-muted mb-4">Product Data</h6>
          <div class="pl-lg-4">
            <div class="row">
              <div class="col-12">
       
                  <div class="form-group">
                        <label class="bmd-label-floating">SLUG</label>
                      <input name="slug" type="text" value="{{$product->slug}}" class="form-control">
                      </div>
                    </div>
              </div>
              <div class="row">
                <div class="col-12">
                      <ul class="nav nav-tabs" id="myTab" role="tablist">
                        @foreach($language as $languages)
                        <li class="nav-item">
                          <a class="nav-link" id="home-tab" data-toggle="tab" href="#{{$languages['name']}}{{$languages['id']}}" role="tab" aria-controls="home" aria-selected="true">{{$languages['name']}}</a>
                        </li>
                        @endforeach
                      </ul>
                </div>
              </div>
              <div class="row">
                <div class="tab-content" id="myTabContent">
                        @foreach ($data as $text)
                        <div class="tab-pane fade" id="{{$text['lanname']}}{{$text['lanId']}}" role="tabpanel" aria-labelledby="home-tab">
                          <div class="row">
                            <div class="col-md-12">
                              <p class="my-3" style="font-size:10px;margin:0;">Please Upload Data in {{$text['lanname']}} </p>
                            </div>
                            <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">TITLE</label>
                                  <input type="text" value="{{isset($text['name']) ? $text['name'] : '' }}" name="name[]" class="form-control">
                                    <input type="hidden" name="language[]" value="{{$text['lanId']}}" class="form-control">
                                  </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="bmd-label-floating">Short Description</label>
                                  <textarea name="short_description[]" class="form-control" name="" id="" cols="30" rows="10">{{isset($text['short_description']) ? $text['short_description'] : '' }}</textarea>
                              </div>
                            </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="bmd-label-floating">Long Description</label>
                                  <textarea class="form-control" name="long_description[]" id="" cols="30" rows="10">{{isset($text['long_description']) ? $text['long_description'] : '' }}</textarea>
                              </div>
                            </div>
                          </div>
                        </div>
                        @endforeach
                      </div>
                    </div>
                  </div>
   
                  <hr class="my-4" />
                  <!-- Address -->
                  <h6 class="heading-small text-muted mb-4">Seo</h6>
                  <div class="pl-lg-4">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Meta Title</label>
                          <input name="meta_title" value="{{$product->meta_title}}" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Meta Description</label>
                          <textarea class="form-control" name="meta_description" id="editor2" cols="30" rows="10">{{$product->meta_description}}</textarea>
                        </div>
                    </div>       
                    </div>
                  </div>

                  <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Price</label>
                        <input class="form-control" name="pprice" >
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="form-group">
                        <label class="bmd-label-floating">Stock</label>
                        <input class="form-control" name="stock" >
                    </div>
                  </div>
                  <hr class="my-4" />
                <!-- Description -->
                <h6 class="heading-small text-muted mb-4">About me</h6>
                <div class="pl-lg-4">
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
                                    @foreach ($product_type as $type)
                                    <div class=" ">
                                     <div class="row">
                                      <input type="hidden" value="{{$type['id']}}" name="typeID[]">
                                      <div class="col-md-5">
                                        <div class="form-group">
                                            <select class="form-control " name="attribute[]" id="" cols="30" rows="10">
                                              <option  class="dropdown-item">Type</option>
                                              @foreach ($attribute as $attributes)
                                              @if($type['attribute'] == $attributes->id)
                                              <?php
                                              $selected = 'selected'
                                              ?>
                                              @else
                                              <?php
                                              $selected = ''
                                              ?>
                                              @endif
                                              <option {{$selected}}  class="dropdown-item"  value="{{$attributes->id}}">{{$attributes->code}}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                      </div>
                                      <div class="col-md-5">
                                        <div class="form-group">
                                            <select class="form-control " name="variation[]" id="" cols="30" rows="10">
                                              <option  class="dropdown-item">Configurable</option>
                                              @foreach ($variation as $variations)
                                              @if($type['variation'] == $variations->id)
                                              <?php
                                              $selected = 'selected'
                                              ?>
                                              @else
                                              <?php
                                              $selected = ''
                                              ?>
                                              @endif
                                              <option {{ $selected}}  class="dropdown-item" value="{{$variations->id}}">{{$variations->code}}</option>
                                              @endforeach
                                            </select>
                                        </div>
                                      </div>
                                      <div class="col-md-2">
                                        <div class="form-group">
                                          {{-- <label class="bmd-label-floating">Price</label> --}}
                                        <input type="text" name="price[]" value="{{$type['price']}}" class="form-control">
                                            <input type="hidden" name="price[]" value="{{$type['id']}}" class="form-control">
      
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
