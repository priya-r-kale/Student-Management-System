<?php

$conn = pg_connect("host=localhost port=5432 dbname=student_db user=postgres password=postgres");

$result = pg_query($conn, "SELECT * FROM students ORDER BY id ASC");

$total = pg_fetch_result(
    pg_query($conn, "SELECT COUNT(*) FROM students"),
    0
);

$male = pg_fetch_result(
    pg_query($conn, "SELECT COUNT(*) FROM students WHERE gender='Male'"),
    0
);

$female = pg_fetch_result(
    pg_query($conn, "SELECT COUNT(*) FROM students WHERE gender='Female'"),
    0
);

?>

<!DOCTYPE html>
<html>

<head>

<title>Student Management System</title>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<style>

/* ================= BODY ================= */

body{
    margin:0;
    font-family:"Segoe UI",Arial,sans-serif;

    background-image:url("images/dashboard-bg.png");
    background-size:cover;
    background-position:center;
    background-repeat:no-repeat;
    background-attachment:fixed;

    min-height:100vh;
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

    color:white;
    z-index:1000;

    background:rgba(30,58,138,0.65);

    backdrop-filter:blur(8px);
    -webkit-backdrop-filter:blur(8px);

    border-right:1px solid rgba(255,255,255,0.25);
}

.sidebar h2{
    margin:15px 0 35px 5px;
    font-size:27px;
    color:white;
}

.sidebar a{
    display:block;

    color:white;
    text-decoration:none;

    padding:12px;
    margin:10px 0;

    border-radius:8px;

    font-size:16px;

    transition:0.3s;
}

.sidebar a:hover{
    background:rgba(255,255,255,0.18);
}


/* ================= MAIN ================= */

.main{
    margin-left:230px;
    padding:25px;
    box-sizing:border-box;
}

.main h1{
    margin-top:0;
    margin-bottom:22px;

    font-size:34px;
    color:#111827;

    text-shadow:0 2px 5px rgba(255,255,255,0.9);
}


/* ================= CARDS ================= */

.cards{
    display:flex;
    gap:20px;
    flex-wrap:wrap;
    margin-bottom:25px;
}

.card{
    flex:1;
    min-width:200px;

    padding:18px;

    border-radius:16px;

    text-align:center;

    background:rgba(255,255,255,0.42);

    backdrop-filter:blur(8px);
    -webkit-backdrop-filter:blur(8px);

    border:1px solid rgba(255,255,255,0.55);

    box-shadow:0 7px 20px rgba(0,0,0,0.14);
}

.card h3{
    margin:4px 0 8px;
    font-size:18px;
    color:#1f2937;
}

.card h2{
    margin:0;
    font-size:38px;
    color:#2563eb;
}


/* ================= CHART ================= */

.chart-box{
    width:235px;
    height:235px;

    padding:12px;

    box-sizing:border-box;

    margin-top:5px;
    margin-bottom:22px;

    text-align:center;

    background:rgba(255,255,255,0.25);

    backdrop-filter:blur(8px);
    -webkit-backdrop-filter:blur(8px);

    border:1px solid rgba(255,255,255,0.40);

    border-radius:16px;

    box-shadow:0 7px 20px rgba(0,0,0,0.12);
}

.chart-box h3{
    margin:0 0 5px;
    font-size:16px;
    color:#1f2937;
}

.chart-container{
    width:190px;
    height:190px;
    margin:auto;
}


/* ================= SEARCH ================= */

.search-box{
    margin-top:10px;
    margin-bottom:15px;
}

.search-box input{
    padding:11px 14px;

    width:270px;

    border:1px solid rgba(255,255,255,0.55);

    border-radius:9px;

    font-size:15px;

    outline:none;

    background:rgba(255,255,255,0.45);

    backdrop-filter:blur(6px);
    -webkit-backdrop-filter:blur(6px);

    color:#111827;
}


/* ================= TABLE ================= */

table{
    width:100%;

    border-collapse:collapse;

    margin-top:20px;

    /* VERY TRANSPARENT */

    background:rgba(255,255,255,0.28);

    backdrop-filter:blur(8px);
    -webkit-backdrop-filter:blur(8px);

    border:1px solid rgba(255,255,255,0.40);

    box-shadow:0 7px 20px rgba(0,0,0,0.12);

    border-radius:10px;

    overflow:hidden;
}


/* TABLE HEADER */

th{
    background:rgba(37,99,235,0.70);

    color:white;

    padding:12px;

    font-size:16px;

    border-bottom:1px solid rgba(255,255,255,0.25);
}


/* TABLE DATA */

td{
    padding:12px;

    border-bottom:1px solid rgba(255,255,255,0.25);

    text-align:center;

    vertical-align:middle;

    color:#111827;

    /* IMPORTANT */

    background:transparent;
}


/* ROW */

tr{
    background:transparent;
}


/* HOVER */

tr:hover td{
    background:rgba(255,255,255,0.12);
}


/* ================= BUTTONS ================= */

.btn{
    padding:6px 12px;

    border-radius:6px;

    color:white;

    text-decoration:none;

    font-size:13px;

    margin:2px;

    display:inline-block;
}

.view{
    background:#16a34a;
}

.edit{
    background:#f59e0b;
}

.pdf{
    background:#6366f1;
}

.del{
    background:#dc2626;
}


/* ================= PHOTO ================= */

td img{
    width:42px;
    height:42px;
    object-fit:contain;
}

</style>

</head>


<body>


<!-- SIDEBAR -->

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


<!-- MAIN -->

<div class="main">

<h1>
Student Management Dashboard
</h1>


<!-- CARDS -->

<div class="cards">

<div class="card">

<h3>🎓 Total Students</h3>

<h2>
<?php echo $total; ?>
</h2>

</div>


<div class="card">

<h3>👨 Male Students</h3>

<h2>
<?php echo $male; ?>
</h2>

</div>


<div class="card">

<h3>👩 Female Students</h3>

<h2>
<?php echo $female; ?>
</h2>

</div>

</div>


<!-- CHART -->

<div class="chart-box">

<h3>📊 Gender Distribution</h3>

<div class="chart-container">

<canvas id="genderChart"></canvas>

</div>

</div>


<!-- SEARCH -->

<div class="search-box">

<input
type="text"
id="search"
placeholder="Search student"
>

</div>


<!-- TABLE -->

<table id="studentTable">

<tr>

<th>ID</th>
<th>Name</th>
<th>Email</th>
<th>Class</th>
<th>Photo</th>
<th>Gender</th>
<th>Action</th>

</tr>


<?php while($row=pg_fetch_assoc($result)){ ?>

<tr>

<td>
<?= $row['id'] ?>
</td>

<td>
<?= $row['name'] ?>
</td>

<td>
<?= $row['email'] ?>
</td>

<td>

<?php

echo isset($row['class'])
? $row['class']
: "-";

?>

</td>

<td>

<?php

if($row['gender']=="Male"){

echo "<img src='images/boy.png'>";

}else{

echo "<img src='images/girl.png'>";

}

?>

</td>

<td>
<?= $row['gender'] ?>
</td>

<td>

<a
href="view_student.php?id=<?=$row['id']?>"
class="btn view">
View
</a>

<a
href="edit_student.php?id=<?=$row['id']?>"
class="btn edit">
Edit
</a>

<a
href="print_student.php?id=<?=$row['id']?>"
class="btn pdf">
PDF
</a>

<a
href="id_card.php?id=<?=$row['id']?>"
class="btn view">
ID Card
</a>

<a
href="delete_student.php?id=<?=$row['id']?>"
class="btn del">
Delete
</a>

</td>

</tr>

<?php } ?>

</table>

</div>


<!-- SEARCH SCRIPT -->

<script>

let search=document.getElementById("search");

search.addEventListener("keyup",function(){

let value=this.value.toLowerCase();

document.querySelectorAll("#studentTable tr")
.forEach((row,i)=>{

if(i==0)return;

row.style.display=
row.innerText.toLowerCase().includes(value)
?""
:"none";

});

});

</script>


<!-- CHART SCRIPT -->

<script>

new Chart(
document.getElementById("genderChart"),
{

type:"pie",

data:{

labels:[
"Male",
"Female"
],

datasets:[{

data:[
<?php echo $male;?>,
<?php echo $female;?>
],

backgroundColor:[
"#3b82f6",
"#ec4899"
],

borderColor:"transparent",
borderWidth:0

}]

},

options:{

responsive:true,

maintainAspectRatio:false,

plugins:{

legend:{

position:"bottom",

labels:{
padding:6,

font:{
size:11
}

}

}

}

}

});

</script>


</body>

</html>