<?php
session_start();

if(isset($_POST['login']))
{
$username=$_POST['username'];
$password=$_POST['password'];

if($username=="admin" && $password=="admin123")
{
$_SESSION['admin']=$username;
header("Location: dashboard.php");
exit();
}
else
{
$error="Invalid Username or Password";
}
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login</title>
<style>

body{
margin:0;
font-family:Segoe UI;

height:100vh;
display:flex;
justify-content:center;
align-items:center;

background:url("https://images.unsplash.com/photo-1523240795612-9a054b0db644");
background-size:cover;
background-position:center;
background-size:cover;
background-position:center;
}

.login-box{
background:white;
padding:40px;
width:340px;
border-radius:12px;
box-shadow:0 10px 30px rgba(0,0,0,0.4);
text-align:center;
backdrop-filter:blur(6px);
}

.login-box h2{
color:#2563eb;
margin-bottom:25px;
}

input{
width:100%;
padding:12px;
margin:10px 0;
border-radius:8px;
border:1px solid #ccc;
}

button{
width:100%;
padding:12px;
background:#2563eb;
color:white;
border:none;
border-radius:8px;
font-weight:bold;
cursor:pointer;
}

button:hover{
background:#1e40af;
}

</style>
</head>

<body>

<div class="login-box">

<h2>StudentMS Login</h2>

<?php if(isset($error)){ echo "<p style='color:red'>$error</p>"; } ?>

<form method="POST">

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button name="login">Login</button>

</form>
<p>Don't have an account?</p>
<a href="registration.php">Register Here</a>
</div>

</body>
</html>