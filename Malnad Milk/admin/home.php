<?php     include("../includes/connection.php") ?>


<?php 

 session_start();


if(isset($_SESSION['admin_mobile_no'])) {


}else {


header("location: index.php");


}
 ?>



<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
     <ul class="navbar-nav">
    
      <li  class="nav-item active" style="padding-left:25px;">
       
        <a class="nav-link" href="home.php"><i style="" class="fa fa-home"> Home</i></a>
      </li>
           
     
      <li class="nav-item " style="padding-left:25px;">
      
        <a class="nav-link " href="logout.php"><i style="" class="fa fa-sign-out"> Log Out </i></a>
      </li>
     
    </ul>
    
    
  </div>  
</nav>
<br>

<div class="container">
  
  <label for="exampleFormControlSelect1">Unverified User:-</label> 
  <table class="table  table-hover table-striped text-center  table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>First Name</th>
       <th>Mobile Number</th>
       <th>Milk Required</th>
<!--        <th>Verify</th>-->
<!--        <th>Delete</th>-->
        
        
       
      </tr>
    </thead>
    <tbody class="text-center">
    
     
    	<?php

						$get_cl_user = "select * from client_user where cl_status= 'unverified' ORDER by 1 DESC ";
						$run_cl_user = mysqli_query($con,$get_cl_user);
        
                        $check_user = mysqli_num_rows($run_cl_user);
        
                        if($check_user==1){

						while ($row=mysqli_fetch_array($run_cl_user)) {
							# code...
							$cl_user_id = $row['cl_user_id'];
							$cl_f_name = $row['cl_f_name'];
							$cl_l_name = $row['cl_l_name'];
							$cl_milk_liter = $row['cl_milk_liter'];
							$cl_milk_ml = $row['cl_milk_ml'];
							$cl_mobile_no = $row['cl_mobile_no'];
							$cl_status = $row['cl_status'];

                            
							echo "<tr>
                            <td><a href='view_profile.php?au_id=$cl_user_id'>{$cl_f_name}</a></td>
                            <td><a href='tel:+91{$cl_mobile_no}'>{$cl_mobile_no}</td>
                            <td>{$cl_milk_liter} Litter {$cl_milk_ml} ML</td>
                            
                            
                            </tr>
                            ";  }} else{
                                
                                echo "<tr>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            </tr>
                            <tr>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            </tr>
                            "; 
                                
                            }
                        
						  

				?>
       
        
      
      
    </tbody>
  </table>
  
  
  
    <label for="exampleFormControlSelect1">Verified User:-</label> 
  <table class="table  table-hover table-striped text-center  table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>First Name</th>

        
        <th>Mobile Number</th>
        <th>Milk Required</th>
        
       
      </tr>
    </thead>
    <tbody class="text-center">
    
     
    	<?php

						$get_cl_user = "select * from client_user where cl_status= 'verified'  ORDER by 1 DESC  ";
						$run_cl_user = mysqli_query($con,$get_cl_user);
        
                        
                        
						while ($row=mysqli_fetch_array($run_cl_user)) {
							# code...
							$cl_user_id = $row['cl_user_id'];
							$cl_f_name = $row['cl_f_name'];
							$cl_l_name = $row['cl_l_name'];
							$cl_milk_liter = $row['cl_milk_liter'];
							$cl_milk_ml = $row['cl_milk_ml'];
							$cl_mobile_no = $row['cl_mobile_no'];
							

							echo "<tr>
                            <td><a href='view_profile.php?au_id=$cl_user_id'>{$cl_f_name}</a></td>
                            <td><a href='tel:+91{$cl_mobile_no}'>{$cl_mobile_no}</td>
                            <td>{$cl_milk_liter} Litter {$cl_milk_ml} ML</td>
                            
                            
                            
                            </tr>
                            ";          
                            
						}

				?>
        
      
      
    </tbody>
  </table>
  
   <label for="exampleFormControlSelect1">Deactived User:-</label> 
  
  <table class="table  table-hover table-striped text-center  table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>First Name</th>
       <th>Mobile Number</th>
       <th>Milk Required</th>
<!--        <th>Verify</th>-->
<!--        <th>Delete</th>-->
        
        
       
      </tr>
    </thead>
    <tbody class="text-center">
    
     
    	<?php

						$get_cl_user = "select * from client_user where cl_status= 'deactive' ORDER by 1 DESC ";
						$run_cl_user = mysqli_query($con,$get_cl_user);
        
                        $check_user = mysqli_num_rows($run_cl_user);
        
                        if($check_user==1){

						while ($row=mysqli_fetch_array($run_cl_user)) {
							# code...
							$cl_user_id = $row['cl_user_id'];
							$cl_f_name = $row['cl_f_name'];
							$cl_l_name = $row['cl_l_name'];
							$cl_milk_liter = $row['cl_milk_liter'];
							$cl_milk_ml = $row['cl_milk_ml'];
							$cl_mobile_no = $row['cl_mobile_no'];
							$cl_status = $row['cl_status'];

                            
							echo "<tr>
                            <td><a href='view_profile.php?au_id=$cl_user_id'>{$cl_f_name}</a></td>
                            <td><a href='tel:+91{$cl_mobile_no}'>{$cl_mobile_no}</td>
                            <td>{$cl_milk_liter} Litter {$cl_milk_ml} ML</td>
                            
                            
                            </tr>
                            ";  }} else{
                                
                                echo "<tr>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            </tr>
                            <tr>
                            <td>--</td>
                            <td>--</td>
                            <td>--</td>
                            </tr>
                            "; 
                                
                            }
                        
						  

				?>
       
        
      
      
    </tbody>
  </table>
  
  
  
  
  
  
</div>

</body>
</html>


