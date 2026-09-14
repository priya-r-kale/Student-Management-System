<?php

$conn = pg_connect("host=localhost port=5432 dbname=student_db user=postgres password=YOUR_PASSWORD");

if(isset($_POST['mark']))
{
    $student_id = $_POST['student_id'];
    $status = $_POST['status'];
    $date = date("Y-m-d");

    pg_query($conn,"INSERT INTO attendance(student_id,status,date)
    VALUES('$student_id','$status','$date')");
}

$result = pg_query($conn,"SELECT * FROM students");

?>

<!DOCTYPE html>
<html>

<head>

<title>Attendance</title>

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

    padding:35px;

}


/* ================= TITLE ================= */

h2{

    text-align:center;

    color:#172554;

    font-size:32px;

    margin-bottom:30px;

    text-shadow:
    0 2px 5px rgba(255,255,255,0.8);

}


/* ================= TABLE BOX ================= */

.attendance-box{

    width:90%;

    margin:auto;

    padding:20px;

    border-radius:18px;

    background:rgba(255,255,255,0.28);

    backdrop-filter:blur(10px);

    -webkit-backdrop-filter:blur(10px);

    border:1px solid rgba(255,255,255,0.50);

    box-shadow:
    0 10px 30px rgba(0,0,0,0.15);

}


/* ================= TABLE ================= */

table{

    border-collapse:collapse;

    width:100%;

    background:rgba(255,255,255,0.20);

    border-radius:12px;

    overflow:hidden;

}


/* ================= TABLE HEADER ================= */

th{

    padding:14px;

    background:rgba(37,99,235,0.75);

    color:white;

    font-size:16px;

    border-bottom:
    1px solid rgba(255,255,255,0.30);

}


/* ================= TABLE DATA ================= */

td{

    padding:13px;

    text-align:center;

    color:#111827;

    background:transparent;

    border-bottom:
    1px solid rgba(255,255,255,0.30);

}


/* ================= ROW HOVER ================= */

tr:hover td{

    background:rgba(255,255,255,0.15);

}


/* ================= SELECT ================= */

select{

    padding:8px 12px;

    border-radius:8px;

    border:1px solid rgba(255,255,255,0.70);

    background:rgba(255,255,255,0.50);

    backdrop-filter:blur(5px);

    -webkit-backdrop-filter:blur(5px);

    color:#111827;

    outline:none;

}


/* ================= SAVE BUTTON ================= */

button{

    padding:8px 16px;

    margin-left:5px;

    background:rgba(22,163,74,0.90);

    color:white;

    border:none;

    border-radius:8px;

    cursor:pointer;

    font-weight:600;

    transition:0.3s;

}


button:hover{

    background:#15803d;

    transform:translateY(-2px);

}


/* ================= STATUS ================= */

.present{

    color:#15803d;

    font-weight:bold;

}


.absent{

    color:#dc2626;

    font-weight:bold;

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

    .attendance-box{

        width:100%;

        padding:10px;

    }

    table{

        font-size:13px;

    }

    th,td{

        padding:8px;

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

    <a href="logout.php" style="background:#dc2626;">
        🚪 Logout
    </a>

</div>


<!-- ================= MAIN CONTENT ================= -->

<div class="main">

<h2>
    📅 Student Attendance
</h2>


<div class="attendance-box">


<table>


<tr>

<th>ID</th>

<th>Name</th>

<th>Status</th>

<th>Mark Attendance</th>

</tr>


<?php while($row=pg_fetch_assoc($result)){ ?>


<tr>


<td>

<?php echo $row['id']; ?>

</td>


<td>

<?php echo $row['name']; ?>

</td>


<td>

<?php

$check = pg_query(
    $conn,
    "SELECT status FROM attendance
     WHERE student_id='".$row['id']."'
     ORDER BY date DESC
     LIMIT 1"
);

$data = pg_fetch_assoc($check);


if($data && $data['status']=="Present"){

    echo "<span class='present'>Present</span>";

}

else if($data && $data['status']=="Absent"){

    echo "<span class='absent'>Absent</span>";

}

else{

    echo "<span style='font-weight:bold;'>Not Marked</span>";

}

?>

</td>


<td>


<form method="POST">


<input
type="hidden"
name="student_id"
value="<?php echo $row['id']; ?>"
>


<select name="status">

<option value="Present">
Present
</option>

<option value="Absent">
Absent
</option>

</select>


<button name="mark">
Save
</button>


</form>


</td>


</tr>


<?php } ?>


</table>


</div>


</div>


</body>

</html>