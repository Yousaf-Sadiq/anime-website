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
                  <h4 class="card-title">Add New User</h4>
                  <form class="forms-sample" method="POST" action="actions/add_user_action.php" enctype="multipart/form-data">
                    <div class="form-group">
                      <label for="userName">User Name</label>
                      <input type="text" name="user_name" class="form-control" id="userName" placeholder="Enter User Name">
                    </div>
                    <div class="form-group">
                      <label for="usereMail">User Email</label>
                      <input required type="email" name="user_email" class="form-control" id="userEmail" placeholder="Enter User Email">
                    </div>
                    <div class="form-group">
                      <label for="userPass">User Password</label>
                      <input required type="password" name="user_pass" class="form-control" id="userPass" placeholder="Enter User Password">
                    </div>
                    <div class="form-group">
                      <label>Role</label>
                      
                      <select required name="role" class="form-control">
                        <option value="Admin">Admin</option>
                        <option value="customer">Customer</option>
                        <option value="subscriber">Subscriber</option>
                      </select>
                    
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
                  <h2 class="">Users</h2>
                  <div class="table-responsive">
                    <table class="table text-center">
                      <thead>
                        <tr>
                          <th>Sr. No.</th>
                          <th>Name</th>
                          <th>Role</th>
                          <th>Email</th>
                        </tr>
                      </thead>
                      <tbody">
                        <?php
                        $query = "SELECT * FROM users order by `role` asc";
                        $run = mysqli_query($conn,$query);
                        $count = mysqli_num_rows($run);
                        if($count>0){
                          $sr=0;
                        while($row=mysqli_fetch_array($run)){
                          $sr = $sr+1;
                          $u_name = $row['name'];
                          $role = $row['role'];
                          $email = $row['email'];
                          
                          ?>
                          <tr>
                          <td><?php echo $sr ?></td>
                          <td><?php echo $u_name ?></td>
                          <td><?php echo $role ?></td>
                          <td><?php echo $email ?></td>
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
