<?php 

// connect to database
// $conn = mysqli_connect('localhost', 'ninjapizza', 'test123', 'ninja_pizza');

// //check connection
// if(!$conn){
//   echo 'Connection error: ' . mysqli_connect_error();
// }

$servername = "localhost";
$username = "ninjapizza";
$password = "test123";
$charset = "utf8mb4";

$dsn = "mysql:host=$servername;dbname=ninja_pizza;charset=$charset";

try {
  $conn = new PDO($dsn, $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo 'Connected successfully';
  return $conn;
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

?>