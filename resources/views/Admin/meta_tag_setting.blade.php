<x-admin_header />
{{-- <x-top_nav/> --}}
<x-dashboard-Nav2></x-dashboard-Nav2>
<x-sidebar />
<link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="preload" as="style"
    onload="this.onload=null;this.rel='stylesheet'" />
</head>
{{-- {{pre($anime_data[0]->title)}} --}}
<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">

                    <div class="card-body">
                        <h4 class="card-title">Meta Tag setting </h4>
                        <form class="forms-sample" method="POST" action="{{ url('/meta-tag-insert') }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="CategoryName">Anime page title</label>
                                <input type="text" name="meta_title" class="form-control" id="CategoryName"
                                    placeholder="Enter Category Title" autofocus>
                                @error('meta_title')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="CategoryName">Anime page description</label>
                                <textarea class="anime_desc  form-control h-25" id="summernote" name="meta_description"
                                    placeholder="Enter meta description here...">
                                </textarea>
                                @error('meta_description')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="CategoryName">Meta keywords</label>
                                <textarea type="text" class="form-control h-100 " data-role="tagsinput" name="meta_keyword">
                                </textarea>

                                @error('meta_keyword')
                                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label class="mb-2">OF which Anime page</label><br>
                                <select class="form-control" name="anime_page" id="product_category" required>
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
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h2 class="">Meta tags</h2>
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
                                        <th>In Anime page </th>
                                        <th>Meta title </th>
                                        <th>Meta keywords</th>
                                        <th>Meta Description</th>
                                        <th>Updated At</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $i = 1;
                                    $count_all_data = count($all_datas);

                                    ?>
                                    @foreach ($all_datas as $anime_category)
                                        <tr>
                                            {{-- {{$anime_category['meta_keyword']}} --}}
                                            <td>{{ $i }}</td>
                                            <td>{{ $anime_category['anime_title'] }}</td>
                                            <td>{{ $anime_category['meta_title'] }}</td>
                                            <td>
                                                {{-- <input type="text" value="meta_keyword_table{{ $i }}" > --}}
                                                <button type="button" class="btn btn-sm btn-primary  model_button"
                                                    data-bs-keywords="meta_keyword_table{{ $i }}"
                                                    data-bs-target="#exampleModal{{ $i }}">
                                                    Meta keywords
                                                </button>


                                                {{-- data-bs-target="#exampleModal{{ $i }}" --}}
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{ $i }}"
                                                    tabindex="-1"
                                                    aria-labelledby="exampleModalLabel{{ $i }}"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title"
                                                                    id="exampleModalLabel{{ $i }}">
                                                                    Your Meta keywords</h5>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="text"
                                                                    class="w-100 form-control meta_keyword_table"
                                                                    value="{{ $anime_category['meta_keywords'] }}"
                                                                    disabled
                                                                    name="meta_keyword_table{{ $i }}"
                                                                    id="meta_keyword_table{{ $i }}" />

                                                            </div>
                                                            {{-- <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Close</button>
                                                            </div> --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>

                                            <td>
                                                <a href="{{ url('/meta-description/') }}/{{ $anime_category['id'] }}"
                                                    class="btn btn-sm btn-primary">
                                                    Click to see description
                                                </a>
                                            </td>
                                            <td>{{ $anime_category['updated_at'] }}</td>
                                            <td> <a class="btn btn-md btn-info"
                                                    href="{{ url('Edit-meta-tag/') }}/{{ $anime_category['id'] }}">Edit</a>
                                            </td>
                                            <td> <a class="btn btn-md btn-danger delete"
                                                    data-delete-id="{{ $anime_category['id'] }}"
                                                    href="">Delete</a> </td>
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


    $(".model_button").on("click", function() {
        // data-bs-keywords="meta_keyword_table{{ $i }}"
        //data-bs-target="#exampleModal{{ $i }}"
        var model_target = $(this).attr("data-bs-target")
        var model_input_target = $(this).attr("data-bs-keywords")
        $(model_target).modal("show");

        var input2 = document.querySelector("#" + model_input_target);


        new Tagify(input2)


    })


    // initialize Tagify on the above input node reference
</script>

<script>
    $(".delete").on("click", function() {

        if (confirm("are you sure")) {
            var delete_id = $(this).attr("data-delete-id");
            $(this).attr("href", "{{ url('Delete-anime-category/') }}/" + delete_id)
        }


    })
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
