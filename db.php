<?php
//db details
$dbHost = 'localhost';
$dbUsername = 'k21inc';
$dbPassword = 'ekdrms114';
$dbName = 'k21office';

//Connect and select the database
$my = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($my->connect_error) {
    die("Connection failed: " . $my->connect_error);
}
$query = 'set names utf8';
$my -> query($query);

?>