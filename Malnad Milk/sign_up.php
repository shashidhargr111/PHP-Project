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
  
<?php include("includes/connection.php") ?>

</head>
<body>

<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="index.php">Vasundhare Milk</a>
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
         <label for="title">Firstname<span style="color:red;font-size:20px;" > * </span>:-</label>
          <input type="text" value="" class="form-control"  required="required" name="user_firstname">
      </div>
      
      
          

       <div class="form-group">
         <label for="post_status">Lastname<span style="color:red;font-size:20px;" > * </span>:-</label>
          <input type="text" value="" class="form-control"  required="required" name="user_lastname">
      </div>
     
      

      <div class="form-group">
         <label for="post_content">Mobile Number<span style="color:red;font-size:20px;" > * </span>:-</label>
          <input type="password" value="" class="form-control"  required="required" name="user_mobile_no1">
     </div>
     
     <div class="form-group">
         <label for="post_content">Confirmation Mobile Number<span style="color:red;font-size:20px;" > * </span>:-</label>
          <input type="text" value="" class="form-control"  required="required" name="user_mobile_no2">
     </div>
      
      <div class="form-group">
         <label for="post_content">Address<span style="color:red;font-size:20px;" > * </span>:-</label>
          <input type="text" value="" class="form-control"  required="required" name="address">
     </div>
     
     
     <div class="form-group">
         <label for="post_content">Land Mark:-</label>
          <input type="text" value="" class="form-control"   name="landmark">
     </div>
     
     
     <div class="form-group">
     <label for="post_content">Required Milk<span style="color:red;font-size:20px;" > * </span>:-</label>
    
    <div class="row">
          <div class="col-sm-7"><select class="form-control" required="required"  name="liter" id="">
            <option value="0">0 Litter</option>
            <option value="1">1 Litter</option>
            <option value="2">2 Litter</option>
            <option value="3">3 Litter</option>
            <option value="4">4 Litter</option>
            <option value="5">5 Litter</option>
            <option value="6">6 Litter</option>
            <option value="7">7 Litter</option>
            <option value="8">8 Litter</option>
            <option value="9">9 Litter</option>
            <option value="10">10 Litter</option>
            <option value="11">11 Litter</option>
        </select></div>
          <div class="col-sm-5"><select class="form-control" required="required" name="ml" id="">
            <option value="0">0 ML</option>
            <option value="0.5">.5 ML</option>
        </select></div>
    </div>
    </div>
    
      
      <div class="form-group">
          <label for="post_content">Screen short Your current loction:-</label><br>
           
           <input class="form-control"  type="file" name="loc_image">
      </div>
      
      <div class="form-group">
         <label for="post_content">Password<span style="color:red;font-size:20px;" > * </span>:-</label>
         <br>
         <p>*8 character</p>
         <p>*Give simple Password</p>
          <input type="password" value="" class="form-control"  required="required" name="user_password1">
      </div>
      
      <div class="form-group">
         <label for="post_content">Confirmation Password<span style="color:red;font-size:20px;" > * </span>:-</label>
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
				$address = mysqli_real_escape_string($con,$_POST['address']);
				$landmark = mysqli_real_escape_string($con,$_POST['landmark']);
				$milk_liter = mysqli_real_escape_string($con,$_POST['liter']);
				$milk_ml = mysqli_real_escape_string($con,$_POST['ml']);
        
                $loc_image    =  mysqli_real_escape_string($con,$_FILES['loc_image']['name']);
                $loc_image_temp   =  mysqli_real_escape_string($con,$_FILES['loc_image']['tmp_name']);
        
				$user_password1 = mysqli_real_escape_string($con,$_POST['user_password1']);
				$user_password2 = mysqli_real_escape_string($con,$_POST['user_password2']);
				$status = "unverified";
				$posts = "no";
                $user_pic = "default-user.png";
        
        
                move_uploaded_file($loc_image_temp, "img/loction/$loc_image"); 
        
        
               
        
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
        
        
        
                $get_moblie_no = "select * from client_user where cl_mobile_no='$user_mobile1'";
				$run_moblie_no = mysqli_query($con,$get_moblie_no);
				$check = mysqli_num_rows($run_moblie_no);
        
                 if($check==1){

					echo "<script>alert('Mobile Number is already registered,Plz try another!')</script>";
					exit();
				}
				else{

					$insert = "insert into client_user (cl_f_name,cl_l_name,cl_pass,cl_address,cl_mobile_no,cl_landmark,cl_last_login,cl_status,cl_milk_liter,cl_milk_ml,cl_milk_update,cl_pic,cl_screen_short) values ('$user_firstname','$user_lastname','$user_password1','$address','$user_mobile1','$landmark',NOW(),'$status','$milk_liter','$milk_ml',NOW(),'$user_pic','$loc_image')";

					$run_insert = mysqli_query($con,$insert);
                    
                    if(!$run_insert){
						die("Query Failed" . mysqli_error($con));

					}else{
						echo "<script>alert('Registration Successfull!')</script>";	
                        header("location: reg_succ.php");

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
   
   
    </div>
</body>
</html>
