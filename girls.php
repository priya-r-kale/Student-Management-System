<?php
session_start();
include "db.php";

$result = pg_query($conn,"SELECT * FROM students WHERE gender='Female'");
?>

<!DOCTYPE html>
<html>
<head>
<title>Girls Students</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

<div class="container mt-5">

<h3 class="mb-4">👧 Girls Students</h3>

<table class="table table-bordered bg-white">

<tr>
<th>Photo</th>
<th>Name</th>
<th>Email</th>
<th>Class</th>
</tr>

<?php
while($row = pg_fetch_assoc($result)){
?>

<tr>

<td>
<img src="uploads/<?php echo $row['photo']; ?>" width="60">
</td>

<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['class_name']; ?></td>

</tr>

<?php } ?>

</table>

<a href="dashboard.php" class="btn btn-secondary">Back</a>

</div>

</body>
</html>