<?php
// action file
include ("../../config.php");

 if( isset($_POST['product_cat'])){

    $cat = $_POST['product_cat'];

  $sql="SELECT * FROM subcategories WHERE parent_id= $cat";
  $run = mysqli_query($conn,$sql);

    $output = [];

    if (mysqli_num_rows($run) > 0) {
  
      $mysub_categorys = array();


      while ($sub_category = mysqli_fetch_assoc($run)) {
        array_push($mysub_categorys,$sub_category);         
      }

      
      $output['sub_category'] = $mysub_categorys;
    }
  else{
    $output['sub_category'] =[];
  }


    echo json_encode($output);
}

?>