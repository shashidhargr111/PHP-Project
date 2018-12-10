<?php


		if(!isset($_SESSION)) 
   		{ 
        session_start(); 
   		} 
		include("includes/connection.php");

			if(isset($_POST['login'])){


				$email = mysqli_real_escape_string($con,$_POST['email']);
				$pass = mysqli_real_escape_string($con,$_POST['pass']);

				$get_user = "select * from users where user_email='$email' AND user_pass='$pass'";
				$run_user = mysqli_query($con,$get_user);
				$check = mysqli_num_rows($run_user);

				if($check==1){


				$get_user_v = "select * from users where user_email='$email' AND status='verified'";
				$run_user_v = mysqli_query($con,$get_user_v);
				$check_v = mysqli_num_rows($run_user_v);

				if($check_v == 1){
 
					
					$_SESSION['user_email']=$email;

					// $get_user_last = "update users set last_login='NOW()' where user_email='$email'";
					// $run_userlast = mysqli_query($con,$get_user_last);

					echo "<script>window.open('home.php','_self')</script>";



				}
				else
				{
					echo "<script>alert('Your Email and Password is correct,But your account is not verified...')</script>";
				}

				}

				else{ 

					echo "<script>alert('password,email is not correct')</script>";

				}


			}				

?>