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
  <title>Delivered Milk</title>
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


<?php
   
         if (isset($_GET['u_id'])) {
          # code...

                $get_id = $_GET['u_id'];
                $client_get = "select * from client_user where cl_user_id ='$get_id'";
                $run_client_get = mysqli_query($con,$client_get);

                   if(!$run_client_get){
                        die("failed" . mysqli_error($con));
                    }
                   while($row = mysqli_fetch_array($run_client_get)){
                        $cl_id = $row['cl_user_id'];
                        $cl_name = $row['cl_f_name'];
                        $cl_l_name = $row['cl_l_name'];
                        $cl_address = $row['cl_address'];
                        $cl_landmark = $row['cl_landmark'];
                        $cl_mobile_no = $row['cl_mobile_no'];
                        $cl_home_no = $row['cl_home_no'];
                        $cl_screen_short = $row['cl_screen_short'];
                        $cl_pic = $row['cl_pic'];
                 
  

    ?>
    




<div class="container">
 
 <div class="text-center">
 <img src="../img/profile/<?php echo $cl_pic; ?>" class="rounded-circle" alt="error img load" width="100" height="100"> 
<br>
 
  
   <h1><?php echo $cl_name . " " . $cl_l_name  ; ?></h1> 
   <h2><a href='tel:+91<?php echo $cl_home_no; ?>'><i class='fa fa-phone '></i><?php echo $cl_home_no; ?></a></h2>
  </div>
  <br><br>
  
    <form action="" method="post">
    
<div class="form-group">
     <label for="post_content">Delivered The Milk<span style="color:red;font-size:20px;" > * </span>:-</label>
    
    <div class="row">
          <div class="col-sm-7"><select class="form-control" required="required"  name="liter" id="">
            <option value="">Select Litter/ML</option>
            <option value="0">0 Litter</option>
            <option value="0.5">0.5 Liter</option>
            <option value="1">1 Litter</option>
            <option value="1.5">1.5 Liter</option>
            <option value="2">2 Litter</option>
            <option value="2.5">2.5 Liter</option>
            <option value="3">3 Litter</option>
            <option value="3.5">3.5 Litter</option>
            <option value="4">4 Litter</option>
            <option value="4.5">4.5 Litter</option>
            <option value="5">5 Litter</option>
            <option value="5.5">5.5 Litter</option>
            <option value="6">6 Litter</option>
            <option value="6.5">6.5 Litter</option>
            <option value="7">7 Litter</option>
            <option value="7.5">7.5 Litter</option>
            <option value="8">8 Litter</option>
            <option value="8.5">8.5 Litter</option>
            <option value="9">9 Litter</option>
            <option value="9.5">9.5 Litter</option>
            <option value="10">10 Litter</option>
            <option value="10.5">10.5 Litter</option>
            <option value="11">11 Litter</option>
            <option value="11.5">11.5 Litter</option>
        </select></div>

          
    </div>
    </div>
    
    <input type="submit" class="btn btn-primary" name="delivered"> 
    
 </form>
 
 
 <?php 
    
    if(isset($_POST['delivered'])){
        
        
        $cl_buyed_liter =mysqli_real_escape_string($con,$_POST['liter']);

        
        $sl_ph_no = $_SESSION['sl_mobile_no'];
        $sl_user = "select * from seller_user where sl_mobile_no= '$sl_ph_no' ";
        $run_sl_user = mysqli_query($con,$sl_user);
        
        if(!$run_sl_user){
            die("failed" . mysqli_error($con));
        }

        
        while($row = mysqli_fetch_array($run_sl_user)){
           $sl_id = $row['sl_user_id'];
            $sl_name = $row['sl_f_name'];
            
       
        
        
        $insert ="insert into buyed_milk (buyed_cl_user_id,buyed_sl_user_name,buyed_milk,buyed_milk_date) values ('$cl_id','$sl_name','$cl_buyed_liter',NOW())";
        $run_insert = mysqli_query($con,$insert);

                if(!$run_insert){

                    die("failed" . mysqli_error($con));
                }else
                {
                    echo "<script>alert('Ok.... The milk was delivered !')</script>";
                    
                }
        
        
         }
    }
    

    
    ?>
 
<br>

<br>
   <div class='form-group'>
         <label for='title'>Address:-</label><br>
     <textarea  class='form-control' disabled='disabled' ><?php echo $cl_address; ?></textarea>
      </div>
      
      
       <div class='form-group'>
         <label for='title'>Landmark:-</label>
          <input type='text' disabled='disabled' value='<?php echo $cl_landmark; ?>'  class='form-control' >
      </div>
   <div class='form-group'>
         <label for='title'>Home Number:-</label>
         <a class='form-control'  href='tel:+91<?php echo $cl_home_no; ?>'><i class='fa fa-phone '></i><?php echo $cl_home_no; ?></a>
      </div> 
      
         
            
        <form action="" method="post">
    
<div class="form-group">
     <label for="post_content">Payment<span style="color:red;font-size:20px;" > * </span>:-</label>
    
    <div class="row">
          <div class="col-sm-7"><input type="text" name="amount" disabled required="required" class="form-control" value="" placeholder="Enter the Amount"> </div>
         
    <div class="col-sm-5"><input type="text" name="content" disabled required="required" class="form-control" value="" placeholder="Enter the Content"> 
    </div> 
    </div>
    <br>
    <input type="submit" disabled class="btn btn-primary" name="payed"> 
            </div>
    
 </form>
                 
                 
                 
                 <?php
                    
                       
                       
    if(isset($_POST['payed'])){
        
        
        $cl_paid_amount =mysqli_real_escape_string($con,$_POST['amount']);
        $cl_paid_content =mysqli_real_escape_string($con,$_POST['content']);

        
        $sl_ph_no = $_SESSION['sl_mobile_no'];
        $sl_user = "select * from seller_user where sl_mobile_no= '$sl_ph_no' ";
        $run_sl_user = mysqli_query($con,$sl_user);
        
        if(!$run_sl_user){
            die("failed" . mysqli_error($con));
        }

        
        while($row = mysqli_fetch_array($run_sl_user)){
           $sl_id = $row['sl_user_id'];
            $sl_name = $row['sl_f_name'];
            
       
        
        
        $insert ="insert into account_milk (user_cl_id,sl_get_paid,paid_amount,paid_content,paid_date) values ('$cl_id','$sl_id','$cl_paid_amount','$cl_paid_content',NOW())";
        $run_insert = mysqli_query($con,$insert);

                if(!$run_insert){

                    die("failed" . mysqli_error($con));
                }else
                {
                   echo "<script>alert('Ok.... The amount paid !')</script>"; 
                }
        
        
         }
    }
      
                    ?>
                  
           
      
      
      <div class="form-group">
         <label for="title">Current location:-</label><br>
         <img width="200"  height="250" src="../img/loction/<?php echo $cl_screen_short; ?>" alt="Not Uploaded">

      </div>
      
      
      
<br>
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
        
        $list_buyed_milk =  " select *from buyed_milk where buyed_cl_user_id = '$cl_id' LIMIT 30";         
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
 <?php   }} ?>

</body>
</html>



