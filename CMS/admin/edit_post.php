<?php 

	if (isset($_GET['p_id'])) {
		# code...
		$the_post_id = $_GET['p_id'];

		$query = "select *from posts where post_id = $the_post_id";
    	$select_posts = mysqli_query($connection,$query);

	    while ($row = mysqli_fetch_assoc($select_posts)) {
	        # code...
	        $post_id = $row['post_id'];
	        $post_author= $row['post_author'];
	        $post_title= $row['post_title'];
	        $post_category_id= $row['post_category_id'];
	        $post_status= $row['post_status'];
	        $post_image= $row['post_image'];
	        $post_tags= $row['post_tags'];
	        $post_comment_count= $row['post_comment_count']; 
	        $post_date= $row['post_date'];
	        $post_content= $row['post_content'];

	    }
	}


	if (isset($_POST['update_post'])) {
		# code...

		$post_author = $_POST['post_author'];
		$post_title = $_POST['post_title'];
		$post_category = $_POST['post_category'];
		$post_status = $_POST['post_status'];
		$post_content = $_POST['post_content'];
		$post_tags = $_POST['post_tags'];

		$post_image = $_FILES['image']['name'];
		$post_image_tmp = $_FILES['image']['tmp_name'];

		move_uploaded_file($post_image_tmp, "../images/$post_image");

		if(empty($post_image)){

			$query = "select *from posts where post_id = $the_post_id";
			$select_image = mysqli_query($connection,$query);

			while ($row = mysqli_fetch_assoc($select_image)) {
				# code...
				$post_image = $row['post_image'];

			}
		}

		$query = "update posts set ";
		$query .= "post_title = '{$post_title}', ";
		$query .= "post_category_id = '{$post_category}', ";
		$query .= "post_date = NOW(), ";
		$query .= "post_author = '{$post_author}', ";
		$query .= "post_status = '{$post_status}', ";
		$query .= "post_tags = '{$post_tags}', ";
		$query .= "post_content = '{$post_content}', ";
		$query .= "post_image = '{$post_image}' ";
		$query .= "where post_id = {$the_post_id} ";

		$update_post = mysqli_query($connection,$query);

		// errormsg($update_post);

		echo "<p class='alert alert-success'>Post Updated.<a href='../post.php?p_id={$the_post_id}'>View Post</a> or<a href='posts.php'> Edit More Post</a></p>";

	}	

 ?>

<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" value="<?php echo $post_title; ?>" class="form-control" name="post_title">
	</div>

	<div class="form-group">
		<label for="postcategory">Post Category ID</label>
		<select class="form-control" name="post_category" id="">
			<?php 

			 $query = "select *from categories  ";
	         $select_categories = mysqli_query($connection,$query);

	         // errormsg($select_categories);

	            while ($row = mysqli_fetch_assoc($select_categories)) {
	                # code...
	                $cat_id = $row['cat_id']; 
	                $cat_title = $row['cat_title'];


	                echo "<option  value='$cat_id'>$cat_title</option>";

	            }

			 ?>
			
		</select>
	</div>

	<div class="form-group">
		<label for="title">Post Author</label>
		<input type="text" value="<?php echo $post_author ; ?>" class="form-control" name="post_author">
	</div>

	<div class="form-group ">
		<!-- <label for="postcategory">Post Status</label><br> -->
		<select class="" name="post_status" id="">
			<option value='<?php echo $post_status ?>'><?php echo $post_status ?></option>
			
			<?php 

				if ($post_status == 'published') {
					# code...
					echo "<option value='draft'>draft</option>";

				}else{

					echo "<option value='published'>published</option>";

				}

			 ?>
			
	</div>


	<div class="form-group">
		<label for="post_image">Post Image</label><br>
		<img width="100" src="../images/<?php echo $post_image; ?>" alt="error">
		<input type="file" value="" class="form-control" name="image">
	</div>

	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" value="<?php echo $post_tags ; ?>" class="form-control" name="post_tags">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea name="post_content" value="" id="" class="form-control" ><?php echo $post_content ; ?></textarea>
	</div>
	
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="update_post" value="Update Post">
	</div>

</form>