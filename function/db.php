<?php

	function getConnection(){
		$conn = mysqli_connect('localhost', 'root', '', 'labexam');
		return $conn;
	}
?>