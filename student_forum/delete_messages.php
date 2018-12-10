
<?php

include ("includes/connection.php");
if (isset($_GET['msg_id'])) {
	# code...

	$get_id = $_GET['msg_id'];
	$delete = "delete from messages where msg_id='$get_id'";
	$run_delete = mysqli_query($con,$delete);

	echo "<script>alert('Message has been deleted')</script>";
	echo "<script>window.open('my_messages.php,'_self')</script>";

}

?>