@extends('backend/layouts/master')
@section('title')
   Add Locale - {{config('app.name')}}
@endsection
@section('content')


<!-- Header -->
<div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
  <!-- Mask -->
  <span class="mask bg-gradient-default opacity-8"></span>
  <!-- Header container -->
  
</div>
<!-- Page content -->
<form action="{{route ('locale.store')}}" method="POST">
  @csrf
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col-xl-4 order-xl-1">
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
            
            <p type="submit" class="">Add Menu Item</p>
          </div>
        </div>
       
        <div class="card-body pt-0">
          <div class="row">
            <div class="col-md-12">
                <div id="accordion" class="py-4">
                    <div class="card m-0">
                      <div class="card-header p-1" id="headingOne">
                        <h5 class="mb-0">
                          <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                            Category
                          </a>
                        </h5>
                      </div>
                  
                      <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div class="form-group m-0">
                                <input type="text">
                            </div>
                           
                                {{-- <label class="bmd-label-floating">Language</label> --}}
                                @foreach ($data['category'] as $categories)
                                <div class="form-group m-0">
                                <input type="checkbox" value="{{route('collection.edit',$categories->code)}}">
                                <label for="">{{$categories->code}}</label>
                                </div>
                                @endforeach
                                <div class="form-group ">
                                    <button class="btn btn-sm btn-default float-right add-to-menu">Add to Menu</button>
                                    </div>
                        </div>
                      </div>
                    </div>
                    <div class="card m-0 ">
                      <div class="card-header p-1" id="headingTwo">
                        <h5 class="mb-0">
                          <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                           Posts
                          </a>
                        </h5>
                      </div>
                      <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text">
                            </div>
                            
                                {{-- <label class="bmd-label-floating">Language</label> --}}
                                @foreach ($data['post'] as $post)
                                <div class="form-group m-0">
                                <input type="checkbox" value="" >
                                <label for="">{{$post->code}}</label>
                                </div>
                                @endforeach
                                <div class="form-group ">
                                    <button class="btn btn-sm btn-default float-right add-to-menu">Add to Menu</button>
                                    </div>
                        </div>
                      </div>
                    </div>
                    <div class="card m-0">
                      <div class="card-header p-1" id="headingThree">
                        <h5 class="mb-0">
                          <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                            Pages
                          </a>
                        </h5>
                      </div>
                      <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text">
                            </div>
                           
                            @foreach ($data['pages'] as $page)
                            <div class="form-group m-0">
                            <input type="checkbox" value="" >
                            <label for="">{{$page->code}}</label>
                            </div>
                            @endforeach
                            <div class="form-group ">
                                <button class="btn btn-sm btn-default float-right add-to-menu">Add to Menu</button>
                                </div>
                        </div>
                      </div>
                    </div>
                    <div class="card m-0">
                      <div class="card-header p-1" id="headingThree">
                        <h5 class="mb-0">
                          <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#product" aria-expanded="false" aria-controls="product">
                            Product
                          </a>
                        </h5>
                      </div>
                      <div id="product" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                        <div class="card-body">
                            <div class="form-group">
                                <input type="text">
                            </div>
                           
                            @foreach ($data['product'] as $product)
                            <div class="form-group m-0">
                            <input type="checkbox" value="{{route('single-product.edit',$product->slug)}}" >
                            <label for="">{{$product->slug}}</label>
                            </div>
                            @endforeach
                            <div class="form-group ">
                            <button class="btn btn-sm btn-default float-right add-to-menu">Add to Menu</button>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-xl-8 order-xl-2">
      <div class="card m-0">
        <div class="card-header p-4 card-header-primary">
            <p type="submit" class=""> Menu Structure</p>
        </div>
        <div class="card-body">

        

          <div class="row">
              <div class="col-md-6">
                <div class="form-group">

                  
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">

                  {{-- <select name="currency_id" id=""  class="form-control">
                      <option value="" class="dropdown-item">Select Currency</option>
                 
                    <option value="" class="dropdown-item">ED</option>
                   
                  </select> --}}
                </div>
              </div>
            </div>

            <div class="clearfix"></div>
        </div>
      </div>
    </div>
  </div>
</div>
</form>
@endsection
