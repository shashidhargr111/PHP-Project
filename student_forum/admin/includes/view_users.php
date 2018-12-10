<table align="center" width="750"  bgcolor="white">

	<tr bgcolor="green" border="1" >
		<th>S.No</th>
		<th>Name</th>
		<th>Country</th>
		<th>Gender</th>
		<th>Image</th>
		<th>Delete</th>
            <th>Edit</th>
		<th>Un/Verify</th>
	</tr>
	<?php

		include("includes/connection.php");
		$sel_users = "select *from users ORDER by 1 DESC";
		$run_users = mysqli_query($con,$sel_users);

		$i=0;
		while($row_users = mysqli_fetch_array($run_users)){

			$user_id = $row_users['user_id'];
			$user_name = $row_users['user_name'];
			$user_country = $row_users['user_country'];
			$user_gender = $row_users['user_gender'];
			$user_image = $row_users['user_image'];
			$user_reg_date = $row_users['register_date'];

			$i++; 


	?>
	<tr align="center" >
		<td><?php echo $i; ?></td>
		<td><?php echo $user_name; ?></td>
		<td><?php echo $user_country; ?></td>
		<td><?php echo $user_gender; ?></td>
		<td><img src="../user/user_images/<?php echo $user_image;?>" width='50' height='50'/></td>
		<td><a href="delete_user.php?delete=<?php echo $user_id; ?>">Delete</a></td>
            <td><a href="edit_user.php?edit=<?php echo $user_id; ?>">Edit</a></td>
          <!--   <td><a href="verify_account.php?verify=<?php $user_id;?>">verify</a></td> -->
            <?php
                  $get_user_v = "select * from users where user_id='$user_id' AND status='unverified'";
                  $run_user_v = mysqli_query($con,$get_user_v);
                  $check_v = mysqli_num_rows($run_user_v);

                        if($check_v == 1){

                        // $st_users = "select *from users ";
                        // $run_users_st = mysqli_query($con,$st_users);
                        // $row_users_st = mysqli_fetch_array($run_users_st);

                        //$user_id_st = $row_users_st['user_id'];

                         echo "<td><a href='index.php?view_users&verify=$user_id'>verify</a></td>";

                        }
                        else
                        {

                         echo "<td><a href='index.php?view_users&unverify=$user_id'>unverify</a></td>";
                       
                        }
		
?>
	</tr>
<?php }?>


</table>

 <?php


            if(isset($_GET['verify'])){

                  $verify_id = $_GET['verify'];

                  $verify_update = "update  users set status='verified' where user_id='$verify_id'";
                  $run_ver = mysqli_query($con,$verify_update);

                  if ($run_ver) {
                        # code...
                        echo "<script>alert('The user has been verified')</script>";
                        echo "<script>window.open('index.php?view_users','_self')</script>";
                        exit();
                        
                  }

            }


            if(isset($_GET['unverify'])){

                  $unverify_id = $_GET['unverify'];

                  $unverify_update = "update  users set status='unverified' where user_id='$unverify_id'";
                  $run_unver = mysqli_query($con,$unverify_update);

                  if ($run_unver) {
                        # code...
                        echo "<script>alert('The user has been unverified')</script>";
                        echo "<script>window.open('index.php?view_users','_self')</script>";
                        exit();
                        
                  }

            }










/*
-----------------------------------------this is working------------------------------------------

 		if(isset($_GET['edit'])){

 			$edit_id = $_GET['edit'];
 		
			$sel_users = "select *from users where user_id='$edit_id'";
			$run_users = mysqli_query($con,$sel_users);			
			$row_users = mysqli_fetch_array($run_users);

			$user_id = $row_users['user_id'];
			$user_name = $row_users['user_name'];
			$user_country = $row_users['user_country'];
			$user_gender = $row_users['user_gender'];
			$user_image = $row_users['user_image'];
			$user_reg_date = $row_users['register_date'];
			$user_email = $row_users['user_email'];
			
		
	 ?>
	 <center>
	<form action="" method="post" id="f" class="ff" enctype="multipart/form-data">
      				
      				
      				<table >
      					<tr align="center">
      						<td colspan="6">
      							<h2>
									Edit user Profile:
								</h2>
							</td>
      					</tr>
      				<tr>
      					<td align="right">Name:</td>
      					<td> 
      						<input type="text" name="u_name" required="required" value="<?php echo $user_name; ?>"/>
      					</td>
      				</tr>
      				
      				<br>
      				<tr> 
      					<td align="right">Password:</td>
      					<td>
      						<input type="password" name="u_pass" value="<?php echo $user_pass;?>" required="required" />
      					</td>
      				</tr>
      				<tr>
      					<td align="right">Email:</td>
      					<td>
      						<input type="email" name="u_email" value="<?php echo $user_email;?>" required="required" />
      					</td>
      				</tr>
      				<tr>
      					<td align="right">Country:</td>
      					<td>
      						<select name="u_country" >
      							<option><?php echo $user_country;?></option>
      							<option>India</option>
      							<option>USA</option>
      							<option>UK</option>
      							<option>Pakistan</option>
      							
      						</select>
      					</td>
      				</tr>
      				<tr>
      					<td align="right"  >Gender:</td>
      					<td>
      						<select name="u_gender"  >
      							<option><?php echo $user_gender;?></option>
      							<option>Male</option>
      							<option>Female</option>
      						</select>
      					</td>
      				</tr>

      				<tr>
      					<td align="right">Photo:</td> 
      					<td>
      						<input type="file" name="u_image" required="required" />
      					</td>
      				</tr>
      				
      				<tr align="center">
      				<td colspan="6">
      					<input type="submit" name="update" value="Update"/>
      				</td>
      				</tr>

      				</table>
      			</form></center>
      			<?php } ?>

 <?php

 		if (isset($_POST['update'])) {
 			# code...

 			$u_name = $_POST['u_name'];
 			$u_pass = $_POST['u_pass'];
 			$u_email = $_POST['u_email'];
 			$u_country = $_POST['u_country'];
 			$u_image = $_FILES['u_image']['name'];
 			$image_tmp = $_FILES['u_image']['tmp_name'];


 			move_uploaded_file($image_tmp,"../user/user_images/$u_image");

 			$update = "update users set user_name='$u_name', user_pass='$u_pass',user_email='$u_email',user_country='$u_country',user_image='$u_image' where user_id='$edit_id' ";

 			$run = mysqli_query($con,$update);

 			if ($run) {
 				# code...

 				echo "<script>alert('User has been Update!</script>";
 				echo "<script>window.open('index.php?view_users','_self')</script>";


 			}


 		}
*/
?>
