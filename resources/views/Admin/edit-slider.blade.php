<x-admin_header />
{{-- <x-top_nav /> --}}
<x-dashboard-Nav2></x-dashboard-Nav2>
<x-sidebar />


<?php
$edit_data=json_decode(json_encode($edit_product),true);
// pre($edit_data)

?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update gallery</h4>
                        <form class="forms-sample" method="POST" action="{{url("/update-anime-slider")}}/{{$edit_data[1]["id"]}}"
                            enctype="multipart/form-data">
                            @csrf



                            <div class="form-group">
                                <label>Folder ID/name (<span style="color: red">*</span>optional)</label><br>
                                <select class="form-control" name="folder_name" id="product_category" >
                                    <option value="" selected disabled>select any one</option>
                                    <?php

                                    $count_cat=0;
                                    // print_r($edit_data[1][0])
                                    ?>

                                    @foreach ($edit_data[0] as $anime_cat)
                                        <option value="{{ $anime_cat['flid'] }}">{{ $anime_cat['title'] }}</option>
                                  <?php
                                  $count_cat++;
                                  ?>
                                        @endforeach
                                </select>
                                @error("anime_category")
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>




                            <div class="form-group text-small">
                                <label>Main Image (<span style="color: red">*</span>optional)</label><br>
                                <input type="file" name="main_image" id="imageInput" ><br>
                                <small>Recommended Size : 400x400</small>
                                @error("main_image")
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <img id="imagePreview" src="{{Storage::url('/img/anime') }}/{{$edit_data[1]["image_name"]}}" style="width: 150px; height: 150px;">
                            </div><br>
                            <!-- Gallary Images -->
                            <div class="mb-3">
                                <label for="" class="form-label">Gallery Status (<span style="color: red">*</span>optional)</label>
                                <select class="form-select form-select-md" name="gallery_status" id="">
                                    <option value="" selected disabled>select anyone</option>
                                    <option value="0">Draft</option>
                                    <option value="1">Publish</option>

                                </select>
                                @error("anime_status")
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" name="publish" class="btn btn-primary me-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<x-admin_footer />

<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>



<script>
    // EDITOR REPLACING TEXT AREA FIELD FOR LONG DESCRIPTION
    $(document).ready(function() {
        $('.anime_desc').ckeditor();
    });
</script>


<script>
    // JQUERY FUNCTION FOR IMAGE PREVIEW BEFORE UPLOAD
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


    // JQUERY FUNCTION TO FETCH SUBCATEGORIES WITH AJAX

    //   $('#product_category').change(function() {

    //     var id = $('#product_category option:selected').val();


    //     $.ajax({
    //       url: "actions/ajax_subcategories_action.php",
    //       type: "POST",
    //       data: {
    //         product_cat: id
    //       },
    //       success: function(response) {
    //         var res = JSON.parse(response);

    //         if (res.hasOwnProperty('sub_category')) {

    //           var sub_cat = '<option value ="" selected>Select Subcategory</option>';
    //           var sub_cat_length = res.sub_category.length;

    //           for (var i = 0; i < sub_cat_length; i++) {

    //             sub_cat += '<option value="'+res.sub_category[i].id+'">' + res.sub_category[i].subcategory_name + '</option>';
    //           }

    //           $('.product_sub_category').html(sub_cat);
    //         }
    //       }
    //     });
    //   });
</script>
