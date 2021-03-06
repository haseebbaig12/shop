@extends('frontend/layouts/master')
@section('title')
    KAF JIU JITSU
@endsection
@section('content')

    <div class="body">
        <div role="main" class="main shop pt-4">

            <div class="container">


                <div class="row">
                    <div class="col-md-5 mb-5 mb-md-0">

                        <div class="thumb-gallery-wrapper">
                            <div class="thumb-gallery-detail owl-carousel owl-theme manual nav-inside nav-style-1 nav-dark mb-3">
                                <div>
                                    <img alt="" class="img-fluid" src="{{asset('backend/img/product')}}/{{$pro[0]['feature_image']}}" data-zoom-image="img/products/product-grey-7.jpg">
                                </div>
                                @foreach($pro[0]['gallery'] as $gallery)
                                    <div>
                                        <img alt="" class="img-fluid" src="{{asset('backend/img/product')}}/{{$gallery->image}}" data-zoom-image="img/products/product-grey-7-2.jpg">
                                    </div>
                                @endforeach

                            </div>
                            <div class="thumb-gallery-thumbs owl-carousel owl-theme manual thumb-gallery-thumbs">
                                <div class="cur-pointer">
                                    <img alt="" class="img-fluid" src="{{asset('backend/img/product')}}/{{$pro[0]['feature_image']}}">
                                </div>
                                @foreach($pro[0]['gallery'] as $gallery)
                                    <div class="cur-pointer">
                                        <img alt="" class="img-fluid" src="{{asset('backend/img/product')}}/{{$gallery->image}}">
                                    </div>
                                @endforeach

                                {{--                            <div class="cur-pointer">--}}
                                {{--                                <img alt="" class="img-fluid" src="{{asset('frontend/img/products/product-grey-7-3.jpg')}}">--}}
                                {{--                            </div>--}}
                                {{--                            <div class="cur-pointer">--}}
                                {{--                                <img alt="" class="img-fluid" src="{{asset('frontend/img/products/product-grey-7-4.jpg')}}">--}}
                                {{--                            </div>--}}
                                {{--                            <div class="cur-pointer">--}}
                                {{--                                <img alt="" class="img-fluid" src="{{asset('frontend/img/products/product-grey-7-5.jpg')}}">--}}
                                {{--                            </div>--}}
                            </div>
                        </div>

                    </div>

                    <div class="col-md-7">

                        <div class="summary entry-summary position-relative">

                            {{-- <div class="position-absolute top-0 right-0">
                                <div class="products-navigation d-flex">
                                    <a href="#" class="prev text-decoration-none text-color-dark text-color-hover-primary border-color-hover-primary" data-tooltip data-original-title="Red Ladies Handbag"><i class="fas fa-chevron-left"></i></a>
                                    <a href="#" class="next text-decoration-none text-color-dark text-color-hover-primary border-color-hover-primary" data-tooltip data-original-title="Green Ladies Handbag"><i class="fas fa-chevron-right"></i></a>
                                </div>
                            </div> --}}

                            <h1 class="mb-0 font-weight-bold text-7">{{$pro[0]['name']}}</h1>

                            <div class="pb-0 clearfix d-flex align-items-center">
                                <div title="Rated 3 out of 5" class="float-left">
                                    <input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
                                </div>

                                <div class="review-num d-none">
                                    <a href="#description" class="text-decoration-none text-color-default text-color-hover-primary" data-hash data-hash-offset="75" data-hash-trigger-click=".nav-link-reviews" data-hash-trigger-click-delay="1000">
                                        <span class="count text-color-inherit" itemprop="ratingCount">(2</span> reviews)
                                    </a>
                                </div>
                            </div>

                            <div class="divider divider-small">
                                <hr class="bg-color-grey-scale-4">
                            </div>

                            <p class="price mb-3">
                                {{-- <span class="sale text-color-dark"> AED $15,00</span> --}}
                                <span class="amount">AED {{isset($pro[0]['price']) ? $pro[0]['price'] : ''}} </span>
                            </p>

                            <p class="text-3-5 mb-3">{{$pro[0]['short_desc']}}</p>

                            <ul class="list list-unstyled text-2">
                                @if($pro[0]['stock'] == null )
                                    <li class="mb-0">AVAILABILITY: <strong class="text-color-dark">NOT AVAILABLE</strong></li>
                                @else
                                    <li class="mb-0">AVAILABILITY: <strong class="text-color-dark">AVAILABLE</strong></li>
                                @endif

                                <li class="mb-0">SKU: <strong class="text-color-dark">{{$pro[0]['slug']}}</strong></li>
                            </ul>


                            <form enctype="multipart/form-data" method="post" class="cart" action="shop-cart.html">
                                <table class="table table-borderless" style="max-width: 300px;">
                                    <tbody>
                                    {{--                                @dd($pro[0]);--}}
                                    @foreach($pro[0]['attribute'] as $key => $value)



                                        <tr>
                                            <td class="align-middle text-2 px-0 py-2">{{$key}}:</td>
                                            <td class="px-0 py-2">
                                                <div class="custom-select-1">
                                                    <select name="size" class="form-control text-1 h-auto py-2">
                                                        <option value="">PLEASE CHOOSE</option>
                                                        @foreach($value as $na)
                                                            <option value="blue">{{$na}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach

                                    </tbody>
                                </table>
                                <hr>
                                <div class="quantity quantity-lg">
                                    <input type="button" class="minus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="-">
                                    <input type="text" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                                    <input type="button" class="plus text-color-hover-light bg-color-hover-primary border-color-hover-primary" value="+">
                                </div>
                                <button type="submit" class="btn btn-dark btn-modern text-uppercase bg-color-hover-primary border-color-hover-primary">Add to cart</button>
                                <hr>
                            </form>

                            {{--                        <div class="d-flex align-items-center">--}}
                            {{--                            <ul class="social-icons social-icons-medium social-icons-clean-with-border social-icons-clean-with-border-border-grey social-icons-clean-with-border-icon-dark mr-3 mb-0">--}}
                            {{--                                <!-- Facebook -->--}}
                            {{--                                <li class="social-icons-facebook">--}}
                            {{--                                    <a href="http://www.facebook.com/sharer.php?u=https://www.okler.net" target="_blank" data-toggle="tooltip" data-placement="top" title="Share On Facebook">--}}
                            {{--                                        <i class="fab fa-facebook-f"></i>--}}
                            {{--                                    </a>--}}
                            {{--                                </li>--}}
                            {{--                                <!-- Google+ -->--}}
                            {{--                                <li class="social-icons-googleplus">--}}
                            {{--                                    <a href="https://plus.google.com/share?url=https://www.okler.net" target="_blank" data-toggle="tooltip" data-placement="top" title="Share On Google+">--}}
                            {{--                                        <i class="fab fa-google-plus-g"></i>--}}
                            {{--                                    </a>--}}
                            {{--                                </li>--}}
                            {{--                                <!-- Twitter -->--}}
                            {{--                                <li class="social-icons-twitter">--}}
                            {{--                                    <a href="https://twitter.com/share?url=https://www.okler.net&amp;text=Simple%20Share%20Buttons&amp;hashtags=simplesharebuttons" target="_blank" data-toggle="tooltip" data-placement="top" title="Share On Twitter">--}}
                            {{--                                        <i class="fab fa-twitter"></i>--}}
                            {{--                                    </a>--}}
                            {{--                                </li>--}}
                            {{--                                <!-- Email -->--}}
                            {{--                                <li class="social-icons-email">--}}
                            {{--                                    <a href="mailto:?Subject=Share This Page&amp;Body=I%20saw%20this%20and%20thought%20of%20you!%20 https://www.okler.net" data-toggle="tooltip" data-placement="top" title="Share By Email">--}}
                            {{--                                        <i class="far fa-envelope"></i>--}}
                            {{--                                    </a>--}}
                            {{--                                </li>--}}
                            {{--                            </ul>--}}
                            {{--                            <a href="#" class="d-flex align-items-center text-decoration-none text-color-dark text-color-hover-primary font-weight-semibold text-2">--}}
                            {{--                                <i class="far fa-heart mr-1"></i> SAVE TO WISHLIST--}}
                            {{--                            </a>--}}
                            {{--                        </div>--}}

                        </div>

                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col">
                        <div id="description" class="tabs tabs-simple tabs-simple-full-width-line tabs-product tabs-dark mb-2">
                            <ul class="nav nav-tabs justify-content-start">
                                <li class="nav-item active"><a class="nav-link active font-weight-bold text-3 text-uppercase py-2 px-3" href="#productDescription" data-toggle="tab">Description</a></li>
                                <li class="nav-item"><a class="nav-link font-weight-bold text-3 text-uppercase py-2 px-3" href="#productInfo" data-toggle="tab">Additional Information</a></li>
                                {{--                            <li class="nav-item"><a class="nav-link nav-link-reviews font-weight-bold text-3 text-uppercase py-2 px-3" href="#productReviews" data-toggle="tab">Reviews (2)</a></li>--}}
                            </ul>
                            <div class="tab-content p-0">
                                <div class="tab-pane px-0 py-3 active" id="productDescription">
                                    <p>{{$pro[0]['long_desc']}}</p>
                                </div>
                                <div class="tab-pane px-0 py-3" id="productInfo">
                                    <table class="table table-striped m-0">
                                        <tbody>
                                        @foreach($pro[0]['attribute'] as $key => $value)

                                            <tr>
                                                <th class="border-top-0">
                                                    {{$key}}:
                                                </th>
                                                <td class="border-top-0">
                                                    @foreach($value as $na)
                                                        {{$na}}
                                                    @endforeach
                                                </td>
                                            </tr>


                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="tab-pane px-0 py-3" id="productReviews">
                                    <ul class="comments">
                                        <li>
                                            <div class="comment">
                                                <div class="img-thumbnail border-0 p-0 d-none d-md-block">
                                                    <img class="avatar rounded-circle" alt="" src="img/avatars/avatar-2.jpg">
                                                </div>
                                                <div class="comment-block">
                                                    <div class="comment-arrow"></div>
                                                    <span class="comment-by">
                                                    <strong>Jack Doe</strong>
                                                    <span class="float-right">
                                                        <div class="pb-0 clearfix">
                                                            <div title="Rated 3 out of 5" class="float-left">
                                                                <input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
                                                            </div>

                                                            <div class="review-num">
                                                                <span class="count" itemprop="ratingCount">2</span> reviews
                                                            </div>
                                                        </div>
                                                    </span>
                                                </span>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra euismod odio, gravida pellentesque urna varius vitae, gravida pellentesque urna varius vitae.</p>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="comment">
                                                <div class="img-thumbnail border-0 p-0 d-none d-md-block">
                                                    <img class="avatar rounded-circle" alt="" src="img/avatars/avatar.jpg">
                                                </div>
                                                <div class="comment-block">
                                                    <div class="comment-arrow"></div>
                                                    <span class="comment-by">
                                                    <strong>John Doe</strong>
                                                    <span class="float-right">
                                                        <div class="pb-0 clearfix">
                                                            <div title="Rated 3 out of 5" class="float-left">
                                                                <input type="text" class="d-none" value="3" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'primary', 'size':'xs'}">
                                                            </div>

                                                            <div class="review-num">
                                                                <span class="count" itemprop="ratingCount">2</span> reviews
                                                            </div>
                                                        </div>
                                                    </span>
                                                </span>
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam viverra odio, gravida urna varius vitae, gravida pellentesque urna varius vitae.</p>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <hr class="solid my-5">
                                    <h4>Add a review</h4>
                                    <div class="row">
                                        <div class="col">

                                            <form action="" id="submitReview" method="post">
                                                <div class="form-row">
                                                    <div class="form-group col pb-2">
                                                        <label class="required font-weight-bold text-dark">Rating</label>
                                                        <input type="text" class="rating-loading" value="0" title="" data-plugin-star-rating data-plugin-options="{'color': 'primary', 'size':'sm'}">
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col-lg-6">
                                                        <label class="required font-weight-bold text-dark">Name</label>
                                                        <input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" required>
                                                    </div>
                                                    <div class="form-group col-lg-6">
                                                        <label class="required font-weight-bold text-dark">Email Address</label>
                                                        <input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" required>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col">
                                                        <label class="required font-weight-bold text-dark">Review</label>
                                                        <textarea maxlength="5000" data-msg-required="Please enter your review." rows="8" class="form-control" name="review" id="review" required></textarea>
                                                    </div>
                                                </div>
                                                <div class="form-row">
                                                    <div class="form-group col mb-0">
                                                        <input type="submit" value="Post Review" class="btn btn-primary btn-modern" data-loading-text="Loading...">
                                                    </div>
                                                </div>
                                            </form>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <h4 class="font-weight-semibold text-4 mb-3">RELATED PRODUCTS</h4>
                        <hr class="mt-0">
                        <div class="products row">
                            <div class="col">
                                <div class="owl-carousel owl-theme nav-style-1 nav-outside nav-outside nav-dark mb-0" data-plugin-options="{'loop': false, 'autoplay': false, 'items': 4, 'nav': true, 'dots': false, 'margin': 20, 'autoplayHoverPause': true, 'autoHeight': true, 'stagePadding': '75', 'navVerticalOffset': '50px'}">

                                    <div class="product mb-0">
                                        <div class="product-thumb-info border-0 mb-3">

                                            <div class="product-thumb-info-badges-wrapper">
                                                <span class="badge badge-ecommerce badge-success">NEW</span>
                                                <span class="badge badge-ecommerce badge-danger">27% OFF</span>

                                            </div>

                                            <div class="addtocart-btn-wrapper">
                                                <a href="shop-cart.html" class="text-decoration-none addtocart-btn" data-tooltip data-original-title="Add to Cart">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </div>

                                            <a href="ajax/shop-product-quick-view.html" class="quick-vie text-uppercase font-weight-semibold text-2">
                                                QUICK VIEW
                                            </a>
                                            <a href="shop-product-sidebar-left.html">
                                                <div class="product-thumb-info-image">
                                                    <img alt="" class="img-fluid" src="{{asset('frontend/img/products/product-grey-1.jpg')}}">

                                                </div>
                                            </a>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <a href="#" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">electronics</a>
                                                <h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html" class="text-color-dark text-color-hover-primary">Photo Camera</a></h3>
                                            </div>
                                            <a href="#" class="text-decoration-none text-color-default text-color-hover-dark text-4"><i class="far fa-heart"></i></a>
                                        </div>
                                        <div title="Rated 5 out of 5">
                                            <input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
                                        </div>
                                        <p class="price text-5 mb-3">
                                            <span class="sale text-color-dark font-weight-semi-bold">$69,00</span>
                                            <span class="amount">$59,00</span>
                                        </p>
                                    </div>
                                    <div class="product mb-0">
                                        <div class="product-thumb-info border-0 mb-3">

                                            <div class="product-thumb-info-badges-wrapper">
                                                <span class="badge badge-ecommerce badge-success">NEW</span>
                                                <span class="badge badge-ecommerce badge-danger">27% OFF</span>

                                            </div>

                                            <div class="addtocart-btn-wrapper">
                                                <a href="shop-cart.html" class="text-decoration-none addtocart-btn" data-tooltip data-original-title="Add to Cart">
                                                    <i class="fas fa-shopping-cart"></i>
                                                </a>
                                            </div>

                                            <a href="ajax/shop-product-quick-view.html" class="quick-vie text-uppercase font-weight-semibold text-2">
                                                QUICK VIEW
                                            </a>
                                            <a href="shop-product-sidebar-left.html">
                                                <div class="product-thumb-info-image">
                                                    <img alt="" class="img-fluid" src="{{asset('frontend/img/products/product-grey-1.jpg')}}">

                                                </div>
                                            </a>
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <div>
                                                <a href="#" class="d-block text-uppercase text-decoration-none text-color-default text-color-hover-primary line-height-1 text-0 mb-1">electronics</a>
                                                <h3 class="text-3-5 font-weight-medium font-alternative text-transform-none line-height-3 mb-0"><a href="shop-product-sidebar-right.html" class="text-color-dark text-color-hover-primary">Photo Camera</a></h3>
                                            </div>
                                            <a href="#" class="text-decoration-none text-color-default text-color-hover-dark text-4"><i class="far fa-heart"></i></a>
                                        </div>
                                        <div title="Rated 5 out of 5">
                                            <input type="text" class="d-none" value="5" title="" data-plugin-star-rating data-plugin-options="{'displayOnly': true, 'color': 'default', 'size':'xs'}">
                                        </div>
                                        <p class="price text-5 mb-3">
                                            <span class="sale text-color-dark font-weight-semi-bold">$69,00</span>
                                            <span class="amount">$59,00</span>
                                        </p>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-5">


            </div>

        </div>


    </div>

@endsection
