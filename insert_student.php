<?php
$conn = pg_connect("host=localhost dbname=student_db user=postgres password=YOURPASSWORD");

$name = $_POST['name'];
$email = $_POST['email'];
$course = $_POST['course'];
$phone = $_POST['phone'];

$query = "INSERT INTO students (name,email,course,phone) VALUES ('$name','$email','$course','$phone')";
pg_query($conn, $query);

header("Location: view_students.php");
?>
