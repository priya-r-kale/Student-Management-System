<!DOCTYPE html>
<html>

<head>

<title>Information</title>

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

    padding:40px;

}


/* ================= INFORMATION BOX ================= */

.box{

    width:75%;

    margin:20px auto;

    padding:30px;

    border-radius:20px;

    background:rgba(255,255,255,0.30);

    backdrop-filter:blur(10px);

    -webkit-backdrop-filter:blur(10px);

    border:1px solid rgba(255,255,255,0.55);

    box-shadow:
    0 10px 30px rgba(0,0,0,0.16);

}


/* ================= MAIN TITLE ================= */

.box h1{

    text-align:center;

    color:#172554;

    font-size:32px;

    margin-bottom:35px;

    text-shadow:
    0 2px 5px rgba(255,255,255,0.8);

}


/* ================= SECTIONS ================= */

.section{

    margin-bottom:25px;

    padding:20px;

    border-radius:14px;

    background:rgba(255,255,255,0.22);

    backdrop-filter:blur(6px);

    -webkit-backdrop-filter:blur(6px);

    border:1px solid rgba(255,255,255,0.35);

    transition:0.3s;

}


.section:hover{

    background:rgba(255,255,255,0.32);

    transform:translateY(-2px);

}


/* ================= SECTION HEADING ================= */

.section h2{

    color:#2563eb;

    margin-top:0;

    margin-bottom:12px;

    font-size:23px;

}


/* ================= PARAGRAPH ================= */

.section p{

    color:#1f2937;

    font-size:16px;

    line-height:1.7;

    margin-bottom:0;

}


/* ================= FOOTER ================= */

footer{

    text-align:center;

    padding:15px;

    background:rgba(37,99,235,0.75);

    backdrop-filter:blur(6px);

    -webkit-backdrop-filter:blur(6px);

    color:white;

    border-radius:10px;

    margin-top:30px;

    border:1px solid rgba(255,255,255,0.30);

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

    .box{

        width:100%;

        padding:20px;

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


<div class="box">


<h1>
    ℹ️ System Information
</h1>


<!-- ================= ABOUT ================= -->

<div class="section">

<h2>
    📚 About
</h2>

<p>

Student Management System helps manage
student records and reports.

</p>

</div>


<!-- ================= CONTACT ================= -->

<div class="section">

<h2>
    📞 Contact
</h2>

<p>

📞 9876543210

<br>

📧 priya@gmail.com

</p>

</div>


<!-- ================= SECURITY ================= -->

<div class="section">

<h2>
    🔐 Security
</h2>

<p>

✔ Session login security

<br>

✔ Password protection

<br>

✔ Admin access only

</p>

</div>


<!-- ================= FOOTER ================= -->

<footer>

© 2026 Student Management System
|
Developed by ❤️ Priya Kale

</footer>


</div>


</div>


</body>

</html>