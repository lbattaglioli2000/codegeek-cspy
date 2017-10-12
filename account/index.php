<?php
// Get everything ready!!

// start the session
session_start();

// name the page
$_SESSION['pageTitle'] = "account";

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
                <div class="container">
                    <h1>Your Account</h1>
                </div>
            </div>
            <div class="container">
            <h1>Hey there, <?php echo $_SESSION['user']['firstName']; ?>!</h1>
            <br>
            <div class="row">
                <div class="col-md-7">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Current Progress</h3>
                            <?php if($_SESSION['user']['lesson'] == 1 and $_SESSION['user']['unit'] == 1 and $_SESSION['user']['section'] == 1){ ?>
                                <p>Hey there, and welcome to CSPY! It appears you've yet to start the course! What're ya waiting for? Get started now!</p>
                                <a class="btn btn-success btn-lg" href="/cspy/1/1/1/index.php">Get started!</a>
                            <?php } else { ?>
                                <p>Our records indicate you left off on <b>lesson <?php echo $_SESSION['user']['lesson']; ?></b> of <b>unit <?php echo $_SESSION['user']['unit']; ?></b></p>
                                <a href="/cspy/<?php echo $_SESSION['user']['unit'] ."/".$_SESSION['user']['lesson']."/".$_SESSION['user']['position']; ?>" class="btn btn-primary btn-lg">Pick up where you left off</a>
                            <?php } ?>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">Community</h3>
                            <iframe src="https://gitter.im/Open-CodeGeek/CSPY/~embed" style="border: none; height: 500px; width: 100%;"></iframe>
                        </div>
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-body">
                            <h3 class="card-title">A message to new users.</h3>
                            <p><b>Hey there <?php echo $_SESSION['user']['firstName'];?>,</b></p>
                            <p>There's a few things you should take note of whilst using our new learning system...</p>
                            <ul>
                                <li>You'll need a <a href="http://www.github.com/join" target="_blank">GitHub</a> account. This is so you can sign into our third party chat room powered by Gitter.im.</li>
                                <li>Our course, and our online classroom, are always changing and improving. Nothing on here is tentative so please keep that in mind.</li>
                                <li>We listen. If you submit feedback, or say something on our chat room, we will see it and we will use what you say to help improve CodeGeek. Whether it be a user interface update, or a change in the content and curriculum.</li>
                            </ul>
                            <p>We think you'll really love CodeGeek, and we think you'll also love the experience you're going to have using our online classroom. With our supportive community composed of teachers, students, and CodeGeek staff, you'll have no issue seeking help.</p>
                            <p>Feel free to reach out to me at anytime via livechat, my handle is <kbd>@lbattaglioli2000</kbd>. I respond to all!</p>
                            <br>
                            <p><b>Your friend and instructor,</b></p>
                            <p><b>Luigi Battaglioli</b></p>
                        </div>
                    </div>
                    <br>
                    <div class="card">
                        <div class="card-body">
                            <h3 class="panel-title">Change Password</h3>
                            <form action="update-password/index.php" method="post">
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input type="password" name="password" class="form-control" id="password" placeholder="New Password" required>
                                </div>
                                <button class="btn btn-danger btn-lg btn-block">Change</button>
                            </form>
                        </div>
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