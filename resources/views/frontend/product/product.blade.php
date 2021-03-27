@extends('frontend/layouts/master')
@section('title')
    KAF JIU JITSU
@endsection
@section('content')

    <div class="body">

        <div role="main" class="main shop pt-4">

            <div class="container">

                <div class="masonry-loader masonry-loader-showing">
                    <div class="row products product-thumb-info-list" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">
                        @foreach ($compproduct as $products)
                            <div class="col-12 col-sm-6 col-lg-3">
                                <div class="product mb-0">
                                    <div class="product-thumb-info border-0 mb-3">

                                        <div class="addtocart-btn-wrapper">
                                            <a href="shop-cart.html" class="text-decoration-none addtocart-btn" data-tooltip data-original-title="Add to Cart">
                                                <i class="fas fa-shopping-cart"></i>
                                            </a>
                                        </div>

                                        <a href="{{route('single-product.edit',$products['slug'])}}" class="quick-vie text-uppercase font-weight-semibold text-2">
                                            VIEW Detail
                                        </a>
                                        <a href="{{route('single-product.edit',$products['slug'])}}">
                                            <div class="product-thumb-info-image">
                                                @if($products['feature_image'] == null)
                                                    <img alt="" class="img-fluid h-100" src="{{asset('frontend/img/product-default.png')}}/{{$products['feature_image']}}">
                                                @else
                                                    <img alt="" class="img-fluid h-100" src="{{asset('backend/img/product')}}/{{$products['feature_image']}}">
                                                @endif


                                            </div>
                                        </a>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <a href="{{route('collection.edit',$products['category_slug'])}}" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">{{isset($products['category']->title) ? $products['category']->title : ''}}</a>
                                            <h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="{{route('single-product.edit',$products['slug'])}}" class="text-color-dark text-color-hover-primary">{{$products['name']}}</a></h3>
                                        </div>
                                    </div>
                                    <div title="Rated 5 out of 5">
                                        <input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
                                    </div>
                                    <p class="price text-5 mb-3">
                                        {{-- <span class="sale text-color-dark font-weight-semi-bold">$29,00</span> --}}
                                        <span class="amount">
                                    {{isset($products['price']) ? $products['price'] : ''}} AED
                                   </span>
                                    </p>
                                </div>
                            </div>
                        @endforeach



                    </div>
                    <div class="row mt-4">
                        <div class="col">
                            <ul class="pagination float-right">
                                <li class="page-item"><a class="page-link" href="#"><i class="fas fa-angle-left"></i></a></li>
                                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <a class="page-link" href="#"><i class="fas fa-angle-right"></i></a>
                            </ul>
                        </div>
                    </div>
                </div>

            </div>

        </div>


    </div>

@endsection
