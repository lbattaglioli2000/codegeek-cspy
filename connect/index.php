<?php
/**
 * Created by PhpStorm.
 * User: lbattaglioli
 * Date: 7/29/17
 * Time: 6:19 PM
 */

$servername = "localhost";
$username = "codegeeklearning";
$password = "";
$db = "cspy";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Hmmm... Connection failed: " . mysqli_connect_error());
}