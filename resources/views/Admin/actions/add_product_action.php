<?php

include ("../../config.php");
    if (isset($_POST["publish"])) {
        
            $title = $_POST['title'];   
            $price = $_POST['price']; 
            $sale_price = $_POST['s_price']; 
            $shipping = $_POST['shipping']; 
            $s_desc = $_POST['s_desc']; 
            $category = $_POST['category']; 
            $sub_category_id = $_POST['sub_category_id']; 
            $brand = $_POST['brand'];
            $stock = $_POST['stock'];

            date_default_timezone_set('Asia/Karachi');
            $posted = date('Y-m-d h:i:s'); 

            $main_image = rand(1,65000)."_".$_FILES['main_image']['name'];      
            $temp_name = $_FILES['main_image']['tmp_name'];
            

            $image1 = rand(1,65001)."_1_".$_FILES['image1']['name'];      
            $temp_name1 = $_FILES['image1']['tmp_name'];

            $image2 = rand(1,65002)."_2_".$_FILES['image2']['name'];      
            $temp_name2 = $_FILES['image2']['tmp_name'];

            $image3 = rand(1,65003)."_3_".$_FILES['image3']['name'];      
            $temp_name3 = $_FILES['image3']['tmp_name'];

            $target_path="../../images/product/".$main_image;
            $target_path1="../../images/product/".$image1;
            $target_path2="../../images/product/".$image2;
            $target_path3="../../images/product/".$image3;
            
            $file_name=rand(1,65000)."_"."long_des.txt";
            $l_desc = $_POST["l_desc"];
            $myfile = fopen("../../descriptions/{$file_name}", "w") or die("Unable to open file!");
            fwrite($myfile, $l_desc);       
            fclose($myfile);
          
            $insert_query = "INSERT INTO products (`title`, `price`,`sale_price`,`shipping`,`s_desc`,`l_desc`,`category`,`sub_cat`,`stock`,`main_image`,`image1`,`image2`,`image3`,`brand_id`,`posted`) VALUES ('$title', '$price', '$sale_price', '$shipping', '$s_desc','$file_name','$category','$sub_category_id','$stock','$main_image','$image1','$image2','$image3','$brand', '$posted')";
             $run_query = mysqli_query($conn, $insert_query);

            if ($run_query){
                echo "<script> alert ('Product Published successfully.') </script>";
                echo "<script> window.open ('../add_product.php','_self') </script>";
                move_uploaded_file($_FILES['main_image']['tmp_name'],  $target_path);
                move_uploaded_file($temp_name1,  $target_path1);
                move_uploaded_file($temp_name2,  $target_path2);
                move_uploaded_file($temp_name3,  $target_path3);
            } else{
                echo "<script> alert ('Query Failed.') </script>";
                echo "<script> window.open ('../add_product.php','_self') </script>";
            }
        

    }else{
                echo "<script> window.open ('../add_product.php','_self') </script>";

                
               
          }

?>