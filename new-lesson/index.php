<?php
// Get everything ready!!

// start the session
session_start();

// check if logged in, then act accordingly.
require "../connect/index.php";
require "../includes/app/login.php";

// name the page
$_SESSION['pageTitle'] = "New Lesson";

?>

<!-- Metadata, title, imports, etc. -->
<?php include "../includes/head.php"; ?>

<body>
<!-- Site navigation bar -->
<?php include "../includes/nav.php"; ?>

<!-- Add site content here -->
<div class="content">
    <div class="jumbotron">
        <div class="container">
            <h1>Content Publishing System</h1>
        </div>
    </div>
    <div class="container">
        <?php if($_SESSION['user']['loggedIn'] == 1 and $_SESSION['user']['admin'] == 1){ ?>
            <form method="post" action="process/index.php">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input class="form-control" id="title" name="title" placeholder="Printing" required>
                </div>
                <label>Type</label>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="1">
                        Lecture
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="2">
                        Recap
                    </label>
                </div>
                <div class="radio">
                    <label>
                        <input type="radio" name="optionsRadios" id="optionsRadios3" value="3">
                        Challenge
                    </label>
                </div>
                <button class="btn btn-primary btn-lg btn-block">Continue</button>
            </form>
        <?php } ?>
        <?php if($_SESSION['user']['admin'] != 1){ ?>
            <h1>Uh-Oh!</h1>
            <p>You're not authorized to be here. This spot is for admins only, sorry!</p>
        <?php } ?>
        <!-- Site footer and JS -->
        <?php include "../includes/footer.php"; ?>
    </div>
</div>

</body>

</html>