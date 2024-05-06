<?php

$servername = "localhost"; // 127.0.0.1
$username = "root";
$password = "";
$dbName = "shop_ban_hang";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbName);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// $insertQuery = "INSERT INTO users(username, password, email) 
//     VALUES ('admin', '123456', 'admin@gmail.com')";
$sql = "SELECT * FROM users WHERE id = '6'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
var_dump($row);

echo "Connected successfully";

?>