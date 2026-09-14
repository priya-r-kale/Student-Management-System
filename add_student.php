<?php

session_start();

if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

include "db.php";


if (isset($_POST['save'])) {

    $name = $_POST['name'];
    $email = $_POST['email'];
    $class = $_POST['class'];
    $gender = $_POST['gender'];

    // PHOTO UPLOAD
    $photo = $_FILES['photo']['name'];
    $temp = $_FILES['photo']['tmp_name'];

    move_uploaded_file($temp, "uploads/" . $photo);


    // INSERT DATA
    pg_query($conn, "INSERT INTO students
    (name,email,class_name,gender,photo)
    VALUES
    ('$name','$email','$class','$gender','$photo')");


    header("Location: dashboard.php");
    exit();
}

?>

<!DOCTYPE html>
<html>

<head>

<title>Add Student</title>

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


/* ================= MAIN AREA ================= */

.page{

    min-height:100vh;

    padding:40px;

    margin-left:230px;

    display:flex;

    justify-content:center;

    align-items:flex-start;

}


/* ================= TRANSPARENT FORM ================= */

.form-box{

    width:600px;

    padding:30px;

    margin-top:30px;

    border-radius:20px;

    background:rgba(255,255,255,0.30);

    backdrop-filter:blur(10px);

    -webkit-backdrop-filter:blur(10px);

    border:1px solid rgba(255,255,255,0.55);

    box-shadow:
    0 10px 30px rgba(0,0,0,0.18);

}


/* ================= TITLE ================= */

.form-box h3{

    text-align:center;

    margin-bottom:25px;

    color:#172554;

    font-size:28px;

    font-weight:700;

    text-shadow:
    0 2px 5px rgba(255,255,255,0.8);

}


/* ================= LABEL ================= */

label{

    font-weight:600;

    color:#172554;

    margin-bottom:7px;

}


/* ================= INPUT ================= */

.form-control{

    width:100%;

    height:48px;

    padding:10px 14px;

    border-radius:10px;

    border:1px solid rgba(255,255,255,0.70);

    background:rgba(255,255,255,0.45) !important;

    backdrop-filter:blur(5px);

    -webkit-backdrop-filter:blur(5px);

    color:#111827;

    outline:none;

}


/* ================= INPUT FOCUS ================= */

.form-control:focus{

    background:rgba(255,255,255,0.60) !important;

    border-color:#2563eb;

    box-shadow:
    0 0 0 3px rgba(37,99,235,0.15);

}


/* ================= PLACEHOLDER ================= */

.form-control::placeholder{

    color:#374151;

}


/* ================= FILE INPUT ================= */

input[type="file"]{

    padding-top:10px;

}


/* ================= BUTTON AREA ================= */

.buttons{

    display:flex;

    gap:12px;

    margin-top:25px;

}


/* ================= SAVE BUTTON ================= */

.save-btn{

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


.save-btn:hover{

    background:#15803d;

    transform:translateY(-2px);

}


/* ================= BACK BUTTON ================= */

.back-btn{

    flex:1;

    height:48px;

    border-radius:10px;

    background:rgba(75,85,99,0.85);

    color:white;

    text-decoration:none;

    display:flex;

    justify-content:center;

    align-items:center;

    font-size:16px;

    font-weight:600;

    transition:0.3s;

}


.back-btn:hover{

    background:#374151;

    color:white;

    transform:translateY(-2px);

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


/* ================= MOBILE ================= */

@media(max-width:700px){

    .sidebar{

        width:190px;

    }

    .page{

        margin-left:190px;

        padding:20px;

    }

    .form-box{

        width:100%;

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


<!-- ================= PAGE ================= -->

<div class="page">


    <div class="form-box">


        <h3>
            ➕ Add Student
        </h3>


        <form
        method="POST"
        enctype="multipart/form-data"
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
                placeholder="Student Name"
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
                placeholder="Email"
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
                name="class"
                class="form-control"
                placeholder="Class (eg: 12-A)"
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
                required
                >

                    <option value="">
                        Select Gender
                    </option>

                    <option value="Male">
                        Male
                    </option>

                    <option value="Female">
                        Female
                    </option>

                </select>

            </div>


            <!-- PHOTO -->

            <div class="mb-3">

                <label>
                    📷 Student Photo
                </label>

                <input
                type="file"
                name="photo"
                class="form-control"
                accept="image/*"
                >

            </div>


            <!-- BUTTONS -->

            <div class="buttons">

                <button
                type="submit"
                name="save"
                class="save-btn"
                >
                    💾 Save Student
                </button>


                <a
                href="dashboard.php"
                class="back-btn"
                >
                    ↩ Back
                </a>

            </div>


        </form>


    </div>


</div>


</body>

</html>