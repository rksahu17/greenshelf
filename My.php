<?php
$q = $_REQUEST["q"];

$retVal = "";

/** Connection to db*/
require('conn.php');
// Create connection

if ($q == "stockdetails") {
	$sql = "SELECT s1,s2,s3,s4,s5,s6,s7,s8,s9,s10,s11,s12,s13,s14,s15,s16,s17,s18,s19,s20,s21,s22,s23,s24 FROM stock;";
	$result = $conn->query($sql);		
	if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
				for ($i=1; $i <=24; $i++) { 
					$retVal = $retVal . $row["s".$i];
					$retVal = $retVal .  " ";
				}
	                }
		echo $retVal;
	}
}
elseif ($q == "countuser") {	
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
echo "succ";
} 

elseif ($q == "admin") {	
	$sql1 = "SELECT num FROM no_user WHERE dat = CURDATE();";
	$result = $conn->query($sql1);
	if($result->num_rows > 0){
		while($row = $result->fetch_assoc()) {
			$res = $row["num"];
		}
          echo $res;	
	}	

}

else 
     echo "Null";

$conn->close();	    

?>
				