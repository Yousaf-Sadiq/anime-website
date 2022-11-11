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
                  <h2 class="">All Subcategories</h2>
                  <div class="table-responsive">
                  <table class="table text-center">
                      <thead>
                        <tr>
                          <th>Sr. No.</th>
                          <th>Subcategory</th>
                          <th>Parent Category</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody">
                        <?php
                        $query = "SELECT * FROM subcategories order by `parent_name` asc";
                        $run = mysqli_query($conn,$query);
                        $count = mysqli_num_rows($run);
                        if($count>0){
                          $sr=0;
                        while($row=mysqli_fetch_array($run)){
                          $sr = $sr+1;
                          $subcategory_name = $row['subcategory_name'];
                          $subcat_id = $row['id'];
                          $parent_name = $row['parent_name'];
                          
                          ?>
                          <tr>
                          <td><?php echo $sr ?></td>
                          <td><?php echo $subcategory_name ?></td>
                          <td><?php echo $parent_name ?></td>
                          <td>Edit | <a href="actions/delete_subcategory_action.php?subcat_id=<?php echo $subcat_id?>" onclick="return delete_confirmation()">Delete</a></td>
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