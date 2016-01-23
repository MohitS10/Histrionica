<?php

$host="localhost";
$user="root";
$password="";

// Create connection
$conn = new mysqli($host, $user, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
	    $db=mysqli_select_db($conn,"histrionica");	
	  	$name = mysqli_real_escape_string($conn,$_POST['aaname']);
		$email = mysqli_real_escape_string($conn,$_POST['aaemail']);
		$college = mysqli_real_escape_string($conn,$_POST['aaCollegeName']);
		$play = mysqli_real_escape_string($conn,$_POST['play']);
		$q = "INSERT INTO indi(Name,Email,Type,College,Play,Time) VALUES('$name','$email','street','$college','$play',now());"; 
		
		mysqli_query($conn, $q);

  	mysqli_close($conn);

?>