@extends('backend/layouts/master')
@section('title')
Variation - {{config('app.name')}}
@endsection
@section('content')
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Variation</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item active" aria-current="page">All Variation</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="{{route ('variation.create')}}" class="btn btn-sm btn-neutral">Add New</a>
          <a href="{{ url()->previous() }}" class="btn btn-sm btn-neutral">Back</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Page content -->
<div class="container-fluid mt--6">
  <div class="row">
    <div class="col">
      <div class="card">
        <!-- Card header -->
        <div class="card-header border-0">
          <h3 class="mb-0">Variation</h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">
          <table id="myTable" class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="name">S.NO</th>
                <th scope="col" class="sort" data-sort="budget">Name</th>
                <th scope="col" class="sort" data-sort="status">Status</th>
                <th scope="col">DATE</th>
                <th scope="col" class="sort" data-sort="completion">Action</th>
              </tr>
            </thead>
            <tbody class="list">
              @foreach($variation as $variations)
              <tr>
                  <td>1</td>
                  <td class="budget" >
                  <a href="{{route('variation.edit',$variations->id)}}">  
                  {{$variations->code}}</td>
                  </a>
                  <td class="budget">
                      @if($variations->status == 1)
                      Enabled
                      @else
                      Disabled
                      @endif
                  </td>
                  <td class="">{{$variations->created_at}}</td>
                  <td class="text-right">
                    <div class="dropdown">
                      <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-ellipsis-v"></i>
                      </a>
                      <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                
                        <a class="dropdown-item" href="{{route('variation.edit',$variations->id)}}">
                          <button type="submit" class=" " style="border: none;background: none;font-size: 12px;">Edit</button>
                          </a>
                        <a class="dropdown-item" href="#">
                          <form action="{{ route('variation.destroy',$variations->id) }}" method="POST">
                            <p class="m-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=" " style="border: none;background: none;font-size: 12px;">Delete</button>
                            </p>
                        </form>
                        </a>
                      </div>
                    </div>
                  </td>
                 
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <!-- Card footer -->
      </div>
    </div>
  </div>

 
</div>
@endsection