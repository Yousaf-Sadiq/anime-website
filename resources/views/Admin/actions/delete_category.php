<?php

include ("../../config.php");

    if(isset($_GET['cat_id'])){
        $cat_id = $_GET['cat_id'];
        $query = "DELETE FROM categories WHERE id=$cat_id";
        mysqli_query($conn,$query);
        echo "<script> alert('Category Deleted.') </script>";
        echo "<script> window.open ('../add_category.php','_self') </script>";
        } 
?>