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
                  <h2 class="">Registered Users</h2><br>
                  <div class="table-responsive">
                  <table class="table text-center">
                      <thead>
                        <tr>
                          <th>Sr. No.</th>
                          <th>Role</th>
                          <th>Name</th>
                          <th>Email</th>
                          <th>Phone</th>
                          <th>Location</th>
                          <th>Spent ($)</th>
                          <th>Actions</th>
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
                          $id = $row['id'];
                          $name = $row['name'];
                          $role = $row['role'];
                          $email = $row['email'];
                          $city = $row['city'];
                          $country = $row['country'];
                          $phone = $row['phone'];
                          $addr = $row['address'];
                          $spent = $row['spent'];
                          ?>
                          <tr>
                          <td><?php echo $sr ?></td>
                          <td><?php echo $role ?></td>
                          <td><?php echo $name ?></td>
                          <td><?php echo $email ?></td>
                          <td><?php echo $phone ?></td>
                          <td><?php echo $city ?>, <?php echo $country ?></td>
                          <td><?php echo $spent ?></td>
                          <td><a href="edit_user.php?u_id=<?php echo $id?>">Edit</a> | <a onclick="return delete_confirmation()" href="actions/delete_user_action.php?u_id=<?php echo $id?>">Delete</a></td>
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