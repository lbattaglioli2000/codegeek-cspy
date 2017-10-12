<link rel="stylesheet" href="/assets/css/main.css" type="text/css" />
<?php
// Get everything ready!!

// start the session
session_start();

// name the page
$_SESSION['pageTitle'] = "Course";

// check if logged in, then act accordingly.

require "../connect/index.php";
require "../includes/app/login.php";


?>

<!-- Metadata, title, imports, etc. -->
<?php include "../includes/head.php"; ?>

<body>
<!-- Site navigation bar -->
<?php include "../includes/nav.php"; ?>

<!-- Add site content here -->
<div class="content">
        <?php if($_SESSION['user']['loggedIn'] != 1){ ?>
        <div class="container">
            <h1>Hey!</h1>
            <p>You're not logged in! You should totally <a data-toggle="modal" data-target="#myModal2">make an account!</a></p>
        <?php } ?>
        <?php if($_SESSION['user']['loggedIn'] == 1){ ?>
            <div class="jumbotron">
                <h1>Course Dashboard</h1>
                <hr>
                <p>Here's an overview of the course. You can go through and select a lesson, or pickup where you leftoff.</p>
            </div>
            <div class="container">
            <div class="row">
              <div class="col-md-12">
                <div id="accordion" role="tablist">
                  <!-- START UNIT DROP DOWN -->
                  <div class="card">
                    <div class="card-header" role="tab" id="u1Title">
                      <h5 class="mb-0">
                        <a class="collapsed" data-toggle="collapse" href="#u1" aria-expanded="false" aria-controls="u1">
                          Unit 1: Getting Started
                        </a>
                      </h5>
                    </div>
                    <div id="u1" class="collapse" role="tabpanel" aria-labelledby="u1Title" data-parent="#accordion">
                      <div class="card-body">
                        <?php
                        $sql = "SELECT * FROM course";
                        $results = $conn->query($sql);
                        while($row = $results->fetch_assoc()){
                        ?>
                          <div class="card">
                            <div class="card-body">
                              <h3><?php echo $row['title']; ?></h3>
                              <p><a class="btn btn-lg btn-outline-info" href="lesson/index.php?unit=<?php echo $row['unit']; ?>&lesson=<?php echo $row['lesson']; ?>&type=<?php echo $row['type']; ?>">Open</a> <?php if($_SESSION['user']['admin'] == 1){ ?><a class="btn btn-lg btn-outline-warning" href="/edit-lesson/index.php?unit=<?php echo $row['unit']; ?>&lesson=<?php echo $row['lesson']; ?>&type=<?php echo $row['type']; ?>">Edit</a><?php } ?></p>
                            </div>
                          </div>
                          <br>
                        <?php } ?>
                      </div>
                    </div>
                  </div>
                  <!-- END UNIT DROP DOWN -->
                </div>
              </div>
            </div>
        <?php } ?>
        <!-- Site footer and JS -->
        <?php include "../includes/footer.php"; ?>
    </div>
</div>

</body>

</html>