

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
 		
			$sel_posts = "select *from posts where post_id='$edit_id'";
			$run_posts = mysqli_query($con,$sel_posts);			
			$row_posts = mysqli_fetch_array($run_posts);

			$post_new_id = $row_posts['post_id'];
			$post_title = $row_posts['post_title'];
			$post_content = $row_posts['post_content'];
			


			
			
		
	 ?>
		<center>
	 	<h2 style="padding: 5px; color: red;">Edit The Post</h2>
		<form action="" method="post" id="f" class="ff" enctype="multipart/form-data">
      				
      				
      		<input  type="text" name="title" value="<?php echo $post_title;?>"  size="70" required="required"/><br/>
			<textarea cols="73" rows="4" name="content"> <?php echo $post_content;?> </textarea><br/>
					
			<select name="topic">

				<option>Select Topic</option>
				<?php getTopics();?>

				</select>
			<input type="submit" name="update" value="Update Post">			
      	</form></center>
      	<?php } ?>

 <?php
 
 		if (isset($_POST['update'])) {
 			# code...

 			$title = $_POST['title'];
 			$content = $_POST['content'];
 			$topic = $_POST['topic'];


 			$update = "update  posts set post_title='$title', post_content='$content',topic_id='$topic',post_date=NOW() where post_id='$post_new_id'";

 			$run = mysqli_query($con,$update);

 			if ($run) {
 				# code...

 				echo "<script>alert('Post has been Update!')</script>";
 				echo "<script>window.open('index.php?view_posts','_self')</script>";
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
