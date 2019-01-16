<div id="content"><!--Content starts from here-->
		<div>
			<img src="images/image4.jpg" style="float: left; margin-left:-40px">
		</div>
		<div id="form2">
			<form action="" method="post">
				<h2>Sign Up Today!</h2>
				<table>
					<tr>
						<td align="right"><strong>Name:</strong></td>
						<td><input type="text" name="u_name" required="required" placeholder="enter your name"></td>
					</tr>
					<tr>
						<td align="right"><strong>Password:</strong></td>
						<td><input type="password" name="u_pass" required="required" placeholder="choose a passwoord"></td>
					</tr>
					<tr>
						<td align="right"><strong>Email:</strong></td>
						<td><input type="email" name="u_email" required="required" placeholder="enter your email"></td>
					</tr>
					<tr>
						<td align="right"><strong>Country:</strong></td>
						<td>
							<select name="u_country">
							  <option>Select a country</option>
							  <option>Bangladesh</option>
							  <option>Japan</option>
							  <option>China</option>
						    </select>
						</td>
					</tr>
					<tr>
						<td align="right"><strong>Gender:</strong></td>
						<td>
						    <select name="u_gender">
							  <option>Select a gender</option>
							  <option>Male</option>
							  <option>Female</option>
						    </select>
					    </td>
					</tr>
					<tr>
						<td align="right"><strong>Birthday:</strong></td>
						<td><input type="date" name="u_birthday" required="required" placeholder=""></td>
					</tr>
					<tr>
						<td colspan="6"><button name="sign_up">Sign Up</button></td>
					</tr>
				</table>
				
			</form>
			<?php include("insert_user.php"); ?>
		</div>	
	</div>
	<!--Content ends here-->