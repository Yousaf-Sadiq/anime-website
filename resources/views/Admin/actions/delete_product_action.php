<?php

include ("../../config.php");

    if(isset($_GET['p_id'])){
        $p_id = $_GET['p_id'];
        $query = "DELETE FROM products WHERE id=$p_id";
        mysqli_query($conn,$query);
        echo "<script> alert('Product Deleted.') </script>";
        echo "<script> window.open ('../all_products.php','_self') </script>";
        } 
?>