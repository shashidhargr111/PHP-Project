<!DOCTYPE html>
<html lang="en">
<head>
  <title>Vasundhare Milk</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://use.fontawesome.com/1466ac2a62.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
   <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
   <?php include("../includes/connection.php") ?>
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    
      <a class="navbar-brand" href="#">Vasundhare Milk</a>
    </div>
  </div>
</nav>
 
  <div class="container">

	<div class="form-gap"></div>
	<div class="container">
		<div class="row">
			<div class="col-md-4 col-md-offset-4">
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="text-center">


							<h3><i class="fa fa-user fa-2x"></i></h3>
							<h2 class="text-center">Login</h2>
							<div class="panel-body">


								<form id="login-form" role="form" autocomplete="off" class="form" method="post">
                                        
                                        
                                    
									<div class="form-group">
									
										<div class="input-group">
										    
											<span class="input-group-addon"><i class="glyphicon glyphicon-earphone  color-blue"></i></span>

											<input name="user_num" type="text" class="form-control" placeholder="Enter Mobile No">
										</div>
									</div>

									<div class="form-group">
										<div class="input-group">
											<span class="input-group-addon"><i class="glyphicon glyphicon-lock color-blue"></i></span>
											<input name="password" type="password" class="form-control" placeholder="Enter Password">
										</div>
									</div>

									<div class="form-group">

										<input name="login" class="btn btn-lg btn-primary btn-block" value="Login" type="submit">
									</div>


								</form>
								<hr>
								    

							</div><!-- Body-->

						</div>
					</div>
				</div>
			</div>
		</div>
	</div> 
	
	<?php
                    if(!isset($_SESSION)) 
                    { 
                    session_start(); 
                    }
      
			if(isset($_POST['login'])){


				$email = mysqli_real_escape_string($con,$_POST['user_num']);
				$pass = mysqli_real_escape_string($con,$_POST['password']);

				$get_user = "select * from admin where admin_email='$email' AND admin_pass='$pass'";
				$run_user = mysqli_query($con,$get_user);
				$check = mysqli_num_rows($run_user);

				if($check==1){
 
					
					$_SESSION['admin_mobile_no']=$email;
                    
					echo "<script>window.open('home.php','_self')</script>";

				}else{ 

					echo "<script>alert('password,email is not correct')</script>";

				}


			}				
      
      ?>
	
    </div>
    
</body>
</html>
