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
                    <h2>Forget password checker</h2>
                    @if (session('login_success'))
                        <div class="alert alert-success mt-1 mb-1">{{ session('login_success') }}</div>
                    @else
                        <p>Welcome to the official Anime blog.</p>
                        <p class="alert alert-danger text-dark">If the mail is not in the inbox check in spam (remember our email is secured)</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Normal Breadcrumb End -->
<!-- Login Section Begin -->
<style>
    .login__form:after {
        position: absolute;
        right: -14px;
        top: -40px;
        height: 330px;
        width: 0px !important;
        background: rgba(255, 255, 255, 0.2);
        content: "";
    }

</style>
<section class="login spad" style="padding-top: 20px !important;">
    <div class="container-fluid d-flex flex-wrap justify-content-center">
        <div class="row d-flex flex-wrap justify-content-center">
            @if (Session::has('user_email'))
                <div class="login__register">
                    {{-- <h3>Dont’t Have An Account?</h3> --}}

                    <a href="{{ url('/Favorite-Anime') }}" class="primary-btn">Your Favorite Anime</a>
                </div>
            @else
                <div class="col-lg-12">
                    <div class="login__form">
                        <h3>Forget password</h3>

                        @if (session('logout_success'))
                            <div class="alert alert-success mt-1 mb-1">{{ session('logout_success') }}</div>
                        @elseif (session('fetch_error'))
                            <div class="alert alert-danger mt-1 mb-1">{{ session('fetch_error') }}</div>
                        @endif
                        <form method="POST" action="{{ url('/mail-send') }}">
                            @csrf
                            <div class="input__item">
                                <input type="email" name="email_login"  placeholder="Email address">
                                <span><i class="fa fa-envelope" aria-hidden="true"></i></span>
                                @error('email_login')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                                @if (session('login_error'))
                                    <div class="alert alert-danger mt-1 mb-1">{{ session('login_error') }}</div>
                                @endif

                            <button type="submit" class="site-btn">send Forget password link</button>
                        </form>
                    </div>
                </div>
                {{-- =================================== --}}
                {{-- =================================== --}}
                {{-- =================================== --}}
                {{-- =================================== --}}
                {{-- =================================== --}}
                {{-- registor --}}

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
        @endif
    </div>
</section>
<!-- Login Section End -->
<x-footer />
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
</script>
<script>
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
