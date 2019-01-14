<?php

    include("db.php");

    if (isset($_POST['car_name'])) {
    	# code...
    	// echo "Data";
    	$car_name = $_POST['car_name'];
    	$query = " INSERT into cars(title) values('$car_name') ";
		$query_car_name = mysqli_query($con,$query);
		
    	if (!$query_car_name) {
    		# code...
    		die("Failed");
		}
		
		header("Location: index.html");
		
    }
 
?>