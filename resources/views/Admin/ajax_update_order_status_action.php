<?php

include ("../config.php");

    $oid = $_POST['oid'];
    $status = $_POST['status'];
    $sql = mysqli_query($conn,"UPDATE orders SET `status`=$status WHERE `oid`='$oid'");
    if($sql){
        echo 1;
    }else{
        echo 0;
    }
     