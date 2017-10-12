<?php
// Get everything ready!!

// start the session
session_start();

// check if logged in, then act accordingly.
require "../connect/index.php";
require "../includes/app/login.php";

// name the page
$_SESSION['pageTitle'] = "Edit Lesson";

// grab the previous pages values
$unit = $_GET['unit'];
$lesson = $_GET['lesson'];
$type = $_GET['type'];

$sql = "SELECT * FROM course WHERE unit='$unit' AND lesson='$lesson' AND type='$type'";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

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
            <h1>Content Editing System</h1>
        </div>
    </div>
    <div class="container">
        <?php if($_SESSION['user']['loggedIn'] == 1 and $_SESSION['user']['admin'] == 1){ ?>
            <form method="post" action="process/publish.php">
                <p><b>Title: </b><?php echo $row['title']; ?></p>
                <input title="type" type="hidden" value="<?php echo $row['title']; ?>" name="title">
                <input title="type" type="hidden" value="<?php echo $type; ?>" name="type">
                <input title="type" type="hidden" value="<?php echo $unit; ?>" name="unit">
                <input title="type" type="hidden" value="<?php echo $lesson; ?>" name="lesson">
                    <div class="form-group">
                        <label>Lesson Content</label>
                        <textarea name="content" class="form-control" rows="30">
                            <?php echo $row['content']; ?>
                        </textarea>
                        <script>
                            CKEDITOR.replace('content');
                        </script>
                    </div>
                
                <button class="btn btn-primary btn-lg btn-block">Update Lesson</button>
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
