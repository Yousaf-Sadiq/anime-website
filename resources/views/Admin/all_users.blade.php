<x-admin_header />
{{-- <x-top_nav /> --}}
<x-dashboard-Nav2></x-dashboard-Nav2>
<x-sidebar />


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
          <h2 class="">All Users</h2>
          <div class="table-responsive">
{{-- {{pre($all_user)}} --}}
            <table class="table table-hover text-center">
                @if (session("update_status"))
                <caption class="alert alert-success">{{session("update_status")}} </caption>
                @elseif (session("insert_status"))
                <caption class="alert alert-success">{{session("insert_status")}} </caption>
                @elseif (session("fetching_error"))
                <caption class="alert alert-danger">{{session("fetching_error")}} </caption>
                @elseif (session("error_edit"))
                <caption class="alert alert-danger">{{session("error_edit")}} </caption>
 @elseif (session("data_invalid"))
                <caption class="alert alert-danger">{{session("data_invalid")}} </caption>
 @elseif (session("updating_anime_data"))
                <caption class="alert alert-danger">{{session("updating_anime_data")}} </caption>
@elseif (session("deleted"))
                <caption class="alert alert-success">{{session("deleted")}} </caption>
@elseif (session("delete_invalid"))
                <caption class="alert alert-danger">{{session("delete_invalid")}} </caption>

                @endif

              <thead>
                <tr>
                  <th class="sr_wrap">Sr. No.</th>
                  <th>Image</th>
                  <th>User name</th>
                  <th>Email</th>
                  <th>Created at</th>
                  <th>Updated at</th>
                  <th>Status</th>
                  <th>Actions</th>

                </tr>
              </thead>
              <tbody>
                <?php
                    $i=1;
                    ?>
@foreach ($all_user as $all_users )

                    <tr>
                      <td class="sr_wrap">{{$i}}</td>
                      <td>
                        <a  href="{{Storage::url('profile') }}/{{$all_users->profile}}" >
                        <img src="{{Storage::url('profile') }}/{{$all_users->profile}}" style="height:70px;width:70px;">
                        </a>
                    </td>
                      <td class="sr_wrap">{{$all_users->user_name}}</td>
                      <td class="sr_wrap">{{$all_users->email}}</td>
                      <td class="sr_wrap"> {{$all_users->created_at}}</td>
                      <td class="sr_wrap"> {{$all_users->updated_at}}</td>
                      <td class="sr_wrap">
                        @if ($all_users->status==0)
                        <div class="alert alert-danger" role="alert">
                            <strong>InActive</strong>
                        </div>
                        @else

<div class="alert alert-success" role="alert">
                            <strong>Active</strong>
                        </div>
                        @endif
                        </td>
                      <td><a href="{{url("Edit-admin-user/")}}/{{$all_users->id}}?name={{$all_users->user_name}}" class="btn btn-md btn-info">Edit</a>
                        | <a  class="btn btn-md btn-danger delete" data-delete-id="{{$all_users->id}}" href="" >Delete</a></td>
                    </tr>
<?php
$i++;
?>
                    @endforeach
                </tbody>
            </table>
            {{ $all_user->links('vendor.pagination.bootstrap-5') }}

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<x-admin_footer />
<script>
$(".delete").on("click",function(){

    if(confirm("are you sure")){
        var delete_id=$(this).attr("data-delete-id");
$(this).attr("href","{{url('/delete_admin_user')}}/"+delete_id)
    }


})
</script>
