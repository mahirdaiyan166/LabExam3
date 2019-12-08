<?php
	
	require_once("../lib/functions.php");

	if(isLoggedIn())
    {
    	header("Location: ahome.php");
		exit;
    }

	$error = "";
	$user = array();

	if(isset($_POST['submit'])) {

		$email = isset($_POST['email']) ? trim($_POST['email']) : "";
		
		$password = isset($_POST['password']) ? trim($_POST['password']) : "";
		
		if(empty($email))
		{
			$error = "Email/Phone Cannot be Empty";
		}
		else if(empty($user = getUser($email)))
		{
			$error = "Email/Phone doesn't exists";
		}
		else if(empty($password))
		{
			$error = "Password Cannot be Empty";
		}
		else if($password!=$user[4])
		{
			$error = "Password doesn't match";
		}
		else if($user[5]!="admin")
		{
			$error = "Only Authorized Person can Login";
		}
		else if(loggin($user))
		{
			header("Location: ahome.php");
			exit;
		}
		else
		{
			$error = "User cannot be logged in";
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login•Admin</title>
	
</head>
	<body data-gr-c-s-loaded="true">
		

	<table align="center" width="100%" border="0" >
		<tbody align="center">

			<tr>
				<td>	<br>
				<br>	
					<h2 align="center" >Admin</h2>							
					
					<form method="POST">
						<?php if(!empty($error)) : ?>
							<br><br>
							<font color="red"><?= $error ?></font>
							<br><br>
						<?php endif; ?>
						<label for="email"><b>Phone or Email</b></label><br><br>
						<input type="text" name="email" id="email" placeholder="Phone or email " value=""size="35"> <br><br>
						<label for="password"><b>Password</b></label><br><br>
						<input type="password" name="password" id="password" placeholder="Password"size="35"> <br>
						<br>
						<input type="submit" name="submit" value="Log In">
					</form>
					<br>
					<br>
					
			</td>
		</tr>
	</tbody></table>
				

</body>
</html>