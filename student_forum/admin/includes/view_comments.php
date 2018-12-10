<table align="center" width="750"  bgcolor="white">

      <tr bgcolor="green" border="1" >
            <th>S.No</th>
            <th>User Commented on this</th>
            <th>Post title</th>
            <th>Date</th>
            <th>Delete</th>
            <th>Edit</th> 
      </tr>
      <?php

            include("includes/connection.php");
            $sel_comments = "select *from comments ORDER by 1 DESC";
            $run_comments = mysqli_query($con,$sel_comments);

            $i=0;
            while($row_comments = mysqli_fetch_array($run_comments)){


                  $comment_id = $row_comments['comment_id'];
                  $post_id = $row_comments['post_id'];
                  $user_id = $row_comments['user_id'];
                  $comment = $row_comments['comment'];
                  $comment_author = $row_comments['comment_author'];
                  $date = $row_comments['date'];

                  $i++; 

                  $sel_user = "select * from users where user_id='$user_id'";
                  $run_user = mysqli_query($con,$sel_user);

                  $sel_post = "select * from posts where post_id='$post_id'";
                  $run_post = mysqli_query($con,$sel_post);

                  while($row_users = mysqli_fetch_array($run_user)){

                  $user_name = $row_users['user_name'];

                  while($row_posts = mysqli_fetch_array($run_post)){
                  $post_title = $row_posts['post_title'];
                  

      ?>
      <tr align="center" >
            <td><?php echo $i; ?></td>
            <td><?php echo $user_name; ?></td>
            <td><?php echo $post_title; ?></td>
            <td><?php echo $date; ?></td>
            <td><a href="index.php?view_comments&delete=<?php echo $comment_id; ?>">Delete</a></td>
            <td><a href="edit_comments.php?edit=<?php echo $comment_id; ?>">Edit</a></td>

      </tr>
<?php }}}?>


</table>

 <?php
/*
------------------------------------------This edit comments-----------------------------------
            if(isset($_GET['edit'])){

                  $edit_id = $_GET['edit'];
            
                  $sel_comments = "select *from comments where comment_id='$edit_id'";
                  $run_comments = mysqli_query($con,$sel_comments);                 
                  $row_comments = mysqli_fetch_array($run_comments);

                  $comment_new_id = $row_comments['comment_id'];
                  $comment = $row_comments['comment'];
                  
                  


                  
                  
            
       ?>
            <center>
            <h2 style="padding: 5px; color: red;">Update The Comments</h2>
            <form class='animated bounceInRight' action='' method='POST' id='reply'>
            <textarea cols='50' rows='5' name='comment1' placeholder='Write your reply...'><?php echo $comment;?></textarea><br/>
            <input type='submit' name='update' value='Update Reply'/>
            </form></center>
            <?php } ?>

 <?php
 
            if (isset($_POST['update'])) {
                  # code...

                  $comment1 = $_POST['comment1'];
                  


                  $update = "update  comments set comment='$comment1',date=NOW() where comment_id='$comment_new_id'";

                  $run = mysqli_query($con,$update);

                  if ($run) {
                        # code...

                        echo "<script>alert('Comments has been Update!')</script>";
                        echo "<script>window.open('index.php?view_comments','_self')</script>";
                  } 
            }

*/
            if(isset($_GET['delete'])){

                  $delete_id = $_GET['delete'];

                  $delete = "delete from comments where comment_id='$delete_id'";
                  $run_del = mysqli_query($con,$delete);

                  if ($run_del) {
                        # code...
                        echo "<script>alert('Comments has been Deleted!')</script>";
                        echo "<script>window.open('index.php?view_comments','_self')</script>";
                  }

            }


?>
