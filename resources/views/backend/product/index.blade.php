@extends('backend/layouts/master')
@section('title')
Product - {{config('app.name')}}
@endsection
@section('content')
<div class="header bg-primary pb-6">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">Tables</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="#"><i class="fas fa-home"></i></a></li>
              <li class="breadcrumb-item"><a href="#">Tables</a></li>
              <li class="breadcrumb-item active" aria-current="page">Tables</li>
            </ol>
          </nav>
        </div>
        <div class="col-lg-6 col-5 text-right">
          <a href="{{route ('product.create')}}" class="btn btn-sm btn-neutral">Add New</a>
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
          <h3 class="mb-0">Product</h3>
        </div>
        <!-- Light table -->
        <div class="table-responsive">

          <table id="myTable" class="table align-items-center table-flush">
            <thead class="thead-light">
              <tr>
                <th scope="col" class="sort" data-sort="name">Image</th>
                <th scope="col" class="sort" data-sort="budget">Name</th>
                <th scope="col" class="sort" data-sort="status">Status</th>
                <th scope="col">DATE</th>
                <th scope="col" class="sort" data-sort="completion">Action</th>
              </tr>
            </thead>
            <tbody class="list">
              @foreach($product as $products)
              <tr>
                <th scope="row">
                  <div class="media align-items-center">
                    <a class="avatar rounded-circle mr-3" href="{{route('product.edit',$products->id)}}">
                      <img  src="{{asset('backend/img/product')}}/{{$products->feature_image}}" >
                      </a>
                  </div>
                </th>
                <td class="budget">   
                    <a href="{{route('product.edit',$products->id)}}">
                    {{$products->slug}}
                    </a>
                </td>
                <td>
                    @if($products->status == 1)
                    Enabled
                    @else
                    Disabled
                    @endif
                </td>
                <td>
                  {{$products->created_at}}
                </td>
                <td class="text-right">
                  <div class="dropdown">
                    <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
              
                      <a class="dropdown-item" href="{{route('product.edit',$products->id)}}">
                        <button type="submit" class=" " style="border: none;background: none;font-size: 12px;">Edit</button>
                        </a>
                      <a class="dropdown-item" href="#">
                        <form action="{{ route('product.destroy',$products->id) }}" method="POST">
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
        {{-- <!-- Card footer -->
        <div class="card-footer py-4">
          <nav aria-label="...">
            <ul class="pagination justify-content-end mb-0">
              <li class="page-item disabled">
                <a class="page-link" href="#" tabindex="-1">
                  <i class="fas fa-angle-left"></i>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <li class="page-item active">
                <a class="page-link" href="#">1</a>
              </li>
              <li class="page-item">
                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
              </li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#">
                  <i class="fas fa-angle-right"></i>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav>
        </div> --}}
      </div>
    </div>
  </div>

 
</div>


@endsection
