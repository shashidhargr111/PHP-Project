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
  
<?php include("../includes/connection.php") ?>

</head>
<body>

<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Vasundhare Milk</a>
    </div>
    
  </div>
</nav>
 
  <div class="container">


<div class="text-center">


	 <i style="" class="fa fa-user-plus fa-5x"></i>
	 <h2 class="text-center">Sign Up</h2>


    </div>
        
 
 
 <form action="sign_up.php" method="post" enctype="multipart/form-data">    
     
     
     
      <div class="form-group">
         <label for="title">Firstname:-</label>
          <input type="text" value="" class="form-control"  required="required" name="user_firstname">
      </div>
      
      
          

       <div class="form-group">
         <label for="post_status">Lastname:-</label>
          <input type="text" value="" class="form-control"  required="required" name="user_lastname">
      </div>
     
      

      <div class="form-group">
         <label for="post_content">Mobile Number:-</label>
          <input type="password" value="" class="form-control"  required="required" name="user_mobile_no1">
     </div>
     
     <div class="form-group">
         <label for="post_content">Confirmation Mobile Number:-</label>
          <input type="text" value="" class="form-control"  required="required" name="user_mobile_no2">
     </div>
      
     
      
      <div class="form-group">
         <label for="post_content">Password:-</label>
         <p>*8 character</p>
         <p>*Give simple Password</p>
          <input type="password" value="" class="form-control"  required="required" name="user_password1">
      </div>
      
      <div class="form-group">
         <label for="post_content">Confirmation Password:-</label>
          <input type="password" value="" class="form-control"  required="required" name="user_password2">
      </div>
      
    
    

       <div class="form-group ">
          <input class="btn btn-primary" type="submit" name="sign_up" value="Sign Up">  
             <a href="index.php">You Already Have Registered</a>
      </div>

        
</form>


 
      
<?php
    
    
    
    
    if(isset($_POST['sign_up'])){
        
        
                $user_firstname = mysqli_real_escape_string($con,$_POST['user_firstname']);
				$user_lastname = mysqli_real_escape_string($con,$_POST['user_lastname']);
				$user_mobile1 = mysqli_real_escape_string($con,$_POST['user_mobile_no1']);
				$user_mobile2 = mysqli_real_escape_string($con,$_POST['user_mobile_no2']);
				$user_password1 = mysqli_real_escape_string($con,$_POST['user_password1']);
				$user_password2 = mysqli_real_escape_string($con,$_POST['user_password2']);
				$status = "unverified";
				$posts = "no";
        
        
               
        
                if($user_mobile1 !== $user_mobile2){

                    echo "<script>alert('Your Mobile No and confirmation Mobile No or not some !')</script>";
                    
                    exit();
				}
  
        
                if($user_password1 !== $user_password2){

                    echo "<script>alert('Your password and confirmation password or not some !')</script>";
                    
                    exit();
				}
        
                
                if(strlen($user_mobile2) !== 10){

					echo "<script>alert('Invailed Mobile Number !')</script>";
					exit();

				}
        
    
        
                if(strlen($user_password1)<8){

					echo "<script>alert('Password should be minimum 8 character!')</script>";
					exit();

				}
        
        
        
                $get_moblie_no = "select * from seller_user where sl_mobile_no='$user_mobile1'";
				$run_moblie_no = mysqli_query($con,$get_moblie_no);
				$check = mysqli_num_rows($run_moblie_no);
        
                 if($check==1){

					echo "<script>alert('Mobile Number is already registered,Plz try another!')</script>";
					exit();
				}
				else{ 

					$insert = "insert into seller_user (sl_f_name,sl_l_name,sl_pass,sl_mobile_no,sl_last_login,sl_status) values ('$user_firstname','$user_lastname','$user_password1','$user_mobile1',NOW(),'$status')";

					$run_insert = mysqli_query($con,$insert);
                    
                    if(!$run_insert){
						die("Query Failed" . mysqli_error($con));

					}else{
						echo "<script>alert('Registration Successfull!')</script>";	

					}
				}
     
    }
?>


<!--
      <div class="form-group">
         <label for="post_content">Email:-</label>
          <input type="email" value="" class="form-control" name="user_email">
      </div>
        <div class="form-group">
         <label for="post_content">Confirmation Email:-</label>
          <input type="password" value="" class="form-control" name="user_email2">
      </div>
      
-->

</body>
</html>
