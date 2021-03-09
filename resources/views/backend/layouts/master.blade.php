@include('backend/layouts/header')
@include('backend/layouts/sidebar')
<div class="content">
    <div class="container-fluid">
        @yield('content')
    </div>
</div>
@include('backend/layouts/footer')