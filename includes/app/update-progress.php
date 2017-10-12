<?php
/**
 * Created by PhpStorm.
 * User: lbattaglioli
 * Date: 8/2/17
 * Time: 6:22 PM
 */

$email = $_SESSION['user']['email'];

$sql = "UPDATE users SET unit=$unit, lesson=$lesson, position=$lessonType WHERE email=$email;";

$conn->query($sql);