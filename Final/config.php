<?php
$servername = "localhost";
$username = "root";
$password = "";
$database= "bms";

// Check connection
if (!$con= mysqli_connect($servername, $username, $password, $database))
 {
  die("Connection failed.");
}
