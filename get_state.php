<?php
require_once("dbcontroller.php");
$db_handle = new DBController();
$college = $_POST['college'];
$type = $_POST['type'];
if(!empty($college)) {
	$query ="SELECT * FROM tc";
	$results = $db_handle->runQuery($query);
	foreach($results as $play) {
		if(($play["College Name"]==$college)&&($play["Street / Stage"]==$type)){
?>
	<option value="<?php echo $play["Play Name"]; ?>"><?php echo $play["Play Name"]; ?></option>
<?php
	}
	}
}
?>