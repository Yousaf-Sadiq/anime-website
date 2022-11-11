<x-admin_header />
{{-- <x-top_nav /> --}}
<x-dashboard-Nav2></x-dashboard-Nav2>
<x-sidebar />

<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-8 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Update User Status</h4>
                        <form class="forms-sample" method="POST" action="{{url("/")}}/Edit_admin_user/{{$edit_user[0]->id}}"
                            enctype="multipart/form-data">
                            @csrf
                                <input type="hidden" name="user_id" value="{{$edit_user[0]->id}}" id="">

                            <!-- Gallary Images -->
                            <div class="mb-3">
                                <label for="" class="form-label">Anime Status</label>
                                <select class="form-select form-select-md" name="user_status" id="">
                                    <option value="" selected disabled>select anyone</option>
                                    <option value="0">InActive</option>
                                    <option value="1">Active</option>

                                </select>
                                @error("user_status")
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                                @enderror
                            </div>

                            <button type="submit" name="publish" class="btn btn-primary me-2">Update Status</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<x-admin_footer />



