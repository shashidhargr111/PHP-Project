<?php     include("../includes/connection.php") ?>

<?php 

 session_start();


if(isset($_SESSION['admin_mobile_no'])) {


}else {


header("location: index.php");


}
