<?php
/**
 * Created by PhpStorm.
 * User: Luigi Battaglioli
 * Date: 7/5/2017
 * Time: 9:07 PM
 */
if(is_null($_SESSION['user'])) {
    $_SESSION['user']['loggedIn'] = 0;
}

// login
if($_SESSION['user']['loggedIn'] == 1) {
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password' AND loggedIn=1";
    $results = $conn->query($sql);
    $_SESSION['user'] = $results->fetch_assoc();
}