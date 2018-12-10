

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


            if(isset($_GET['edit'])){

                  $edit_id = $_GET['edit'];
            
                  $sel_topics = "select *from topics where topic_id='$edit_id'";
                  $run_topics = mysqli_query($con,$sel_topics);                 
                  $row_topics = mysqli_fetch_array($run_topics);

                  $topic_new_id = $row_topics['topic_id'];
                  $topic_title = $row_topics['topic_title'];
                  
                  


                  
                  
            
                  ?>
                  <center>
                  <h2 style="padding: 5px; color: red;">Edit The Topics</h2>
                  <form class='' action='' method='POST' id=''>
                  <input type="" name="topic" value='<?php echo $topic_title; ?>' placeholder='Edit your topic'><br/><br>
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
