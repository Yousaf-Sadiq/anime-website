


<x-admin_header/>
{{-- <x-top_nav/> --}}
<x-dashboard-Nav2></x-dashboard-Nav2>
<x-sidebar />

<style>
.blink {
  animation: blinker 1s linear ;
}

@keyframes blinker {
  50% {
    opacity: 0;
  }
}
</style>
<link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
{{-- {{pre($image_gallery[1])}} --}}

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-6 grid-margin stretch-card">
              <div class="card">

                <div class="card-body">
                  <h4 class="card-title">Add New Picture (<span style="color: red">*</span>Step-1) </h4>
<style>
    .dz-image img {
    width: 100%;
    height: 100%;
}
.dropzone.dz-started .dz-message {
	display: block !important;
}
.dropzone {
	border: 2px dashed #028AF4 !important;;
}
.dropzone .dz-preview.dz-complete .dz-success-mark {
    opacity: 1;
}
.dropzone .dz-preview.dz-error .dz-success-mark {
    opacity: 0;
}
.dropzone .dz-preview .dz-error-message{
	top: 144px;
}
</style>
                  <form method="POST" action="{{url('/SliderInsert')}}" enctype="multipart/form-data" class="dropzone" id="dropzone">
                    {{ csrf_field() }}

                    <div class="dz-default dz-message"><h4>Drop files here or click to upload</h4></div>

                  </form>
                  <style>
 /* .items .dz-preview {
    position: relative;
    display: inline-block;
    vertical-align: top;
    margin: 16px;
    min-height: 100px;
}

.items .dz-clickable * {
    cursor: default;
}

.items .dz-preview .dz-image {
    border-radius: 20px;
    overflow: hidden;
    width: 120px;
    height: 120px;
    position: relative;
    display: block;
    z-index: 10;
}
.items .dz-preview .dz-details .dz-size {
    margin-bottom: 1em;
    font-size: 16px;
}

.items .dz-preview .dz-details .dz-filename:not(:hover) {
    overflow: hidden;
    text-overflow: ellipsis;
}
.items .dz-preview .dz-details .dz-filename {
    white-space: nowrap;
} */
#pagin li{
    cursor: pointer;
}
           </style>

<ul id="pagin" class="pagination">

</ul>
                </div>
              </div>
            </div>

            <div class="col-md-6 grid-margin stretch-card"  id="form">
              <div class="card">
                @if(session('status'))
                <div class="alert alert-success">
                {{ session('status') }}
                </div>
                @elseif (session("update_success"))
                <div class="alert alert-success">
                    {{ session('update_success') }}
                    </div>
                       @elseif (session("insert_status"))
                <div class="alert alert-success">
                    {{ session('insert_status') }}
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
                    @elseif (session("data_invalid"))
                <div class="alert alert-danger">
                    {{ session('data_invalid') }}
                    </div>

                @endif
                <div class="card-body">
                  <h4 class="card-title">Add New Gallery  (<span style="color: red">*</span>Step-2) </h4>
                  <form class="forms-sample" method="POST" action="{{url("/insertGallery")}}" enctype="multipart/form-data">
                  @csrf
                    <div class="form-group">
                      <label for="CategoryName">Select anyone image</label>
                    <br>
                      <style>
                        .image_checkbox{
                            border-radius: 20px;
                        overflow: hidden;
                        width: 120px;
                        height: 120px;
                        position: relative;
                        display: block;
                        z-index: 10;
                    }
                        }
                    </style>
                    <div class="d-flex flex-wrap justify-content-center">
@foreach ($image_gallery[0] as $data )

<div class="m-3">
                      {{-- <input type="text" name="cat_name" class="form-control" id="CategoryName" placeholder="Enter Category Title" value=""> --}}
                      <input type="checkbox" name="checkbox_name" id="checkBOx" value="{{$data->image_name}}">
           <img  src="{{Storage::url("/img/anime")}}/{{$data->image_name}}" class="image_checkbox">
        </div>
                      @endforeach
                      @error("checkbox_name")
                      <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>

                      @enderror

                  {{ $image_gallery[0]->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>

<div class="mb-3">
    <label for="" class="form-label">Folder name</label>
    <select class="form-select form-select-md" name="flid_image" id="">


        <option selected>Select one</option>
        @foreach ($image_gallery[1] as $data )

        <option value="{{$data->flid}}">{{$data->title}}</option>
        @endforeach

    </select>
</div>
                    <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                  </form>

                </div>
              </div>
            </div>
        <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
                <div class="card-body">
                  <h2 class="">Categories</h2>

                  <div class="table-responsive">
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th>Sr. No.</th>
                          <th>Gallery Images</th>
                          <th>Folder ID/anime</th>
                          <th>Created At</th>
                          <th>Updated At</th>
                          <th>Status</th>
                          <th>Edit</th>
                          <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                            $i=1;
                            $count_all_data=count($image_gallery[2]);

                        ?>
@foreach ($image_gallery[2] as $data )
<tr>
    <td>{{$i}}</td>
    <td>
        <a  href="{{Storage::url('/img/anime') }}/{{$data->image_name}}" >
        <img src="{{Storage::url('/img/anime') }}/{{$data->image_name}}" style="height:70px;width:70px;">
        </a>
    </td>
    <td>
        @foreach ($image_gallery[1] as $data_check )

        @if ($data_check->flid==$data->folder_name)
       (ID:&nbsp;{{$data->folder_name}})
       <br>
       <br>
      {{$data_check->title}}
      @elseif (!isset($data->folder_name) || empty($data->folder_name))
      <a href="#form" class="active_form">kindly select Anime name from above form</a>
<?php
break;
?>
      @endif

@endforeach

        </td>
    <td>{{$data->created_at}}</td>
    <td>{{$data->updated_at}}</td>
    <td>
    @if ($data->status==0)
    <div class="alert alert-danger" role="alert">
        <strong>Draft</strong>
    </div>
    @else

<div class="alert alert-success" role="alert">
        <strong>Published</strong>
    </div>
    @endif
</td>
    <td> <a  class="btn btn-md btn-info" href="{{url("Edit-anime-slider/")}}/{{$data->id}}">Edit</a> </td>
    <td> <a  class="btn btn-md btn-danger delete" data-delete-id="{{$data->id}}" href="">Delete</a> </td>
</tr>
<?php
$i++;
?>

@endforeach


                      </tbody>
                    </table>

                  </div>

                  {{$image_gallery[2]->links('vendor.pagination.bootstrap-5') }}
                </div>
              </div>
        </div>
        </div>
    </div>
</div>


<x-admin_footer/>

<script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
<script src="{{url("js/paginga.jquery.min.js")}}"></script>
<script>
   Dropzone.options.dropzone =
         {
	    maxFiles: 5,
        maxFilesize: 4,
            //~ renameFile: function(file) {
                //~ var dt = new Date();
                //~ var time = dt.getTime();
               //~ return time+"-"+file.name;    // to rename file name but i didn't use it. i renamed file with php in controller.
            //~ },
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            addRemoveLinks: true,
            timeout: 50000,
            init:function() {

				// Get images
				var myDropzone = this;
				$.ajax({
					url: "{{url('/')}}/slider-fetch-images",
					type: 'GET',
					dataType: 'json',

					success: function(data){
					//console.log(data);
                    //Pagination




					$.each(data, function (key, value) {

						var file = {name: value.name, size: value.size};
						myDropzone.options.addedfile.call(myDropzone, file);
						myDropzone.options.thumbnail.call(myDropzone, file, value.path);
						myDropzone.emit("complete", file);


					});
//Pagination
pageSize = 3;
incremSlide = 5;
startPage = 0;
numberPage = 0;

var pageCount =  $(".dz-preview").length / pageSize;
var totalSlidepPage = Math.floor(pageCount / incremSlide);

for(var i = 0 ; i<pageCount;i++){
    $("#pagin").append('<li class="page-item"><a class="page-link" >'+(i+1)+'</a></li> ');
    if(i>pageSize){
       $("#pagin li").eq(i).hide();
    }
}

var prev = $("<li/>").addClass("page-item").html(".").click(function(){
   startPage-=5;
   incremSlide-=5;
   numberPage--;
   slide();
});

prev.hide();

var next = $("<li/>").addClass("page-item").html(".").click(function(){
   startPage+=5;
   incremSlide+=5;
   numberPage++;
   slide();
});

$("#pagin").prepend(prev).append(next);

$("#pagin li").first().find("a").addClass("active");

slide = function(sens){
   $("#pagin li").hide();

   for(t=startPage;t<incremSlide;t++){
     $("#pagin li").eq(t+1).show();
   }
   if(startPage == 0){
     next.show();
     prev.hide();
   }else if(numberPage == totalSlidepPage ){
     next.hide();
     prev.show();
   }else{
     next.show();
     prev.show();
   }


}

showPage = function(page) {
	  $(".dz-preview").hide();
	  $(".dz-preview").each(function(n) {
	      if (n >= pageSize * (page - 1) && n < pageSize * page)
	          $(this).show();
	  });
}

showPage(1);
$("#pagin li ").eq(0).addClass("active");

$("#pagin li a").click(function() {
	 $("#pagin li").removeClass("active");
	 $(this).addClass("current");
	 showPage(parseInt($(this).text()));
});

                }
				});
			},
            removedfile: function(file)
            {
				if (this.options.dictRemoveFile) {
				  return Dropzone.confirm("Are You Sure to "+this.options.dictRemoveFile, function() {
					if(file.previewElement.id != ""){
						var name = file.previewElement.id;
					}else{
						var name = file.name;
					}
					//console.log(name);
					$.ajax({
						headers: {
							  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
							  },
						type: 'POST',
						url: "Slider-delete-images",
						data: {filename: name},
						success: function (data){
							alert(data.success +" File has been successfully removed!");
                            var url = window.location.href;

url = url.split('page')[0];
var urlParams = new URLSearchParams(window.location.search); //get all parameters
var check_page = urlParams.get('page');

if (check_page) {
    window.location.href=url
}else{
    location.reload();
}


                            // location.reload();
						},
						error: function(e) {
							console.log(e);
						}});
						var fileRef;
						return (fileRef = file.previewElement) != null ?
						fileRef.parentNode.removeChild(file.previewElement) : void 0;
				   });
			    }
            },

            success: function(file, response)
            {
				file.previewElement.id = response.success;
				//console.log(file);
				// set new images names in dropzone’s preview box.
                var olddatadzname = file.previewElement.querySelector("[data-dz-name]");
				file.previewElement.querySelector("img").alt = response.success;
				olddatadzname.innerHTML = response.success;
                // refresh page
                var url = window.location.href;

url = url.split('page')[0];
var urlParams = new URLSearchParams(window.location.search); //get all parameters
var check_page = urlParams.get('page');

if (check_page) {
    window.location.href=url
}else{
    location.reload();
}

            },
            error: function(file, response)
            {
               if($.type(response) === "string")
					var message = response; //dropzone sends it's own error messages in string
				else
					var message = response.message;
				file.previewElement.classList.add("dz-error");
				_ref = file.previewElement.querySelectorAll("[data-dz-errormessage]");
				_results = [];
				for (_i = 0, _len = _ref.length; _i < _len; _i++) {
					node = _ref[_i];
					_results.push(node.textContent = message);
				}
				return _results;
            }

};
</script>
<script>
$(document).ready(function(){

    $('input#checkBOx').on('change', function(x) {
    $('input#checkBOx').not(this).prop('checked', false);
    // alert($(this).val())
});

$(".delete").on("click",function(){

    if(confirm("are you sure")){
        var delete_id=$(this).attr("data-delete-id");
$(this).attr("href","{{url('Delete-anime-gallery/')}}/"+delete_id)
    }
})


})
function flipTheCard(){
    $("#form").addClass("blink")
  setTimeout(()=> {
    $("#form").removeClass("blink")
  },1000)
}

$(".active_form").on("click",function(){
    flipTheCard();
})

// var url2 = window.location.href;

// // url2 = url2[0];
// var urlParams2 = new URLSearchParams(window.location.search); //get all parameters
// var check_page2 = urlParams2.get('form');

// alert(check_page2)
// if (check_page2) {
//     // window.location.href=url2
// }else{
//     // location.reload();
// }


    //   $('#imageInput').change(function () {
    //         // alert("abc");
    //         readURL(this);
    //     })

    //     // preview image before upload
    //     function readURL(input) {

    //         // console.log(input.files)
    //         if (input.files && input.files[0]) {
    //             var reader = new FileReader();
    //             reader.onload = function (e) {
    //                 $('#imagePreview').attr('src', e.target.result);

    //             }
    //             reader.readAsDataURL(input.files[0])
    //             console.log(reader.readAsDataURL(input.files[0])); // convert to base64 string
    //         }
    //     }

</script>
