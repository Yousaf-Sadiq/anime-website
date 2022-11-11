<?php

include ("../../config.php");

    if (isset($_POST["submit"])) {
        
            $name = ucwords(trim($_POST["user_name"])) ;
            $role  = $_POST['role'];
            $email  = $_POST['user_email'];
            $pass1  = $_POST['user_pass'];
            $pass  = password_hash($pass1, PASSWORD_DEFAULT);

            $check = "SELECT * from users WHERE email = '$email' ";
            $result = mysqli_query($conn, $check);
            $num = mysqli_num_rows($result);            
            if($num==0){
                $insert_query = "INSERT INTO users (`name`,`role`,`email`,`password`) VALUES ('$name','$role', '$email','$pass')";
                $run_query = mysqli_query($conn, $insert_query);
                if($run_query){
                    echo "<script> alert ('User added successfully.') </script>";
                    echo "<script> window.open ('../add_user.php','_self') </script>";
                
                }else{
                    echo "<script> alert ('Query Failed.') </script>";
                    echo "<script> window.open ('../add_user.php','_self') </script>";
                }
            }else{
                
                echo "<script> alert('Email already registered.') </script>";
                echo "<script> window.open ('../add_user.php','_self') </script>";
            }                       
            
        }
            

?>