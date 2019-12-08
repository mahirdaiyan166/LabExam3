<?php
    
    require_once("../lib/functions.php");

    if(isLoggedIn())
    {
        $user = getLoggedUser();
        if($user[5]!="admin")
        {
           header("Location: index.php");
            exit; 
        }
    }
    else
    {
        header("Location: index.php");
        exit;
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<link rel="icon"  href="images/icon1.png">
</head>
<body data-gr-c-s-loaded="true">
		<div>
			<a href="registration.html">Register New Employer</a><br><br>
			<a href="update.html">Update Or Delete Employer</a><br><br>
			<form>
				<input type="Search" name="Search" id="Search" placeholder="Enter a Employer " value=""size="50" height="100">
				<input type="submit" name="submit" value="Search">
			</form>	
			
		</div> <br>

		<a href="logout.php">Log Out</a>
</body>

</html>