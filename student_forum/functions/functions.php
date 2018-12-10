<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="../styles/animate.css">
</head>
<body>
	

<?php

	
	$con = mysqli_connect("localhost","root","","student_forum") or die("connection was no established"); 



			//function for getting topics
			function getTopics(){

				global $con;

				$get_topics = "select *from topics";
				$run_topics = mysqli_query($con,$get_topics); 

				while ($row=mysqli_fetch_array($run_topics)) {
				# code...
						$topic_id = $row['topic_id'];
						$topic_title = $row['topic_title'];

						echo "<option value='$topic_id'>$topic_title</option>";
				}
			}
			
			//function for inserting post
			function insertPost(){

				if(isset($_POST['sub'])){

					global $con;
					global $user_id;


					$title = addslashes($_POST['title']);
					$content = addslashes($_POST['content']);
					$topic = $_POST['topic'];
					$p_image = $_FILES['p_image']['name'];
 					$image_tmp = $_FILES['p_image']['tmp_name'];

 					move_uploaded_file($image_tmp,"user/post_images/$p_image");


					if ($content=='') {
						# code...
						echo "<h2>Please enter topic desciption";
						exit();
					}
					else{
					$insert = "insert into posts(user_id,topic_id,post_title,post_content,post_image,post_date) values('$user_id','$topic','$title','$content','$p_image',NOW())"; 

					$run = mysqli_query($con,$insert);

					if($run){

						echo "<h3>Posted to Timeline </h3>";

						$update = "update users set posts='yes' where user_id='$user_id'";
						$run_update = mysqli_query($con,$update);
					}
				}

				}
			} 

			//function for displaying posts
			function get_posts(){
 

				global $con;
				//global $user_id;

				$per_page=5;

				if (isset($_GET['page'])){

					$page = $_GET['page'];

				}
				else{

					$page=1;
				}

				$start_from = ($page-1) * $per_page;

				$get_posts = "select *from posts ORDER by 1 DESC  LIMIT $start_from, $per_page";

				$run_posts = mysqli_query($con,$get_posts);

				while($row_posts=mysqli_fetch_array($run_posts)){


					$post_id = $row_posts['post_id'];
					$user_id = $row_posts['user_id'];
					$post_title = $row_posts['post_title'];
					$content = $row_posts['post_content'];
					$post_date = $row_posts['post_date'];
					$post_image = $row_posts['post_image'];


					//getting the user who has posted the thread 
					$user = "select * from users where user_id='$user_id' AND posts='yes'";

					$run_user = mysqli_query($con,$user);
					$row_user = mysqli_fetch_array($run_user);
					$user_name = $row_user['user_name'];
					$user_image = $row_user['user_image'];
					
					if ($user_name=='') {
						# code...
					

					
						echo "<div id='posts' class='animated bounceInRight'>
					 
					<h3>This user has been deleted,You can`t see this posted..... </h3>
					</div> <br/><br/>
					";
					}
					else
					{
					if ($post_image=='') {

						echo "<div id='posts' class='animated bounceInRight'>
					
					<div id='postsuserimg'><p><img src='user/user_images/$user_image' width='50' hight='50'></p></div>
					<h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
					<h3>$post_title</h3>
					<p>$post_date</p>
					<p>$content</p>
					<a href='single.php?post_id=$post_id' style='float:right;'>
					<button>See Replies or Reply to this</button></a>
					</div> <br/><br/>
					";

					}

					else
					{
					//now displaying all at once
					echo "<div id='posts' class='animated bounceInRight'>
					 
					<div id='postsuserimg'><p><img src='user/user_images/$user_image' width='50' hight='50'></p></div>
					<h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
					<h3>$post_title</h3>
					<p>$post_date</p>
					<div id='postsimg' align='center'>
					<span><p ><img src='user/post_images/$post_image' alt='error_image' hight='180' width='500' align='middle'></p></span><br/></div>
					<p>$content</p>
					<a href='single.php?post_id=$post_id' style='float:right;'>
					<button>See Replies or Reply to this</button></a>
					</div> <br/><br/>
					";
					}
					
					}
					
				}


				include("pagination.php");	

			}
				

			function single_post(){

				if(isset($_GET['post_id'])){

					global $con;

					$get_id = $_GET['post_id'];

					$get_posts = "select *from posts where post_id='$get_id'";

					$run_posts = mysqli_query($con,$get_posts);

					$row_posts=mysqli_fetch_array($run_posts);


					$post_id = $row_posts['post_id'];
					$user_id = $row_posts['user_id'];
					$post_title = $row_posts['post_title'];
					$content = $row_posts['post_content'];
					$post_date = $row_posts['post_date'];
					$post_image = $row_posts['post_image'];


					//getting the user who has posted the thread 
					$user = "select * from users where user_id='$user_id' AND posts='yes'";

					$run_user = mysqli_query($con,$user);
					$row_user = mysqli_fetch_array($run_user);
					$user_name = $row_user['user_name'];
					$user_image = $row_user['user_image'];


					//getting the user session

					$user_com = $_SESSION["user_email"];
					$get_com = "select * from users where user_email='$user_com'";
					$run_com = mysqli_query($con,$get_com);
					$row_com = mysqli_fetch_array($run_com);
					$user_com_id = $row_com['user_id'];
					$user_com_name = $row_com['user_name'];
						
					
					if ($user_name=='') {
						# code...
					

					
						echo "<div id='posts' class='animated bounceInRight'>
					 
					<h3>This user has been deleted,You can`t see this posted..... </h3>
					</div> <br/><br/>
					";
					}
					else
					{
					if ($post_image=='') {

						echo "<div id='posts' class='animated bounceInRight'>
					
					<div id='postsuserimg'><p><img src='user/user_images/$user_image' width='50' hight='50'></p></div>
					<h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
					<h3>$post_title</h3>
					<p>$post_date</p>
					<p>$content</p>
					<a href='single.php?post_id=$post_id' style='float:right;'>
					<button>See Replies or Reply to this</button></a>
					</div> <br/><br/>
					";

					}

					else
					{
					//now displaying all at once
					echo "<div id='posts' class='animated bounceInRight'>
					 
					<div id='postsuserimg'><p><img src='user/user_images/$user_image' width='50' hight='50'></p></div>
					<h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
					<h3>$post_title</h3>
					<p>$post_date</p>
					<div id='postsimg' align='center'>
					<span><p ><img src='user/post_images/$post_image' alt='error_image' hight='180' width='500' align='middle'></p></span><br/></div>
					<p>$content</p>
					<a href='single.php?post_id=$post_id' style='float:right;'>
					<button>See Replies or Reply to this</button></a>
					</div> <br/><br/>
					";
					}
					
					}

					include("comments.php");

					echo "

					<form class='animated bounceInRight' action='' method='POST' id='reply'>
					<textarea cols='50' rows='5' name='comment' placeholder='Write your reply...'></textarea><br/>
					<input type='submit' name='reply' value='Reply to this'/>
					</form>


					";

					if(isset($_POST['reply'])){

						$comment = $_POST['comment'];

						$insert = "insert into comments (post_id,user_id,comment,comment_author,date) values ('$post_id','$user_id','$comment','$user_com_name',NOW())";

						$run = mysqli_query($con,$insert);

						echo "<script>window.open('single.php?post_id=$get_id','_self')</script>";

					}


				} 


			}



			//function for getting the categories or topics
			function get_Cats(){
 

				global $con;
				 global $topic_id;

				$per_page=5;

				if (isset($_GET['page'])){

					$page = $_GET['page'];

				}
				else{

					$page=1;
				}

				$start_from = ($page-1) * $per_page;


				if(isset($_GET['topic'])){

					$topic_id = $_GET['topic'];

				}

				$get_posts = "select *from posts where topic_id='$topic_id' ORDER by 1 DESC  LIMIT $start_from, $per_page";

				$run_posts = mysqli_query($con,$get_posts);

				while($row_posts=mysqli_fetch_array($run_posts)){


					$post_id = $row_posts['post_id'];
					$user_id = $row_posts['user_id'];
					$post_title = $row_posts['post_title'];
					$content = $row_posts['post_content'];
					$post_date = $row_posts['post_date'];
					$post_image = $row_posts['post_image'];


					//getting the user who has posted the thread 
					$user = "select * from users where user_id='$user_id' AND posts='yes'";

					$run_user = mysqli_query($con,$user);
					$row_user = mysqli_fetch_array($run_user);
					$user_name = $row_user['user_name'];
					$user_image = $row_user['user_image'];
					
					if ($user_name=='') {
						# code...
					

					
						echo "<div id='posts' class='animated bounceInRight'>
					 
					<h3>This user has been deleted,You can`t see this posted..... </h3>
					</div> <br/><br/>
					";
					}
					else
					{
					if ($post_image=='') {

						echo "<div id='posts' class='animated bounceInRight'>
					
					<div id='postsuserimg'><p><img src='user/user_images/$user_image' width='50' hight='50'></p></div>
					<h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
					<h3>$post_title</h3>
					<p>$post_date</p>
					<p>$content</p>
					<a href='single.php?post_id=$post_id' style='float:right;'>
					<button>See Replies or Reply to this</button></a>
					</div> <br/><br/>
					";

					}

					else
					{
					//now displaying all at once
					echo "<div id='posts' class='animated bounceInRight'>
					 
					<div id='postsuserimg'><p><img src='user/user_images/$user_image' width='50' hight='50'></p></div>
					<h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
					<h3>$post_title</h3>
					<p>$post_date</p>
					<div id='postsimg' align='center'>
					<span><p ><img src='user/post_images/$post_image' alt='error_image' hight='180' width='500' align='middle'></p></span><br/></div>
					<p>$content</p>
					<a href='single.php?post_id=$post_id' style='float:right;'>
					<button>See Replies or Reply to this</button></a>
					</div> <br/><br/>
					";
					}
					
					}
				}

				include("pagination.php");	

			}


			//function for getting the search results
			function GetResults(){
 

				global $con;
				//global $topic_id;


				if(isset($_GET['user_query'])){

					$search_term = $_GET['user_query'];

				}

				$get_posts = "select * from posts where post_title LIKE '%$search_term%' ORDER by 1 DESC  LIMIT 5";

				$run_posts = mysqli_query($con,$get_posts);

				$count_result = mysqli_num_rows($run_posts);

				if ($count_result==0) {
					# code...
					echo "<br/><h3 style='background:black; border:5px solid white; border-radius: 20px;  color:red; padding:10px;'>Sorry, we do not have results for this word!</h3>";
					exit(); 
				}

				while($row_posts=mysqli_fetch_array($run_posts)){


					$post_id = $row_posts['post_id'];
					$user_id = $row_posts['user_id'];
					$post_title = $row_posts['post_title'];
					$content = $row_posts['post_content'];
					$post_date = $row_posts['post_date'];
					$post_image = $row_posts['post_image'];


					//getting the user who has posted the thread 
					$user = "select * from users where user_id='$user_id' AND posts='yes'";

					$run_user = mysqli_query($con,$user);
					$row_user = mysqli_fetch_array($run_user);
					$user_name = $row_user['user_name'];
					$user_image = $row_user['user_image'];
					
					if ($user_name=='') {
						# code...
					

					
						echo "<div id='posts' class='animated bounceInRight'>
					 
					<h3>This user has been deleted,You can`t see this posted..... </h3>
					</div> <br/><br/>
					";
					}
					else
					{
					if ($post_image=='') {

						echo "<div id='posts' class='animated bounceInRight'>
					
					<div id='postsuserimg'><p><img src='user/user_images/$user_image' width='50' hight='50'></p></div>
					<h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
					<h3>$post_title</h3>
					<p>$post_date</p>
					<p>$content</p>
					<a href='single.php?post_id=$post_id' style='float:right;'>
					<button>See Replies or Reply to this</button></a>
					</div> <br/><br/>
					";

					}

					else
					{
					//now displaying all at once
					echo "<div id='posts' class='animated bounceInRight'>
					 
					<div id='postsuserimg'><p><img src='user/user_images/$user_image' width='50' hight='50'></p></div>
					<h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
					<h3>$post_title</h3>
					<p>$post_date</p>
					<div id='postsimg' align='center'>
					<span><p ><img src='user/post_images/$post_image' alt='error_image' hight='180' width='500' align='middle'></p></span><br/></div>
					<p>$content</p>
					<a href='single.php?post_id=$post_id' style='float:right;'>
					<button>See Replies or Reply to this</button></a>
					</div> <br/><br/>
					";
					}
					
					}
				}

					

			}


			//function for displaying posts
			function user_posts(){
 

				global $con;
				global $user_id;
				global $u_id;

				if (isset($_GET['u_id'])) {
					# code...

					$u_id = $_GET['u_id'];
				}

				//$per_page=5;

				//if (isset($_GET['page'])){

				//	$page = $_GET['page'];

				//}
				//else{

				//	$page=1;
				//}

				//$start_from = ($page-1) * $per_page;

				$get_posts = "select *from posts where user_id='$u_id' ORDER by 1 DESC  LIMIT 5";

				$run_posts = mysqli_query($con,$get_posts);

				while($row_posts=mysqli_fetch_array($run_posts)){


					$post_id = $row_posts['post_id'];
					$user_id = $row_posts['user_id'];
					$post_title = $row_posts['post_title'];
					$content = $row_posts['post_content'];
					$post_date = $row_posts['post_date'];
					$post_image = $row_posts['post_image'];


					//getting the user who has posted the thread 
					$user = "select * from users where user_id='$user_id' AND posts='yes'";

					$run_user = mysqli_query($con,$user);
					$row_user = mysqli_fetch_array($run_user);
					$user_name = $row_user['user_name'];
					$user_image = $row_user['user_image'];
					
					if ($user_name=='') {
						# code...
					

					
						echo "<div id='posts' class='animated bounceInRight'>
					 
					<h3>This user has been deleted,You can`t see this posted..... </h3>
					</div> <br/><br/>
					";
					}
					else
					{
					if ($post_image=='') {

						echo "<div id='posts' class='animated bounceInRight'>
					
					<div id='postsuserimg'><p><img src='user/user_images/$user_image' width='50' hight='50'></p></div>
					<h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
					<h3>$post_title</h3>
					<p>$post_date</p>
					<p>$content</p>
					<a href='single.php?post_id=$post_id' style='float:right;'>
					<button>View</button></a>
					<a href='edit_post.php?post_id=$post_id' style='float:right;'>
					<button>Edit</button></a>
					<a href='functions/delete_post.php?post_id=$post_id' style='float:right;'>
					<button>Delete</button></a>
					</div> <br/><br/>
					";

					}

					else
					{
					//now displaying all at once
					echo "<div id='posts' class='animated bounceInRight'>
					 
					<div id='postsuserimg'><p><img src='user/user_images/$user_image' width='50' hight='50'></p></div>
					<h3><a href='user_profile.php?u_id=$user_id'>$user_name</a></h3>
					<h3>$post_title</h3>
					<p>$post_date</p>
					<div id='postsimg' align='center'>
					<span><p ><img src='user/post_images/$post_image' alt='error_image' hight='180' width='500' align='middle'></p></span><br/></div>
					<p>$content</p>
					<a href='single.php?post_id=$post_id' style='float:right;'>
					<button>View</button></a>
					<a href='edit_post.php?post_id=$post_id' style='float:right;'>
					<button>Edit</button></a>
					<a href='functions/delete_post.php?post_id=$post_id' style='float:right;'>
					<button>Delete</button></a>
					</div> <br/><br/>
					";
					}
					
					}

					include ("delete_post.php");



				}

				//include("pagination.php");	

			}


			//function for user profile

			function user_profile(){

				if(isset($_GET['u_id'])){

					global $con;

					$user_id = $_GET['u_id'];

					$select = "select * from users where user_id='$user_id'";
					$run = mysqli_query($con,$select);
					$row = mysqli_fetch_array($run);


					$id = $row['user_id'];
					$image = $row['user_image'];
					$name = $row['user_name'];
					$country = $row['user_country'];
					$gender = $row['user_gender'];
					$last_login = $row['last_login'];
					$register_date = $row['register_date'];
					
					if ($gender=='Male') {
						# code...

						$msg="Send him a message";

					}
					else{

						$msg="Send her a message";

					}

					echo "<div id='user_profile' class='animated bounceInRight'>

						<img src='user/user_images/$image' width='150' height='150'/>
						<br/>
						
						<p><strong>Name:</strong>$name</p><br/><br/>
						<p><strong>Gender:</strong>$gender</p><br/><br/>
						<p><strong>Country:</strong>$country</p><br/><br/>
						<p><strong>Last Login:</strong>$last_login</p><br/><br/>
						<p><strong>Member Since:</strong>$register_date</p><br/><br/>
						<a href='messages.php?u_id=$id'><button>$msg</button></a><br/>
						

						";
							//
				}
				echo "</div>";

				new_members();

				

			}

			function new_members(){


				global $con;

				//select new members

				$user = "select * from users LIMIT 0,20";

				$run_user = mysqli_query($con,$user);

				echo "<br/><center><h2>New members on this site:</h2></center><br>";
				while ($row_user = mysqli_fetch_array($run_user)){

					$user_id = $row_user['user_id'];
					$user_name = $row_user['user_name'];
					$user_image = $row_user['user_image']; 


					echo "
						
						<span class='animated bounceInLeft'>
						<a href='user_profile.php?u_id=$user_id'> 
						<img src='user/user_images/$user_image' width='50' height='50' title='$user_name' style='float:left;'/>
						</a>
						</span>

					 ";
				}
			}





?>

</body>
</html>