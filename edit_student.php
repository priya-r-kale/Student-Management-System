<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include "db.php";

$id = $_GET['id'];

$res = pg_query(
    $conn,
    "SELECT * FROM students WHERE id=$id"
);

$row = pg_fetch_assoc($res);

?>

<!DOCTYPE html>

<html>

<head>

<title>Edit Student</title>

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
rel="stylesheet"
>


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

    transition:0.3s;

}


.sidebar a:hover{

    background:rgba(255,255,255,0.20);

}


/* ================= MAIN ================= */

.main{

    margin-left:230px;

    min-height:100vh;

    padding:40px;

    display:flex;

    justify-content:center;

    align-items:flex-start;

}


/* ================= EDIT BOX ================= */

.edit-box{

    width:600px;

    padding:30px;

    margin-top:25px;

    border-radius:20px;

    background:rgba(255,255,255,0.30);

    backdrop-filter:blur(10px);

    -webkit-backdrop-filter:blur(10px);

    border:1px solid rgba(255,255,255,0.55);

    box-shadow:
    0 10px 30px rgba(0,0,0,0.16);

}


/* ================= TITLE ================= */

.edit-box h3{

    text-align:center;

    color:#172554;

    font-size:29px;

    font-weight:700;

    margin-bottom:25px;

    text-shadow:
    0 2px 5px rgba(255,255,255,0.8);

}


/* ================= LABEL ================= */

label{

    color:#172554;

    font-weight:600;

    margin-bottom:7px;

}


/* ================= INPUT ================= */

.form-control{

    height:48px;

    border-radius:10px;

    border:1px solid rgba(255,255,255,0.65);

    background:rgba(255,255,255,0.45) !important;

    backdrop-filter:blur(5px);

    -webkit-backdrop-filter:blur(5px);

    color:#111827;

}


.form-control:focus{

    background:rgba(255,255,255,0.65) !important;

    border-color:#2563eb;

    box-shadow:
    0 0 0 3px rgba(37,99,235,0.15);

}


/* ================= BUTTON AREA ================= */

.buttons{

    display:flex;

    gap:12px;

    margin-top:25px;

}


/* ================= UPDATE ================= */

.update-btn{

    flex:1;

    height:48px;

    border:none;

    border-radius:10px;

    background:rgba(22,163,74,0.90);

    color:white;

    font-size:16px;

    font-weight:600;

    cursor:pointer;

    transition:0.3s;

}


.update-btn:hover{

    background:#15803d;

    transform:translateY(-2px);

}


/* ================= CANCEL ================= */

.cancel-btn{

    flex:1;

    height:48px;

    border-radius:10px;

    background:rgba(75,85,99,0.90);

    color:white;

    text-decoration:none;

    display:flex;

    align-items:center;

    justify-content:center;

    font-size:16px;

    font-weight:600;

    transition:0.3s;

}


.cancel-btn:hover{

    background:#374151;

    color:white;

    transform:translateY(-2px);

}


/* ================= MOBILE ================= */

@media(max-width:700px){

    .sidebar{

        width:190px;

    }


    .main{

        margin-left:190px;

        padding:20px;

    }


    .edit-box{

        width:100%;

        padding:20px;

    }


    .buttons{

        flex-direction:column;

    }

}

</style>

</head>


<body>


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


<div class="edit-box">


<h3>

✏️ Edit Student

</h3>


<form
method="post"
action="update_student.php"
>


<!-- ID -->

<input
type="hidden"
name="id"
value="<?= $row['id'] ?>"
>


<!-- NAME -->

<div class="mb-3">

<label>

Student Name

</label>

<input
type="text"
name="name"
class="form-control"
value="<?= $row['name'] ?>"
required
>

</div>


<!-- EMAIL -->

<div class="mb-3">

<label>

Email

</label>

<input
type="email"
name="email"
class="form-control"
value="<?= $row['email'] ?>"
required
>

</div>


<!-- CLASS -->

<div class="mb-3">

<label>

Class

</label>

<input
type="text"
name="class_name"
class="form-control"
value="<?= $row['class_name'] ?>"
required
>

</div>


<!-- GENDER -->

<div class="mb-3">

<label>

Gender

</label>

<select
name="gender"
class="form-control"
>


<option
value="Male"
<?= $row['gender']=="Male" ? "selected" : "" ?>
>

Male

</option>


<option
value="Female"
<?= $row['gender']=="Female" ? "selected" : "" ?>
>

Female

</option>


</select>

</div>


<!-- BUTTONS -->

<div class="buttons">


<button
type="submit"
class="update-btn"
>

💾 Update

</button>


<a
href="dashboard.php"
class="cancel-btn"
>

❌ Cancel

</a>


</div>


</form>


</div>


</div>


</body>

</html>