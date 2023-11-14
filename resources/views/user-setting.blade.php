<x-header />
<style>
    /* .input-group-text {
    color: #b7b7b7 !important;
    font-size: 20px !important;
    position: absolute !important;
    right: 2px !important;
    top: 8px !important;
    left: 316px !important;
float: right;
;
} */
</style>
<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg" data-setbg="{{ Storage::url('img/normal-breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2><svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16"> <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/> <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/> </svg> Settings</h2>
                    @if (session('login_success'))
                        <p>{{ session('login_success') }}</p>
                    @elseif (session('logout_success'))
                        <p>{{ session('logout_success') }}</p>
                    @else
                        <p>Welcome to the official Anime blog.</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<style>
    .login__form:after {
    position: absolute;
    right: -14px
;
    top: -40px;
    height: 330px;
    width: 1px;
    background:none !important;
    content: "";
}
</style>
<!-- Normal Breadcrumb End -->
<!-- Login Section Begin -->
<section class="login spad" style="padding-top: 20px !important;">

    <div class="container">
        <div class="row">
            <style>
                .h1 {
    color: #ffffff;
    font-size: 48px;
    font-family: "Oswald", sans-serif;
    font-weight: 700;
    margin-bottom: 22px;

}

.item-overlay {
  position: absolute;
  top: 0; right: 0; bottom: 0; left: 0;

  background: rgba(0,0,0,0.5);
  color: #fff;
  overflow: hidden;
  text-align: center;
  /* fix text transition issue for .left and .right but need to overwrite left and right properties in .right */
  width: 100%;
border-radius: 25px;
  -moz-transition: top 0.3s, right 0.3s, bottom 0.3s, left 0.3s;
  -webkit-transition: top 0.3s, right 0.3s, bottom 0.3s, left 0.3s;
  transition: top 0.3s, right 0.3s, bottom 0.3s, left 0.3s;
}
.hover1:hover .item-overlay.bottom {
    bottom: 0;
}
.item-overlay.bottom {
  bottom: 100%;
}
.hover{
    box-shadow: rgba(136, 165, 191, 0.48) 6px 2px 16px 0px, rgba(255, 255, 255, 0.8) -6px -2px 16px 0px;
;
    }
    .color{
    color: white;z-index:99999;
}
.color:hover{
    /* color: white;z-index:99999; */
    font-weight: bolder;
}

.hidden-menu{
    width: 100% !important
}
.login__form form .input__item{
    width: 100% !important
}

            </style>
            <div class="row px-md-3 d-flex flex-wrap justify-content-center">
                <div class="col-md-12  d-flex flex-wrap justify-content-center text-white">

                        <h1 class="h1">  User Setting </h1>

                </div>
            </div>
            <br>
            <br>

<div class="row  d-flex flex-wrap justify-content-center">


        <div class="col-md-6 d-flex flex-wrap justify-content-center  text-white py-3 py-md-3 py-sm-3">
            <div class="login__register">
                {{-- <h3>Dont’t Have An Account?</h3> --}}

                <a href="{{url("/Favorite-Anime")}}" class="primary-btn">Your Favorite Anime</a>
            </div>
        </div>

        <div class="col-md-6 d-flex flex-wrap justify-content-center py-md-3 py-sm-3 py-3 text-white">
            <div class="login__register">
                {{-- <h3>Dont’t Have An Account?</h3> --}}

                <a type="button"  data-delete-id='{{$user_setting[0]->id}}' class="site-btn delete">Delete Account</a>
            </div>
        </div>

</div>
<br>
<br>
<br>

{{-- {{pre($user_setting)}} --}}
            <div class="login__form">
            <div class="col-md-12 d-flex flex-wrap ">
                <form method="POST" class="hidden-menu "  action="{{ url('/update-user') }}"
                    enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{$user_setting[0]->id}}">
                    <div class="input__item">
                        <input type="email" name="email" style="color: black !important" value="{{$user_setting[0]->email}}" placeholder="Email address">
                        <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                        @error('email')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="input__item">
                        <input type="text" name="user_name" style="color: black !important" value="{{$user_setting[0]->user_name}}" placeholder="User Name">
                        <span><i class="fa fa-user-circle" aria-hidden="true"></i></span>
                        @error('user_name')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="input__item ">
                        <input type="text" id="txtNewPassword" style="color: black !important" class="password" name="password"
                            placeholder="Password">
                        <span class="input-group-text togglePassword"
                            style="    left: 0px !important;
top: 0px !important;
padding: 11px;
" id="">

                            <i data-feather="eye" style="cursor: pointer"></i>

                        </span>
                        @error('password')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>



                    <div class="input__item">
                        <input type="text" id="txtConfirmPassword " style="color: black !important" name="confirmPassword"
                            placeholder="Confirm Password">
                        <span> <i class="fa fa-lock" aria-hidden="true"></i></span>
                        <div class="registrationFormAlert" style="color:rgb(254, 255, 254);" id="CheckPasswordMatch">
                        </div>

                    </div>
                    <div class="input__item">

                        <span> <i class="fa fa-upload" aria-hidden="true"></i></span>
                        {{-- <input class="form-control" type="file" id="formFile"> --}}
                        <input class="form-control" type="file" name="profile_pic" id="imageInput" >

                        <br>
                        <small style="color: whitesmoke; font-weight: bolder">Recommended Size : 400x400</small>
                        @error('profile_pic')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class=" d-flex flex-wrap hover1" style="position: relative !important;width: 150px; " >
                        <a href="{{url(Storage::url('public/profile'))}}/{{$user_setting[0]->profile}}">
                        <div class="item-overlay bottom hover d-flex flex-wrap justify-content-center align-items-center" style="z-index: 9999999;">
                            <h4 class="color"  >
                                Your Profile
                            </h4>
                        </div>

                        <img id="imagePreview"  src="{{Storage::url('public/profile')}}/{{$user_setting[0]->profile}}" style="border-radius:25px;width: 150px; height: 150px;">
                    </a>
                    </div><br>
                    <button type="submit" class="site-btn">SAVE</button>

                </form>


    </div>
            </div>
            {{-- <div class="col-lg-6">
                    <div class="login__register">
                        <h3>Dont’t Have An Account?</h3>

                        <a href="#" class="primary-btn">Register Now</a>
                    </div>
                </div>
            </div> --}}
            {{-- <div class="login__social">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="login__social__links">
                            <span>or</span>
                            <ul>
                                <li><a href="#" class="facebook"><i class="fa fa-facebook"></i> Sign in With
                                Facebook</a></li>
                                <li><a href="#" class="google"><i class="fa fa-google"></i> Sign in With Google</a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i> Sign in With Twitter</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> --}}

        </div>
</section>
<!-- Login Section End -->
<x-footer />
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
</script>
<script>
$(".delete").on("click",function(){

if(confirm("are you sure")){
    var delete_id=$(this).attr("data-delete-id");
$(this).attr("href","{{url('user-inactive/')}}/"+delete_id)
}


})

    $('#show-hidden-menu').click(function() {
        $('.hidden-menu').slideToggle("slow");
        // Alternative animation for example
        // slideToggle("fast");
    });
</script>
<script>
    feather.replace({
        'aria-hidden': 'true'
    });

    $(".togglePassword").click(function(e) {
        e.preventDefault();
        var type = $(this).parent().parent().find(".password").attr("type");
        console.log(type);
        if (type == "password") {
            $("svg.feather.feather-eye").replaceWith(feather.icons["eye-off"].toSvg());
            $(this).parent().parent().find(".password").attr("type", "text");
        } else if (type == "text") {
            $("svg.feather.feather-eye-off").replaceWith(feather.icons["eye"].toSvg());
            $(this).parent().parent().find(".password").attr("type", "password");
        }
    });


    function checkPasswordMatch() {
        var password = $("#txtNewPassword").val();
        var confirmPassword = $("#txtConfirmPassword").val();
        if (password != confirmPassword)
            $("#CheckPasswordMatch").css("color", "red").html("Passwords does not match!");
        else
            $("#CheckPasswordMatch").css("color", "white").html("Passwords match.");
    }
    $(document).ready(function() {
        $("#txtConfirmPassword").keyup(checkPasswordMatch);
    });

    $('#imageInput').change(function() {
        readURL(this);
    })

    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#imagePreview').attr('src', e.target.result);

            }
            reader.readAsDataURL(input.files[0])
            console.log(reader.readAsDataURL(input.files[0])); // convert to base64 string
        }
    }
</script>
