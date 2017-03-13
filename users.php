<?php
require('conn.php');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

	$sql1 = "SELECT num FROM no_user WHERE dat = CURDATE();";
	$result = $conn->query($sql1);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			$res = $row["num"];
			$res = intval($res) + 1;
		}	
	}	
	$sql2='delete from no_user where dat = CURDATE();';
	$sql3="insert into no_user values(CURDATE(),'$res');";
	$conn->query($sql2);
	$conn->query($sql3);

echo $res;
?>