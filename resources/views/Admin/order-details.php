<?php

include("../config.php");
include("includes/header.php");
include("includes/top-nav.php");
include("includes/sidebar.php");

if (isset($_GET['oid'])) {
    $oid = $_GET['oid'];
    $record = "SELECT * FROM Orders o JOIN users u ON o.user_id=u.id WHERE o.oid=$oid";
    $record_run = mysqli_query($conn, $record);
    $row = mysqli_fetch_array($record_run);
    // $sr = $sr + 1;
    // $order_id = $row['oid'];
    $user = $row['user_id'];
    if ($status = $row['status'] == 0) {
        $status = "Pending";
    } elseif ($status = $row['status'] == 1) {
        $status = "Completed";
    } elseif ($status = $row['status'] == 2) {
        $status = "On Hold";
    } elseif ($status = $row['status'] == 3) {
        $status = "Refunded";
    } elseif ($status = $row['status'] == 4) {
        $status = "Shipped";
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
    $sell = $row['sell'];
    $sell = explode(',', $sell);
    $sell = array_filter($sell);

    $total = $row['total'];

    //fetching user details
    $u_name = $row['name'];
    $u_phone = $row['phone'];
    $u_addr = $row['address'];
    $u_email = $row['email'];
}


?>

<style>
    td {
        width: 100px;
        padding: 10px 5px;
        /* border: 1px solid black; */
    }

    td,
    th {
        text-align: center;
    }

    th {
        height: 50px;
    }

    .table-head {
        background-color: #F4F5F7;
        color: #000;
    }

    .details-container {
        padding: 50px;
    }

    .status {
        height: 30px;
    }

    .thumbnail {
        width: 50px;
        height: 50px;
        border: 1px solid black;
        border-radius: 100%;
        /* box-shadow: 2px 2px 2px gray; */
    }

    .image_wrap {
        width: 60px;
        /* background-color: red; */
    }
</style>

<div class="details-container">
    <ul class="list-group list-group-flush">
        <li class="list-group-item h4">ORDER ID : <b><?php echo $oid ?></b></li>
        <li class="list-group-item">ORDER STATUS : <b><?php echo $status ?></b><br>
            Change Status :
            <select id="status" class="status">
                <option value="">Select Status</option>
                <option value="0">Pending</option>
                <option value="1">Completed</option>
                <option value="2">On Hold</option>
                <option value="3">Refunded</option>
                <option value="4">Shipped</option>
            </select>
            <input type="hidden" id="oid" value="<?php echo $oid ?>">
        </li>
        <li class="list-group-item">Customer Details :<b><br><?php echo $u_name ?><br><?php echo $u_addr ?><br><?php echo $u_phone ?><br><?php echo $u_email ?><br></b></li>
        <li class="list-group-item">
            <table>
                <thead class="table-head">
                    <tr>
                        <th>Sr.</th>
                        <th class="image_wrap">Image</th>
                        <th>ID#</th>
                        <th>Title</th>
                        <th>QTY</th>
                        <th>Price</th>
                        <th>Amount</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody class="table-body">
                    <?php
                    $num = 0;
                    for ($i = 0; $i < count($products); $i++) {
                        $num = $num + 1;
                        $pros = mysqli_query($conn, "SELECT * FROM `products` where id='$products[$i]'");
                        $p_row = mysqli_fetch_array($pros);
                        $title = $p_row['title'];
                        $pid = $p_row['id'];
                        $image = $p_row['main_image'];
                        $stock = $p_row['stock'];
                    ?>
                        <tr>
                            <td><?php echo $num ?></td>
                            <td class="image_wrap"><img class="thumbnail" src="../images/product/<?php echo $image ?>"></td>
                            <td><?php echo $pid ?></td>
                            <td class="title"><?php echo $title ?></td>
                            <td><?php echo $qty_order[$i] ?></td>
                            <td><?php echo $sell[$i] ?></td>
                            <td>$<?php echo $sell[$i] * $qty_order[$i] ?></td>
                            <td><?php echo $stock ?> Units</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?php
            ?>
        </li>
        <li class="list-group-item">ORDER AMOUNT : <b class="h4">$<?php echo $total ?></b></li>
        <li class="list-group-item">PAYMENT METHOD : <b class="">PAYPAL</b></li>
        <li class="list-group-item">DELETE ORDER : <a href="delete_order.php?o_id=<?php echo $oid?>">DELETE</a></li>
    </ul>
</div>

<script>
</script>

<?php
include("includes/footer.php");
?>

<script>
    $('#status').change(function() {
        var oid = $('#oid').val();
        var status = $('#status option:selected').val();
        $.ajax({
            url: "ajax_update_order_status_action.php",
            type: "POST",
            data: {
                oid: oid,
                status: status
            },
            success: function(data) {
                alert("Order Status Updated.");
                window.open("order-details.php?oid=<?php echo $oid ?>", "_SELF");
            }

        });
    });
</script>