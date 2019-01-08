
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

                $per_page = 2 ;

                if (isset($_GET['page'])) {
                    # code...
                    $page = $_GET['page'];




                }else{

                    $page = "";

                }

                if ($page == "" || $page == 1) {
                    # code...
                    $page_1 = 0;
                }else{
                    $page_1 = ($page * $per_page )-$per_page;
                }



                $post_query_count = "select *from posts where post_status ='published' ";
                $post_find_count = mysqli_query($connection,$post_query_count);
                $post_count = mysqli_num_rows($post_find_count);

                if ($post_count < 1) {
                    # code...
                    echo "<h1 class='text-center'>No Posts</h1>";
                }else{


                

                $post_count = ceil($post_count / 10);




                $query = "select *from posts limit $page_1,$per_page ";
                $select_all_post_query = mysqli_query($connection,$query);

                while ($row = mysqli_fetch_assoc($select_all_post_query)) {
                    # code...
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];
                    $post_author = $row['post_author'];
                    $post_date = $row['post_date'];
                    $post_image = $row['post_image'];
                    $post_content = substr($row['post_content'],0,100);
                    $post_status = $row['post_status'];


                    
                    
                    ?>
                 
                <!--  Blog Post --> 
                <h2>
                    <a href="post.php?p_id=<?php echo $post_id; ?>"> <?php echo $post_title; ?> </a>
                </h2>
                <p class="lead">
                    by <a href="index.php"><?php echo $post_author; ?></a>
                </p>
                <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo $post_date; ?></p>
                <hr>
                <a href="post.php?p_id=<?php echo $post_id; ?>"><img class="img-responsive" src="images/<?php echo $post_image; ?>" alt="Image loading error"> </a>
                
                <hr>
                <p> <?php echo $post_content; ?></p> 
                <a class="btn btn-primary" href="post.php?p_id=<?php echo $post_id; ?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>

                <hr>
                <!-- end of the Blog Post -->

                <?php  }  }  ?>

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

        <ul class="pager">
            

            <?php 


            for ($i=1; $i <=$post_count ; $i++) { 
                # code...

                if ($i == $page) {
                    # code...

                     echo "<li><a class='active_link' href='index.php?page= {$i}'>{$i}</a></li>";
                }else
                {
                    echo "<li><a href='index.php?page= {$i}'>{$i}</a></li>";

                }

               

            }



             ?>
            
        </ul>



 <?php 

        include 'includes/footer.php';

?>