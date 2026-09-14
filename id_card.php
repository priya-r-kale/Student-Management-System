<?php

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

<title>ID Card</title>


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
   ID CARD
===================================================== */

.card{

    width:340px;

    margin-top:25px;

    padding:25px;

    text-align:center;

    border-radius:20px;

    background:rgba(255,255,255,0.32);

    backdrop-filter:blur(12px);

    -webkit-backdrop-filter:blur(12px);

    border:1px solid rgba(255,255,255,0.60);

    box-shadow:
    0 12px 35px rgba(0,0,0,0.18);

}


/* =====================================================
   CARD TITLE
===================================================== */

.card h2{

    margin:5px 0 20px;

    color:#172554;

    font-size:25px;

    text-shadow:
    0 2px 5px rgba(255,255,255,0.8);

}


/* =====================================================
   STUDENT IMAGE
===================================================== */

.card img{

    width:90px;

    height:90px;

    border-radius:50%;

    object-fit:cover;

    margin-bottom:10px;

    border:4px solid rgba(255,255,255,0.70);

    box-shadow:
    0 5px 15px rgba(0,0,0,0.15);

}


/* =====================================================
   STUDENT NAME
===================================================== */

.card h3{

    color:#172554;

    font-size:22px;

    margin:8px 0 20px;

}


/* =====================================================
   DETAILS
===================================================== */

.details{

    text-align:left;

    padding:15px;

    border-radius:12px;

    background:rgba(255,255,255,0.20);

    border:1px solid rgba(255,255,255,0.35);

}


.details p{

    margin:10px 0;

    color:#111827;

    font-size:15px;

}


.details b{

    color:#172554;

}


/* =====================================================
   PRINT BUTTON
===================================================== */

.print-btn{

    margin-top:20px;

    padding:10px 22px;

    background:rgba(22,163,74,0.90);

    color:white;

    border:none;

    border-radius:8px;

    cursor:pointer;

    font-size:15px;

    font-weight:600;

    transition:0.3s;

}


.print-btn:hover{

    background:#15803d;

    transform:translateY(-2px);

}


/* =====================================================
   BACK BUTTON
===================================================== */

.back-btn{

    display:inline-block;

    margin-top:10px;

    padding:9px 20px;

    background:rgba(75,85,99,0.90);

    color:white;

    text-decoration:none;

    border-radius:8px;

    font-size:14px;

    transition:0.3s;

}


.back-btn:hover{

    background:#374151;

    color:white;

}


/* =====================================================
   PRINT
===================================================== */

@media print{

    body{

        background:white;

    }


    .sidebar{

        display:none;

    }


    .main{

        margin-left:0;

        padding:0;

        display:block;

    }


    .card{

        margin:30px auto;

        background:white;

        box-shadow:none;

        border:1px solid #ddd;

    }


    .print-btn,
    .back-btn{

        display:none;

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


    .card{

        width:100%;

        max-width:340px;

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
     MAIN
===================================================== -->

<div class="main">


<div class="card">


<h2>

🎓 Student ID Card

</h2>


<?php if($row['gender']=="Male"){ ?>

<img src="images/boy.png">

<?php } else { ?>

<img src="images/girl.png">

<?php } ?>


<h3>

<?php echo $row['name']; ?>

</h3>


<div class="details">


<p>

<b>ID :</b>

<?php echo $row['id']; ?>

</p>


<p>

<b>Email :</b>

<?php echo $row['email']; ?>

</p>


<p>

<b>Class :</b>

<?php echo $row['class_name']; ?>

</p>


<p>

<b>Gender :</b>

<?php echo $row['gender']; ?>

</p>


</div>


<button
onclick="window.print()"
class="print-btn"
>

🖨 Print ID Card

</button>


<br>


<a
href="dashboard.php"
class="back-btn"
>

⬅ Back to Dashboard

</a>


</div>


</div>


</body>

</html>