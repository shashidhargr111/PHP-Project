<table align="center" width="750"  bgcolor="white">

      <tr bgcolor="green" border="1" >
            <th>S.No</th>
            <th>Topic title</th>
            <th>Delete</th>
            <th>Edit</th> 
      </tr>
      <?php

            include("includes/connection.php");
            $sel_topics = "select *from topics ORDER by 1 DESC";
            $run_topics = mysqli_query($con,$sel_topics);

            $i=0;
            while($row_topics = mysqli_fetch_array($run_topics)){


                  $topic_id = $row_topics['topic_id'];
                  $topic_title = $row_topics['topic_title'];
                  

                  $i++; 

                  $sel_topic = "select * from topics where topic_id='$topic_id'";
                  $run_topic = mysqli_query($con,$sel_topic);

                  

                  while($row_topics = mysqli_fetch_array($run_topic)){

                  $topic_title = $row_topics['topic_title'];

                  
                  

      ?>
      <tr align="center" >
            <td><?php echo $i; ?></td>
            <td><?php echo $topic_title; ?></td>
            
            <td><a href="index.php?view_topics&delete=<?php echo $topic_id; ?>">Delete</a></td>
            <td><a href="edit_topics.php?edit=<?php echo $topic_id; ?>">Edit</a></td>

      </tr>
<?php }}?>


</table>

 <?php
/*

            if(isset($_GET['edit'])){

                  $edit_id = $_GET['edit'];
            
                  $sel_topics = "select *from topics where topic_id='$edit_id'";
                  $run_topics = mysqli_query($con,$sel_topics);                 
                  $row_topics = mysqli_fetch_array($run_topics);

                  $topic_new_id = $row_topics['topic_id'];
                  $topic_title = $row_topics['topic_title'];
                  
                  


                  
                  
            
                  ?>
                  <center>
                  <h2 style="padding: 5px; color: red;">Update The Topics</h2>
                  <form class='' action='' method='POST' id=''>
                  <input type="" name="topic"  placeholder='Edit your topic'><br/>
                  <input type='submit' name='update' value='Update topics'/>
                  </form></center>
            <?php } ?>

 <?php
 
            if (isset($_POST['update'])) {
                  # code...

                  $topic = $_POST['topic'];
                  


                  $update = "update  topics set topic_title='$topic' where topic_id='$topic_new_id'";

                  $run = mysqli_query($con,$update);

                  if ($run) {
                        # code...

                        echo "<script>alert('Topics has been Update!')</script>";
                        echo "<script>window.open('index.php?view_topics','_self')</script>";
                  } 
            }
*/

            if(isset($_GET['delete'])){

                  $delete_id = $_GET['delete'];

                  $delete = "delete from topics where topic_id='$delete_id'";
                  $run_del = mysqli_query($con,$delete);

                  if ($run_del) {
                        # code...
                        echo "<script>alert('Topics has been Deleted!')</script>";
                        echo "<script>window.open('index.php?view_topics','_self')</script>";
                  }

            }


?>
