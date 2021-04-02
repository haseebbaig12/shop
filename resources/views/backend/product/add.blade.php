@extends('backend/layouts/master')
@section('title')
  Add Product - {{config('app.name')}}
@endsection
@section('content')
    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      
    </div>
    <!-- Page content -->
    <form action="{{url ('product')}}" method="POST" enctype="multipart/form-data">
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
                {{-- <a href="#" class="btn btn-sm btn-info  mr-4 ">Connect</a> --}}
                <p></p>
                <button type="submit" class="btn btn-sm btn-default float-right">Publish</button>
              </div>
            </div>
            <div class="card-body pt-0">
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
                      <p>Please Upload Your Feature Image</p>
                      <div class="input-group input-group-sm">
                          <input type="file" name="feature_image" class="form-control border-0" name="image" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="cheque-img-upload">
                      </div>
                  </div>
      
                <div class="col-md-12">
                    <p>Please Upload Your Product Images</p>
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
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header">
              <div class="row align-items-center">
                <div class="col-8">
                  <h3 class="mb-0">Add Product </h3>
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
                          <input name="slug" type="text" class="form-control">
                        </div>
                     
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-12">
                      <ul class="nav nav-tabs p-0" id="myTab" role="tablist">
                        @foreach($language as $languages)
                        <li class="nav-item">
                          <a class="nav-link" id="home-tab" data-toggle="tab" href="#{{$languages['name']}}{{$languages->id}}" role="tab" aria-controls="home" aria-selected="true">{{$languages['name']}}</a>
                        </li>
                        @endforeach
                      </ul>
                    </div>
                  </div>
                  <div class="row">
                    <div class="tab-content" id="myTabContent">
                      @foreach($language as $languages)
                      <div class="tab-pane fade" id="{{$languages['name']}}{{$languages['id']}}" role="tabpanel" aria-labelledby="home-tab">
                        <div class="row">
                          <div class="col-md-12">
                            <p class="my-3" style="font-size:10px;margin:0;">Please Upload Data in {{$languages['name']}} </p>
                          </div>
                          <div class="col-md-12">
                                <div class="form-group">
                                  <label class="form-control-label">TITLE</label>
                                  <input type="text" name="name[]" class="form-control">
                                  <input type="hidden" name="language[]" value="{{$languages['id']}}" class="form-control">
                                </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-control-label">Short Description</label>
                                <textarea name="short_description[]" class="form-control" name="" id="editor" cols="30" rows="10"></textarea>
                            </div>
                          </div>
                          <div class="col-md-12">
                            <div class="form-group">
                              <label class="form-control-label">Long Description</label>
                                <textarea class="form-control" name="long_description[]" id="editor2" cols="30" rows="10"></textarea>
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
                          <input name="meta_title" type="text" class="form-control">
                      </div>
                  </div>
                  <div class="col-md-12">
                      <div class="form-group">
                          <label class="bmd-label-floating">Meta Description</label>
                          <textarea class="form-control" name="meta_description" id="editor2" cols="30" rows="10"></textarea>
                      </div>
                  </div>
                   
                  </div>

                </div>
                <hr class="my-4" />
                <!-- Description -->
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
        {{-- <label class="bmd-label-floating">Price</label> --}}
        <input type="text" name="price[]" class="form-control">
      </div>
</div>
   </div>
  </div>
</div>

<script type="text/javascript">
  // $(document).ready(function(){
  //        $(".ajeeb2").hide();
  //               $(".multiple_branches_btn").click(function(){
  //           $(".ajeeb2").show('slow');
  //        });
  //    });
     $(document).ready(function(){
         
         var maxField = 10; //Input fields increment limitation
         var addButton = $('.add_button'); //Add button selector
         var wrapper = $('.ajeeb2'); //Input field wrapper
         var fieldHTML = jQuery('.multiple_branches');
         var fieldHTML2 = '<a href="javascript:void(0);" class="remove_button btn btn-dark mx-1">Cancel</a>';
         var x = 1; //Initial field counter is 1
         
         //Once add button is clicked
         $(addButton).click(function(){
             //Check maximum number of input fields
             if(x < maxField){ 
                 x++; //Increment field counter
                 // $(wrapper).append(fieldHTML); //Add field html
                 $(wrapper).append($(fieldHTML).clone());
             }
         });
         
         //Once remove button is clicked
         $(wrapper).on('click', '.remove_button', function(e){
             e.preventDefault();
             $(this).parent('div').parent('div').parent('div').parent('div').remove(); //Remove field html
             x--; //Decrement field counter
         });
     });
     </script>
@endsection
