<?php
require 'conn.php';

$comm = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $comm = test_input($_POST["box"]);
 }

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$sql = "insert into comment (dat,comment) values (CURDATE(),'$comm');";

if ($conn->query($sql) == TRUE) {
    readfile("about.html");
    echo "<script>alert('Thanks For Your Feedback!!');</script>";
}
$conn->close();
?>

  