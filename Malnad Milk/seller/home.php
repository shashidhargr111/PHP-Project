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
  <title>Home Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../css/style.css">
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
    
      <li  class="nav-item active" style="padding-left:25px;">
       
        <a class="nav-link " href="home.php"><i style="" class="fa fa-home"> Home</i></a>
      </li>
      
      <li style="padding-left:25px;" class="nav-item ">
       
        <a class="nav-link" href="required_milk.php"><i style="" class="fa fa-arrow-down "> Required Milk </i></a>
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


<div class="container">

  
 <label for="exampleFormControlSelect1">Today Delivered Milk::-</label> 
  <table class="table text-center table-striped table-hover table-bordered">
    <thead class="table-dark">
      <tr>
        <th>Date</th>
        <th>Received Milk</th>
        <th>Delivered By</th>
       
      </tr>
    </thead>
    <tbody>
     
     <?php 
        
      
     
       
            
        $current_date    = date('Y-m-d');
        
       
        $list_buyed_milk_date =  " select *from buyed_milk where buyed_milk_date = '$current_date'";         
        $run_list_buyed_milk_date = mysqli_query($con,$list_buyed_milk_date) ;
        
        $check_user = mysqli_num_rows($run_list_buyed_milk_date);
        
        if($check_user==1){
        
        while($row = mysqli_fetch_array($run_list_buyed_milk_date)){
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
        
        } }else{
                                
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
  
  <br>
  <br>
  

 <form action="" method="post">
 <div class="form-group">
<label for="exampleFormControlSelect1"> List of Delivered Milk:-</label> 
 <div class="row">
 <div class="col-sm-3">
  <input class="form-control" type="date"  name="form_date" required="required"/>
     </div>
     <div class="col-sm-2">
     <input type="submit" class="btn btn-primary" name="display" value="Submit">
     
     
     </div>
     </div>
     </div>
  
  
  
    </form>
    <br>
  <?php
    
    
    
    ?>

  
 <label for="exampleFormControlSelect1">Received Milk:-</label> 
  <table class="table text-center table-striped table-hover table-bordered">
    <thead class="table-dark">
      <tr>
        <th>Date</th>
        <th>Received Milk</th>
        <th>Delivered By</th>
       
      </tr>
    </thead>
    <tbody>
     
     <?php 
        
        if(isset($_POST['display'])){
     
       $form_day = mysqli_real_escape_string($con,$_POST['form_date']);
            
        $current_date    = date('Y-m-d');
        
       
        $list_buyed_milk_date =  " select *from buyed_milk where buyed_milk_date = '$form_day'";         
        $run_list_buyed_milk_date = mysqli_query($con,$list_buyed_milk_date) ;
            
            
            $check_user = mysqli_num_rows($run_list_buyed_milk_date);
        
       
        
        while($row = mysqli_fetch_array($run_list_buyed_milk_date)){
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
        
            
        }
        ?>
     

           
    </tbody>
  </table>
  
  
  
  
  
</div>

</body>
</html>


