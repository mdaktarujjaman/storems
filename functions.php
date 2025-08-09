<?php

//That function colect data in database 
function data_list($tablename,$column1,$coloumn2){
	include_once("connection.php");
	global $conn;
		
	$sql = "SELECT * FROM $tablename";
			$query = $conn->query($sql);
	
	while($data= mysqli_fetch_array($query)){
			$data_id 	= $data[$column1];
			$data_name  = $data[$coloumn2];
						
			echo "<option value='$data_id'>$data_name</option>";
		}
}
?>