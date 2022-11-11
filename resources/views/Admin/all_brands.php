<?php

include ("../config.php");
include ("includes/header.php");
include ("includes/top-nav.php");
include ("includes/sidebar.php");

?>



<div class="main-panel">        
    <div class="content-wrapper">
        <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
                <div class="card-body">
                  <h2 class="">All Brands</h2>
                  <div class="table-responsive">
                  <table class="table text-center">
                      <thead>
                        <tr>
                          <th>Sr. No.</th>
                          <th>Logo</th>
                          <th>Name</th>
                          <th>Products</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody">
                        <?php
                        $query = "SELECT * FROM brands order by `id` desc";
                        $run = mysqli_query($conn,$query);
                        $count = mysqli_num_rows($run);
                        if($count>0){
                          $sr=0;
                        while($row=mysqli_fetch_array($run)){
                          $sr = $sr+1;
                          $b_id = $row['id'];
                          $b_name = $row['name'];
                          $logo = $row['logo'];
                          ?>
                          <tr>
                          <td><?php echo $sr ?></td>
                          <td><img src="images/brand/<?php echo $logo?>" style="height:auto;width:70px;border-radius:0;"></td>
                          <td><?php echo $b_name ?></td>
                          <td>
                            <?php
                              $query2 = "SELECT * FROM products WHERE brand_id=$b_id ";
                              $run2 = mysqli_query($conn,$query2);
                              $count2 = mysqli_num_rows($run2);
                              if($count2>0){
                                echo $count2;
                              }else{
                                echo "N/A";
                              }
                            
                            ?>
                          </td>
                          <td><a onclick="return delete_confirmation()" href="actions/delete_brand.php?b_id=<?php echo $b_id?>">Delete</a></td>
                        <?php 
                          } // loop ends
                        } // if ends
                        ?>
                        </tr>                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div> 
        </div>
        </div> 
    </div>
</div>


<?php
include ("includes/footer.php");
?>