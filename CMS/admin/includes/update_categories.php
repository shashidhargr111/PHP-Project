    <form action="" method="post">

                        <div class="form-group">
                            <label for="cat_title">Edit Category</label>

                        <?php

                        if (isset($_GET['edit'])) {
                            # code...
                            $cat_id = $_GET['edit'];

                            $query = "select *from categories where cat_id = $cat_id ";
                            $select_categories_id = mysqli_query($connection,$query);

                            while ($row = mysqli_fetch_assoc($select_categories_id)) {
                                # code...
                                $cat_id = $row['cat_id']; 
                                $cat_title = $row['cat_title'];

                                ?>
                                <input type="text" value="<?php if(isset($cat_title)){ echo $cat_title; } ?>" name="cat_title" class="form-control" >
                                <?php


                            }
                        }

                         ?> 


                         <?php


                                if (isset($_POST['update_cat'])) {
                                    # code...

                                    $the_cate_title = $_POST['cat_title'];

                                    $query = "update categories set cat_title ='{$the_cate_title}' where cat_id = {$cat_id}";
                                    $update_query = mysqli_query($connection,$query); 
                                    // header("Location: categories.php");
                                    if (!$update_query) {
                                        # code...
                                        die('failed'. mysqli_error($connection));
                                    }

                                } 




                         ?>

                		</div>
                		<div class="form-group">
                			<input class="btn btn-primary" type="submit" name="update_cat" value="Update Categories">
    						
                		</div>

                	</form>
                </div>