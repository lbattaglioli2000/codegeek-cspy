<?php
// Get everything ready!!

// start the session
session_start();

// name the page
$_SESSION['pageTitle'] = "overview";

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
    <div class="jumbotron">
        <div class="container">
            <h1>Course Overview</h1>
            <hr>
            <p>The courses syllabus is available for students to better understand the scope of the course. Teachers can also use it to guide their instruction.</p>
        <a class="btn btn-primary btn-lg" href="https://docs.google.com/a/codegeek.org/document/d/1pMg04gNbXQQy9islPiR7XdTskhx7jNXtvvfpR32N9L0/edit?usp=sharing" target="_blank">Get a Copy!</a>
        </div>
    </div>
    <div class="container">
        <h1>Course Outline</h1>
        <p>This course is composed of ten units. Each unit is listed below. For more information about each unit, take a look at our syllabus and look at our lesson breakdown.</p>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <td>Unit 1: Getting Started</td>
                <td>Unit 6: Conditional Expressions</td>
            </tr>
            <tr>
                <td>Unit 2: Variables and Data</td>
                <td>Unit 7: Loops</td>
            </tr>
            <tr>
                <td>Unit 3: Functions</td>
                <td>Unit 8: Classes and Objects</td>
            </tr>
            <tr>
                <td>Unit 4: Strings</td>
                <td>Unit 9: Modules and Packages</td>
            </tr>
            <tr>
                <td>Unit 5: Data Structures</td>
                <td>Unit 10: File Input and Output</td>
            </tr>
            </tbody>
        </table>
        <!-- Site footer and JS -->
        <?php include "../includes/footer.php"; ?>
    </div>
</div>

</body>

</html>