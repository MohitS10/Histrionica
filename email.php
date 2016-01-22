<?php

	  	$name = mysqli_real_escape_string($conn,$_POST['cname']);
		$email = mysqli_real_escape_string($conn,$_POST['cemail']);
		$contact = mysqli_real_escape_string($conn,$_POST['ccontact']);
		$cenquiry = mysqli_real_escape_string($conn,$_POST['cenquiry']);
		
		$subject = "Mail From" + $name + " Email: " + $email + " Contact: " + $contact ;

		mail("histrionica2016@gmail.com", $subject .$email, $cenquiry);
		
?>