<?php
$conn = pg_connect("host=localhost port=5432 dbname=student_db user=postgres password=YOUR_PASSWORD");

if (!$conn) {
    die("Connection failed");
}
?>
