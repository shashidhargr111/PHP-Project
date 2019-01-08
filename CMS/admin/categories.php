<?php 



?>

<?php 

    include 'includes/admin_header.php';

?>
    <div id="wrapper">

<?php 

	include 'includes/admin_nav.php';

?>
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">

                        
                        <h1 class="page-header">
                            Welcome To Admin
                            <small>Author</small>
                        </h1>


                        <div class="col-xs-6">

							<?php
									insert_categories();

							?>



                        	<form action="" method="post">
                                    
                                <div class="form-group">
                                    <label for="cat_title">Add Category</label>
                                    
                                    <input type="text" class="form-control" name="cat_title">

                                </div>
                                <div class="form-group">
                                    <input class="btn btn-primary" type="submit" name="submit" value="Add Categories">
                                    
                                </div>

                            </form>
                            <?php

                                if (isset($_GET['edit'])) {
                                    # code...
                                    $cat_id=$_GET['edit'];

                                    include "includes/update_categories.php";
                                }


                             ?>

                        <div class="cal-xs-6">
							<?php 
							
							?>
                        		
                        		<table class="table table-bordered table-hover">
                        			<thead>
                        				<tr>
                        					<th>ID</th>
                                            <th>Category</th>
                                            <th>Delete</th>
                        					<th>Edit</th>
                        				</tr>
                        			</thead>
                        			<tbody>
                        				
									<?php
                                        findAllCate();
									?>


                                    <?php 
                                         delete_cate();
                                    ?>
                        					
                        			</tbody>
                        		</table>

                        </div>
                       
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

  
<?php 

    include 'includes/admin_footer.php';

?>