<?php

if (isset($_POST['add_post'])) {
	# code...
	$post_title = $_POST['title'];
	$post_author = $_POST['author'];
	$post_category_id = $_POST['post_category'];
	$post_status = $_POST['post_status'];

	$post_image = $_FILES['image']['name'];
	$post_image_temp = $_FILES['image']['tmp_name'];

	$post_content = $_POST['post_content'];
	$post_tags = $_POST['post_tags'];
	$post_date = date('d-m-y');
	
	move_uploaded_file($post_image_temp, "../images/$post_image");


	$query = "insert into posts(post_category_id,post_title,post_author,post_date,post_image,post_content,post_tags,post_status)";
	$query .= "values ('{$post_category_id}','{$post_title}','{$post_author}',NOW(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";

	$create_post_query = mysqli_query($connection, $query);

	$the_post_id = mysqli_insert_id($connection);


	echo "<p class='alert alert-success'>Post Created.<a href='../post.php?p_id={$the_post_id}'>View Post</a> or<a href='posts.php'> Edit More Post</a></p>";

}


?>



<form action="" method="post" enctype="multipart/form-data">

	<div class="form-group">
		<label for="title">Post Title</label>
		<input type="text" class="form-control" name="title">
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


	                echo "<option value='$cat_id'>$cat_title</option>";

	            }

			 ?>
			
		</select>
	</div>

	<div class="form-group">
		<label for="title">Post Author</label>
		<input type="text" class="form-control" name="author">
	</div>

	<!-- <div class="form-group">
		<label for="post_status">Post Status</label>
		<input type="text" class="form-control" name="post_status">
	</div> -->

	<div class="form-group">
		<label for="post_status">Post Status</label>
		<select class="form-control" name="post_status" id="">
			<option value='draft'>Select Option</option>
			<option value='published'>Published</option>
			<option value='draft'>Draft</option>
		</select>

	</div>

	<div class="form-group">
		<label for="post_image">Post Image</label>
		<input type="file" class="form-control" name="image">
	</div>

	<div class="form-group">
		<label for="post_tags">Post Tags</label>
		<input type="text" class="form-control" name="post_tags">
	</div>

	<div class="form-group">
		<label for="post_content">Post Content</label>
		<textarea name="post_content" id="editor" class="form-control" cols="30" rows="10" ></textarea>
	</div>
	
	<div class="form-group">
		<input type="submit" class="btn btn-primary" name="add_post" value="Add Post">
	</div>

</form>

<!-- <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
    </script> -->