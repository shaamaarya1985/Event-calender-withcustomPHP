<?php
setcookie();
/* Database connection start */
$servername = "localhost";
$username = "uquwg63zpselu";
$password = "gqlnh3ehwwjv";
$dbname = "dbgc0fgebup8v4";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

define(SITE_URL,"http://localhost/event-calender/");
?>
