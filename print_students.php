<?php

include "db.php";

$id = $_GET['id'];

$res = pg_query(
    $conn,
    "SELECT * FROM students WHERE id=$id"
);

$row = pg_fetch_assoc($res);

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


/* ================= REPORT CARD ================= */

.card{

    width:450px;

    padding:30px;

    margin:70px auto;

    border-radius:20px;

    background:rgba(255,255,255,0.32);

    backdrop-filter:blur(12px);

    -webkit-backdrop-filter:blur(12px);

    border:1px solid rgba(255,255,255,0.60);

    box-shadow:0 12px 35px rgba(0,0,0,0.18);

}


/* ================= TITLE ================= */

h2{

    text-align:center;

    color:#172554;

    margin-bottom:25px;

}


/* ================= DETAILS ================= */

.details{

    padding:18px;

    border-radius:12px;

    background:rgba(255,255,255,0.25);

    border:1px solid rgba(255,255,255,0.40);

}


.details p{

    font-size:16px;

    color:#111827;

    margin:12px 0;

}


.details b{

    color:#172554;

}


/* ================= PRINT BUTTON ================= */

.print-btn{

    display:block;

    margin:25px auto 0;

    padding:10px 22px;

    border:none;

    border-radius:8px;

    background:#16a34a;

    color:white;

    font-weight:bold;

    cursor:pointer;

}


/* ================= PRINT MODE ================= */

@media print{

    body{

        background:white;

    }


    .card{

        margin:30px auto;

        background:white;

        border:2px solid #000;

        box-shadow:none;

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


<div class="card">


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


</body>

</html>