<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="{{asset('frontend/css/style.css')}}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,900;1,900&display=swap" rel="stylesheet">
        <link _ngcontent-qir-c48="" rel="stylesheet" href="//fonts.googleapis.com/css?kit=tss5AopFczcE_wznPz-F8xbfxceEzGlaw9cIPzBu1BOYtHnsSURAjU_1uvvwfndqEAM">

    <!-- Vendor CSS -->
		<link rel="stylesheet" href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/fontawesome-free/css/all.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/animate/animate.compat.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/owl.carousel/assets/owl.carousel.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/owl.carousel/assets/owl.theme.default.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/magnific-popup/magnific-popup.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/bootstrap-star-rating/css/star-rating.min.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.css')}}">

		<!-- Theme CSS -->
		<link rel="stylesheet" href="{{asset('frontend/css/theme.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/css/theme-elements.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/css/theme-blog.css')}}">
		<link rel="stylesheet" href="{{asset('frontend/css/theme-shop.css')}}">



		<!-- Skin CSS -->
		<link id="skinCSS" rel="stylesheet" href="{{asset('frontend/css/skins/default.css')}}">

		<!-- Theme Custom CSS -->
		<link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">

		<!-- Head Libs -->
		<script src="{{asset('frontend/vendor/modernizr/modernizr.min.js')}}"></script>


        <title> @yield('title')</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <a class="navbar-brand" href="{{url('/')}}">
                <div class="eed"></div>
                <div class="row">
{{--
              <div class="col-lg-2 col-md-0 col-sm-0"></div>
--}}
                    <div class="col-12">
                        <img class="img-11" src="{{asset('frontend/img/logo.png')}}" alt="">

                    </div>
{{--
                    <div class="col-lg-2 col-md-0 col-sm-0"></div>
--}}
                </div>
            </a>

            <button class="navbar-toggler navbar-toggler-left" type="button" data-toggle="collapse"
            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span style="background:white; width:40px;display: block" class="my-2"></span>
            <span style="background:white;height:8px; width:40px;display: block;" class="my-2"></span>
            <span style="background:white;height:8px; width:40px;display: block;" class="my-2"></span>
            <span style="background:white;height:8px; width:40px;display: block;" class="my-2"></span>
        </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto">
                    <li class="nav-item btn ">
                        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item btn ">
                        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
                    </li>

{{--                    @foreach($pagesmenu as $menu)--}}
{{--                    <li class="nav-item active btn">--}}
{{--                        <a class="nav-link" href="{{ $menu['pageSlug'] }}">{{$menu['pageTitle']}} </a>--}}
{{--                    </li>--}}
{{--                    @endforeach--}}

{{--                    <li class="nav-item active btn">--}}
{{--                        <a class="nav-link" href="#">Subscribe Now </a>--}}
{{--                    </li>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item active btn">--}}
{{--                        <a class="nav-link" href="#">Academy page </a>--}}
{{--                    </li>--}}
{{--                    <li class="nav-item active btn">--}}
{{--                        <a class="nav-link" href="#">Contact Us</a>--}}
{{--                    </li>--}}
                    @foreach( $menuItems as $menus)
                     <li class="nav-item btn">
                        <a class="nav-link" href={{ url('/page/'.$menus->url) }}>{{$menus->meta_title}}</a>
                         @endforeach
                       {{-- @php
                          $language= DB::table('languages')->where('status',1)->get();
                        @endphp
                        @foreach($language as $languages)
                        <form action="{{route ('languages.update',$languages->sku)}}" method="POST" >
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="language" value="{{$languages->id}}">
                            <button class="nav-link">{{$languages->name}}</button>
                        </form>

                        @endforeach--}}
                    </li>
                </ul>
                <a href="{{url('/login')}}"><button type="button" class="btn btn-light mx-3">login</button></a>
                <div class="row">
                    <div class="col-8 d-flex p-0">
                        <img class="face-1" src="{{asset('frontend/img/facebook-01.png')}}" alt="">
                        <img class="face-1"  src="{{asset('frontend/img/instagram.png')}}" alt="">
                    </div>
                    <div class="col-4 px-5"></div>
                </div>

            </div>

        </nav>
    </header>
