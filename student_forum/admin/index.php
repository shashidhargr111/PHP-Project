

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
			<h2 style="color: blue; text-align: center;padding: 5px;"><?php //echo $_GET['welcome']; ?> Welcome Admin Manage your content!</h2>
			<?php 

				if(isset($_GET['view_users'])){

					include("includes/view_users.php");
				}

				if(isset($_GET['view_posts'])){

					include("includes/view_posts.php");
				}
				if(isset($_GET['view_comments'])){

					include("includes/view_comments.php");
				}
				if(isset($_GET['view_topics'])){

					include("includes/view_topics.php");
				}
				if(isset($_GET['add_topics'])){

					include("includes/add_topics.php");
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
