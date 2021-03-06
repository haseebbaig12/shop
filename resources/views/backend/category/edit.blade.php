@extends('backend/layouts/master')
@section('title')
  Edit Category - {{config('app.name')}}
@endsection
@section('content')


    <!-- Header -->
    <div class="header pb-6 d-flex align-items-center" style="min-height: 200px; background-image: url(../assets/img/theme/profile-cover.jpg); background-size: cover; background-position: center top;">
      <!-- Mask -->
      <span class="mask bg-gradient-default opacity-8"></span>
      <!-- Header container -->
      
    </div>
    <!-- Page content -->
    <form action="{{url ('category',$data->id)}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
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
                      @if($data->status == 1 )
                      <option selected value="{{$data->status}}" class="dropdown-item">Enabled</option>
                      <option value="0" class="dropdown-item">Disabled</option>
                      @endif
                      @if($data->status == 0 )
                      <option value="1" class="dropdown-item">Enabled</option>
                    <option selected value="{{$data->status}}" class="dropdown-item">Disabled</option>
                      @endif
                    </select>
                  </div>
                </div>
                <div class="col-md-12">
                    <img class="d-block" height="200px" width="200px" src="{{asset('backend/img/category')}}/{{$data->image}}" alt="">
                    <p style="font-size:10px;margin:0;">Please Upload Your Banner Image</p>
                    <div class="input-group input-group-sm">
                      <input type="file" name="image" class="form-control border-0" name="image" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="cheque-img-upload">
                      {{-- <input type="hidden" name="image" value="1" class="form-control border-0" name="image" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="cheque-img-upload"> --}}
                    </div>
                </div>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col-xl-8 order-xl-1">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Add Category</h4>
            </div>
            <div class="card-body">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">CODE</label>
                    <input name="code" type="text" value="{{isset($data->code) ? $data->code : '' }}" class="form-control">
                  </div>
                </div>
                <div class="col-md-12">
                  <ul class="nav nav-tabs" id="myTab" role="tablist">
                    @foreach($categorydata as $languages)
                    <li class="nav-item">
                      <a class="nav-link" id="home-tab" data-toggle="tab" href="#{{$languages['languagename']}}{{$languages['languageid']}}" role="tab" aria-controls="home" aria-selected="true">{{$languages['languagename']}}</a>
                    </li>
                    @endforeach
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    @foreach($categorydata as $languages)

                    <div class="tab-pane fade" id="{{$languages['languagename']}}{{$languages['languageid']}}" role="tabpanel" aria-labelledby="home-tab">
                      <div class="row">
                        <div class="col-md-12">
                          <p class="my-3" style="font-size:10px;margin:0;">Please Upload Data in {{$languages['languagename']}} </p>
                        </div>
                        <div class="col-md-12">
                              <div class="form-group">
                                <label class="bmd-label-floating">TITLE</label>
                                <input type="text" name="name[]" value="{{$languages['title'] }}" class="form-control">
                                <input type="hidden" name="language[]" value="{{$languages['languageid']}}" class="form-control">
                              </div>
                        </div>
                        <div class="col-md-12">
                          <div class="form-group">
                            <label class="bmd-label-floating">Short Description</label>
                              <textarea name="short_description[]"  class="form-control" name="" id="editor" cols="30" rows="10">{{$languages['short_description']}}</textarea>
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
                    <input name="seo_title" type="text" value="{{isset($data->seo_title) ? $data->seo_title : '' }}" class="form-control">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Seo Description</label>
                    <input name="seo_desc" value="{{isset($data->seo_desc) ? $data->seo_desc : '' }}" type="text" class="form-control">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Meta Keyword</label>
                    <input name="meta_key" value="{{isset($data->meta_key) ? $data->meta_key : '' }}" type="text" class="form-control">
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
