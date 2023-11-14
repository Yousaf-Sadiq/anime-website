@if (!Session::has("admin_email"))

<x-admin_login_header/>
    <div class="container-fluid page-body-wrapper full-page-wrapper ">
      <div class="content-wrapper d-flex align-items-center auth px-0 fsl-css1">
        <div class="row w-100 mx-0 ">
          <div class="col-lg-4 mx-auto ">
            <div class="auth-form-light text-center py-5 px-4 px-sm-5 fsl-css2">
              <!-- <div class="brand-logo">
                <img src="images/favicon.png" alt="logo">
              </div> -->
              <h2 class="text-center">Hello, Admin!</h2><br>
              <h6 class="fw-light">Sign in to continue.</h6>

              @if (session('logout_success'))
              <div class="alert alert-success mt-1 mb-1">{{ session('logout_success') }}</div>
              @elseif (session('fetch_error'))
                      <div class="alert alert-danger mt-1 mb-1">{{ session('fetch_error') }}</div>
   @elseif (session('login_error'))
                      <div class="alert alert-danger mt-1 mb-1">{{ session('login_error') }}</div>
                  @endif

              <form class="pt-3" action="{{url("login-admin")}}" method="POST">
                @csrf
                <div class="form-group">
                  <input type="email" name="email_login" class="form-control form-control-lg" id="exampleInputEmail1" placeholder="Enter Email" required>
                </div>
                <div class="form-group">
                    <div class="input-group ">
                    <input type="password" name="password_login" class="password form-control form-control-lg" id="txtNewPassword" placeholder="Enter your Password" required>
                  <span  class="input-group-text  togglePassword pe-auto" style="z-index: 999999; padding:2px ;cursor: pointer" >

                    <i data-feather="eye" style="cursor: pointer"></i>

                </span>
                    </div>
                </div>
                <div class="mt-3">
                  <button type="submit" name="login" class="btn btn-primary me-2">Login</button>
                  <!-- <a class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" href="../../index.html">SIGN IN</a> -->
                </div>
                <div class="my-2 d-flex justify-content-between align-items-center">
                  <!-- <div class="form-check">
                    <label class="form-check-label text-muted">
                      <input type="checkbox" class="form-check-input">
                      Keep me signed in
                    </label>
                  </div> -->
                  <a href="#" class="auth-link text-black">Forgot password?</a>
                </div>
                <!-- <div class="mb-2">
                  <button type="button" class="btn btn-block btn-facebook auth-form-btn">
                    <i class="ti-facebook me-2"></i>Connect using facebook
                  </button>
                </div>
                <div class="text-center mt-4 fw-light">
                  Don't have an account? <a href="register.html" class="text-primary">Create</a>
                </div> -->
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <x-admin_login_footer/>

    <script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
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


</script>
@else
{{-- Redirect to the dashboard --}}
@php
header("Location: " . url('dashboard'));
exit;
@endphp
@endif
