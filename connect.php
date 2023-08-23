<?php
$server = 'localhost';
$user = 'root';
$password = '';
$database = 'db_beasiswa';

$db = mysqli_connect($server, $user, $password, $database);

if (!$db) {
  echo ("Connection failed: " . mysqli_connect_error());
}
?>