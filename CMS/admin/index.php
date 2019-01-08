
<?php 

    include 'includes/admin_header.php';

?>

<!-- <?php 
    
    $session = session_id();

    $time = time();
    $time_out_in_seconds = 30;
    $time_out = $time - $time_out_in_seconds;


    $query = "select * from users_online where session = '$session'";
    $send_query = mysqli_query($connection,$query);
    $count = mysqli_num_rows($send_query);

    if ($count == NULL) {
        # code...
        mysqli_query($connection,"insert into users_online(session, time) values ('$session','$time') ");

    }else{


         mysqli_query($connection,"update user_online set time = '$time' where session = '$session' ");

    }

    $users_online_query = mysqli_query($connection,"select *from users_online where time > '$time_out'");
    $count_user = mysqli_num_rows($users_online_query);

 ?>

 -->

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
                            <small><?php echo $_SESSION['username']; ?></small>
                        </h1>

                        <!-- <h1> <?php echo $count_user; ?></h1> -->
                       
                    </div>
                </div>
                <!-- /.row -->



                <!-- /.row -->
                
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-file-text fa-5x"></i>
                                    </div>

                                    <div class="col-xs-9 text-right">

                                    <?php 


                                        $query = "select *from posts ";
                                        $select_posts_count = mysqli_query($connection,$query);

                                        $post_counts = mysqli_num_rows($select_posts_count);

                                        echo "<div class='huge'>$post_counts</div>";

                                     ?>

                                        <div>Posts</div>
                                    </div>
                                </div>
                            </div>
                            <a href="posts.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-green">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-comments fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">

                                        <?php 


                                        $query = "select *from comments where comment_status = 'approved' ";
                                        $select_comments_count = mysqli_query($connection,$query);

                                        $comments_counts = mysqli_num_rows($select_comments_count);

                                        echo "<div class='huge'>$comments_counts</div>";

                                     ?>
                                     <!-- <div class='huge'>23</div> -->
                                      <div>Comments</div>
                                    </div>
                                </div>
                            </div>
                            <a href="comments.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-yellow">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-user fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php 


                                        $query = "select *from users ";
                                        $select_users_count = mysqli_query($connection,$query);
                                        $users_counts = mysqli_num_rows($select_users_count);

                                        echo "<div class='huge'>$users_counts</div>";

                                     ?>
                                    <!-- <div class='huge'>23</div> -->
                                        <div> Users</div>
                                    </div>
                                </div>
                            </div>
                            <a href="users.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="panel panel-red">
                            <div class="panel-heading">
                                <div class="row">
                                    <div class="col-xs-3">
                                        <i class="fa fa-list fa-5x"></i>
                                    </div>
                                    <div class="col-xs-9 text-right">
                                        <?php 


                                        $query = "select *from categories";
                                        $select_categories_count = mysqli_query($connection,$query);

                                        $categories_counts = mysqli_num_rows($select_categories_count);

                                        echo "<div class='huge'>$categories_counts</div>";

                                     ?>
                                        <!-- <div class='huge'>13</div> -->
                                         <div>Categories</div>
                                    </div>
                                </div>
                            </div>
                            <a href="categories.php">
                                <div class="panel-footer">
                                    <span class="pull-left">View Details</span>
                                    <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                    <div class="clearfix"></div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
                <!-- /.row -->


                <?php 


                    $query = "select *from posts where post_status = 'draft' ";
                    $select_posts_draft_count = mysqli_query($connection,$query);

                    $post_draft_counts = mysqli_num_rows($select_posts_draft_count);

                    $query = "select *from posts where post_status = 'published' ";
                    $select_posts_published_count = mysqli_query($connection,$query);

                    $post_published_counts = mysqli_num_rows($select_posts_published_count);

                    $query = "select *from comments where comment_status = 'unapproved' ";
                    $select_comments_draft_count = mysqli_query($connection,$query);

                    $comment_draft_counts = mysqli_num_rows($select_comments_draft_count);


                    $query = "select *from users where user_role = 'subscriber' ";
                    $select_users_count_subscribers = mysqli_query($connection,$query);
                    $users_counts_subscribers = mysqli_num_rows($select_users_count_subscribers);

                 ?>


                


                <div class="row">

                   <script type="text/javascript">
                      google.charts.load('current', {'packages':['bar']});
                      google.charts.setOnLoadCallback(drawChart);

                      function drawChart() {
                        var data = google.visualization.arrayToDataTable([
                          ['Date', 'Count'],


                           <?php 

                                $element_text = ['Active Posts','Published Posts','Draft Posts','Categories','Admin User','Subscribers User','Comments','Unapprove Comments'];
                                $element_count = [$post_counts,$post_published_counts,$post_draft_counts,$categories_counts,$users_counts,$users_counts_subscribers,$comments_counts,$comment_draft_counts];

                                for($i = 0 ; $i < 7 ; $i++){

                                    echo "['{$element_text[$i]}'" . "," . "{$element_count[$i]}], ";
                                }

                            ?>

                        ]);

                        var options = {
                          chart: {
                            title: 'CMS Project',
                            subtitle: '',
                          }
                        };

                        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                        chart.draw(data, google.charts.Bar.convertOptions(options));
                      }
                    </script>


                    <div id="columnchart_material" style="width: 'auto'; height: 500px;"></div>


                </div>


            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

  
<?php 

    include 'includes/admin_footer.php';

?>