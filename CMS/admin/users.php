
<?php 

    include 'includes/admin_header.php';




    if (!is_admin($_SESSION['username'])) { 
        # code...
        header("Location: index.php");
    }



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


                        <?php
                        
                            if (isset($_GET['source'])) {
                                # code...
                                $source = $_GET['source'];
 
                            }else {
                                $source ='';
                            }

                            switch ($source) {
                                case 'add_user':
                                    # code...
                                    include "add_user.php";
                                    break;
                                case 'edit_user':
                                    # code...
                                    include "edit_user.php";
                                    break;
                                case '200':
                                    # code...
                                    echo "nice 200 ";
                                    break;

                                default:
                                    # code...
                                    include "includes/view_all_users.php";
                                    break;
                            }                        
                        
                        ?>
  
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