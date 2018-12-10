

<?php

session_start(); 
include ("../functions/functions.php");

if(!isset($_SESSION['admin_email'])){

header("location: admin_login.php");

}
else{

?>
<!DOCTYPE html>
<html>

<head>

	<title>Welcome to Admin Panel</title>
	<link rel="stylesheet" href="admin_style.css" media="all"/>

</head>

<body>


	<div class="container">
		<div id="head">	

			<a href="index.php"><img src="logo.jpg"/></a>
		</div>
 
		<div id="sidebar">
		 	<center>
			<h2>Manage Content:</h2>
			</center>
			<ul id="menu">
				<li><a href="index.php?view_users">View Users</a></li>
				<li><a href="index.php?view_posts">View Posts</a></li>
				<li><a href="index.php?view_comments">View Comments</a></li>
				<li><a href="index.php?view_topics">View Topics</a></li>
				<li><a href="index.php?add_topics">Add New Topic</a></li>
				<li><a href="admin_logout.php">Admin Logout</a></li>
			</ul>
		</div>

		<div id="content">	
			
			
 <?php
//This Edit comments 

            if(isset($_GET['edit'])){

                  $edit_id = $_GET['edit'];
            
                  $sel_comments = "select *from comments where comment_id='$edit_id'";
                  $run_comments = mysqli_query($con,$sel_comments);                 
                  $row_comments = mysqli_fetch_array($run_comments);

                  $comment_new_id = $row_comments['comment_id'];
                  $comment = $row_comments['comment'];
                  
                  


                  
                  
            
       ?>
            <center>
            <h2 style="padding: 5px; color: red;">Edit the Comments</h2>
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
?>
			
			




		</div>

		
		<div id="foot">
			<center>
			<h2 style="color:white; padding:10px;">&copy; 2018 by Dsdnp</h2>
			</center>
		</div>
		
	</div>

</body>
</html>
<?php } ?>
