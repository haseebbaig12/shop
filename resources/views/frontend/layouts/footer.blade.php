<footer  class="footer">
    <div class="row m-0 py-3">
        <div class="col-3 d-flex px-5">
            <img class=" muzaa" src="{{asset('frontend/img/LOGO.PNG')}}" alt="">

        </div>
        <div class="col-8 py-1">

            <div class="muz=">
                <span class="sp-1">COPYRIGHT 2021 ©KAF JIU JITSU.COM | ALL RIGHTS RESERVED </span>
                <img class="face" src="{{asset('frontend/img/facebook-01.png')}}" alt="">
                <img class="face"  src="{{asset('frontend/img/instagram.png')}}" alt="">
            </div>
           <div class="col-1">
               <div class="e3w"></div>
           </div>
        </div>

    </div>


</footer>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
crossorigin="anonymous"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js"
integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="
crossorigin="anonymous"></script>




	<!-- Vendor -->
    <script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/jquery.appear/jquery.appear.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/jquery.cookie/jquery.cookie.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/popper/umd/popper.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/jquery.validation/jquery.validate.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/jquery.gmap/jquery.gmap.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/lazysizes/lazysizes.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/isotope/jquery.isotope.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/vide/jquery.vide.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/vivus/vivus.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/bootstrap-star-rating/js/star-rating.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/bootstrap-star-rating/themes/krajee-fas/theme.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/jquery.countdown/jquery.countdown.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/elevatezoom/jquery.elevatezoom.min.js')}}"></script>

    <!-- Theme Base, Components and Settings -->
    <script src="{{asset('frontend/js/theme.js')}}"></script>



    <!-- Current Page Vendor and Views -->
    <script src="{{asset('frontend/js/views/view.shop.js')}}"></script>
    <!-- Theme Custom -->
    <script src="{{asset('frontend/js/custom.js')}}"></script>

    <!-- Theme Initialization Files -->
    <script src="{{asset('frontend/js/theme.init.js')}}"></script>

    <!-- Examples -->
    <script src="{{asset('frontend/js/examples/examples.gallery.js')}}"></script>
<script>
    // Add active class to the current button (highlight it)
    var header = document.getElementById("myDIV");
    var btns = header.getElementsByClassName("btn");
    for (var i = 0; i < btns.length; i++) {
      btns[i].addEventListener("click", function() {
      var current = document.getElementsByClassName("active");
      current[0].className = current[0].className.replace(" active", "");
      this.className += " active";
      });
    }
    </script>
</body>

</html>
