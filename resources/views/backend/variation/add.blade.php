@extends('backend/layouts/master')
@section('title')
Add Variation Product - KAF JIU JITSU
@endsection
@section('content')
<form action="{{url ('variation')}}" method="POST" enctype="multipart/form-data">
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
        </div>
      </div>

      <div class="col-md-9">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title">Add Variation</h4>
              </div>
              <div class="card-body">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                        {{-- <label class="bmd-label-floating">Language</label> --}}
                        <select name="attributeID" id=""  class="form-control">
                          <option class="dropdown-item">Attribute</option>
                          @foreach ($data as $attribute)
                          <option value="{{$attribute->id}}" class="dropdown-item">{{$attribute->code}}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="form-group">
                        <label class="bmd-label-floating">Code</label>
                        <input name="code" type="text" class="form-control">
                      </div>
                    </div>
                    <div class="col-md-12">
                     
                      
                        
                          <div class="row">
                            <div class="col-md-12">
                                  <div class="form-group">
                                    <label class="bmd-label-floating">TITLE</label>
                                    <input type="text" name="name" class="form-control">
                            
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
