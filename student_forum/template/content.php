
      	    <div id="content">
      		<div><br/><br/>
      			<img src="images/studentforum.jpg" class="animated bounceInLeft" height="450" width="350"  style="float: left; margin-right: 1cm"><br>
      		
      			<div id="form2">
      			
      			<form action="" class="animated bounceInRight" method="post">
      				<center><h2>Sign Up Here</h2></center>
      				<table>
      				<tr>
      					<td align="right">Name:</td>
      					<td>
      						<input type="text" name="u_name" placeholder="Enter your Name" required="required"/>
      					</td>
      				</tr>
      				
      				<br>
      				<tr>
      					<td align="right">Password:</td>
      					<td>
      						<input type="password" name="u_pass" placeholder="Enter your Password" required="required" />
      					</td>
      				</tr>
      				<tr>
      					<td align="right">Email:</td>
      					<td>
      						<input type="email" name="u_email" placeholder="Enter your Email" required="required" />
      					</td>
      				</tr>
      				<tr>
      					<td align="right">Country:</td>
      					<td>
      						<select name="u_country" required="required">
      							<option>Select a Country</option>
      							<option>India</option>
      							<option>USA</option>
      							<option>UK</option>
      							<option>Pakistan</option>
      							
      						</select>
      					</td>
      				</tr>
      				<tr>
      					<td align="right">Gender:</td>
      					<td>
      						<select name="u_gender" required="required" >
      							<option>Select a Gender</option>
      							<option>Male</option>
      							<option>Female</option>
      						</select>
      					</td>
      				</tr>
      				<tr>
      					<td align="right">DOB:</td>
      					<td>
      						<input type="date" name="u_birthday" required="required"/>
      					</td>
      				</tr>
      				<tr>
      				<td >
      					<center>
      					<button name="sign_up" >Sign Up</button>
      					</center>	
      				</td>
      				</tr>

      				</table>
      			</form>

      			<?php

      			include("user_insert.php");

      			?>
      			
      		</div>
      	</div>


      </div>
<!--container end-->