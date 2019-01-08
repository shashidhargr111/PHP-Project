
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
                            Welcome To Comments
                            <small>Author</small>
                        </h1>

<table class="table table-bordered table-hover">
    <thead>
        <th>ID</th>
        <th>Author</th>
        <th>Comments</th>
        <th>Email</th>
        <th>Status</th>
        <th>In Response to </th>
        <th>Date</th>
        <th>Approve</th>
        <th>Unapprove</th>
        <th>Delete</th>
        
    </thead>
    
    <tbody>

        <?php

            // $query = "select *from comments where comment_post_id = " . mysqli_real_escape_string($connection,$_GET['id']) . "" ;

            $query = "SELECT * FROM comments WHERE comment_post_id =" . mysqli_real_escape_string($connection,$_GET['id']). " ";


            $select_comments = mysqli_query($connection,$query);

            while ($row = mysqli_fetch_assoc($select_comments)) {
                # code...
                $comment_id = $row['comment_id'];
                $comment_post_id= $row['comment_post_id'];
                $comment_author= $row['comment_author'];
                $comment_email= $row['comment_email'];
                $comment_content= $row['comment_content'];
                $comment_status= $row['comment_status'];
                $comment_date= $row['comment_date'];
               
                echo "<tr>";
                echo "<td>{$comment_id}</td>";
                echo "<td>{$comment_author}</td>";
                echo "<td>{$comment_content}</td>";


                // $query = "select *from categories where cat_id = $post_category_id ";
                // $select_categories_id = mysqli_query($connection,$query);

                // while ($row = mysqli_fetch_assoc($select_categories_id)) {
                //     # code...
                //     $cat_id = $row['cat_id']; 
                //     $cat_title = $row['cat_title'];

                //     echo "<td>{$cat_title}</td>";

                // }

                
                echo "<td>{$comment_email}</td>";
                // echo "<td><img src='../images/{$post_image}'  width='100' alt='image' >'</td>";
                echo "<td>{$comment_status}</td>";

                $query = "select *from posts where post_id = $comment_post_id ";
                $select_post_id_query = mysqli_query($connection,$query);
                while ($row = mysqli_fetch_assoc($select_post_id_query)) {
                    # code...
                    $post_id = $row['post_id'];
                    $post_title = $row['post_title'];

                    echo "<td><a href='../post.php?p_id=$post_id'>$post_title</a></td>";
                }

                echo "<td>{$comment_date}</td>";
                // echo "<td>{$post_date}</td>";
                echo "<td><a href ='comments.php?approve=$comment_id&id=" . $_GET['id'] . " '>Approve</a></td>";
                echo "<td><a href ='comments.php?unapprove=$comment_id&id=" . $_GET['id'] . " '>Unapprove</a></td>";
                echo "<td><a href ='post_comments.php?delete=$comment_id&id=" . $_GET['id'] . " '>Delete</a></td>";
                // echo "<td><a href ='posts.php?source=edit_post&p_id='>Edit</a></td>";
                echo "</tr>";
            }                            
        ?>

    </tbody>
</table>


<?php 

    if (isset($_GET['unapprove'])) {
        # code...

        $the_comment_id = $_GET['unapprove'];

        $query = "update comments set comment_status = 'unapproved' where comment_id =" . mysqli_real_escape_string($connection,$_GET['id']). " " ;
        $unapprove_query = mysqli_query($connection,$query);
        header("Location: post_comments.php?id=" . $_GET['id'] . " ");

    }
    if (isset($_GET['approve'])) {
        # code...

        $the_comment_id = $_GET['approve'];

        $query = "update comments set comment_status = 'approved' where comment_id =" . mysqli_real_escape_string($connection,$_GET['id']). " " ;
        $approve_query = mysqli_query($connection,$query);
        header("Location: post_comments.php?id=" . $_GET['id'] . " ");
 
    }

    if (isset($_GET['delete'])) {
        # code...

        $the_comment_id = $_GET['delete'];

        $query = "delete from comments where comment_id = {$the_comment_id}";
        $delete_query = mysqli_query($connection,$query);
        header("Location: post_comments.php?id=" . $_GET['id'] . " ");

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