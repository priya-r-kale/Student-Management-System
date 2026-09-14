<?php
$conn = pg_connect("host=localhost dbname=student_db user=postgres password=postgres");

if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    pg_query($conn, "DELETE FROM students WHERE id=$id");
    header("Location: students.php");
}

$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $result = pg_query($conn, "SELECT * FROM students 
        WHERE name ILIKE '%$search%' 
        OR class_name ILIKE '%$search%'
        ORDER BY id DESC");
} else {
    $result = pg_query($conn, "SELECT * FROM students ORDER BY id DESC");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Students</title>
<style>
body { font-family: Arial; background:#f2f4f7; padding:30px; }
table { width:100%; background:white; border-collapse:collapse; box-shadow:0 0 10px #ccc; }
th, td { padding:12px; border-bottom:1px solid #ddd; text-align:center; }
th { background:#4CAF50; color:white; }
a { text-decoration:none; color:#007BFF; margin:0 5px; }
.search-box { margin-bottom:15px; }
.search-box input { padding:8px; width:200px; }
.search-box button { padding:8px 12px; background:#4CAF50; color:white; border:none; }
</style>
</head>
<body>

<h2>All Students</h2>
<a href="print_students.php" target="_blank">🖨 Print / PDF</a>

<a href="add_student.php">➕ Add Student</a> |
<a href="dashboard.php">🏠 Dashboard</a>

<div class="search-box">
<form method="get">
    <input type="text" name="search" placeholder="Search by name or class..." value="<?= $search ?>">
    <button type="submit">🔍 Search</button>
</form>
</div>

<table>
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Class</th>
    <th>Gender</th>
    <th>Action</th>
</tr>

<?php while ($row = pg_fetch_assoc($result)) { ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['name'] ?></td>
    <td><?= $row['email'] ?></td>
    <td><?= $row['class_name'] ?></td>
    <td><?= $row['gender'] ?></td>
    <td>
        <a href="view_student.php?id=<?= $row['id'] ?>">View</a> |
        <a href="edit_student.php?id=<?= $row['id'] ?>">Edit</a> |
        <a href="students.php?delete=<?= $row['id'] ?>" onclick="return confirm('Delete this student?')">Delete</a>
    </td>
</tr>
<?php } ?>

</table>

</body>
</html>
