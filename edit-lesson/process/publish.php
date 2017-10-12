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

$content = htmlentities($content, ENT_QUOTES);

$sql = "UPDATE course SET content = '$content' WHERE unit='$unit' AND lesson='$lesson' AND type='$type'";

if($conn->query($sql)) {
    echo "Updated. Redirecting...";
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