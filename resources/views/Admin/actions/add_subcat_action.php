<?php

include ("../../config.php");

    if (isset($_POST["submit"]) && !empty($_POST["subcat_name"])) {
        
            $subcat_name = ucwords(trim($_POST["subcat_name"])) ;
            $parent_cat  = $_POST['parent_cat'];

            $check = "SELECT * from categories WHERE id=$parent_cat ";
            $result = mysqli_query($conn, $check);
            $num = mysqli_num_rows($result);            
            if($num>0){
                while($row=mysqli_fetch_array($result)){
                $parent_name = $row['cat_name'];
                $insert_query = "INSERT INTO subcategories (`subcategory_name`, `parent_id`,`parent_name`) VALUES ('$subcat_name',$parent_cat, '$parent_name')";
            $run_query = mysqli_query($conn, $insert_query);
            if ($run_query){
                echo "<script> alert ('Sub-Category added successfully.') </script>";
                echo "<script> window.open ('../add_subcategory.php','_self') </script>";
            } else{
                echo "<script> alert ('Query Failed.') </script>";
                echo "<script> window.open ('../add_subcategory.php','_self') </script>";
            }
                }
            }
                        
            
        }
            

?>