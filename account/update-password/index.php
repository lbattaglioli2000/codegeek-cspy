<?php
/**
 * Created by PhpStorm.
 * User: lbattaglioli
 * Date: 8/1/17
 * Time: 9:01 PM
 */

session_start();

require "../../connect/index.php";
require "../../includes/app/login.php";

$password = $_POST['password'];
$email = $_SESSION['email'];
$_SESSION['password'] = $password;

$sql = "UPDATE users SET password='$password' WHERE email='$email'";

if($conn->query($sql)){
    echo "Password updated. Redirecting...";
    echo "<script>
                    // Your application has indicated there's an error
                    window.setTimeout(function(){
                        // Move to a new location or you can do something else
                        window.location.href = \"/account\";
                    }, 1000);
                </script>";
}else{
    echo "An error occurred. Your password could not be updated. Redirecting...";
    echo "<script>
                    // Your application has indicated there's an error
                    window.setTimeout(function(){
                        // Move to a new location or you can do something else
                        window.location.href = \"/account\";
                    }, 4000);
                </script>";
}