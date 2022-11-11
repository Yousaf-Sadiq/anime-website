<?php

    define ("hostName","localhost");
    define ("userName","root");
    define ("password","");
    define ("db","websiteone");

    $conn = mysqli_connect("localhost","root","","websiteone");

    if(!$conn){
        echo mysqli_connect_error($conn);
        die();
    }else{
        
        session_start();
    }


?>

    