<link rel="stylesheet" href="/assets/css/main.css" type="text/css" />
<?php
// Get everything ready!!

// start the session
session_start();

$unit = $_GET['unit'];
$lesson = $_GET['lesson'];
$type = $_GET['type'];

// name the page
$_SESSION['pageTitle'] = "Lesson";

// check if logged in, then act accordingly.

require "../../connect/index.php";
require "../../includes/app/login.php";

$sql = "SELECT * FROM course WHERE unit='$unit' AND lesson='$lesson' AND type='$type'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

<!-- Metadata, title, imports, etc. -->
<?php include "../../includes/head.php"; ?>

<body>
<!-- Site navigation bar -->
<?php include "../../includes/nav.php"; ?>

<!-- Add site content here -->
<div class="content">
        <?php if($_SESSION['user']['loggedIn'] != 1){ ?>
        <div class="container">
            <h1>Hey!</h1>
            <p>You're not logged in! You should totally <a data-toggle="modal" data-target="#myModal2">make an account!</a></p>
        <?php } ?>
        <?php if($_SESSION['user']['loggedIn'] == 1){ ?>
            <div class="jumbotron">
                <h1><?php echo $row['title']; ?></h1>
            </div>
            <div class="container">
            <div class="row">
              <div class="col-md-12">
                <?php 
                echo html_entity_decode($row['content']);
                ?>
                <hr>
                <a href="/course" class="btn btn-block btn-outline-primary btn-lg">Return to Course Dashboard</a>
              </div>
            </div>
        <?php } ?>
        <!-- Site footer and JS -->
        <?php include "../../includes/footer.php"; ?>
    </div>
</div>

</body>

</html>