<?php


include("../config.php");
if(isset($_GET['o_id'])){
    $o_id = $_GET['o_id'];
    $sql = "DELETE FROM orders WHERE oid=$o_id";
    $run = mysqli_query($conn, $sql);
    if($run){
        header("Location: all_orders.php");
    }else{
        header("Location: all_orders.php");
    } 
}

?>