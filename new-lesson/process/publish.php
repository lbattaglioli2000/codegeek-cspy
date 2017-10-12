<?php
/**
 * Created by PhpStorm.
 * User: lbattaglioli
 * Date: 8/2/17
 * Time: 2:24 AM
 */

// chrome work around :/
// header("X-XSS-Protection: 0");

// connect to database
require "../../connect/index.php";

// store data
$title = $_POST['title'];
$type = $_POST['type'];
$content = $_POST['content'];
$unit = $_POST['unit'];
$lesson = $_POST['lesson'];

if($type == 1){
    $typeSTR = "Lecture";
}elseif($type == 2){
    $typeSTR = "Recap";
}elseif($type == 3){
    $typeSTR = "Challenge";
}

// write to database
if($type == 1) {
    $content = htmlentities('<div class=\'embed-responsive embed-responsive-16by9\'><iframe class=\'embed-responsive-item\' width=\'700\' height=\'700\' src=\'https://www.youtube.com/embed/'.$content.'\' frameborder=\'0\' allowfullscreen></iframe></div>', ENT_QUOTES);
}

if($type == 2) {
    $content = htmlentities($content, ENT_QUOTES);;
}

$sql = "INSERT INTO course (title, type, content, unit, lesson) VALUES ('$title - $typeSTR', '$type', '$content', '$unit', '$lesson')";

if($conn->query($sql)) {
    echo "Published. Redirecting...";
    echo "<script>
    // Your application has indicated there's an error
    window.setTimeout(function(){
        // Move to a new location or you can do something else
        window.location.href = \"/new-lesson\";
    }, 2000);
</script>";
}else{
    //echo $content;
    echo mysqli_error($conn);
}

?>