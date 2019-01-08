
<?php 
include 'includes/db.php';
include 'includes/header.php';
include 'includes/nav.php';//<!-- Navigation -->

?>
    

    <!-- Page Content -->
    <div class="container">

        <div class="row"



            <!-- Blog Entries Column -->
            <div class="col-md-8">


                <?php


                if (isset($_GET['p_id'])) {
                    # code...
                    $the_post_id =$_GET['p_id'];
                }

                $query = "select *from posts where post_id = $the_post_id ";
                $select_all_post_query = mysqli_query($connection,$query);

                while ($row = mysqli_fetch_assoc($select_all_post_query)) {
                    # code...
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = $row['post_content'];

                ?>


                
                <h1 class="page-header">
                    Page Heading 
                    <small>Secondary Text</small>
                </h1>

                <!--  Blog Post -->
               
                
                <h2>
                    <a href="#"> <?php echo $post_title; ?> </a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="Image loading error">
                <hr>
                <p> <?php echo $post_content; ?></p> 
                

                <hr>
                <!-- end of the Blog Post -->
                <?php  }  ?>


                <!-- Blog Comments -->



                <?php 

                    if (isset($_POST['create_comment'])) {
                        # code...

                        $the_post_id =$_GET['p_id'];

                        $comment_author = $_POST['comment_author'];
                        $comment_email = $_POST['comment_email'];
                        $comment_content= $_POST['comment_content'];

                        if (!empty($comment_author) && !empty($comment_email) && !empty($comment_content)) {
                            # code...
                            $query = "insert into comments (comment_post_id,comment_author,comment_email,comment_content,comment_status,comment_date) ";

                            $query .= "values ($the_post_id,'{$comment_author}','{$comment_email}','{$comment_content}','unapproved',NOW()) ";
                            $create_comment_qurery = mysqli_query($connection,$query);

                            if (!$create_comment_qurery) {
                                # code...
                                die("failed". mysqli_error($connection));
                            }

                            // $query = " update posts set post_comment_count = post_comment_count + 1 ";
                            // $query .= " where post_id = $the_post_id ";

                            $update_comment_count = mysqli_query($connection, $query);
                                
                        }else{
                            echo "<script>alert('Fields connot be empty')</script>";
                        }
             
                    }

                 ?>

                <!-- Comments Form -->
                <div class="well">
                    <h4>Leave a Comment:</h4>
                    <form action="" method="POST" role="form">

                        <div class="form-group">
                            <label for="Author">Author</label>
                            <input type="text" name="comment_author"  class="form-control">
                        </div>

                       <div class="form-group">
                            <label for="Author">Email</label>
                            <input type="text" name="comment_email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="Author">Your comments</label>
                            <textarea class="form-control" name="comment_content" rows="3"></textarea>
                        </div>
                        <button type="submit" name="create_comment" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <hr>

                <!-- Posted Comments -->

                <!-- Comment -->
                

                    <?php 

                        $query = "select *from comments where comment_post_id = {$the_post_id}";
                        $query .= " and comment_status = 'approved' ";
                        $query .= "order by comment_id desc ";
                        $select_comment_query = mysqli_query($connection, $query);
                        if (!$select_comment_query) {
                            # code...
                            die('query'. mysqli_error($connection));
                        }

                        while ($row = mysqli_fetch_assoc($select_comment_query)) {
                            # code...
                            $comment_date = $row['comment_date'];
                            $comment_content  = $row['comment_content'];
                            $comment_author = $row['comment_author'];

                    ?>

                <div class="media">
                     <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading"><?php echo $comment_author; ?>
                            <small><?php echo $comment_date; ?></small>
                        </h4>
                        <?php echo $comment_content ; ?>
                    </div>
                </div>

                    <?php }?>

                <!-- //Comment 
               
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="http://placehold.it/64x64" alt="">
                    </a>
                    <div class="media-body">
                        <h4 class="media-heading">Start Bootstrap
                            <small>August 25, 2014 at 9:30 PM</small>
                        </h4>
                        Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                   
                        <div class="media">
                            <a class="pull-left" href="#">
                                <img class="media-object" src="http://placehold.it/64x64" alt="">
                            </a>
                            <div class="media-body">
                                <h4 class="media-heading">Nested Start Bootstrap
                                    <small>August 25, 2014 at 9:30 PM</small>
                                </h4>
                                Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                            </div>
                        </div>
                        //End Nested Comment 
                    </div>

                    
                </div> -->


                <!-- Pager -->
                <ul class="pager">
                    <li class="previous">
                        <a href="#">&larr; Older</a>
                    </li>
                    <li class="next">
                        <a href="#">Newer &rarr;</a>
                    </li>
                </ul>

            </div>

            <!-- Blog Sidebar Widgets Column -->
            <?php 

        include 'includes/sidebar.php';

?>
        <!-- /.row -->
</div>
        <hr>
 <?php 

        include 'includes/footer.php';

?>