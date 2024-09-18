<?php 

$hostname = "localhost";
$username = "root";
$password = "";
$database_name = "tamu_masuk";

$db = mysqli_connect($hostname, $username, $password, $database_name);

if($db->connect_error){
    echo "koneksi database rusak";
    die('error!!');
}

?>