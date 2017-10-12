<?php
// Get everything ready!!

// start the session
session_start();

// check if logged in, then act accordingly.
require "../../connect/index.php";
require "../../includes/app/login.php";

// name the page
$_SESSION['pageTitle'] = "New Lesson";

// grab the previous pages values
$title = $_POST['title'];
$type = $_POST['optionsRadios'];

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
            <h1>Content Publishing System</h1>
        </div>
    </div>
    <div class="container">
        <?php if($_SESSION['user']['loggedIn'] == 1 and $_SESSION['user']['admin'] == 1){ ?>
            <form method="post" action="publish.php">
                <p><b>Title: </b><?php echo $title; ?></p>
                <input title="title" type="hidden" value="<?php echo $title; ?>" name="title">
                <input title="type" type="hidden" value="<?php echo $type; ?>" name="type">
                <?php if($type == 1) { ?>
                    <div class="form-group">
                        <label>YouTube Video ID</label>
                        <input class="form-control" type="text" name="content" placeholder="X6eZ6yNRoL8">
                    </div>
                <?php } else { ?>
                    <div class="form-group">
                        <label>Lesson Content</label>
                        <textarea name="content" class="form-control" rows="30" placeholder="Lesson content"></textarea>
                        <script>
                            CKEDITOR.replace('content');
                        </script>
                    </div>
                <?php } ?>
                <h2>Other information</h2>
                <div class="form-group">
                    <label>Unit</label>
                    <select class="form-control" name="unit">
                        <option value="1">Unit 1: Getting Started</option>
                        <option value="2">Unit 2: Variables and Data Types</option>
                        <option value="3">Unit 3: Classes and Objects</option>
                        <option value="4">Unit 4: Strings</option>
                        <option value="5">Unit 5: Data Structures</option>
                        <option value="6">Unit 6: Conditional Expressions</option>
                        <option value="7">Unit 7: Loops</option>
                        <option value="8">Unit 8: Classes and Objects</option>
                        <option value="9">Unit 9: Modules and Packages</option>
                        <option value="10">Unit 10: File Input and Output</option>
                    </select>
                </div>
                <div class="form-group">
                    <label>Lesson</label>
                    <input type="number" class="form-control" name="lesson">
                </div>
                <button class="btn btn-primary btn-lg btn-block">Publish Lesson</button>
            </form>
        <?php } ?>
        <?php if($_SESSION['user']['admin'] != 1){ ?>
            <h1>Uh-Oh!</h1>
            <p>You're not authorized to be here. This spot is for admins only, sorry!</p>
        <?php } ?>
        <!-- Site footer and JS -->
        <?php include "../../includes/footer.php"; ?>
    </div>
</div>

</body>

</html>
