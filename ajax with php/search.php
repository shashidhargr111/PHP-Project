
<?php 
    include("db.php");
    
    $search = $_POST['search'];

    if (!empty($search)) {
        # code...
        $query = "select * from cars where title LIKE '$search%' ";
        $search_query = mysqli_query($con,$query);
        $count = mysqli_num_rows($search_query);

        if (!$search_query) {
            # code...
            die('Failed ' . mysqli_error($con));
        }

        if ($count <= 0) {
            # code...
             echo "Sorry we don`t have that car available";

        }else{

            while ($row = mysqli_fetch_array($search_query)) {
                # code...
                $brand = $row['title'];
                ?>

                <ul class="list-unstyled">

                <?php

                    echo "<li>{$brand} in stock</li>";
                ?>


                </ul>

                <?php
            }
        }

    }
    
  

?>
