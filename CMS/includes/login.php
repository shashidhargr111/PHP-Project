<?php 
	
	session_start();

	include "db.php";
	include "../admin/function.php";


 ?>

 <?php 

 	if (isset($_POST['login'])) {
 		# code...

 		// login_user($_POST['username'],$_POST['password']);


 		$username = $_POST['username'];
 		$password = $_POST['password'];

 		$username = trim($username);
		$password = trim($password);


 		$username = mysqli_real_escape_string($connection, $username);
 		$password = mysqli_real_escape_string($connection, $password);

 		$query = "select * from users where username = '{$username}' ";
 		$select_user_query = mysqli_query($connection,$query);

 		while ($row = mysqli_fetch_array($select_user_query)) {
 			# code...
 			$db_id = $row['user_id'];
 			$db_username = $row['username']; 
 			$db_user_password = $row['user_password'];
 			$db_user_firstname = $row['user_firstname'];
 			$db_user_lastname = $row['user_lastname'];
 			$db_user_role = $row['user_role'];

 		}

 		$password = crypt($password,$db_user_password);
 		
 		if ($username === $db_username && $password === $db_user_password ) {
 			# code...

 			$_SESSION['username'] = $db_username;
 			$_SESSION['firstname'] = $db_user_firstname;
 			$_SESSION['lastname'] = $db_user_lastname;
 			$_SESSION['user_role'] = $db_user_role;

 			header("Location: ../admin");

 		}  else {

 			header("Location: ../index.php");
 		}



	}


  ?>