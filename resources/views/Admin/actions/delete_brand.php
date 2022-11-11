<?php

include ("../../config.php");

    if(isset($_GET['b_id'])){
        // echo "<script> alert('Delete Category?')</script>"
        $b_id = $_GET['b_id'];
        $query = "DELETE FROM brands WHERE id=$b_id";
        mysqli_query($conn,$query);
        echo "<script> alert('Brand Deleted.') </script>";
        echo "<script> window.open ('../all_brands.php','_self') </script>";
        }
    


?>