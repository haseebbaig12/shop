@extends('backend/layouts/master')
@section('title')
  Edit Post - Cooutfits
@endsection
@section('content')

<form action="{{route( 'posts.update' ,$data->id) }}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
    <div class="row">
      <div class="col-md-3">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
                <select name="status" id=""  class="form-control">
                    @php
                    $Disible = "";
                    $Enable = "";
                @endphp
                @if ($data->status == 1)
                @php
                    $Enable = "Selected";
                @endphp
                @else
                @php
                    $Disible = "Selected";
                @endphp
                @endif
                    <option value="1" {{ $Enable }}  class="dropdown-item">Enabled</option>
                    <option value="0" {{ $Disible }} class="dropdown-item">Disabled</option>
                  </select>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <select name="category" id=""  class="form-control">
                @foreach ($cat as $category )
                @if($data->catID == $category->id)

                    @php
                    $select="selected"
                    @endphp
                @else
                @php
                $select=""
                @endphp
                @endif

                <option {{ $select }} value="{{ $category->id }}" class="dropdown-item">{{ $category->code }}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary pull-left">Publish</button>
          </div>
          <div class="col-md-12">
            <p style="font-size:10px;margin:0;">Please Upload Your Feature Image</p>
              <div class="input-group input-group-sm">
                <input type="file" name="image" value="{{ $data->image }}" class="form-control border-0" name="image" aria-label="Small" aria-describedby="inputGroup-sizing-sm" id="cheque-img-upload">
              </div>
          <img height="300px" width="300px"  src="http://localhost/shop/public/backend/img/postimages/{{ $data->image }}">
          </div>
        </div>
      </div>
      <div class="col-md-9">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Post</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">URL</label>
                        <input name="url" type="text" value="{{ $data->url }}" class="form-control">
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="bmd-label-floating">Code</label>
                          <input name="code" type="text" value="{{ $data->code }}" class="form-control">
                        </div>
                      </div>
                    </div>
                    <div class="col-md-12">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                          @foreach ($lang as $tabs)
                            <li class="nav-item">
                              <a class="nav-link " id="home-tab" data-toggle="tab" href="#{{$tabs['name'] }}" role="tab" aria-controls="home" aria-selected="true">{{ $tabs['name'] }}</a>
                            </li>
                            @endforeach
                          </ul>
                      <div class="tab-content" id="myTabContent">
                        @foreach ( $datatext as $languesdata )
                        <div class="tab-pane fade " id="{{$languesdata['name'] }}"  role="tabpanel" aria-labelledby="home-tab">
                          <div class="row">
                            <div class="col-md-12">
                              <p class="my-3" style="font-size:10px;margin:0;">Please Upload Data in {{ $languesdata['name'] }} </p>
                            </div>
                            <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">TITLE</label>
                                    <input type="text" value="{{ $languesdata['title'] }}" name="title[]" class="form-control">
                                    <input type="hidden" name="language[]" value="{{ $languesdata['lanId'] }}" class="form-control">
                                  </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                  <label class="bmd-label-floating">Short Description</label>
                                    <textarea id=""  name="short_desc[]" class="form-control" cols="30" rows="10">{{$languesdata['short_desc']  }}</textarea>
                                </div>
                              </div>
                            <div class="col-md-12">
                              <div class="form-group">
                                <label class="bmd-label-floating">Text</label>
                                  <textarea name="post_text[]" class="form-control pagecontent" name="" id="" cols="30" rows="10">{{ $languesdata['post_text'] }}</textarea>
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
                          <input type="text" name="meta_title"  value="{{ $data->meta_title }}" class="form-control">
                        </div>
                  </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Meta Description</label>
                          <textarea class="form-control" name="meta_desc"  id="" cols="30" rows="10">{{ $data->meta_desc }}</textarea>
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
