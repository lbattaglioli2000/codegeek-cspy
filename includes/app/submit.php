<?php

$url = $_POST['url'];
$type = $_POST['optionsRadios'];
$description = $_POST['description'];
$name = $_POST['name'];
$email = $_POST['email'];

// start the session
session_start();

// check if logged in, then act accordingly.
require "../../connect/index.php";
require "../../includes/app/login.php";

// name the page
$_SESSION['pageTitle'] = "feedback";

// sql
$sql = "INSERT INTO feedback (userName, email, feedbackType, description) VALUES ('$name', '$email', '$type', '$description');";

?>

<!-- Metadata, title, imports, etc. -->
<?php include "../../includes/head.php"; ?>

<body>
<!-- Site navigation bar -->
<?php include "../../includes/nav.php"; ?>

<!-- Add site content here -->
<div class="content">
    <div class="jumbotron">
        <div class="container">
            <h1>Feedback Submission</h1>
        </div>
    </div>
    <div class="container">
        <?php if($_SESSION['user']['loggedIn'] == 1 and $_SESSION['user']['tester'] == 1){ ?>
            <?php if($conn->query($sql)) { ?>
                <h1>Feedback <span class="label label-info"><?php echo ucfirst($type); ?></span></h1>
                <h3>Your Information</h3>
                <p><b>Name:</b> <i><?php echo $name; ?></i></p>
                <p><b>Email:</b> <i><?php echo $email; ?></i></p>
                <h3>Feedback Information</h3>
                <p><b>Description:</b></p>
                <p><?php echo $description; ?></p>
            <?php } ?>
            <?php include "../../includes/footer.php"; ?>
        <?php } ?>
    </div>
</div>

</body>

</html>