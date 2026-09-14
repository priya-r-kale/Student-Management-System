<?php
$page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
?>

<!DOCTYPE html>
<html>
<head>
    <title>StudentMS</title>
    <style>
        body { margin:0; font-family: Arial; background:#f4f6f8; }
        .sidebar {
            width:230px;
            height:100vh;
            background:linear-gradient(180deg,#0b2a5b,#0e3b8f);
            color:white;
            position:fixed;
            padding:20px;
        }
        .sidebar a {
            display:block;
            color:white;
            text-decoration:none;
            padding:12px;
            margin:10px 0;
            border-radius:6px;
        }
        .sidebar a:hover { background:#1f4fa3; }

        .main {
            margin-left:250px;
            padding:40px;
        }

        table {
            width:100%;
            border-collapse: collapse;
            background:white;
        }
        th, td {
            padding:12px;
            border:1px solid #ddd;
        }
        th { background:#0e3b8f; color:white; }
    </style>
</head>
<body>

<div class="sidebar">
    <h2>🎓 StudentMS</h2>
    <a href="app.php">🏠 Dashboard</a>
    <a href="app.php?page=view">👨‍🎓 View Students</a>
</div>

<div class="main">

<?php if($page == 'dashboard') { ?>
    <h1>Welcome to Student Management System 🎉</h1>
    <p>This is Dashboard page.</p>
<?php } ?>

<?php if($page == 'view') { ?>
    <h2>All Students</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Course</th>
            <th>Gender</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Priya</td>
            <td>priya@gmail.com</td>
            <td>BCA</td>
            <td>Female</td>
        </tr>
        <tr>
            <td>2</td>
            <td>Amit</td>
            <td>amit@gmail.com</td>
            <td>BSc</td>
            <td>Male</td>
        </tr>
    </table>

<?php } ?>

</div>
</body>
</html>
