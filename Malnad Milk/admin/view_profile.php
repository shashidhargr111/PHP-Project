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
    
      <li class="nav-item ">
        <a class="nav-link" href="home.php"><i style="" class="fa fa-home"> Home</i></a>
      </li>
    
      
      <li class="nav-item ">
        <a class="nav-link" href="logout.php"><i style="" class="fa fa-sign-out"> Log Out </i></a>
      </li>
     
    </ul>
    
    
  </div>  
</nav>
<br>
<?php
   
         if (isset($_GET['au_id'])) {
          # code...

                $get_id = $_GET['au_id'];
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
                        $cl_pic = $row['cl_pic'];
                        $cl_screen_short = $row['cl_screen_short'];
                        $cl_status = $row['cl_status'];
                 


                  
    ?>


<div class="container">
  
   <div class="text-center">
 <img src="../img/profile/<?php echo $cl_pic ; ?>" class="rounded-circle" alt="error img load" width="100" height="100"> 
<br>

 
  
   <h1><?php echo $cl_name . " " . $cl_l_name ; ?></h1> 
   <h2><a href="tel:+91<?php echo $cl_mobile_no ; ?>"><i class="fa fa-phone "></i> <?php echo $cl_mobile_no ; ?></a></h2>
   
     </div>
  


  <br><br>
 
   
    <?php
                       
                       if($cl_status == 'verified' ){
                           
                        
                              
                           
                           echo " 
                            
    <div class='form-group'>
         <label for='title'>Address:-</label><br>
     <textarea  class='form-control' disabled='disabled' > $cl_address </textarea>
      </div>
      
      
       <div class='form-group'>
         <label for='title'>Landmark:-</label>
          <input type='text' disabled='disabled' value='$cl_landmark'  class='form-control' >
      </div>
   <div class='form-group'>
         <label for='title'>Home Number:-</label>
         <a class='form-control'  href='tel:+91$cl_home_no'><i class='fa fa-phone '></i> $cl_home_no</a>
      </div>         
                                            
       <div class='form-group'>
         <label for='title'>Activate/Deactivate:-</label>
         <a href='verify.php?deactive={$cl_id}' class='btn btn-danger form-control'>Deactivate</a>
      </div>  ";
                           
                           
                           
                               
                           }else if($cl_status == 'deactive' )
                           {
                           echo "                         
    <div class='form-group'>
         <label for='title'>Address:-</label><br>
     <textarea  class='form-control' disabled='disabled' > $cl_address </textarea>
      </div>
      
      
       <div class='form-group'>
         <label for='title'>Landmark:-</label>
          <input type='text' disabled='disabled' value='$cl_landmark'  class='form-control'   >
      </div>
   <div class='form-group'>
         <label for='title'>Home Number:-</label>
         <a class='form-control'  href='tel:+91$cl_home_no'><i class='fa fa-phone '></i> $cl_home_no</a>
      </div> 
                               
     <div class='form-group'>
         <label for='title'>Activate/Deactivate:-</label><br>
         <a href='verify.php?active={$cl_id}' class='btn btn-primary form-control'>Activate</a>
     </div>
         ";
                               
                               
                           }else
                       if($cl_status == 'unverified' ){
                           
                           
                           echo "
    <div class='form-group'>
         <label for='title'>Verify:-</label><br>
         <a href='verify.php?code={$cl_id}' class='btn btn-primary form-control'>Verify</a>
     </div>           
                           
            
    <div class='form-group'>
            <label for='title'>Address:-</label><br>
            <textarea  class='form-control' disabled='disabled' > $cl_address </textarea>
      </div>
      
      
       <div class='form-group'>
            <label for='title'>Landmark:-</label>
            <input type='text' disabled='disabled' value='$cl_landmark'  class='form-control'   >
      </div>
   <div class='form-group'>
            <label for='title'>Home Number:-</label>
         <a class='form-control'  href='tel:+91$cl_home_no'><i class='fa fa-phone '></i> $cl_home_no</a>
      </div> 
      
      
      <div class='form-group'>
            <label for='title'>Delete:-</label><br>
         <a href='verify.php?delete={$cl_id}' class='btn btn-danger form-control'>Delete</a>
      </div> 
      
      
      ";
                         
                           
                       }
                  
                       
       ?>
   
    
 <div class="form-group">
         <label for="title">Current location:-</label><br>
         <img width="200"  height="250" src="../img/loction/<?php echo $cl_screen_short;   ?>" alt="Not Uploaded">

      </div>
    
    

   
    <?php }} ?>
  
    </div>
    </body>
</html>

