<?php
session_start();
require("../../includes/head.php");
$_SESSION['pageTitle'] = "login";

// store the POST data globally
$_SESSION['email'] = $_POST['email'];
$_SESSION['password'] = $_POST['password'];

// connect
require "../../connect/index.php";

if($_SESSION['user']['loggedIn'] == 1) {
    echo "<script>
                        // Your application has indicated there's an error
                        window.setTimeout(function(){
                            // Move to a new location or you can do something else
                            window.location.href = \"/account\";
                        }, 5000);
                    </script>";
}else{
    // login
    $email = $_SESSION['email'];
    $password = $_SESSION['password'];
    $sql1 = "UPDATE users SET loggedIn = 1 WHERE email='$email' AND password='$password'";
    $conn->query($sql1);
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $results = $conn->query($sql);
    $_SESSION['user'] = $results->fetch_assoc();

}
?>

<!DOCTYPE html>
<html>
<body>
<?php require("../../includes/nav.php"); ?>
<div class="content">
    <div class="jumbotron">
        <div class="container">
            <?php if($_SESSION['user']['loggedIn'] == 1){?>
                <h1>Welcome back, <?php echo $_SESSION['user']['firstName']; ?></h1>
                <script>
                    // Your application has indicated there's an error
                    window.setTimeout(function(){
                        // Move to a new location or you can do something else
                        window.location.href = "/account";
                    }, 3000);
                </script>
            <?php } ?>
            <?php if($_SESSION['user']['loggedIn'] != 1){?>
                <h1>Hmm... Something went wrong.</h1>
            <?php } ?>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <?php if($_SESSION['user']['loggedIn'] == 1){?>
                    <p>We're takin' you to your profile now!</p>
                <?php } else { ?>
                    <p>It seems your either not logged in yet, or the account information you provided is not accurate. Try logging in again.</p>
                <?php } ?>
            </div>
        </div>
        <?php require "../../includes/footer.php"; ?>
    </div>
</div>
</body>
</html>