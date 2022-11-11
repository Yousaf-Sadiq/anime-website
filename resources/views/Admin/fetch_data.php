
        <tbody">
            <?php
            $query = "SELECT * FROM categories";
            $run = mysqli_query($conn, $query);
            $count = mysqli_num_rows($run);
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
                        <td>Edit | <a href="actions/delete_category.php?cat_id=<?php echo $cat_id ?>" onclick="return delete_confirmation()">Delete</a></td>
                <?php
                }
            }
                ?>
                    </tr>
                    </tbody>