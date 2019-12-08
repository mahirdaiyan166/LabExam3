<?php
	require_once("../lib/functions.php");

    if(isLoggedIn())
    {
        $user = getLoggedUser();
        if(logout($user)) {
        	header("Location: index.php");
    		exit;
        }
    }
    
    header("Location: ahome.php");
    exit;
  