<?php
session_start();

if(!isset($_SESSION['admin'])){
header("Location: login.php");
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Profile</title>

<style>

body{
font-family:Segoe UI;
background:#eef2ff;
padding:50px;
}

.profile-box{
width:350px;
margin:auto;
background:white;
padding:30px;
border-radius:15px;
text-align:center;
box-shadow:0 10px 30px rgba(0,0,0,.2);
}

.profile-box h2{
color:#2563eb;
}

</style>

</head>

<body>

<div class="profile-box">

<h2>👤 Admin Profile</h2>

<p>Username : <?php echo $_SESSION['admin']; ?></p>

</div>

</body>
</html>