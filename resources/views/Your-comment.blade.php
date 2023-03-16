<x-header />
<link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"
    href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css">
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
    th,
    td {
        text-align: center
    }

    .note-editable {
        background-color: black;
        color: white
    }
</style>


<!-- Normal Breadcrumb Begin -->
<section class="normal-breadcrumb set-bg" data-setbg="{{ Storage::url('img/normal-breadcrumb.jpg') }}">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="normal__breadcrumb__text">
                    <h2>Comment Section</h2>
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
<!-- Normal Breadcrumb End -->
<!-- Login Section Begin -->
<section class="login spad">
    <div class="container-fluid">
        <div class="row">

            <div class="table-responsive ">

                {{-- [
  {
    "user_id": "no@email.com",
    "whislist_id": 12,
    "whislist_anime_id": "3",
    "anime_id": 3,
    "anime_cat": "1",
    "flid": "240412",
    "anime_title": "MIsfit of demon academy",
    "anime_image": "32_254143.jpg",
    "season": "7",
    "total_season": "9",
    "anime_description": "13_anime_desc.txt",
    "episodes_status": "On going",
    "anime_status": "1",
    "id": 1,
    "created_at": "2022-10-07T06:50:36.000000Z",
    "updated_at": "2022-10-10T07:29:47.000000Z",
    "add_anime_title": "Adventure",
    "cat_id ": 1
  }
] --}}
                {{-- {{pre($whislist_data)}} --}}
                <style>
                    th,
                    td {
                        color: white !important;
                    }
                </style>
                <table
                    class="table
                table-hover

                table-borderless
                table-responsive
                align-middle">

                    <thead class="table-light ">
                        <caption>Your Comment</caption>
                        <tr>
                            <th># </th>
                            <th>Anime image</th>
                            <th>Anime title</th>
                            <th>Your Comment</th>
                            <th>Go TO</th>

                        </tr>
                    </thead>
                    <tbody class="table-group-divider text-white">
                        @if (count($comment) <= 0 || empty($comment))
                            <h1 style="color:white">No Record found </h1>
                        @endif
                        @php
                            $iterator = 1;
                        @endphp
                        @foreach ($comment as $w_data)
                            <tr>
                                <td>
                                    @php
                                        echo $iterator;
                                    @endphp
                                </td>
                                <td scope="row">
                                    <a href="{{ Storage::url('/img/anime') }}/{{ $w_data->anime_image }}">
                                        <img src="{{ Storage::url('/img/anime') }}/{{ $w_data->anime_image }}"
                                            style="height:70px;width:70px; border-radius: 35px;">
                                    </a>
                                </td>
                                <td>{{ $w_data->anime_title }}</td>


                                <td>

                                    <!-- Button trigger modal -->
                                    <button type="button" class="btn btn-primary model_my" data-bs-toggle="modal"
                                        data-bs-target="#exampleModal@php
echo $w_data->id; @endphp">
                                        Click to see Comment
                                    </button>

                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal@php
echo $w_data->id; @endphp"
                                        tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel"
                                                        style="color: black">COMMENT</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">

                                                    <p class="click2edit2" data-id={{ $w_data->id }}>

                                                        @if (Storage::has($w_data->comments))
                                                            @php
                                                                echo print_r(Storage::get($w_data->comments), true);
                                                            @endphp
                                                        @else
                                                            {{ $w_data->comments }}
                                                        @endif
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>








                                </td>
                                {{--  <td> <a  class="btn btn-md btn-info" href="{{url("/")}}/Watch-Anime/{{$w_data->flid}}/{{$w_data->anime_title}}?Ep=1">Watch</a> </td>  --}}
                                <td> <a  class="btn btn-md btn-info" href="{{url("/")}}/Watch-Anime/{{$w_data->flid}}/{{$w_data->anime_title}}?Ep=1">Watch</a> </td>

                                @php
                                    $iterator++;
                                @endphp
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        {{ $comment->links('vendor.pagination.custom') }}
                    </tfoot>
                </table>
            </div>



        </div>
</section>
<!-- Login Section End -->
<x-footer />

<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.28.0/dist/feather.min.js"
    integrity="sha384-uO3SXW5IuS1ZpFPKugNNWqTZRRglnUJK6UAZ/gxOX80nxEkN9NcGZTftn6RzhGWE" crossorigin="anonymous">
</script>


<script>
    $(".model_my").on("click", function() {

        var id = $(this).attr("data-bs-target")
        var id_p = $(this).parent().siblings("p").attr("data-id")
        if (id == id_p) {
            $("#edit_" + id).css({
                "display": "inline-block"
            })
            $("#close_" + id).css({
                "display": "inline-block"
            })






        }
        $(id).find(".modal-body").children("p").attr("id", id_p)
        {{--  alert($(id).find(".modal-body").children("p").attr("id",id_p))  --}}

        $(".click2edit2").summernote({

            toolbar: false,
            readOnly: true

        })

    })

    $(".delete").on("click", function() {

        if (confirm("are You Sure")) {
            var id = $(this).attr("data-delete-id")
            // ========================start=============
            $.ajax({
                type: "GET",
                url: "{{ url('/Delete_fvrt') }}/" + id,
                data: {
                    anime_id: id,
                    user_id: '{{ Session::get('user_email') }}'
                },
                dataType: "json",
                success: function(response) {

                    // $("#favrt_added").attr("title",response[0])
                    alert(response)
                    location.reload();
                    // console.log(response)
                    // alert(response)
                }
            });
            // ======================ajax end==================

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
