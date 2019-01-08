<?php     include("../includes/connection.php") ?>


<?php 

 session_start();


if(isset($_SESSION['sl_mobile_no'])) {


}else {


header("location: index.php");


}
 ?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit Profile</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
   <script src="https://use.fontawesome.com/1466ac2a62.js"></script>
</head>
<body>

<nav class="navbar navbar-expand-md bg-dark navbar-dark sticky-top">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="collapsibleNavbar">
    <ul style="padding-left:50px;" class="navbar-nav">
    
      <li  class="nav-item " style="padding-left:25px;">
       
        <a class="nav-link " href="home.php"><i style="" class="fa fa-home"> Home</i></a>
      </li>
      
      <li style="padding-left:25px;" class="nav-item ">
       
        <a class="nav-link" href="required_milk.php"><i style="" class="fa fa-arrow-down "> Required Milk </i></a>
      </li>
           
      <li class="nav-item  active" style="padding-left:25px;">
       
        <a class="nav-link " href="view_profile.php"><i style="" class="fa fa-user"> Edit My Profile </i></a>
      </li>
      
      <li class="nav-item " style="padding-left:25px;">
      
        <a class="nav-link " href="logout.php"><i style="" class="fa fa-sign-out"> Log Out </i></a>
      </li>
     
    </ul>
    
    
  </div>  
</nav>
<br>

<div class="container">

<?php
                $cl_mobile_no_sess=$_SESSION['sl_mobile_no'] ;
                $get_moblie_no = "select * from client_user where cl_mobile_no = '$cl_mobile_no_sess'  ";
				$run_moblie_no = mysqli_query($con,$get_moblie_no);
    
                if(!$run_moblie_no){
                    die("failed".mysqli_error($con));
                    
                }
				while ($row=mysqli_fetch_array($run_moblie_no)) {
							# code...
				            $cl_user_id = $row['cl_user_id'];
							$cl_f_name = $row['cl_f_name'];
							$cl_l_name = $row['cl_l_name'];
							$cl_email = $row['cl_email'];
							$cl_pass = $row['cl_pass'];
							$cl_address = $row['cl_address'];
							$cl_mobile_no = $row['cl_mobile_no'];
							$cl_home_no = $row['cl_home_no'];
							$cl_landmark = $row['cl_landmark'];
                    
                }
                    
                

     ?>

<div class="container">
 <form action="" method="post" enctype="multipart/form-data">    
         
      <div class="form-group">
         <label for="title">Firstname<span style="color:red;font-size:20px;" > * </span>:-</label>
          <input type="text" value="<?php echo $cl_f_name; ?>" class="form-control" required="required" name="user_firstname">
      </div>
      
      
           

       <div class="form-group">
         <label for="post_status">Lastname<span style="color:red;font-size:20px;" > * </span>:-</label>
          <input type="text" value="<?php echo $cl_l_name; ?>" class="form-control"  required="required" name="user_lastname">
      </div>
     
      

      <div class="form-group">
         <label for="post_content">Mobile Number<span style="color:red;font-size:20px;" > * </span>:-</label>
          <input type="password" value="<?php echo $cl_mobile_no; ?>" class="form-control"  required="required" name="user_mobile_no1">
     </div>
     
     <div class="form-group">
         <label for="post_content">Confirmation Mobile Number<span style="color:red;font-size:20px;" > * </span>:-</label>
          <input type="text" value="<?php echo $cl_mobile_no; ?>" class="form-control"  required="required" name="user_mobile_no2">
     </div>
     
     
      
      <div class="form-group">
         <label for="post_content">Password<span style="color:red;font-size:20px;" > * </span>:-</label><br>
        <p>*8 character</p>
         <p>*Give simple Password</p>
          <input type="password" value="<?php echo $cl_pass; ?>" class="form-control"  required="required" name="user_password1">
      </div>
      
      <div class="form-group">
         <label for="post_content">Confirmation Password<span style="color:red;font-size:20px;" > * </span>:-</label>
          <input type="password" value="<?php echo $cl_pass; ?>" class="form-control"  required="required" name="user_password2">
      </div>

       <div class="form-group ">
          <input class="btn btn-primary" type="submit" name="update_profile" value="Update Profile">  
             
      </div>

        
</form>


      
<?php
    
    
    
    
    if(isset($_POST['update_profile'])){
        
        
                $user_firstname = mysqli_real_escape_string($con,$_POST['user_firstname']);
				$user_lastname = mysqli_real_escape_string($con,$_POST['user_lastname']);
				$user_mobile1 = mysqli_real_escape_string($con,$_POST['user_mobile_no1']);
				$user_mobile2 = mysqli_real_escape_string($con,$_POST['user_mobile_no2']);
				$user_password1 = mysqli_real_escape_string($con,$_POST['user_password1']);
				$user_password2 = mysqli_real_escape_string($con,$_POST['user_password2']);
				
        
        
               
        
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
        
    

					$update = "update seller_user set sl_f_name='$user_firstname',sl_l_name='$user_lastname',sl_pass='$user_password1',sl_mobile_no='$user_mobile1' where sl_user_id='$sl_user_id' ";

					$run_update = mysqli_query($con,$update);
                    
                    if(!$run_update){
						die("Query Failed" . mysqli_error($con));

					}else{
						echo "<script>alert('Update Successfull!')</script>";	
                        echo "<script>window.open('view_profile.php','_self')</script>";

					}
		
                
    }
                
        ?>
 
 
 
    </div>
    </div>
    </body>
</html>
  