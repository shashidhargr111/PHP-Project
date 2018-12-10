

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
 		
			$sel_users = "select *from users where user_id='$edit_id'";
			$run_users = mysqli_query($con,$sel_users);			
			$row_users = mysqli_fetch_array($run_users);

			$user_id = $row_users['user_id'];
			$user_name = $row_users['user_name'];
			$user_country = $row_users['user_country'];
			$user_gender = $row_users['user_gender'];
			$user_image = $row_users['user_image'];
			$user_reg_date = $row_users['register_date'];
			$user_email = $row_users['user_email'];
			
		
	 ?>
	 <center>
	<form action="" method="post" id="f" class="ff" enctype="multipart/form-data">
      				
      				
      				<table >
      					<tr align="center">
      						<td colspan="6">
      							<h2>
									Edit user Profile:
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
      						<select name="u_country" >
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
      						<select name="u_gender"  >
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
      			</form></center>
      			<?php } ?>

 <?php

 		if (isset($_POST['update'])) {
 			# code...

 			$u_name = $_POST['u_name'];
 			$u_pass = $_POST['u_pass'];
 			$u_email = $_POST['u_email'];
 			$u_country = $_POST['u_country'];
 			$u_image = $_FILES['u_image']['name'];
 			$image_tmp = $_FILES['u_image']['tmp_name'];


 			move_uploaded_file($image_tmp,"../user/user_images/$u_image");

 			$update = "update users set user_name='$u_name', user_pass='$u_pass',user_email='$u_email',user_country='$u_country',user_image='$u_image' where user_id='$edit_id' ";

 			$run = mysqli_query($con,$update);

 			if ($run) {
 				# code...

 				echo "<script>alert('User has been Update!</script>";
 				echo "<script>window.open('index.php?view_users','_self')</script>";


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
