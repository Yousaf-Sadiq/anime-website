<?php

include ("../config.php");
include ("includes/header.php");
include ("includes/top-nav.php");
include ("includes/sidebar.php");

?>




<div class="main-panel">        
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-4 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Add New Sub-Category</h4>
                  <form class="forms-sample" method="POST" action="actions/add_subcat_action.php" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="CategoryName">Sub-Category Name</label>
                      <input type="text" name="subcat_name" class="form-control" id="CategoryName" placeholder="Enter Category Title">
                    </div>
                    <div class="form-group">
                      <label for="CategoryName">Parent Category</label>
                      
                      <select class="form-control" name="parent_cat"><?php 
                      $check = "SELECT * FROM categories";
                      $result = mysqli_query($conn, $check);
                      $num = mysqli_num_rows($result);            
                      if($num<1){
                        echo "<option disabled>Not Available</option>";
                      }else{
                        while($row=mysqli_fetch_array($result)){
                            $category_id = $row['id'];
                            $category_name = $row['cat_name'];
                          ?>
                          <option value="<?php echo $category_id ?>"><?php echo $category_name ?></option>
                        <?php
                        }
                      }
                      ?></select>
                    
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                    <!-- <button class="btn btn-light">Cancel</button> -->
                  </form>
                </div>
              </div>
            </div>
        <div class="col-md-8 grid-margin stretch-card">
        <div class="card">
                <div class="card-body">
                  <h2 class="">Sub-Categories</h2>
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
                        $query = "SELECT * FROM subcategories order by `id` desc";
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
                          <td><a href="actions/delete_subcategory_action.php?subcat_id=<?php echo $subcat_id?>" onclick="return delete_confirmation()">Delete</a></td>
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
