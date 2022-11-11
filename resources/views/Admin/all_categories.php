<?php

include ("../config.php");
include("includes/header.php");
include("includes/top-nav.php");
include("includes/sidebar.php");

?>
<style>
  .fsl_pagination {
    display: flex;
    flex-direction: row;
    justify-content: center;
    align-items: center;
  }

  .btn {
    color: #000;
  }

  .btn:hover {
    color: #000;
  }

  .active_2 {
    background-color: #000 !important;
    color: #fff !important;
    transition: .5s all ease-in-out;
    /* border:none; */
  }

  .active_2:hover {
    background-color: black !important;
    color: #fff !important;

  }
</style>



<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <h2 class="">All Categories</h2>
          <div class="table-responsive">
            <table class="table text-center">
              <thead>
                <tr>
                  <th>Sr. No.</th>
                  <th>Image</th>
                  <th>Category</th>
                  <th>No. Sub-Category</th>
                  <th>No. Products</th>
                  <th>Actions</th>

                </tr>
              </thead>
              <tbody">
                <?php
                //Code to check if by default pagination query variable exists or not in URL
                if (!isset($_GET['page'])) {
                  $page = 1;
                } else {
                  $page = $_GET['page'];
                }

                $limit = 20; //TO
                $offset = ($page - 1) * $limit; //From
                
                $query = "SELECT * FROM categories LIMIT {$offset},{$limit}";
                $run = mysqli_query($conn, $query);
                $count = mysqli_num_rows($run);

                $query2 = "SELECT * FROM categories";
                $run2 = mysqli_query($conn, $query2);
                $count2 = mysqli_num_rows($run2);


                $number_of_page = ceil($count2 / $limit); //formula to create pages

                if ($count > 0) {
                  $sr = 0;
                  while ($row = mysqli_fetch_array($run)) {
                    $sr = $sr + 1;
                    $cat_id = $row['id'];
                    $cat_name = $row['cat_name'];
                    $cat_image = $row['cat_image'];
                ?>
                    <tr>
                      <td><?php echo $sr ?></td>
                      <td><img src="images/category/<?php echo $cat_image ?>" style="height:70px;width:70px;"></td>
                      <td><?php echo $cat_name ?></td>
                      <td>1</td>
                      <td>1</td>
                      <td><a href="edit_category.php?cat_id=<?php echo $cat_id ?>" target="_SELF">Edit</a> | <a href="actions/delete_category.php?cat_id=<?php echo $cat_id ?>" onclick="return delete_confirmation()">Delete</a></td>
                  <?php
                  } // loop ends
                } // if ends


                  ?>
                    </tr>
                    </tbody>
            </table>


            <div class="fsl_pagination">
              <div class="btn-group" role="group" aria-label="Basic example">
              </div>

              <?php
              if ($page > 1) {
                $prev = $page - 1;

              ?>
                <a href="all_categories.php?page=<?php echo $prev ?>">
                  <button type="button" class="btn btn-outline-secondary btn-sm">Prev</button>
                </a>
              <?php

              }

              ?>

              <!-- =========================page number===================== -->
              <?php
              for ($pages = 1; $pages <= $number_of_page; $pages++) {
                if ($page == $pages) {
                  $active = "active_2";
                } else {
                  $active = " ";
                }
              ?>
                <a href="all_categories.php?page=<?php echo $pages ?>">
                  <button type="button" class="btn btn-outline-secondary btn-sm <?php echo $active; ?> "><?php echo $pages ?></button>
                </a>
                <!-- <button type="button" class="btn btn-outline-secondary">2</button>
                          <button type="button" class="btn btn-outline-secondary">3</button> -->
              <?php
              }
              ?>
              <!-- ===================================================page number===================================== -->

              <?php

              if ($page < $number_of_page) {
                # code...
                $page = $page + 1;

              ?>
                <a href="all_categories.php?page=<?php echo $page ?>">
                  <button type="button" class="btn btn-outline-secondary btn-sm">NEXT</button>
                </a>
              <?php

              }

              ?>

            </div>


          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>


<?php
include("includes/footer.php");
?>