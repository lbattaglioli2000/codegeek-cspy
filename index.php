<?php
// Get everything ready!!

// start the session
session_start();

// name the page
$_SESSION['pageTitle'] = "home";

// check if logged in, then act accordingly.

require "connect/index.php";
require "includes/app/login.php";


?>

<!-- Metadata, title, imports, etc. -->
<?php include "includes/head.php"; ?>

<body>
<!-- Site navigation bar -->
<?php include "includes/nav.php"; ?>

<!-- Add site content here -->
<div class="content">
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3">Welcome to <span style="font-family: Lobster">CodeGeek <sup style="font-family: 'Courier New'">CSPY</sup></span></h1>
        </div>
    </div>
    <div class="container">
        <h1>Hi there!</h1>
        <p>Firstly, welcome to CSPY, CodeGeek's beginners computer science course. The course will teach you the fundamentals of computer programming and it will also teach you how to apply what you’ve learned to solve real world problems using code. Our course is designed to deliver the content to you in a way that is easy to understand and allows for you to easily comprehend the materials.</p>
        <p>We want you to learn the fundamental ideas of programming so you can apply them to learn other, more widely used languages such as Java or C. You will learn to use code to solve real problems. We will learn things such as functions, classes and objects, file input and output, and many more interesting topics. We will have final projects to help enforce the skills we've learned and actually get you to apply them, and create something that is actually pretty cool, and useful. Throughout the course, you will also be given a challenge to complete after each lesson to enforce the skill(s) you should have learned</p>
        <p>We really think you'll learn a lot from this course, and we think you'll really enjoy it.</p>
        <p>We also recommend you check out our welcome/course overview video, <a data-toggle="modal" data-target="#coming-soon">here</a>!</p>
        <h2>Enroll</h2>
        <p>Enrollment is not <b>yet</b> available to everyone (only beta testers currently). Once our course is available, enrollment will be open to <b>everyone</b>!</p>
        <p>However, in the meantime, if you wish to be a beta tester, you can fill out our beta tester application and we will review it and consider adding you to our database of registered testers.</p>
        <a class="btn btn-primary" data-toggle="modal" data-target="#myModal3" href="#">Register as a Beta Tester</a>
        <!-- Site footer and JS -->
        <?php include "includes/footer.php"; ?>
    </div>
    <!-- Modal -->
    <div class="modal fade" id="myModal3" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title">Register as a Beta Tester</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
                <div class="modal-body">
                    <?php if($_SESSION['user']['loggedIn'] != 1){ ?>
                        <!-- 16:9 aspect ratio -->
                        <div class="embed-responsive embed-responsive-4by3">
                            <iframe src="https://docs.google.com/forms/d/e/1FAIpQLScl7B5Mc_4HqnQ5-g7v-UhADEZbpSM5ijG0VPQY-kmZdcAGSg/viewform?embedded=true" frameborder="0" marginheight="0" marginwidth="0">Loading...</iframe>
                        </div>
                    <?php } elseif ($_SESSION['user']['loggedIn'] == 1) { ?>
                        <h1>Hey, <?php echo $_SESSION['user']['firstName']; ?></h1>
                        <p>You're already logged in. No need to register again!</p>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-outline-secondary" href="#" data-dismiss="modal">Close</a>
                </div>
            </div>
        </div>
    </div>
</div>

</body>

</html>