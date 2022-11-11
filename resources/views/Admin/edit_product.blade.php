<x-admin_header />
{{-- <x-top_nav /> --}}
<x-dashboard-Nav2></x-dashboard-Nav2>
<x-sidebar />

<pre>
<?php
$edit_data=json_decode(json_encode($edit_product),true);
// print_r($edit_data);
?>
</pre>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Add New Product</h4>
                        <form class="forms-sample" method="POST" action="{{url("/")}}/update-anime-setting/{{$edit_data[0][0]["flid"]}}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Title</label>
                                <input type="text" name="title" value="{{$edit_data[0][0]["anime_title"]}}" class="form-control" required>
                                @error("title")
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Folder ID</label>
                                <input type="text" name="flid" value="{{$edit_data[0][0]["flid"]}}" class="form-control" required>
                                @error("flid")
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Season</label>
                                <input type="number" name="season" value="{{$edit_data[0][0]["season"]}}" class="form-control" required>
                                @error("season")
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Total Season</label>
                                <input type="number" name="t_season" value="{{$edit_data[0][0]["total_season"]}}" class="form-control">
                                @error("t_season")
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Category</label><br>
                                <select class="form-control" name="anime_category" id="product_category" >
                                    <option value="" selected disabled>Category</option>
                                    <?php

                                    $count_cat=0;
                                    // print_r($edit_data[1][0])
                                    ?>

                                    @foreach ($edit_data[1] as $anime_cat)
                                        <option value="{{ $edit_data[1][$count_cat]['id'] }}">{{ $edit_data[1][$count_cat]['add_anime_title'] }}</option>
                                  <?php
                                  $count_cat++;
                                  ?>
                                        @endforeach
                                </select>
                                @error("anime_category")
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>


                            {{-- <div class="form-group">
                <label for="">Sub-Category</label>
                <select class="form-control product_sub_category" name="sub_category_id">

                  <option value="" selected disabled>Sub-Category</option>

                </select>
              </div> --}}


                            {{-- <div class="form-group">
                <label>Brand</label><br>
                <select class="form-control" name="brand">

                </select>
              </div> --}}


                            <div class="form-group">
                                <label>Anime Description</label>
                                <textarea class="anime_desc  form-control" id="summernote" name="description">
                                    {{$edit_data[2]["data_description"]}}

                                </textarea>
                              @error("description")
                              <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                              @enderror
                            </div>
                            {{-- <div class="form-group">
                <label>Total </label>
                <input type="number" step=0.01 name="shipping" class="form-control" value="">
              </div> --}}
                            <div class="mb-3">
                                <label for="" class="form-label">Anime Episode Status</label>
                                <select class="form-select form-select-md" name="episode_status" id="">
                                    <option value="" selected disabled>select anyone</option>
                                    <option value="completed">Completed</option>
                                    <option value="On going">On going</option>

                                </select>
                                @error("episode_status")
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group text-small">
                                <label>Main Image</label><br>
                                <input type="file" name="main_image" id="imageInput" ><br>
                                <small>Recommended Size : 400x400</small>
                                @error("main_image")
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div>
                                <img id="imagePreview" src="{{Storage::url('/img/anime') }}/{{$edit_data[0][0]["anime_image"]}}" style="width: 150px; height: 150px;">
                            </div><br>
                            <!-- Gallary Images -->
                            <div class="mb-3">
                                <label for="" class="form-label">Anime Status</label>
                                <select class="form-select form-select-md" name="anime_status" id="">
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
        $('#summernote').summernote({
            codemirror: { // codemirror options
    theme: 'monokai'
  }
        });
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
