<?php

		
   		
        session_start(); 
   	
	include("includes/connection.php");
	include("functions/functions.php");

	if(!isset($_SESSION['user_email'])){


		header("location: index.php");
	}
else{
?>


<!DOCTYPE html>

<html>
	<head>
		<title>welcome user</title>
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
						 
						<center><img  src='user/user_images/$user_image' width='200' height='200'/></center>
						<div id='user_mention' >
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

					<?php
						if(isset($_GET['u_id'])){
							
							$u_id = $_GET['u_id'];

							$sel = "select *from users where user_id='$u_id'";
							$run = mysqli_query($con,$sel);
							$row = mysqli_fetch_array($run);

							$user_name = $row['user_name'];
							$user_image = $row['user_image'];
							$reg_date = $row['register_date'];
						}					 
					?>
					
					<h2>
						Send a Message to <span style='color:red;'><?php echo $user_name; ?> </span>
					</h2>

					<form action="messages.php?u_id=<?php echo $u_id;?>" method="post" id="f">

						<input type="text" name="msg_title" placeholder="Message Subject..." size="49" /><br/>

						<textarea name="msg" cols="50" rows="5" placeholder="Message Topic..."/>
						</textarea><br/>

						<input type="submit" name="message" value="Send Message"/>
					</form><br/>

					<img style="border:2px solid blue; border-radius: 5px;" src="user/user_images/<?php echo $user_image; ?>" width="100" height="100"/>

					<p><strong><?php echo $user_name;?></strong> is member of this site since:<?php echo $reg_date; ?></p> 



				<?php
				if (isset($_POST['message'])) {
					# code...

					$msg_title = $_POST['msg_title'];
					$msg = $_POST['msg'];

					$insert = "insert into messages (sender,receiver,msg_sub,msg_topic,reply,status,msg_date) values ('$user_id','$u_id','$msg_title','$msg','no_reply','unread',NOW())";
					
					$run_insert = mysqli_query($con,$insert);
					
					if($run_insert){

						echo "<center><h2>Message was sent to " . $user_name . " successfully</h2></center>";
					}
					else{

						echo "<center><h2>Message was not sent... </h2></center>";
					}
				}
				?>

				</div><!-- content_timeline ends-->

	
		</div><!-- content ends-->

	<!--</div> Container ends-->



</body>

</html>
<?php } ?>