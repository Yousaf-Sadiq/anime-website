<x-admin_header />
{{-- <x-top_nav/> --}}
<x-dashboard-Nav2></x-dashboard-Nav2>
<x-sidebar />
<link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="preload" as="style"
    onload="this.onload=null;this.rel='stylesheet'" />
</head>
{{-- {{pre($edit_data->meta_keywords)}} --}}
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title">Meta Tag setting </h4>
                        <form class="forms-sample" method="POST" action="{{url('/meta-tag-edit') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="meta_id" value="{{ $edit_data->id }}" id="">
                            <div class="form-group">
                                <label for="CategoryName">Anime page title</label>
                                <input type="text" name="meta_title" value="{{ $edit_data->meta_title }}"
                                    class="form-control" id="CategoryName" placeholder="Enter Category Title" autofocus>
                                @error('meta_title')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="CategoryName">Anime page description</label>
                                <textarea class="anime_desc  form-control h-25" id="summernote" name="meta_description"
                                    placeholder="Enter meta description here...">
{{ Storage::get('meta_tag/' . $edit_data->meta_description) }}
                                </textarea>
                                @error('meta_description')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="CategoryName">Meta keywords</label>
                                <textarea type="text" class="form-control h-100 " data-role="tagsinput" name="meta_keyword">
                                    {{ $edit_data->meta_keywords }}
                                </textarea>

                                @error('meta_keyword')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="mb-2">OF which Anime page</label><br>
                                <select class="form-control" name="anime_page" id="product_category" >
                                    <option value="" selected disabled>Select any one</option>
                                    @foreach ($anime_data as $anime_cat)
                                        <option value="{{ $anime_cat->flid }}">{{ $anime_cat->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('anime_page')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                            <!-- <button class="btn btn-light">Cancel</button> -->
                        </form>

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
        $('#summernote').summernote();
    });
</script>
<script src="https://unpkg.com/@yaireo/tagify"></script>
<script src="https://unpkg.com/@yaireo/tagify@3.1.0/dist/tagify.polyfills.min.js"></script>
<script>
    // The DOM element you wish to replace with Tagify
    var input = document.querySelector('textarea[name=meta_keyword]');

    // initialize Tagify on the above input node reference
    new Tagify(input)





    // initialize Tagify on the above input node reference
</script>

<script>
    $('#imageInput').change(function() {
        // alert("abc");
        readURL(this);
    })

    // preview image before upload
    function readURL(input) {

        // console.log(input.files)
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
