<?php

include ("../../config.php");

    if(isset($_GET['u_id'])){
        $id = $_GET['u_id'];
        $query = "DELETE FROM users WHERE id=$id";
        mysqli_query($conn,$query);
        echo "<script> alert('User Deleted.') </script>";
        echo "<script> window.open ('../users.php','_self') </script>";
        } 
?>