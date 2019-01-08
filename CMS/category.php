
<?php 
include 'includes/db.php';
include 'includes/header.php';
include 'includes/nav.php';//<!-- Navigation -->

?>
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-8">

                <?php

                if (isset($_GET['category'])) {
                    # code...

                    $the_cat_id = $_GET['category'];

                    


                $query = "select *from posts where post_category_id = $the_cat_id AND post_status = 'published' ";
                $select_all_post_query = mysqli_query($connection,$query);


                if (mysqli_num_rows($select_all_post_query) < 1) {
                    # code...
                    echo "<h1>No posts</h1>";
                }

                while ($row = mysqli_fetch_assoc($select_all_post_query)) {
                    # code...
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'], 0,100);

                ?>

                <h1 class="page-header">
                    Page Heading 
                    <small>Secondary Text</small>
                </h1>

                <!--  Blog Post -->
               
                
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"> <?php echo $post_title; ?> </a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="Image loading error">
                <hr>
                <p> <?php echo $post_content; ?></p> 
                <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <!-- end of the Blog Post -->
                <?php  } } else {

                    header("Location: index.php");

                } ?>

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