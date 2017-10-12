<?php
/**
 * Created by PhpStorm.
 * User: lbattaglioli
 * Date: 7/31/17
 * Time: 10:49 PM
 */

session_start();

$_SESSION["user"]["loggedIn"] = 0;

$email = $_SESSION["email"];
$password = $_SESSION["password"];

require "../connect/index.php";

$sql = "UPDATE users SET loggedIn = 0 WHERE email='$email' AND password='$password'";
$conn->query($sql);

echo "logged out. now ";
echo "redirecting you to the home page...";
?>

<script>
    // Your application has indicated there's an error
    window.setTimeout(function(){
        // Move to a new location or you can do something else
        window.location.href = "/";
    }, 500);
</script>