<?php

		
   		
        session_start(); 
   	
	include("includes/connection.php");
	include("functions/functions.php");

	if(isset($_SESSION['user_email'])){

	?>
<!DOCTYPE html>

<html>
	<head>
		<title>Welcome User</title>
		<link rel="stylesheet"  href="styles/home_style.css" media="all"/>
		<link rel="stylesheet"  href="styles/animate.css" media="all"/>

	</head>

<body>



	<div class="container"><!-- Container starts-->

		<div id="head_wrap"><!-- head_wrap starts-->

			<div id="header"><!-- head starts-->
				
				<ul id="menu"><!-- menu starts-->
					<img src="images/logo.png" class="animated infinite bounce" alt="error image load" height="75" width="190" style="float:left"/>
					<li><a href="home.php">Home</a></li>
					<li><a href="members.php">Members</a></li>
					<li><a href="list_topic.php">Topics</a></li>
	
				</ul><!-- menu ends-->


				<form method="get" class="animated bounceInDown" action="results.php" id="form1">


					<input type="text" name="user_query" placeholder="Search a topic"/>
					<input type="submit" name="search" value="Search">



				</form>

			</div><!-- head ends-->

		</div><!-- head_wrap ends-->

		<div class="content"><!-- content starts-->

			<div id="user_timeline"><!-- user_timeline starts-->

				<div id="user_details"><!-- user_details starts-->
					
					<?php
					
					$user = $_SESSION["user_email"];
					$get_user = "select * from users where user_email='$user'";
					$run_user = mysqli_query($con,$get_user);
					$row = mysqli_fetch_array($run_user);

					$user_id = $row['user_id'];
					$user_name = $row['user_name'];
					$user_country = $row['user_country'];
					$user_image = $row['user_image'];
					$register_date = $row['register_date'];
					$last_login = $row['last_login'];

					$user_posts = "select * from posts where user_id='$user_id'";
					$run_posts = mysqli_query($con,$user_posts);
					$posts = mysqli_num_rows($run_posts);

    				//counting number of message unreaded
					$sel_msg = "select * from messages where receiver='$user_id' AND status='unread'   ORDER by 1 DESC";
					$run_msg = mysqli_query($con,$sel_msg);

					$count_msg = mysqli_num_rows($run_msg);



					echo "
						 
						<center><img class='animated bounceInLeft' src='user/user_images/$user_image' width='200' height='200'/></center>
						<div id='user_mention' class='animated bounceInLeft'>
						<p><strong>Name:</strong>$user_name</p><br/>
						<p><strong>Country:</strong>$user_country</p><br/>
						<p><strong>Last Login:</strong>$last_login</p><br/>
						<p><strong>Member since:</strong> $register_date</p><br/>

						<p><a href='my_messages.php?inbox&u_id=$user_id'>Messages ($count_msg)</a></p><br/>
						<p><a href='my_posts.php?u_id=$user_id'>My Posts ($posts)</a></p><br/>
						<p><a href='edit_profile.php?u_id=$user_id'>Edit My Account</a></p><br/>
						<p><a href='logout.php'>Logout</a></p><br/>

						</div>	
					";
					//
					?>

				</div><!-- user_details ends-->
				

			</div><!-- user_timeline ends-->

			<div id="content_timeline"><!-- content_timeline starts-->

				<form class="animated bounceInRight" action="home.php?id=<?php echo $user_id;?>" method="post" id="f" enctype="multipart/form-data">

					<h2>
						What's your question today? let's discuss!
					</h2>
					
					<input type="text" name="title" placeholder="Write a title..." size="70" required="required"/><br/>
					<textarea cols="73" rows="4" name="content" placeholder="Write description..."></textarea><br/>
					
      					
					<select name="topic">

						<option>Select Topic</option>
						<?php getTopics();?>

					</select>
					<input type="file" name="p_image" />

					<input type="submit" name="sub" value="Post to Timeline">

				</form>	
				<?php insertPost(); ?> 
				<!--<div id="posts"> posts starts-->
					
					<h3 class='animated bounceInRight'>Most Recent Discussion!</h3>
					<?php get_posts(); ?>

				<!--</div> posts ends-->

			</div><!-- content_timeline ends-->


		</div><!-- content ends-->

	<!--</div> Container ends-->



</body>
</html>
<?php } 		

	
else{

	header("location: index.php");
	}
?>

