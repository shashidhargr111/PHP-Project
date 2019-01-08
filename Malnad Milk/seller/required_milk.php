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
  <a class="navbar-brand" href="index.php">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse " id="collapsibleNavbar">
    <ul style="padding-left:50px;" class="navbar-nav">
    
      <li  class="nav-item " style="padding-left:25px;">
       
        <a class="nav-link " href="home.php"><i style="" class="fa fa-home"> Home</i></a>
      </li>
      
      <li style="padding-left:25px;" class="nav-item ">
       
        <a class="nav-link active" href="required_milk.php"><i style="" class="fa fa-arrow-down "> Required Milk </i></a>
      </li>
           
      <li class="nav-item " style="padding-left:25px;">
       
        <a class="nav-link" href="view_profile.php"><i style="" class="fa fa-user"> Edit My Profile </i></a>
      </li>
      
      <li class="nav-item " style="padding-left:25px;">
      
        <a class="nav-link " href="logout.php"><i style="" class="fa fa-sign-out"> Log Out </i></a>
      </li>
     
    </ul>
    
    
  </div>  
</nav>
<br>
<br>
<div class="container">

  <label for="exampleFormControlSelect1"> Required milk:-</label> 
  <table class="table  table-hover table-striped text-center  table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>First Name</th>
<!--        <th>Last Name</th>-->
       
        <th>Milk Required</th>
        <th>Mobile no</th>
        <th>Update on</th>
        
        
       
      </tr>
    </thead>
    <tbody class="text-center">
    
     
    	<?php

						$get_cl_user = "select * from client_user where cl_status='verified' ";
						$run_cl_user = mysqli_query($con,$get_cl_user);

						while ($row=mysqli_fetch_array($run_cl_user)) {
							# code...
							$cl_user_id = $row['cl_user_id'];
							$cl_f_name = $row['cl_f_name'];
							$cl_l_name = $row['cl_l_name'];
							$cl_mobile_no = $row['cl_mobile_no'];
							$cl_milk_liter = $row['cl_milk_liter'];
							$cl_milk_ml = $row['cl_milk_ml'];
							$cl_milk_update = $row['cl_milk_update'];

							echo "<tr>
                            <td><a href='delivered_milk.php?u_id=$cl_user_id'>{$cl_f_name}</a></td>
                            <td>{$cl_milk_liter}"." Litter"." {$cl_milk_ml}". " ML</td>
                            <td><a href='tel:+91{$cl_mobile_no}'><i class='glyphicon glyphicon-earphone '></i>{$cl_mobile_no}</a>
                            </td>
                            <td>{$cl_milk_update}</td>                           
 
                            </tr>
                            ";       
                            
                        }

				?>
        
      
      
    </tbody>
  </table>
  <br>
  <br>
  
      <?php 
    $sum = 0;
    $sum2 = 0;
    $get_cl_user = "select * from client_user where cl_status='verified' ";
						$run_cl_user = mysqli_query($con,$get_cl_user);

						while ($row=mysqli_fetch_array($run_cl_user)) {
							# code.
                            
                            $sum += $row['cl_milk_liter'];
                            $sum2 += $row['cl_milk_ml'];
                            
                            
                        }

    
    ?>
  
  
  
  
  
 
  <div class='form-group'>
            <label for='title'>Total Required Milk:-</label>
            <div class="row">
            <div class="col-sm-5">
            <input type='text' disabled='disabled' value='<?php echo $sum + $sum2; ?>'  class='form-control' >
            </div>
            </div>
            
      </div>
  
  
  <br>
  
  
  
 
<!-- Required milk-->
 <form action="" method="post">
 
<label for="exampleFormControlSelect1"> Buyed Milk:-</label> 
 <div class="form-row">
 
  <div class="col-sm-7">

 <select class="form-control" required="required" name="liter" id="">
            <option value="">Select Litter</option>
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
            <option value="12">12 Litter</option>
            <option value="13">13 Litter</option>
            <option value="14">14 Litter</option>
            <option value="15">15 Litter</option>
            <option value="16">16 Litter</option>
            <option value="17">17 Litter</option>
            <option value="18">18 Litter</option>
            <option value="19">19 Litter</option>
            <option value="20">20 Litter</option>
            <option value="21">21 Litter</option>
            <option value="22">22 Litter</option>
            <option value="23">23 Litter</option>
            <option value="24">24 Litter</option>
            <option value="25">25 Litter</option>
            <option value="26">26 Litter</option>
            <option value="27">27 Litter</option>
            <option value="28">28 Litter</option>
            <option value="29">29 Litter</option>
            <option value="30">30 Litter</option>
        </select>
     </div>
        <div class="col-sm-5">
   
        <select class="form-control" disabled name="ml" id="">
            <option value="0">0 ML</option>
            <option value="0.5">.5 ML</option>
        </select>
     </div>
       </div>
        <br>
        <input class="btn btn-primary" type="submit" name="submit">
     
    </form><br>
<!--    ends here-->
 
 <?php
 
    if(isset($_POST['submit'])){
        
        
        $milk_liter = mysqli_real_escape_string($con,$_POST['liter']);
//	    $milk_ml = mysqli_real_escape_string($con,$_POST['ml']);
        
        $sl_ph_no = $_SESSION['sl_mobile_no'];
        $sl_user = "select * from seller_user where sl_mobile_no= '$sl_ph_no' ";
        $run_sl_user = mysqli_query($con,$sl_user);
        
        if(!$run_sl_user){
            die("failed" . mysqli_error($con));
        }
        
        while($row = mysqli_fetch_array($run_sl_user)){
           $sl_id = $row['sl_user_id'];
            $sl_name = $row['sl_f_name'];
        
        
        $insert = "insert into required_milk (sl_u_name,sl_buy_milk,sl_buy_milk_dt) values ('$sl_name','$milk_liter',NOW())";

					$run_insert = mysqli_query($con,$insert);
                    
                    if(!$run_insert){
						die("Query Failed" . mysqli_error($con));

					}else{
						echo "<script>alert('Successfull!')</script>";	

					}
        }
    
    }
    
    
    ?>  
 
 
  </div>
  

</body>
</html>