<?php
	

	if (isset($_GET['edit_user']))  {
		# code...

		$the_user_id = $_GET['edit_user'];

		$query = "select *from users where user_id = $the_user_id ";
        $select_users = mysqli_query($connection,$query);

        while ($row = mysqli_fetch_assoc($select_users)) {
            # code...
            $user_id = $row['user_id'];
            $username= $row['username'];
            $user_password= $row['user_password'];
            $user_firstname= $row['user_firstname'];
            $user_lastname= $row['user_lastname'];
            $user_email= $row['user_email'];
            $user_image= $row['user_image'];
            $user_role= $row['user_role'];
        }


	}

	if (isset($_POST['edit_user'])) {
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

				$query = "select randSalt from users ";
	 			$select_randsalt_query = mysqli_query($connection,$query);

	 			if (!$select_randsalt_query) {
	 				# code...
	 				die("failed ". mysqli_error($connection));
	 			}

	 			$row = mysqli_fetch_array($select_randsalt_query);
	 			$salt = $row['randSalt'];
	 			$hash_password = crypt($user_password,$salt);


		$query = "update users set ";
		$query .= "user_firstname = '{$user_firstname}', ";
		$query .= "user_lastname = '{$user_lastname}', ";
		$query .= "user_role = '{$user_role}', ";
		$query .= "username = '{$username}', ";
		$query .= "user_email = '{$user_email}', ";
		$query .= "user_password = '{$hash_password}' ";
		$query .= "where user_id = {$the_user_id} ";

		$update_users_query = mysqli_query($connection,$query);

	}


?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">First Name</label>
		<input type="text" value="<?php echo $user_firstname ; ?>" class="form-control" name="user_firstname">
	</div>

	<div class="form-group">
		<label for="post_status">Last Name</label>
		<input type="text" value="<?php echo $user_lastname ; ?>" class="form-control" name="user_lastname">
	</div>

	<div class="form-group">
		<label for="postcategory">User Role</label>
		<select class="form-control" name="user_role" id="">


			<?php 

				if ($user_role == 'admin') {
					# code...
					echo "<option value='subscriber'>Subscriber</option>";

				}else
				{
					echo "<option value='admin'>Admin</option>";
				}

			 ?>

		

		</select>
	</div>

	<!-- <div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" class="form-control" name="image">
	</div> -->

	<div class="form-group">
		<label for="post_tags">User Name</label>
		<input type="text" value="<?php echo $username ; ?>" class="form-control" name="username">
	</div>

	<div class="form-group">
		<label for="post_content">Email</label>
		<input type="email" value="<?php echo $user_email ; ?>" class="form-control" name="user_email">
	</div>

	<div class="form-group">
		<label for="post_content">Password</label>
		<input type="password" autocomplete="off" value="<?php echo $user_password ; ?>" class="form-control" name="user_password">
	</div>
	
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="edit_user" value="Edit User">
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