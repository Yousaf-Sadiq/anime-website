


<x-admin_header/>
{{-- <x-top_nav/> --}}
<x-dashboard-Nav2></x-dashboard-Nav2>
<x-sidebar />

<?php

$show_data=json_decode($show_data);
$show_data=(array)$show_data;
// print_r($show_data);
?>
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Edit New Category  </h4>
                  <form class="forms-sample" method="POST" action="{{url("/")}}/update-anime-category/{{$show_data["id"]}}" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label for="CategoryName">Category Name</label>
                      <input type="text" name="cat_name" value="{{$show_data["add_anime_title"]}}" class="form-control" id="CategoryName" placeholder="Enter Category Title" value="">
                    @error("cat_name")
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                    </div>
                    {{-- <div class="form-group text-small">
                      <label for="">Category Image</label>
                      <input type="file" name="image" class="" id="imageInput"><br>
                      <small>Recommended Size : 350x350</small>
                    </div> --}}

                    {{-- <div>
                        <img id="imagePreview" style="width: 150px; height: 150px;">
                    </div><br> --}}

                    <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                  </form>
                  @if(session('status'))
<div class="alert alert-success">
{{ session('status') }}
</div>
@endif
                </div>
              </div>
            </div>
        <div class="col-md-9 grid-margin stretch-card">
        <div class="card">
                <div class="card-body">
                  <h2 class="">Categories</h2>
                  <div class="table-responsive">
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th>Sr. No.</th>
                          <th>Category</th>
                          <th>Created At</th>
                          <th>Updated At</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $i=1;
                            // $count_all_data=count($all_datas);

                        ?>

<tr>
    <td>{{$i}}</td>
    <td>{{$show_data["add_anime_title"]}}</td>
    <td>{{$show_data["created_at"]}}</td>
    <td>{{$show_data["updated_at"]}}</td>
    <td> <a  class="btn btn-md btn-info" href="{{url("Edit-anime-category/")}}/{{$show_data["id"]}}">Edit</a> </td>
    <td> <a  class="btn btn-md btn-danger delete" data-delete-id="{{$show_data["id"]}}" href="">Delete</a> </td>
</tr>




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


<x-admin_footer/>



<script>

$(".delete").on("click",function(){

if(confirm("are you sure")){
    var delete_id=$(this).attr("data-delete-id");
$(this).attr("href","{{url('Delete-anime-category/')}}/"+delete_id)
}


})
      $('#imageInput').change(function () {
            // alert("abc");
            readURL(this);
        })

        // preview image before upload
        function readURL(input) {

            // console.log(input.files)
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $('#imagePreview').attr('src', e.target.result);

                }
                reader.readAsDataURL(input.files[0])
                console.log(reader.readAsDataURL(input.files[0])); // convert to base64 string
            }
        }

</script>
