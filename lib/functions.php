<?php

if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

function getUser($email){
	$users = readData();
	return isset($users[$email]) ? $users[$email] : array();
}

function addUser($user = array()){
	$users = readData(false);
	$users[] = implode("|", $user);
	return writeData($users);
}

function readData($formatted=true){

	$users = array();
 	$file = __DIR__ . '/users.txt';

 	if(!file_exists($file))
 	{
 		if($resources = @fopen($file, "w+")) 
 		{
 			fclose($resources);
 		}
 	}

 	if($rStream = @fopen($file, "r"))
 	{
 		$data = @fread($rStream, filesize($file));
 		if(!empty($data))
 		{
 			$users = explode(",", $data);
 		}
 		fclose($rStream);
 	}

 	return $formatted ? formatUser($users) : $users;
}


function writeData($users = array()){

 	$file = __DIR__ . '/users.txt';

	if($resources = @fopen($file, "w+")) 
	{
		@fwrite($resources, implode(",",$users));
		fclose($resources);
		return true;
	}

 	return false;
}

function formatUser($users = array())
{
	// 0 = Name
	// 1 = Email/Phone
	// 2 = Gender
	// 3 = dob
	// 4 = password
	// 5 = Role

	$formatted = array();

	foreach($users as $user) {
		$user = explode("|", $user);
		$formatted[$user[1]] = $user;
	}

	return $formatted;
}


function isLoggedIn(){
	return isset($_SESSION['__elook__']);
}

function getLoggedUser(){
	return getUser($_SESSION['__elook__']);
}

function loggin($user = array()) {
	
	if(!empty($user)) {
		$_SESSION['__elook__'] = $user[1];
		return isLoggedIn();
	}

	return false;
}

function logout($user = array())
{
	if(!empty($user)) {
		unset($_SESSION['__elook__']);
		return true;
	}

	return false;
}

function register($user = array()) {
	
	if(!empty($user))
	{
		return addUser($user);
	}

	return false;
}








?>