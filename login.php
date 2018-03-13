<?php
session_start();

?>

	<html>
		<head><title>Admin Login</title></head>
			<body bgcolor="orange">
		<form action="login.php" method="post">
			<table width="400" align="center" border="1">
			<tr>
				<td colspan="4" align="center"bgcolor="blue"><h1>Admin Login</h1></td>
				</tr>
				<tr><td align="right">User Name:</td>
					<td><input type="text" name="user_name"></td>
					</tr>
		<tr>
					<td align="right">Password:</td>
	<td><input type="password" name="user_pass"></td>
					</tr>
		<tr><td align="center" colspan="4"><input type="submit" name="login" value="Login"></td>	</tr>
					</body>
	</html>
	<?php
include('dbcon.php');

if(isset($_POST['login'])){
	$user_name = mysql_real_escape_string($_POST['user_name']);
	$user_pass = mysql_real_escape_string($_POST['user_pass']);
	
	$login_query = "select * from adlogin WHERE user_name='$user_name' AND user_pass='$user_pass'";
	
	$run = mysql_query($login_query);
	
	if(mysql_num_rows($run)>0){
		$_SESSION['user_name']=$user_name;
         echo"<script>window.open('index.php','_self')</script>";
	}
  else{
	  
	  echo "<script>alert('user name password incorrect')</script>";
  }
}?>