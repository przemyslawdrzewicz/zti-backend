<?php 
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, Accept, Authorization, X-Request-With');
header('Access-Control-Allow-Credentials: true');
header('Content-type: application/json');
// header('Access-Control-Allow-Origin: localhost:8080')
// header('Access-Control-Allow-Origin', 'http://zti-frontend.herokuapp.com/');


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zai_database";

// $servername = "mysql.cba.pl";
// $username = "Kicimial126";
// $password = "Ztizti2020!";
// $dbname = "kicizti";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>