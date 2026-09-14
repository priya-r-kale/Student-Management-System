<?php

$conn = pg_connect("host=localhost port=5432 dbname=student_db user=postgres password=YOUR_PASSWORD");

if (!$conn) {
    die("Connection failed");
}


$limit = 5;

$page = isset($_GET['page']) ? $_GET['page'] : 1;

$start = ($page - 1) * $limit;


$result = pg_query(
    $conn,
    "SELECT * FROM students
     ORDER BY id ASC
     LIMIT $limit OFFSET $start"
);

?>

<!DOCTYPE html>

<html>

<head>

<title>View Students</title>


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
   NAVBAR
===================================================== */

.navbar{

    background:rgba(30,58,138,0.68) !important;

    backdrop-filter:blur(10px);

    -webkit-backdrop-filter:blur(10px);

    border-bottom:
    1px solid rgba(255,255,255,0.30);

}


.navbar-brand{

    font-size:21px;

}


/* =====================================================
   MAIN CONTENT
===================================================== */

.page-content{

    padding:35px;

}


/* =====================================================
   TITLE
===================================================== */

h2{

    color:#172554;

    font-size:32px;

    font-weight:700;

    margin-bottom:20px;

    text-shadow:
    0 2px 5px rgba(255,255,255,0.8);

}


/* =====================================================
   SEARCH BOX
===================================================== */

.search-box{

    display:flex;

    gap:10px;

    align-items:center;

    margin-bottom:20px;

}


.search-box input{

    width:300px;

    padding:11px 14px;

    border-radius:9px;

    border:1px solid rgba(255,255,255,0.60);

    background:rgba(255,255,255,0.45);

    backdrop-filter:blur(6px);

    -webkit-backdrop-filter:blur(6px);

    outline:none;

}


.search-box input:focus{

    background:rgba(255,255,255,0.65);

    border-color:#2563eb;

}


/* =====================================================
   ATTENDANCE BUTTON
===================================================== */

.attendance-btn{

    display:inline-block;

    padding:10px 20px;

    background:rgba(37,99,235,0.85);

    color:white;

    text-decoration:none;

    border-radius:8px;

    margin-bottom:20px;

    font-weight:600;

    transition:0.3s;

}


.attendance-btn:hover{

    background:#1d4ed8;

    color:white;

    transform:translateY(-2px);

}


/* =====================================================
   TABLE GLASS BOX
===================================================== */

.table-box{

    width:100%;

    padding:15px;

    border-radius:18px;

    background:rgba(255,255,255,0.28);

    backdrop-filter:blur(10px);

    -webkit-backdrop-filter:blur(10px);

    border:1px solid rgba(255,255,255,0.50);

    box-shadow:
    0 10px 30px rgba(0,0,0,0.15);

}


/* =====================================================
   TABLE
===================================================== */

.student-table{

    width:100%;

    border-collapse:collapse;

    background:rgba(255,255,255,0.18);

    border-radius:12px;

    overflow:hidden;

}


/* =====================================================
   TABLE HEADER
===================================================== */

.student-table th{

    padding:14px;

    background:rgba(14,59,143,0.78);

    color:white;

    text-align:center;

    border-bottom:
    1px solid rgba(255,255,255,0.30);

}


/* =====================================================
   TABLE DATA
===================================================== */

.student-table td{

    padding:12px;

    text-align:center;

    color:#111827;

    background:transparent;

    border-bottom:
    1px solid rgba(255,255,255,0.30);

}


/* =====================================================
   ROW HOVER
===================================================== */

.student-table tr:hover td{

    background:rgba(255,255,255,0.16);

}


/* =====================================================
   PHOTO
===================================================== */

.student-table img{

    width:60px;

    height:60px;

    border-radius:8px;

    object-fit:cover;

    border:2px solid rgba(255,255,255,0.60);

}


/* =====================================================
   NAVBAR BUTTONS
===================================================== */

.nav-btn{

    border-radius:8px;

    font-weight:600;

    margin-left:5px;

}


/* =====================================================
   MOBILE
===================================================== */

@media(max-width:700px){

    .page-content{

        padding:20px;

    }


    .search-box{

        flex-direction:column;

        align-items:flex-start;

    }


    .search-box input{

        width:100%;

    }


    .table-box{

        overflow-x:auto;

    }


    .student-table{

        min-width:700px;

    }

}

</style>

</head>


<body>


<!-- =====================================================
     NAVBAR
===================================================== -->

<nav class="navbar navbar-expand-lg navbar-dark">

<div class="container-fluid px-4">


<a
class="navbar-brand fw-bold"
href="dashboard.php"
>

🎓 Student Management

</a>


<div>


<a
class="btn btn-light nav-btn"
href="dashboard.php"
>

Dashboard

</a>


<a
class="btn btn-warning nav-btn"
href="add_student.php"
>

Add Student

</a>


<a
class="btn btn-danger nav-btn"
href="logout.php"
>

Logout

</a>


</div>


</div>

</nav>


<!-- =====================================================
     MAIN CONTENT
===================================================== -->

<div class="page-content">


<h2>

👨‍🎓 All Students

</h2>


<!-- SEARCH -->

<form
method="GET"
class="search-box"
>

<input
type="text"
name="search"
placeholder="🔍 Search by Name"
value="<?php echo isset($_GET['search']) ? $_GET['search'] : ''; ?>"
>


<button
type="submit"
class="btn btn-primary"
>

Search

</button>

</form>


<!-- ATTENDANCE -->

<a
href="attendance.php"
class="attendance-btn"
>

📅 Mark Attendance

</a>


<!-- =====================================================
     TABLE
===================================================== -->

<div class="table-box">


<table class="student-table">


<tr>

<th>ID</th>

<th>Name</th>

<th>Email</th>

<th>Class</th>

<th>Gender</th>

<th>Photo</th>

</tr>


<?php while($row = pg_fetch_assoc($result)) { ?>


<tr>


<td>

<?php echo $row['id']; ?>

</td>


<td>

<?php echo $row['name']; ?>

</td>


<td>

<?php echo $row['email']; ?>

</td>


<td>

<?php echo $row['class_name']; ?>

</td>


<td>

<?php echo $row['gender']; ?>

</td>


<td>


<?php

if($row['gender']=="Male"){

    echo "<img src='images/boy.png'>";

}

else{

    echo "<img src='images/girl.png'>";

}

?>


</td>


</tr>


<?php } ?>


</table>


</div>


</div>


</body>

</html>