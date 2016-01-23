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
        $typeOfPlay = mysqli_real_escape_string($conn,$_POST['tcPlayType']);
        $college = mysqli_real_escape_string($conn,$_POST['tcCollegeName']);
        $play = mysqli_real_escape_string($conn,$_POST['tcPlayName']);
        $num = mysqli_real_escape_string($conn,$_POST['tcTeamMembers']);
        $tc1 = mysqli_real_escape_string($conn,$_POST['coord1']);
        $con1 = mysqli_real_escape_string($conn,$_POST['contact1']);
        $tc2 = mysqli_real_escape_string($conn,$_POST['coord2']);
        $con2 = mysqli_real_escape_string($conn,$_POST['contact2']);
        $syn = mysqli_real_escape_string($conn,$_POST['synopsis']);
        
        $q = "INSERT INTO tc(Type,CName,PName,Num,TC1,Contact1,TC2,Contact2,Synopsis,Time) VALUES('$typeOfPlay','$college','$play','$num','$tc1','$con1','$tc2','$con2','$syn',now());"; 
        
        mysqli_query($conn, $q);

    mysqli_close($conn);

?>