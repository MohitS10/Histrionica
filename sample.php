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
    echo '<h1>MySQL Server is connecte1231d</h1>';
    $db=mysqli_select_db($conn,"histrionica");	
  	$typeOfPlay = mysqli_real_escape_string($conn,$_POST['typeOfPlay']);
	$college = mysqli_real_escape_string($conn,$_POST['nameOfCollege']);
	$play = mysqli_real_escape_string($conn,$_POST['nameOfPlay']);
	$num = mysqli_real_escape_string($conn,$_POST['numberOfTeamMembers']);
	$tc1 = mysqli_real_escape_string($conn,$_POST['coord1']);
	$con1 = mysqli_real_escape_string($conn,$_POST['contact1']);
	$tc2 = mysqli_real_escape_string($conn,$_POST['coord2']);
	$con2 = mysqli_real_escape_string($conn,$_POST['contact2']);
	$syn = mysqli_real_escape_string($conn,$_POST['synopsis']);
	
	$q = "INSERT INTO tc VALUES('$typeOfPlay','$college','$play','$num','$tc1','$con1','$tc2','$con2','$syn','no',now());"; 
	
	if(mysqli_query($conn, $q))
	{
	 ?>
	        <script>alert('successfully registered ');</script>
	        <?php
	} else
	{
	 ?>
	        <script>alert('error while registering you...');</script>
	        <?php
	}




  	mysqli_close($conn);

?>