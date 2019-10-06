<?php           // config class="inc php"

$dbserver = 'localhost';
$dbuser = 'root';
$dbname = 'gensokyostore';
$dbpass = '';

$conn = mysqli_connect($dbserver,$dbuser,$dbpass,$dbname);


if (!$conn) {
    die("Connection failed:".mysqli_connect_error());
}
