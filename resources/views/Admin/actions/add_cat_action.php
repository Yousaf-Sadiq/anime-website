<?php

include ("../../config.php");

    if (isset($_POST["submit"]) && !empty($_POST["cat_name"])) {
        
            $name = ucwords(trim($_POST["cat_name"])) ;
            // $image = $_FILES['image']['name'];   
            $image = rand(1,65000)."_".$_FILES['image']['name'];   
            $temp_name = $_FILES['image']['tmp_name']; 

            $check = "SELECT * from categories WHERE cat_name='$name' ";
            $result = mysqli_query($conn, $check);
            $num = mysqli_num_rows($result);            
            if($num>0){
                echo "<script> alert ('Category already exists.') </script>";
                echo "<script> window.open ('../add_category.php','_self') </script>";
            }else{
            
            $target_path="../images/category/".$image;
            $insert_query = "INSERT INTO categories (cat_name, cat_image) VALUES ('$name','$image')";
            $run_query = mysqli_query($conn, $insert_query);

            move_uploaded_file($_FILES['image']['tmp_name'],  $target_path);

            if ($run_query){
                echo "<script> alert ('Category added successfully.') </script>";
                echo "<script> window.open ('../add_category.php','_self') </script>";
            } else{
                echo "<script> alert ('Query Failed.') </script>";
                echo "<script> window.open ('../add_category.php','_self') </script>";
            }
        }

    }else{
                echo "<script> window.open ('../add_category.php','_self') </script>";
          }

?>