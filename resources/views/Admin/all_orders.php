<?php

include ("../config.php");
include("includes/header.php");
include("includes/top-nav.php");
include("includes/sidebar.php");

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
</style>


<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h2 class="">All Orders</h2>
          <div class="table-responsive">
    <div class="mb-3">
      <label for="" class="form-label">Search</label>
      <input type="text" placeholder="Search......." class="form-control" id="myInput" >
      <small id="emailHelpId" class="form-text text-muted">type here for searching records</small>
    </div>

    <div class="mb-3">
      <label for="" class="form-label">Status</label>
      <select class="form-select" id="myInput_2" name="" id="">
        <option selected>Select one</option>
        <option value="2">On Hold</option>
        <option value="0">Pending</option>
        <option value="1">Completed</option>
        <option value="3">Refunded</option>
        <option value="4">Shipped</option>
      </select>
    </div>
            <table class="table text-center" id="myTable">
              <thead>
                <tr>
                  <th>Sr#</th>
                  <th>Order ID</th>
                  <th>Customer</th>
                  <!-- <th>Products</th> -->
                  <th>Total</th>
                  <th>Status</th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody">
                <?php

                //Code to check if by default pagination query variable exists or not in URL
                if (!isset($_GET['page'])) {
                  $page = 1;
                } else {
                  $page = $_GET['page'];
                }

                $limit = 1; //TO
                $offset = ($page - 1) * $limit; //From
if (isset($_GET["status"])) {
  
  echo $query = "SELECT * FROM Orders o JOIN users u ON o.user_id=u.id  where o.status='{$_GET["status"]}' order by o.oid desc LIMIT {$offset},{$limit}  ";
  $run = mysqli_query($conn, $query);
  $count = mysqli_num_rows($run);
  $record = "SELECT * FROM Orders o JOIN users u ON o.user_id=u.id where o.status='{$_GET["status"]}' ";
}

                $query = "SELECT * FROM Orders o JOIN users u ON o.user_id=u.id order by o.oid desc LIMIT {$offset},{$limit}  ";
                $run = mysqli_query($conn, $query);
                $count = mysqli_num_rows($run);
                $record = "SELECT * FROM Orders o JOIN users u ON o.user_id=u.id ";
                $record_run = mysqli_query($conn, $record);
                $record_count = mysqli_num_rows($record_run);

                $number_of_page = ceil($record_count / $limit); //formula to create pages

                if ($record_count > 0) {
                  $sr = 0;
                  while ($row = mysqli_fetch_array($run)) {
                    $sr = $sr + 1;
                    $order_id = $row['oid'];
                    $user = $row['user_id'];
                    if($status = $row['status']==0){
                      $status = "Pending";
                  }elseif($status = $row['status']==1){
                      $status="Completed";
                  }elseif($status = $row['status']==2){
                      $status="On Hold";
                  }elseif($status = $row['status']==3){
                      $status="Refunded";
                  }elseif($status = $row['status']==4){
                      $status="Shipped";
                  }
                    //converting product ids into array
                    $products = $row['p_id'];
                    $products = explode(',', $products);
                    $products = array_filter($products);
                    //converting quantities into array
                    $qty_order = $row['qty'];
                    $qty_order = explode(',', $qty_order);
                    $qty_order = array_filter($qty_order);
                    //converting sell prices into array
                    $sell_order = $row['sell'];
                    $sell_order = explode(',', $sell_order);
                    $sell_order = array_filter($sell_order);
                    
                    $sell = $row['qty'];
                    $sell = explode(',', $sell);
                    $sell = array_filter($sell);
                    
                    $total = $row['total'];
                    $u_name = $row['name'];
                    $u_addr = $row['address'];
                ?>
                    <tr>
                      <td><?php echo $sr ?></td>
                      <td><?php echo $order_id ?></td>
                      <td>
                        <?php echo $u_name ?><br>
                        <?php echo $u_addr ?><br>
                      </td>
                      <td>$<?php echo $total ?></td>
                      <td><?php echo $status ?></td>
                      <td><a href="order-details.php?oid=<?php echo $order_id ?>">View Order</a></td>
                    </tr>
                <?php
                  } // loop ends
                } // if ends
                ?>
                </tbody>
            </table>


            <div class="fsl_pagination">
              <div class="btn-group" role="group" aria-label="Basic example">
              </div>

              <?php
              if ($page > 1) {
                $prev = $page - 1;

              ?>
                <a href="all_orders.php.php?page=<?php echo $prev ?>">
                  <button type="button" class="btn btn-outline-secondary btn-sm">Prev</button>
                </a>
              <?php

              }

              ?>

              <!-- =========================page number===================== -->
              <?php
              for ($pages = 1; $pages <= $number_of_page; $pages++) {
                if ($page == $pages) {
                  $active = "active_2";
                } else {
                  $active = " ";
                }
              ?>
                <a href="all_orders.php?page=<?php echo $pages ?>">
                  <button type="button" class="btn btn-outline-secondary btn-sm <?php echo $active; ?> "><?php echo $pages ?></button>
                </a>
              <?php
              }
              ?>
              <!-- ===================================================page number===================================== -->

              <?php

              if ($page < $number_of_page) {
                # code...
                $page = $page + 1;

              ?>
                <a href="all_orders.php?page=<?php echo $page ?>">
                  <button type="button" class="btn btn-outline-secondary btn-sm">NEXT</button>
                </a>
              <?php

              }

              ?>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<?php
include("includes/footer.php");
?>

<script>
$(document).ready(function(){
  $("#myInput_2").on("change", function() {
    var value = $(this).val();
    // $("#myTable tr").filter(function() {
    //   $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    // });var url_string = "http://www.example.com/t.html?a=1&b=3&c=m2-m3-m4-m5"; //window.location.href

// alert(c)

// pagination is set or not
function checking_page_URI() {

  var field = 'page';

  var url = window.location.href;

if(url.indexOf('?' + field + '=') != -1)
    return true;
else if(url.indexOf('&' + field + '=') != -1)
    return true;
return false

}
// status is set or not
function check_status_URI() {
  var url = new URL($(location).attr('href'));
var c = url.searchParams.get("status");
if (c== null) {
  return false
}
else{
  return true
}

}

// ===============================================

if (checking_page_URI()) {
  // ===============check_status_URI() start==========================
if (check_status_URI()) {

var uri = window.location.toString();

	if (uri.indexOf("&&") > 0) {
	    var clean_uri = uri.substring(0, uri.indexOf("&&"))
	    window.history.replaceState({}, document.title, clean_uri);
	}

  window.location=$(location).attr('href')+"&&status="+value;
}
else{
  
  window.location=$(location).attr('href')+"&&status="+value;
}
// ===============check_status_URI() end==============================
}
else{
  window.location=$(location).attr('href')+"?status="+value;
}
  });
});
</script>