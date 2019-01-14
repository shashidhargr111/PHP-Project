<?php 

	include("db.php");


	$query = "select *from cars";
	$query_car_info = mysqli_query($con,$query);

	if (!$query_car_info) {
		# code...
		die("query failed" . mysqli_error($con));
	}

	while ($row = mysqli_fetch_array($query_car_info)) {
		# code...
		echo "<tr>";
		echo "<td class='car_id'>{$row['id']}</td>";
		echo "<td><a rel='".$row['id']."' class='title-link' href='javascript:void(0)' >{$row['title']}</a></td>";
		echo "<tr>";
	}

 ?>
 <script>

	$(document).ready(function() {
		
		$(".title-link").on('click', function(){

			$("#action-container").show();

			var id = $(this).attr("rel");

			$.post("process.php" , {id: id},function(data){

				$("#action-container").html(data);

			});

		});
	});

 </script>