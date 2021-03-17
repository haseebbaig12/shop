@extends('backend/layouts/master')
@section('title')
 Edit Attribute - KAF JIU JITSU 
@endsection
@section('content')
<form action="{{url ('variation',$data->id)}}" method="POST" enctype="multipart/form-data">
  @csrf
  @method('PUT')
    <div class="row">
      <div class="col-md-3">
        <div class="row">
          <div class="col-md-12">
            <div class="form-group">
              {{-- <label class="bmd-label-floating">Language</label> --}}
              <select name="status" id=""  class="form-control">
                <option class="dropdown-item">Status</option>
                @if($data->status == 1 )
                <option selected value="1" class="dropdown-item">Enabled</option>
                <option value="{{$data->status}}" class="dropdown-item">Disabled</option>
                @endif
                @if($data->status == 0 )
                <option value="1" class="dropdown-item">Enabled</option>
              <option selected value="{{$data->status}}" class="dropdown-item">Disabled</option>
                @endif
              </select>
            </div>
          </div>
          <div class="col-md-12">
            <button type="submit" class="btn btn-primary pull-left">Publish</button>
          </div>
        </div>
      </div>

      <div class="col-md-9">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Edit Attribute</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        {{-- <label class="bmd-label-floating">Language</label> --}}
                        <select name="attributeID" id=""  class="form-control">
                          <option class="dropdown-item">Attribute</option>
                          
                          @foreach ($attribute as $attributes)

                          @php
                              $Disible = "";
                              $Enable = "";
                          @endphp
                          @if ($attributes->id ==  $data->attributeID)
                          @php
                              $selected = "selected";
                          @endphp
                          @else
                          @php
                              $selected = "";
                          @endphp
                          @endif

                          <option {{ $selected}} value="{{$attributes->id}}" class="dropdown-item">{{$attributes->code}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Code</label>
                        <input name="code" type="text" value="{{ $data->code}}" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                      
   
                          <div class="row">
                            
                            <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">TITLE</label>
                                  <input type="text" value="{{ $data->name}}" name="name" class="form-control">
                                   
                                  </div>
                            </div>
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
