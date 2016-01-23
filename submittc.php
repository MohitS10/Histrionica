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

$filena = $_POST['tcPlayTame'];
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES['script']["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = filesize($_FILES["script"]["tmp_name"]);
    if($check !== false) {
        echo "File is a doc - " . $check["mime"] . ".";
        $uploadOk = 1;
    } else {
        echo "File is not a doc.";
        $uploadOk = 0;
    }
}


// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["script"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "pdf" && $imageFileType != "doc" && $imageFileType != "docx") {
    echo "Sorry, only PDFs/Doc files are allowed.";
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
    $temp = explode(".", $_FILES["script"]["name"]);
    $newfilename = $target_dir.$filena.'.'.end($temp);

    if (move_uploaded_file($_FILES["script"]["tmp_name"],$newfilename )) {
        echo "The file ". basename( $_FILES["script"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
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
		
		$q = "INSERT INTO tc VALUES('$typeOfPlay','$college','$play','$num','$tc1','$con1','$tc2','$con2','$syn',now());"; 
		
		mysqli_query($conn, $q);

  	mysqli_close($conn);

?>