<?php     include("includes/connection.php") ?>


<?php 

 session_start();


if(isset($_SESSION['cl_mobile_no'])) {


}else {


header("location: index.php");


}
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Home</title>
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
    <ul class="navbar-nav">
    
      <li  class="nav-item active" style="padding-left:25px;">
       
        <a class="nav-link" href="home.php"><i style="" class="fa fa-home"> Home</i></a>
      </li>
           
      <li class="nav-item " style="padding-left:25px;">
       
        <a class="nav-link" href="view_profile.php"><i style="" class="fa fa-user"> Edit Profile </i></a>
      </li>
      
      <li class="nav-item " style="padding-left:25px;">
      
        <a class="nav-link " href="logout.php"><i style="" class="fa fa-sign-out"> Log Out </i></a>
        
      </li>
     
    </ul>
    
    
  </div>  
</nav>
<br>

<div class="container">
 
 
 
<!-- Required milk-->
 <form action="" method="post">
 
<label for="exampleFormControlSelect1">Required Milk:-</label> 
 <div class="form-row">
 
  <div class="col">
  
  <?php
        $cl_ph_no=$_SESSION['cl_mobile_no'];
        $get_cl_id =  " select *from client_user where cl_mobile_no = '$cl_ph_no'";         
        $run_get_cl_id = mysqli_query($con,$get_cl_id) ;
        
        while($row = mysqli_fetch_array($run_get_cl_id)){
        
            $cl_user_id = $row['cl_user_id'];
             $cl_liter = $row['cl_milk_liter'];
             $cl_ml = $row['cl_milk_ml'];
            
            
            
?>
 <select class="form-control" name="litter" id="">
            <option value="<?php echo $cl_liter; ?>"><?php echo $cl_liter . " Litter"; ?></option>
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
        </select>
     </div>
        <div class="col">
   
        <select class="form-control" name="ml" id="">
            <option value="<?php echo $cl_ml; ?>"><?php echo $cl_ml ." ML" ; ?></option>
            <option value="0">0 ML</option>
            <option value="0.5">.5 ML</option>
        </select>
     </div>
       </div>
        <br>
         
<input  class="btn btn-primary"  type="submit" name="update" value="Update">
     
    </form><br>
    
    
    
    <?php
    
    
    if(isset($_POST['update'])){
        
        
                $litter = mysqli_real_escape_string($con,$_POST['litter']);
				$ml = mysqli_real_escape_string($con,$_POST['ml']);
				


					$update = "update client_user set cl_milk_liter='$litter',cl_milk_ml='$ml' where cl_user_id='$cl_user_id' ";

					$run_update = mysqli_query($con,$update);
                    
                    if(!$run_update){
						die("Query Failed" . mysqli_error($con));

					}else{
						echo "<script>alert('Update Successfull!')</script>";
						echo "<script>window.open('home.php','_self')</script>";
                        

					}
		
                
    }
                
        ?>
    
    <?php } ?>
    
    
    
    
    
    
    
<!--    ends here-->
  
  <label for="exampleFormControlSelect1">Received Milk:-</label> 
  <table class="table text-center table-striped  table-bordered">
    <thead class="table-dark">
      <tr>
        <th>Date</th>
        <th>Received Milk</th>
        <th>Delivered By</th>
       
      </tr>
    </thead>
    <tbody>
     
     <?php 
        
        
        $cl_ph_no=$_SESSION['cl_mobile_no'];
        $get_cl_id =  " select *from client_user where cl_mobile_no = '$cl_ph_no'";         
        $run_get_cl_id = mysqli_query($con,$get_cl_id) ;
        $row = mysqli_fetch_array($run_get_cl_id);
            
             $cl_id = $row['cl_user_id'];
        
        
        
        
        $list_buyed_milk =  " select *from buyed_milk where buyed_cl_user_id = '$cl_id'";         
        $run_list_buyed_milk = mysqli_query($con,$list_buyed_milk) ;
        
        while($row = mysqli_fetch_array($run_list_buyed_milk)){
            $buyed_milk_date = $row['buyed_milk_date'];
            $buyed_milk = $row['buyed_milk'];
            $buyed_sl_user_name = $row['buyed_sl_user_name'];
            
            echo "
                <tr>
                <td>$buyed_milk_date</td>
                <td>$buyed_milk litter</td>
                <td>$buyed_sl_user_name</td>
                </tr>
            ";
        
        }
        
        ?>
  
           
    </tbody>
  </table>
  
  
</div>

</body>
</html>