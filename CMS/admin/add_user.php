<?php

if (isset($_POST['create_user'])) {
	# code...
	// $user_id = $_POST['user_id'];
	$user_firstname = $_POST['user_firstname'];
	$user_lastname = $_POST['user_lastname'];
	$user_role = $_POST['user_role'];

	// $post_image = $_FILES['image']['name'];
	// $post_image_temp = $_FILES['image']['tmp_name'];

	$username = $_POST['username'];
	$user_email = $_POST['user_email'];
	$user_password = $_POST['user_password'];
	// $post_date = date('d-m-y');
	
	// move_uploaded_file($post_image_temp, "../images/$post_image");


	$query = "insert into users (user_firstname,user_lastname,user_role,username,user_password,user_email)";
	$query .= "values ('{$user_firstname}','{$user_lastname}','{$user_role}','{$username}','{$user_password}','{$user_email}')";

	$create_user_query = mysqli_query($connection, $query);
 
	echo "User Created: " . " " ."<a href='users.php'>View users</a>";

}


?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">First Name</label>
		<input type="text" class="form-control" name="user_firstname">
	</div>

	<div class="form-group">
		<label for="post_status">Last name</label>
		<input type="text" class="form-control" name="user_lastname">
	</div>

	<div class="form-group">
		<label for="postcategory">Post Category ID</label>
		<select class="form-control" name="user_role" id="">

			<option value=''>Select Options</option>
			<option value='admin'>Admin</option>
			<option value='subscriber'>Subscriber</option>	

		</select>
	</div>

	

	<!-- <div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" class="form-control" name="image">
	</div> -->

	<div class="form-group">
		<label for="post_tags">User Name</label>
		<input type="text" class="form-control" name="username">
	</div>

	<div class="form-group">
		<label for="post_content">Email</label>
		<input type="email" class="form-control" name="user_email">
	</div>

	<div class="form-group">
		<label for="post_content">Password</label>
		<input type="password" class="form-control" name="user_password">
	</div>
	
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="create_user" value="Add User">
	</div>

</form>
<!-- 
<?php 

			 $query = "select *from users ";
	         $select_user = mysqli_query($connection,$query);

	         // errormsg($select_categories);

	            while ($row = mysqli_fetch_assoc($select_user)) {
	                # code...
	                $user_id = $row['user_id']; 
	                $user_role = $row['user_role'];


	                echo "<option value='$user_id'>$user_role</option>";

	            }

			 ?> -->