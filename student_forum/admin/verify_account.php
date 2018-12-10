<?php 
            
      include("includes/connection.php")

            if(isset($_GET['verify'])){

                        $verify_id = $_GET['verify'];
                  
                        $sel_users = "select *from users where user_id='$verify_id'";
                        $run_users = mysqli_query($con,$sel_users);                 
                        $row_users = mysqli_fetch_array($run_users);

                        $user_id = $row_users['user_id'];
                        $user_name = $row_users['user_name'];
                        //$user_status = $row_users['status'];

                        $update_status = "update user set status='verified' where user_id='$user_id'";
                        $run_update_status = mysqli_query($con,$update_status);
                        if ($run_update_status) {
                              # code...

                              echo "<script>alert($user_name account verified....')</script>";
                        }
                  }

 ?>