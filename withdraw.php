<?php
require('conn.php');
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$rollno = $option = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $rollno = test_input($_POST["roll"]);
  $option = test_input($_POST["opt"]);
 
}
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql = "delete from student where rollno='$rollno'";
if($option =="Sell order"){
  $sql1 = "delete from seller where id='$rollno'";
  if ($conn->query($sql) === TRUE)  {
    readfile("withdraw.html");
    echo '<script>alert("ORDER CANCELLED"); </script>';
  } 
  else {
      readfile("withdraw.html");
    echo '<script>alert("ORDER CANNOT BE CANCELLED");</script>';
  }
}


if($option =="Buy order") {
  $sql2 = "delete from buyer where id='$rollno'";
  if ($conn->query($sql)  ===  TRUE && $conn->query($sql2)  ===  TRUE)  {
    readfile("withdraw.html");
    echo '<script>alert("ORDER CANCELLED"); </script>';
  } 
  else {
    readfile("withdraw.html");
    echo '<script>alert("ORDER CANNOT BE CANCELLED");</script>';
  }
}
$conn->close();
?>