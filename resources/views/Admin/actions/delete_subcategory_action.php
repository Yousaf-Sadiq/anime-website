<?php

include ("../../config.php");

    if(isset($_GET['subcat_id'])){
        $subcat_id = $_GET['subcat_id'];
        $query = "DELETE FROM subcategories WHERE id=$subcat_id";
        mysqli_query($conn,$query);
        echo "<script> alert('Sub-Category Deleted.') </script>";
        echo "<script> window.open ('../add_subcategory.php','_self') </script>";
        } 
?>