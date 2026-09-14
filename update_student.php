<?php
include "db.php";
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$class = $_POST['class_name'];
$gender = $_POST['gender'];

pg_query($conn, "UPDATE students SET name='$name', email='$email', class_name='$class', gender='$gender' WHERE id=$id");
header("Location: dashboard.php");
?>
