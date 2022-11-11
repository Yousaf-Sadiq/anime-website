<?php
// if (!isset($_SESSION['admin_email'])){
//   echo "<script> alert('Please Login.') </script>";
//   echo "<script> window.open('login.php','_SELF') </script>";

// }
// ini_set('memory_limit', '1024M')
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>Admin Panel</title>
  <!-- plugins:css -->
  <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{ url('css/vendors/feather/feather.css')}}">
  <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'"" href="{{ url('css/vendors/mdi/css/materialdesignicons.min.css')}}">
  <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{ url('css/vendors/ti-icons/css/themify-icons.css')}}">
  <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{ url('css/vendors/typicons/typicons.css')}}">
  <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{ url('css/vendors/simple-line-icons/css/simple-line-icons.css')}}">
  <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{ url('css/vendors/css/vendor.bundle.base.css')}}">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'">
  <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{ url('css/vendors/datatables.net-bs4/dataTables.bootstrap4.css')}}">

  <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{ url('js/js/select.dataTables.min.css')}}">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="preload" as="style" onload="this.onload=null;this.rel='stylesheet'" href="{{ url('css/css/vertical-layout-light/style.css')}}">

  <!-- endinject -->
  <link rel="preload" as="style" onload="this.onload=null;this.rel='shortcut icon'"  href="{{Storage::url('images/favicon.png')}}" />

  <!-- <script src="js_functions.js"></script> -->
</head>
<body >
    <style>
       #mySpinner{
  width:100%;
  height:100%;
  position:fixed;
  z-index:999;
  background:#F4F5F7;
  left:0;
  top:0;
}

@keyframes spinner {
from {transform:rotate(0deg);}
to {transform: rotate(360deg);}
}
.spinner:before {
  content: '';
  box-sizing: border-box;
  position: absolute;
  top: 47%;
  left: 47%;
  width: 50px;
  height: 50px;
  margin-top: -15px;
  margin-left: -15px;
  border-radius: 50%;
  border: 1px solid #ccc;
  border-top-color: #07d;
  animation: spinner .6s linear infinite;
}
    </style>
    <div id="mySpinner">

    </div>
  <div class="container-scroller">

