<?php

$host = 'localhost';
$username = 'root';
$password = '';
$db_name = 'dacc';

//Establishes the connection
$conn = mysqli_init();
mysqli_real_connect($conn, $host, $username, $password, $db_name);

?>
