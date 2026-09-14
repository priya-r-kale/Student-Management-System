<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$id = $_GET['id'];

$result = pg_query(
    $conn,
    "SELECT * FROM students WHERE id=$id"
);

$row = pg_fetch_assoc($result);

if (!$row) {
    die("Student not found!");
}

?>

<!DOCTYPE html>

<html>

<head>

<title>Print Student</title>

<style>

/* ================= BODY ================= */

body{

    margin:0;

    min-height:100vh;

    font-family:"Segoe UI",Arial,sans-serif;

    background-image:url("images/dashboard-bg.png");

    background-size:cover;

    background-position:center;

    background-repeat:no-repeat;

    background-attachment:fixed;

}


/* ================= SIDEBAR ================= */

.sidebar{

    width:230px;

    height:100vh;

    position:fixed;

    left:0;

    top:0;

    padding:20px;

    box-sizing:border-box;

    background:rgba(30,58,138,0.65);

    backdrop-filter:blur(8px);

    -webkit-backdrop-filter:blur(8px);

    border-right:1px solid rgba(255,255,255,0.25);

    color:white;

}


.sidebar h2{

    margin:15px 0 35px 5px;

    font-size:27px;

}


.sidebar a{

    display:block;

    color:white;

    text-decoration:none;

    padding:12px;

    margin:10px 0;

    border-radius:8px;

}


.sidebar a:hover{

    background:rgba(255,255,255,0.20);

}


/* ================= MAIN ================= */

.main{

    margin-left:230px;

    min-height:100vh;

    padding:40px;

}


/* ================= REPORT ================= */

.report{

    width:600px;

    margin:30px auto;

    padding:30px;

    border-radius:20px;

    background:rgba(255,255,255,0.32);

    backdrop-filter:blur(12px);

    -webkit-backdrop-filter:blur(12px);

    border:1px solid rgba(255,255,255,0.60);

    box-shadow:

    0 12px 35px rgba(0,0,0,0.18);

}


/* ================= TITLE ================= */

h2{

    text-align:center;

    color:#172554;

    font-size:30px;

    margin-bottom:25px;

}


/* ================= DETAILS ================= */

.details{

    padding:20px;

    border-radius:12px;

    background:rgba(255,255,255,0.20);

    border:1px solid rgba(255,255,255,0.35);

}


.details p{

    margin:12px 0;

    font-size:16px;

    color:#111827;

}


.details b{

    color:#172554;

}


/* ================= BUTTON ================= */

.print-btn{

    display:block;

    margin:25px auto 0;

    padding:10px 25px;

    background:#16a34a;

    color:white;

    border:none;

    border-radius:8px;

    cursor:pointer;

    font-size:15px;

    font-weight:bold;

}


/* ================= PRINT ================= */

@media print{

    body{

        background:white;

        padding:0;

    }


    .sidebar{

        display:none;

    }


    .main{

        margin:0;

        padding:0;

    }


    .report{

        width:500px;

        margin:30px auto;

        background:white;

        border:1px solid #000;

        box-shadow:none;

        backdrop-filter:none;

    }


    .details{

        background:white;

        border:1px solid #ddd;

    }


    .print-btn{

        display:none;

    }

}

</style>

</head>


<body onload="window.print()">


<!-- ================= SIDEBAR ================= -->

<div class="sidebar">

    <h2>🎓 StudentMS</h2>


    <a href="dashboard.php">

        🏠 Dashboard

    </a>


    <a href="add_student.php">

        ➕ Add Student

    </a>


    <a href="view_students.php">

        👨‍🎓 View Students

    </a>


    <a href="attendance.php">

        📅 Attendance

    </a>


    <a href="info.php">

        ℹ️ Information

    </a>


    <a
    href="logout.php"
    style="background:#dc2626;"
    >

        🚪 Logout

    </a>

</div>


<!-- ================= MAIN ================= -->

<div class="main">


<div class="report">


<h2>

🎓 Student Report

</h2>


<div class="details">


<p>

<b>ID:</b>

<?= $row['id'] ?>

</p>


<p>

<b>Name:</b>

<?= $row['name'] ?>

</p>


<p>

<b>Email:</b>

<?= $row['email'] ?>

</p>


<p>

<b>Class:</b>

<?= $row['class_name'] ?>

</p>


<p>

<b>Gender:</b>

<?= $row['gender'] ?>

</p>


</div>


<button
onclick="window.print()"
class="print-btn"
>

🖨 Print / Save as PDF

</button>


</div>


</div>


</body>

</html>