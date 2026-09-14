<?php

include 'db.php';


if (!isset($_GET['id'])) {

    die("Student ID not found!");

}


$id = $_GET['id'];


$result = pg_query(
    $conn,
    "SELECT * FROM students WHERE id = $id"
);


$student = pg_fetch_assoc($result);


if (!$student) {

    die("Student not found!");

}

?>

<!DOCTYPE html>

<html>

<head>

<title>View Student</title>


<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
rel="stylesheet"
>


<style>

/* =====================================================
   BODY
===================================================== */

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


/* =====================================================
   SIDEBAR
===================================================== */

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

    transition:0.3s;

}


.sidebar a:hover{

    background:rgba(255,255,255,0.20);

}


/* =====================================================
   MAIN
===================================================== */

.main{

    margin-left:230px;

    min-height:100vh;

    padding:40px;

    display:flex;

    justify-content:center;

    align-items:flex-start;

}


/* =====================================================
   PROFILE BOX
===================================================== */

.profile-box{

    width:650px;

    margin-top:25px;

    padding:30px;

    border-radius:20px;

    background:rgba(255,255,255,0.30);

    backdrop-filter:blur(10px);

    -webkit-backdrop-filter:blur(10px);

    border:1px solid rgba(255,255,255,0.55);

    box-shadow:
    0 10px 30px rgba(0,0,0,0.16);

}


/* =====================================================
   TITLE
===================================================== */

.profile-box h3{

    text-align:center;

    color:#172554;

    font-size:30px;

    font-weight:700;

    margin-bottom:25px;

    text-shadow:
    0 2px 5px rgba(255,255,255,0.8);

}


/* =====================================================
   TABLE
===================================================== */

.student-table{

    width:100%;

    border-collapse:collapse;

    border-radius:12px;

    overflow:hidden;

    background:rgba(255,255,255,0.20);

}


/* TABLE ROW */

.student-table tr{

    background:transparent;

}


/* TABLE HEADER */

.student-table th{

    width:35%;

    padding:14px;

    text-align:left;

    color:white;

    background:rgba(37,99,235,0.72);

    border-bottom:
    1px solid rgba(255,255,255,0.30);

}


/* TABLE DATA */

.student-table td{

    padding:14px;

    color:#111827;

    background:rgba(255,255,255,0.12);

    border-bottom:
    1px solid rgba(255,255,255,0.30);

}


/* HOVER */

.student-table tr:hover td{

    background:rgba(255,255,255,0.25);

}


/* =====================================================
   BUTTON AREA
===================================================== */

.button-area{

    text-align:center;

    margin-top:25px;

}


/* =====================================================
   BUTTONS
===================================================== */

.action-btn{

    display:inline-block;

    padding:9px 20px;

    margin:4px;

    border-radius:8px;

    text-decoration:none;

    color:white;

    border:none;

    font-size:15px;

    cursor:pointer;

    transition:0.3s;

}


/* PRINT */

.print-btn{

    background:rgba(22,163,74,0.90);

}


.print-btn:hover{

    background:#15803d;

    color:white;

    transform:translateY(-2px);

}


/* BACK */

.back-btn{

    background:rgba(75,85,99,0.90);

}


.back-btn:hover{

    background:#374151;

    color:white;

    transform:translateY(-2px);

}


/* =====================================================
   PRINT SETTINGS
===================================================== */

@media print{

    .sidebar,
    .button-area{

        display:none;

    }


    .main{

        margin-left:0;

        padding:0;

    }


    body{

        background:white;

    }


    .profile-box{

        box-shadow:none;

        background:white;

        border:none;

        width:100%;

    }

}


/* =====================================================
   MOBILE
===================================================== */

@media(max-width:700px){

    .sidebar{

        width:190px;

    }


    .main{

        margin-left:190px;

        padding:20px;

    }


    .profile-box{

        width:100%;

        padding:20px;

    }

}

</style>

</head>


<body>


<!-- =====================================================
     SIDEBAR
===================================================== -->

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


<!-- =====================================================
     MAIN CONTENT
===================================================== -->

<div class="main">


<div class="profile-box">


<h3>

🎓 Student Profile

</h3>


<table class="student-table">


<tr>

<th>ID</th>

<td>

<?= $student['id'] ?>

</td>

</tr>


<tr>

<th>Name</th>

<td>

<?= $student['name'] ?>

</td>

</tr>


<tr>

<th>Email</th>

<td>

<?= $student['email'] ?>

</td>

</tr>


<tr>

<th>Class</th>

<td>

<?= $student['class_name'] ?>

</td>

</tr>


<tr>

<th>Gender</th>

<td>

<?= $student['gender'] ?>

</td>

</tr>


</table>


<div class="button-area">


<button
onclick="window.print()"
class="action-btn print-btn"
>

🖨 Print

</button>


<a
href="view_students.php"
class="action-btn back-btn"
>

⬅ Back

</a>


</div>


</div>


</div>


</body>

</html>