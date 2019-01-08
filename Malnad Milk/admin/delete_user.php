<?php     include("../includes/connection.php") ?>


<?php 

 session_start();


if(isset($_SESSION['admin_mobile_no'])) {


}else {


header("location: index.php");


}
 ?>


<?php

           if(isset($_GET['delete'])){
               
            $get_delete  = $_GET['delete']
            
       $delete_user = "delete from client_user where cl_user_id='$get_delete' ";
			 $run_delete = mysqli_query($con,$delete_user);
            
            
            if(!$run_delete){
                die("failed ". mysqli_error($con));
            }

            echo "<script>alert('The User as been Delete')</script>";
            header("location: home.php");
		}
		else{
			
			echo "<script>alert('Sorry  not Verified, try again!')</script>";
		}     
        

?>
