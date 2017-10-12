<?php

// Get everything ready!!

// start the session
session_start();

// name the page
$_SESSION['pageTitle'] = "register";
include "../../includes/head.php";

require "../../includes/app/login.php";

// if the user is not logged in:
if($_SESSION['user']['loggedIn'] != 1) {
    // get form data and store in separate variables
    $first = $_POST["first"];
    $last = $_POST["last"];
    $email = $_POST["email"];
    $password = $_POST["password"];
}else{
    echo "<script>
                    // Your application has indicated there's an error
                    window.setTimeout(function(){
                        // Move to a new location or you can do something else
                        window.location.href = \"/account\";
                    }, 0);
                </script>";
}

    // connect to the database
    require "../../connect/index.php";
?>
    <body>
    <!-- Site navigation bar -->
    <?php include "../../includes/nav.php"; ?>

    <!-- Add site content here -->
    <div class="content">
        <div class="jumbotron">
            <div class="container">
                <h1>Registration</h1>
                <p><?php echo $first . " " . $last . " " . $email . " " . $password; ?></p>
            </div>
        </div>
        <div class="container">
            <?php
            // check if the data exists (primarily email address)
            $checkQuery = "SELECT * FROM users WHERE email='$email'";
            if($conn->query($checkQuery)->num_rows != 0){ ?>
                <p>It appears an account with that same email address already exists. Try logging in with that email, or get help from us.</p>
            <?php } else {
                // write the data
                $writeQuery = "INSERT INTO users (firstName, lastName, email, password) VALUES ('$first', '$last', '$email', '$password')";
                if ($conn->query($writeQuery)){
                ?>
                    <div class="alert alert-warning">
                        <p><b>Heads up!</b> You shouldn't close this tab without reading the information below.</p>
                    </div>
                    <p>Nice! You're registered as a student. You're not done yet though! First, you should <a href="https://github.com/join">create a GitHub account</a>. This will mark the beginning of your programming career seeing how most companies and programmers use GitHub to keep track of their projects. Not only that, but once you have a GitHub account, you'll be able to join our community chat room using the GitHub login. Once you've signed up for GitHub, click the button below to signup for our chat room on Gitter!</p>
                    <a class="btn btn-primary btn-lg" href="https://gitter.im/Open-CodeGeek/CSPY" target="_blank">Register for Gitter.im</a>
                    <br>
                    <p>Sweet! Once you've done that, you can go ahead and login to CodeGeek.</p>
                    <a class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">Login to CodeGeek</a>
                <?php } ?>
            <?php } ?>
            <!-- Site footer and JS -->
            <?php include "../../includes/footer.php"; ?>
        </div>
    </div>

    </body>
    </html>