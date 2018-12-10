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


				<form method="get"  action="results.php" id="form1">


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

				<div id="msg" class="animated bounceInRight"><!-- msg starts-->
						
						<p align="center">
							<a href="my_messages.php"> My Inbox </a>||
							<a href="sent.php?sent=<?php echo  $user_id; ?>"> Sent Item </a>
						</p>		

					<table width="700" align="center">
 
						<tr align="center">
							<td colspan="4"><h2>See Inbox your messages:</h2> </td>
						</tr>
						
						<tr>
							<th>Sender</th>
							<th>Subject</th>
							<th>Date</th>
							<th>Reply</th>
							<th>Delete</th>
						</tr>

						<?php

					$sel_msg = "select * from messages where receiver='$user_id' ORDER by 1 DESC";
					$run_msg = mysqli_query($con,$sel_msg);

					$count_msg = mysqli_num_rows($run_msg);

					while ($row_msg = mysqli_fetch_array($run_msg) ) {
						# code...

						$msg_id = $row_msg['msg_id'];
						$msg_receiver = $row_msg['receiver'];
						$msg_sender = $row_msg['sender'];
						$msg_sub = $row_msg['msg_sub'];
						$msg_topic = $row_msg['msg_topic'];
						$msg_date = $row_msg['msg_date'];

						$get_sender = "select * from users where user_id='$msg_sender'";
						$run_sender = mysqli_query($con,$get_sender);
						$row = mysqli_fetch_array($run_sender);

						$sender_name = $row['user_name'];


					
					?>

						<tr align="center">
							<td>
								<a href="user_profile.php?u_id=<?php echo $msg_sender;?>"target="blank">
								<?php echo $sender_name;?>
								</a>		
							</td>
							<td>
								<a href="my_messages.php?msg_id=<?php echo $msg_id;?>"><?php echo $msg_sub;?>
								</a>
							</td>
							<td><?php echo $msg_date;?></td>
							<td><a href="messages.php?u_id=<?php echo $msg_sender;?>">Reply</a></td>
							<td><a href="delete_messages.php?msg_id=<?php echo $msg_id;?>">Delete</a></td>

						</tr>
						<?php } ?>
					</table>

					<?php

					if(isset($_GET['msg_id'])){

						$get_id = $_GET['msg_id'];

						$sel_message = "select *from messages where msg_id='$get_id'";
						$run_message = mysqli_query($con,$sel_message);

						$row_message = mysqli_fetch_array($run_message);

						$msg_subject = $row_message['msg_sub'];
						$msg_topic = $row_message['msg_topic'];
						$reply_content = $row_message['reply'];


						//updating the unread

						$update_unread = "update messages set status='read' where msg_id='$get_id'";
						$run_unread = mysqli_query($con,$update_unread);


						echo "<center><br/><hr>
						<h2>$msg_subject</h2><br/>
						<p><b>Message:</b> $msg_topic</p><br/>
						
						";


					

					//  if(isset($_POST['msg_reply'])){

					//  	$user_reply = $_POST['reply'];

					// // 	if($reply_content!='no_reply'){

					// // 		echo "<h2 align='center'>Message was already replied!</h2>";
					// // 		exit(); 

					// // 	}
					// // 	else{

					// 	$update_msg = "update messages set reply='$user_reply' where msg_id='$get_id' AND reply='no_reply'";

					// 	$run_update = mysqli_query($con,$update_msg);

					// 		if ($run_update) {

					// 			# code...
					// 			echo "<h2 align='center'>Message was replied!</h2>";
					// 		}
					 
						
						
					// // 	}
					

					//  }
					// }

					?>



				</div><!-- msg ends-->
				<?php  ?>

	
		</div><!-- content ends-->
</div>

	<!--</div> Container ends-->



</body>

</html>
<?php }} ?>