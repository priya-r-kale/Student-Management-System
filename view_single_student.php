<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}
include "db.php";

if (!isset($_GET['id'])) {
    die("Student ID missing!");
}

$id = intval($_GET['id']);
$result = pg_query($conn, "SELECT * FROM students WHERE id=$id");
$row = pg_fetch_assoc($result);

if (!$row) {
    die("Student not found!");
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>View Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card shadow p-4 rounded-4">
        <h3 class="mb-4">👨‍🎓 Student Details</h3>

        <p><b>ID:</b> <?= $row['id'] ?></p>
        <p><b>Name:</b> <?= htmlspecialchars($row['name']) ?></p>
        <p><b>Email:</b> <?= htmlspecialchars($row['email']) ?></p>
        <p><b>Class:</b> <?= htmlspecialchars($row['class_name']) ?></p>
        <p><b>Gender:</b> <?= htmlspecialchars($row['gender']) ?></p>

        <a href="view_students.php" class="btn btn-primary mt-3">⬅ Back</a>
    </div>
</div>

</body>
</html>
