<x-admin_header />
{{-- <x-top_nav /> --}}
<x-dashboard-Nav2></x-dashboard-Nav2>
<x-sidebar />

<?php

$data_description=json_decode(json_encode($data_description ), true);
// $descriptions=(array) $description;
// print_r($show_data);
?>
<style>
  .fsl_pagination {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
  }

  .btn {
    color: #000;
  }

  .btn:hover {
    color: #000;
  }

  .active_2 {
    background-color: #000 !important;
    color: #fff !important;
    transition: .5s all ease-in-out;
    /* border:none; */
  }

  .active_2:hover {
    background-color: black !important;
    color: #fff !important;

  }
  .sr_wrap{
    width:50px;
  }
</style>


<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h2 class="">Meta Description</h2>
          <div class="table-responsive">
            <div class="form-group">
                <label>Meta Description</label>

                <textarea class="anime_desc  form-control h-25" id="summernote" disabled name="meta_description"
                placeholder="Enter meta description here...">
                    {{$data_description}}

                </textarea>
            </div>

{{-- {{readfile(Storage::url("app/").$description[0]["anime_description"])}} --}}


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<x-admin_footer />


<script>
     // EDITOR REPLACING TEXT AREA FIELD FOR LONG DESCRIPTION
     $(document).ready(function() {
        $('#summernote').summernote("disable");

    });

$(".delete").on("click",function(){

    if(confirm("are you sure")){
        var delete_id=$(this).attr("data-delete-id");
$(this).attr("href","{{url('Delete-anime/')}}/"+delete_id)
    }


})
</script>
