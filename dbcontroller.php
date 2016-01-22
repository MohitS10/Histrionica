<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "";
	private $database = "histrionica";
	
	function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password);
		return $conn;
	}
	
	function selectDB($conn) {
		mysqli_select_db($conn,$this->database);
	}
	
	function runQuery($query) {
		$conn = mysqli_connect($this->host,$this->user,$this->password);
		mysqli_select_db($conn,$this->database);
		$result = mysqli_query($conn,$query);
		while($row=mysqli_fetch_array($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result  = mysqli_query($this->connectDB(),$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
}
?>