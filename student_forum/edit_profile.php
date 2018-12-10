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
		<link rel="stylesheet" href="styles/animate.css">
		<style>
			input[type='file']{width:180px;}
		</style>


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
					$user_pass = $row['user_pass'];
					$user_email = $row['user_email'];
					$user_country = $row['user_country'];
					$user_gender = $row['user_gender'];
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
					//<p><a href='my_messages.php'>Messages</a></p>
					?>

				</div><!-- user_details ends-->
				

			</div><!-- user_timeline ends-->

			<div id="content_timeline"><!-- content_timeline starts-->

					
					<form class='animated bounceInRight' action="" method="post" id="f" class="ff" enctype="multipart/form-data">
      				
      				
      				<table >
      					<tr align="center">
      						<td colspan="6">
      							<h2>
									Edit your Profile:
								</h2>
							</td>
      					</tr>
      				<tr>
      					<td align="right">Name:</td>
      					<td>
      						<input type="text" name="u_name" required="required" value="<?php echo $user_name; ?>"/>
      					</td>
      				</tr>
      				
      				<br>
      				<tr> 
      					<td align="right">Password:</td>
      					<td>
      						<input type="password" name="u_pass" value="<?php echo $user_pass;?>" required="required" />
      					</td>
      				</tr>
      				<tr>
      					<td align="right">Email:</td>
      					<td>
      						<input type="email" name="u_email" value="<?php echo $user_email;?>" required="required" />
      					</td>
      				</tr>
      				<tr>
      					<td align="right">Country:</td>
      					<td>
      						<select name="u_country" disabled="disabled">
      							<option><?php echo $user_country;?></option>
      							<option>India</option>
      							<option>USA</option>
      							<option>UK</option>
      							<option>Pakistan</option>
      							
      						</select>
      					</td>
      				</tr>
      				<tr>
      					<td align="right"  >Gender:</td>
      					<td>
      						<select name="u_gender" disabled="disabled" >
      							<option><?php echo $user_gender;?></option>
      							<option>Male</option>
      							<option>Female</option>
      						</select>
      					</td>
      				</tr>

      				<tr>
      					<td align="right">Photo:</td>
      					<td>
      						<input type="file" name="u_image" required="required" />
      					</td>
      				</tr>
      				
      				<tr align="center">
      				<td colspan="6">
      					<input type="submit" name="update" value="Update"/>
      				</td>
      				</tr>

      				</table>
      			</form>

 <?php

 		if (isset($_POST['update'])) {
 			# code...

 			$u_name = $_POST['u_name'];
 			$u_pass = $_POST['u_pass'];
 			$u_email = $_POST['u_email'];
 			$u_image = $_FILES['u_image']['name'];
 			$image_tmp = $_FILES['u_image']['tmp_name'];


 			move_uploaded_file($image_tmp,"user/user_images/$u_image");

 			$update = "update users set user_name='$u_name', user_pass='$u_pass',user_email='$u_email',user_image='$u_image' where user_id='$user_id' ";

 			$run = mysqli_query($con,$update);

 			if ($run) {
 				# code...

 				echo "<script>alert('Your Profile Update!</script>";
 				echo "<script>window.open('home.php','_self')</script>";


 			}


 		}

?>


			</div><!-- content_timeline ends-->


		</div><!-- content ends-->

	<!--</div> Container ends-->



</body>
</html>
<?php } ?>