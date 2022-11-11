
    <!-- Simplicity is the essence of happiness. - Cedric Bledsoe -->

<!-- Footer Section Begin -->
<footer class="footer">
    <div class="page-up">
        {{-- <span class="arrow_carrot-up"></span> --}}
        <a href="#" id="scrollToTopButton"><i class="fa fa-arrow-up" aria-hidden="true"></i> </a>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="footer__logo">
                    <a href="{{url("/")}}"><img src="{{Storage::url('img/logo.png') }}" alt=""></a>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="footer__nav">
                    <ul>
                        <li class="active"><a href="/">Homepage</a></li>
                        <li><a href="/category">Categories</a></li>
                        <li><a href="./blog.html">Our Blog</a></li>
                        <li><a href="#">Contacts</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-lg-3">
                <p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                  Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                  <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></p>

              </div>
          </div>
      </div>
  </footer>
  <!-- Footer Section End -->

  {{-- <!-- Search model Begin --><i class="icon_close"></i> --}}
  {{-- <div class="search-model" >
    <div class="h-100 d-flex align-items-center justify-content-center">

        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div> --}}

<div class="modal fade" id="exampleModalCenter" tabindex="-1" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true" style="display: none;     width: 100% !important;
    background: rgb(11, 12, 42) !important;
    opacity: 0.9 !important;
        filter: alpha(opacity=60) !important;" >

<div class="search-close-switch d-flex flex-wrap justify-content-center" data-bs-dismiss="modal" >   <i class="fa fa-times" aria-hidden="true"></i>   </div>
    <div class="modal-dialog modal-dialog-centered " " >
        <div class="modal-content" style="
      background: rgb(11, 12, 42) !important;
    opacity: 0.7 !important;
        filter: alpha(opacity=60) !important;">
            <div class="modal-header">
                <h1 class="modal-title fs-5 text-white" id="exampleModalCenterTitle">Enter Here to search any anime</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                    <div class="h-100 d-flex align-items-center justify-content-center">
<style>
 .mybtn{
    /* margin-left: -50px; */
    z-index: 99999;
    border-radius:25px
}
</style>
                        <form class="search-model-form" method="GET" action="{{url("/anime-filter")}}" style="border: none !important" >
                            {{-- @csrf --}}
                            <div class="input-group col-md-4" style="border: none !important">
                                <input class="form-control py-2 " name="search" style="  background: transparent;
                                border: none; color:azure" type="search" placeholder="Search any anime..." id="example-search-input">

                               <span class="input-group-append">
                                  <button class="mybtn btn text-white"  type="submit">
                                        <i class="fa fa-search fa-4x"></i>
                                  </button>

                                </span>
                            </div>                        </form>
                    </div>

            </div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
        </div>
    </div>
</div>
<!-- Search model end -->

<!-- Js Plugins -->
{{-- <link href="{{ url('css/style.css') }}" rel="stylesheet"> --}}
<script src="{{ url('js/jquery-3.3.1.min.js') }}"></script>

{{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script> --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script> --}}
<script src="{{ url('js/player.js') }}"></script>
<script src="{{ url('js/jquery.nice-select.min.js') }}"></script>
<script src="{{ url('js/mixitup.min.js') }}"></script>
<script src="{{ url('js/jquery.slicknav.js') }}"></script>
<script src="{{ url('js/owl.carousel.min.js') }}"></script>
<script src="{{ url('js/jquery.lazy.min.js') }}"></script>
<script src="{{ url('js/main.js') }}"></script>
<div id="script">
</div>
<script>
    window.onload = function(){
const jsFiles = [
        // "{{ url('js/jquery-3.3.1.min.js') }}",
        "https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js",
        "https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js",
        // "{{ url('js/player.js') }}",
        // "{{ url('js/jquery.nice-select.min.js') }}",
        // "{{ url('js/mixitup.min.js') }}",
        // "{{ url('js/jquery.slicknav.js') }}",
        // "{{ url('js/owl.carousel.min.js') }}",
        // "{{ url('js/jquery.lazy.min.js') }}",
        // "{{ url('js/main.js') }}",

    ]
    jsFiles.forEach((item) => {
        const scriptEle = document.createElement('script');
        scriptEle.src = item;
        scriptEle.setAttribute('defer','');
        // $(document.body).append(scriptEle);
        document.getElementById("script").appendChild(scriptEle);
    })

}
</script>


{{-- <script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/player.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/mixitup.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script> --}}

<script>
    $(function() {
        $('.lazy').lazy();
    });
</script>
</body>

</html>


<?php

?>
