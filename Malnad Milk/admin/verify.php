<?php     include("../includes/connection.php") ?>

<?php 

 session_start();


if(isset($_SESSION['admin_mobile_no'])) {


}else {


header("location: index.php");


}


	if(isset($_GET['code'])){

		 $get_code = $_GET['code'];

//		$get_user = "select *from client_user where ='$get_code'";
//
//		$run_user = mysqli_query($con,$get_user);
//
//		$check_user = mysqli_num_rows($run_user);
//
//		$row_user = mysqli_fetch_array($run_user);
//
//		$user_id = $row_user['cl_user_id'];
//
//		if($check_user==1){

			 $update_user = "update client_user set cl_status='verified' where cl_user_id='$get_code' ";
			 $run_update = mysqli_query($con,$update_user);
            
            
            if(!$run_update){
                die("failed ". mysqli_error($con));
            }

                    echo "<script>alert('Verified')</script>";
                   header("location: home.php");
		}
		else{
			
			echo "<script>alert('Sorry  not Verified, try again!')</script>";
		}

            if(isset($_GET['active'])){

                $cl_user_id=$_GET['active'];
                $update = "update client_user set cl_status='verified' where cl_user_id='$cl_user_id' ";
                $run_update = mysqli_query($con,$update);
                header("location: home.php");



            }else{

              echo "<script>alert('Sorry active, try again!')</script>";
              }

            if(isset($_GET['deactive'])){
                
                $cl_user_id=$_GET['deactive'];
                $update = "update client_user set cl_status='deactive' where cl_user_id='$cl_user_id' ";
                $run_update = mysqli_query($con,$update);
                header("location: home.php");


            }else{

           echo "<script>alert('Sorry deactive, try again!')</script>";
            }


 ?>