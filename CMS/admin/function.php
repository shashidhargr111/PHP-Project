<?php 


	
	function redirect($location){
		
		return header("Location: " . $location);


	}


	function escape($string){

		global $connection;

		return mysqli_real_escape_string($connection,trim($string)); 
	}


	function errormsg(){

		global $connection;

		if (!$result) {
			# code...
			die('Query Failed'.mysqlierror($connection));
		}

	}


	function insert_categories(){


		global $connection;
		if(isset($_POST['submit'])){

			$cat_title = $_POST['cat_title'];

			if($cat_title == "" || empty($cat_title)){

				echo "This field should not be empty....";

			}else {
				
				$query = "insert into categories(cat_title)";
				$query .= "value ('{$cat_title}')" ;
				$create_category_query = mysqli_query($connection,$query);
				if (!$create_category_query) {
					# code...
					die('failed '. mysqli_error($connection));
				}

			}

		}
	}


	function findAllCate(){

		global $connection;
		 // find all categories
        $query = "select *from categories ";
        $select_categories = mysqli_query($connection,$query);

		while ($row = mysqli_fetch_assoc($select_categories)) {
		# code...
		$cat_id = $row['cat_id'];
		$cat_title = $row['cat_title'];
		echo "<tr>";
		echo "<td>{$cat_id}</td>";
        echo "<td>{$cat_title}</td>";
		echo "<td><a href ='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo "<td><a href ='categories.php?edit={$cat_id}'>Edit</a></td>";
		echo "</tr>";
		}

	}

	function delete_cate(){

		global $connection;

        if (isset($_GET['delete'])) {
            # code...

            $the_cate_id = $_GET['delete'];

            $query = "delete from categories where cat_id = {$the_cate_id}";
            $delete_query = mysqli_query($connection,$query); 
            header("Location: categories.php");

        }
	}


	function is_admin($username){

		global $connection;


		$query = "select user_role from users where username = '$username'";

		$result = mysqli_query($connection,$query);

		$row = mysqli_fetch_array($result);

		if ($row['user_role'] == 'admin') {
			# code...
			return true;
		}else{

			return false;

		}


	}


	function username_exists($username){

		global $connection;

		$query = "select username from users where username = '$username'";

		$result = mysqli_query($connection,$query);

		// $row = mysqli_fetch_array($result);

		if (mysqli_num_row($result) > 0) {
			# code...
			return true;
		}else{
			return false;
		}



	}

	function email_exists($email){

		global $connection;
 
		$query = "select user_email from users where user_email = '$email'";

		$result = mysqli_query($connection,$query);

		// $row = mysqli_fetch_array($result);

		if (mysqli_num_row($result) > 0) {
			# code...
			return true;
		}else{
			return false;
		}



	}




 ?>