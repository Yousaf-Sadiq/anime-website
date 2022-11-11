


<x-admin_header/>
{{-- <x-top_nav/> --}}
<x-dashboard-Nav2></x-dashboard-Nav2>
<x-sidebar />


<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Add New Category  </h4>
                  <form class="forms-sample" method="POST" action="{{url("/")}}\insert-anime-category" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label for="CategoryName">Category Name</label>
                      <input type="text" name="cat_name" class="form-control" id="CategoryName" placeholder="Enter Category Title" value="">
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

                </div>
              </div>
            </div>
        <div class="col-md-9 grid-margin stretch-card">
        <div class="card">
                <div class="card-body">
                  <h2 class="">Categories</h2>
                  @if(session('status'))
                  <div class="alert alert-success">
                  {{ session('status') }}
                  </div>
                  @elseif (session("update_success"))
                  <div class="alert alert-success">
                      {{ session('update_success') }}
                      </div>
                      @elseif (session("delete_success"))
                  <div class="alert alert-success">
                      {{ session('delete_success') }}
                      </div>
                      @elseif (session("error_edit"))
                  <div class="alert alert-danger">
                      {{ session('error_edit') }}
                      </div>
 @elseif (session("error_delete"))
                  <div class="alert alert-danger">
                      {{ session('error_delete') }}
                      </div>

                  @endif
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
                            $count_all_data=count($all_datas);

                        ?>
@foreach ($all_datas as $anime_category)
<tr>
    <td>{{$i}}</td>
    <td>{{$anime_category["add_anime_title"]}}</td>
    <td>{{$anime_category["created_at"]}}</td>
    <td>{{$anime_category["updated_at"]}}</td>
    <td> <a  class="btn btn-md btn-info" href="{{url("Edit-anime-category/")}}/{{$anime_category["id"]}}">Edit</a> </td>
    <td> <a  class="btn btn-md btn-danger delete" data-delete-id="{{$anime_category["id"]}}" href="">Delete</a> </td>
</tr>
<?php
$i++;
?>

@endforeach


                      </tbody>
                    </table>

                  </div>

                  {{ $all_datas->links('vendor.pagination.bootstrap-5') }}
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
