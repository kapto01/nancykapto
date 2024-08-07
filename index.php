 <!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
	<div class="bgimg"><font color="white">
	<div>
 
	</div>

<br><br>
<hr>
<marquee id="non-printable" bgcolor="#CCCEDA" style="color:white"; width="100%" direction="left" height="50px"><br>
!! Get in touch with your child's school progress  !!
</marquee>
<hr> 
	<header>
		<h1><center>Students Results System</center></h1>
	</header>

	<table align="center" cellspacing="15">
	<form method="POST" action="index.php">
		<tr>
			<td><h3>&#9819Teachers/ Admin&#9819</h3></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			<td><h3>&#9823Parents&#9823</h3></td></td>
		</tr>
		<tr rowspan=4>
			<td>Username</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			<td style="font-size: 20px"><a href="studentdash.php" style="color:blue">Click here</a> To check the results.</td>
		</tr>
		<tr>
			
			<td><input class="input-box" type="text" id="UserName" name="UserName" placeholder="admin"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			
		</tr>

		<tr>
			<td>Password</td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			
		</tr>
		<tr>
			
			<td><input class="input-box" type="Password" id="admin-pwd" name="admin-pwd" placeholder="1234"></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			
		</tr>
		<tr>
			<td><center><input class="button" type="submit" value="Submit" name="Submit" style="background-color: none; opacity: 0.5"></center></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td>
			
		</tr>
	</table><br><br><br>

	<br><br><br><br><br><br><br><br><br>
</form>
</div>
</body>
</html>
<?php

if(isset($_POST['Submit'])) {
	
	$con=mysqli_connect('localhost','root','','rms');
	if (!$con) {
	  die("Connection failed");
	}
	else{
		$uname = $_POST['UserName'];
		$pass = $_POST['admin-pwd'];//do md5 at last

		// here user name and password are called from data base
		$sql = "SELECT username, password FROM admin ";
		$result = mysqli_query($con,$sql);
		$num_row = mysqli_num_rows($result);

		if($num_row > 0){
			while($row = mysqli_fetch_array($result)){

				//this is to check if either of the fields are vacaent
				if (empty($uname) || empty($pass)) {
					echo '<script>alert("Please fill all the fields")</script>';
				}	
				//this part is to chk if the pass and user name are correct
				else if($uname == $row["username"] && $pass == $row["password"]){
					$_SESSION['uname']=$uname;
					header('location:adminpanel.php');
			 		// echo "<script> window.location.assign('adminpanel.php'); </script>";
				}
				// this part is to accept 
				else 
					echo '<script>alert("Wrong Password or Username")</script>';
			}
		}

		
	}
}
?>






