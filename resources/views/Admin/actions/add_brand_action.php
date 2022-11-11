<?php

include ("../../config.php");

    if (isset($_POST["submit"]) && !empty($_POST["b_name"])) {
        
            $name = ucwords(trim($_POST["b_name"])) ;
            // $image = $_FILES['image']['name'];   
            $image = rand(1,65000)."_".$_FILES['logo']['name'];   
            $temp_name = $_FILES['logo']['tmp_name']; 

            $check = "SELECT * from brands WHERE `name`='$name' ";
            $result = mysqli_query($conn, $check);
            $num = mysqli_num_rows($result);            
            if($num>0){
                echo "<script> alert ('Brand name already exists.') </script>";
                echo "<script> window.open ('../add_brand.php','_self') </script>";
            }else{
            
            $target_path="../images/brand/".$image;
            $insert_query = "INSERT INTO brands (`name`, `logo`) VALUES ('$name','$image')";
            $run_query = mysqli_query($conn, $insert_query);

            move_uploaded_file($_FILES['logo']['tmp_name'],  $target_path);

            if ($run_query){
                echo "<script> alert ('Brand added successfully.') </script>";
                echo "<script> window.open ('../add_brand.php','_self') </script>";
            } else{
                echo "<script> alert ('Query Failed.') </script>";
                echo "<script> window.open ('../add_brand.php','_self') </script>";
            }
        }

    }else{
                echo "<script> window.open ('../add_brand.php','_self') </script>";
          }

?>