<x-admin_header />
{{-- <x-top_nav /> --}}
<x-dashboard-Nav2></x-dashboard-Nav2>
<x-sidebar />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
                <div class="card">
                    {{-- {{pre($setting)}} --}}
                    <div class="card-body">
                        <h4 class="card-title">Update Admin </h4>
                        <form class="forms-sample" method="POST" action="{{url('/update-admin') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="CategoryName">Your Email</label>
                                <input type="hidden" name="id" value="{{ $setting[0]['id'] }}">
                                <input type="text" name="email_admin" value="{{ $setting[0]['email'] }}" class="form-control"
                                    placeholder="Enter your Email">
                                @error('email_admin')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="CategoryName">User name</label>
                                <input type="text" name="user_name_admin" value="{{ $setting[0]['user_name'] }}"
                                    class="form-control" placeholder="Enter User Name">
                                @error('user_name_admin')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="txtNewPassword">Password</label>
                                <div class="input-group ">

                                    <br>
                                    <input type="password" id="txtNewPassword" name="password_admin"
                                        class="password form-control" placeholder="Password">
                                    <span class="input-group-text  togglePassword" style="padding:2px ">

                                        <i data-feather="eye" style="cursor: pointer"></i>

                                    </span>

                                    @error('password_admin')
                                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                    @enderror
                                </div>

                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <span class="input-group-text"> <i class="fa fa-lock" aria-hidden="true"></i></span>
                                <input type="text" id="txtConfirmPassword" name="confirmPassword"
                                    placeholder="Confirm Password" class="form-control">
                                </div>
                                <div class="registrationFormAlert" style="color:rgb(254, 255, 254);"
                                    id="CheckPasswordMatch">
                                </div>
                            </div>

                            <div class="form-group">

                                <div class="input-group">
{{-- <input class="form-control" type="file" id="formFile"> --}}
<span class="input-group-text  "> <i class="fa fa-upload" aria-hidden="true"></i></span>
<input class="form-control w-75 " type="file" name="profile_pic" id="imageInput" >
<br>
<small style="color: whitesmoke; font-weight: bolder">Recommended Size : 400x400</small>
@error('profile_pic')
    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
@enderror
                                </div>

                            </div>
                            <div>
                                <img id="imagePreview"
                                    src="{{Storage::url('/profile') }}/{{ $setting[0]['profile'] }}"
                                    style="width: 150px; height: 150px;">
                            </div>
                            <br>


                            <button type="submit"  class="btn btn-primary me-2">Submit</button>
                            <!-- <button class="btn btn-light">Cancel</button> -->
                        </form>

                    </div>
                </div>
            </div>
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Admin detail</h2>
                        @if (session('status'))
                            <div class="alert alert-success">
                                {{ session('status') }}
                            </div>
                        @elseif (session('update_success'))
                            <div class="alert alert-success">
                                {{ session('update_success') }}
                            </div>
                        @elseif (session('delete_success'))
                            <div class="alert alert-success">
                                {{ session('delete_success') }}
                            </div>
                        @elseif (session('error_edit'))
                            <div class="alert alert-danger">
                                {{ session('error_edit') }}
                            </div>
                        @elseif (session('error_delete'))
                            <div class="alert alert-danger">
                                {{ session('error_delete') }}
                            </div>
                        @endif
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th>Sr. No.</th>
                                        <th>Profile</th>
                                        <th>User name</th>
                                        <th>Email</th>
                                        <th>Updated At</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    // $i = 1;
                                    // $count_all_data = count($all_datas);
                                    ?>
                                                                          <tr>
                                            <td>1</td>
                                            <td> <a  href="{{Storage::url('/profile') }}/{{$setting[0]['profile']}}" >
                                                <img  src="{{Storage::url('/profile') }}/{{$setting[0]['profile']}}" style="height:70px;width:70px; border-radius: 35px;">
                                                </a></td>
                                            <td>{{  $setting[0]['user_name']}}</td>
                                            <td>{{  $setting[0]['email']}}</td>
                                            <td>{{  $setting[0]['updated_at']}}</td>
                                            {{-- <td> <a class="btn btn-md btn-info"
                                                    href="{{ url('Edit-anime-category/') }}/{{ $anime_category['id'] }}">Edit</a>
                                            </td>
                                            <td> <a class="btn btn-md btn-danger delete"
                                                    data-delete-id="{{ $anime_category['id'] }}"
                                                    href="">Delete</a> </td> --}}
                                        </tr>
                                        <?php
                                        // $i++;
                                        ?>


                                </tbody>
                            </table>

                        </div>

                        {{-- {{ $all_datas->links('vendor.pagination.bootstrap-5') }} --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<x-admin_footer />

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


    function checkPasswordMatch() {
        var password = $("#txtNewPassword").val();
        var confirmPassword = $("#txtConfirmPassword").val();
        if (password != confirmPassword)
            $("#CheckPasswordMatch").css("color", "red").html("Passwords does not match!");
        else
            $("#CheckPasswordMatch").css("color", "green").html("Passwords match.");
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
