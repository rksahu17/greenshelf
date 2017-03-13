<?php
$servername = "sql105.phpzilla.net";
$username = "phpz_18616319";
$password = "greenshelf123";
$dbname = "phpz_18616319_Greenshelf";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>