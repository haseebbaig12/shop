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
                                <input type="checkbox" value="{{$categories->id}}/{{$categories->code}}">
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
                                <input type="checkbox" value="{{$post->id}}/{{$post->code}}" >
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
                            <input type="checkbox" value="{{$page->id}}/{{$page->code}}" >
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
                            <input type="checkbox" value="{{$product->id}}/{{$product->slug}}" >
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
        <div class="card-body middel">
        <div class="row">
              <div class="col-md-12 menu-structure">
                  <div id="accordion">
                      <div class="card to-menu">
                          <div class="card-header p-0" id="headingOne">
                              <h5 class="mb-0">
                                  <a class="btn btn-link text-left w-100 text-dark" data-toggle="collapse" data-target="#uniqueID" aria-expanded="true" aria-controls="uniqueID">
                                     Home
                                  </a>
                              </h5>
                          </div>

                          <div id="uniqueID" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                              <div class="card-body">
                                  <div class="form-group">
                                      <label class="m-0 text-dark" for="exampleInputEmail1">Navigation Label</label>
                                      <input type="text" class="form-control text-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                  </div>
                                  <div class="form-group my-1">
                                      <input type="checkbox" class=" text-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                      <label class="m-0 text-dark" for="exampleInputEmail1">Hide on Desktop</label>
                                  </div>
                                  <div class="form-group my-1">
                                      <input type="checkbox" class=" text-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                      <label class="m-0 text-dark" for="exampleInputEmail1">Hide on Tablet</label>
                                  </div>
                                  <div class="form-group my-1">
                                     
                                      <label class="m-0 text-dark" for="exampleInputEmail1">
                                        <input type="checkbox" class=" text-dark" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="">
                                        Hide on Mobile</label>
                                  </div>
                                  
                              </div>
                              <div class="card-footer" id="headingOne">
                            <a href="" class="text-red " ><u>Remove</u></a> |
                            <a href="" class="text-dark " ><u>Cancel</u></a>
                        </div>
                          </div>
                         
                      </div>
                  </div>
              </div>
            </div>
      </div>
    </div>
  </div>
</div>
</form>
@endsection
<style>
  .menu-structure input[type=text] {
    font-size: 12px;
    padding: 5px !important;
    height: unset;
}
  .menu-structure label{
    font-size: 12px;
}
  .menu-structure .card-header a{
    font-size: 15px;
   
}
.menu-structure .card-footer a{
    font-size: 12px;
   
}
.text-red{
  color: red !important;
}
</style>

<script>

    window.onload = function(){

     
    }

</script>