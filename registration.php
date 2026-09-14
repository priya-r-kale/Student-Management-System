<?php
if(isset($_POST['register']))
{
$name=$_POST['name'];
$email=$_POST['email'];
$class=$_POST['class'];
$password=$_POST['password'];

$success="Registration Successful!";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Registration</title>

<style>

body{
margin:0;
font-family:Segoe UI;

height:100vh;
display:flex;
justify-content:center;
align-items:center;
background:
url("https://images.unsplash.com/photo-1519389950473-47ba0277781c");
background-size:cover;
background-position:center;
}
.register-box{
background:rgba(255,255,255,0.85);
padding:40px;
width:350px;
border-radius:15px;
box-shadow:0 10px 30px rgba(0,0,0,0.4);
text-align:center;
backdrop-filter:blur(8px);
}
}

.register-box h2{
color:#1e40af;
margin-bottom:20px;
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

<div class="register-box">

<h2>Student Registration</h2>

<?php if(isset($success)){ echo "<p style='color:green'>$success</p>"; } ?>

<form method="POST">

<input type="text" name="name" placeholder="Full Name" required>

<input type="email" name="email" placeholder="Email" required>

<input type="text" name="class" placeholder="Class" required>

<input type="password" name="password" placeholder="Password" required>

<button name="register">Register</button>

</form>

</div>

</body>
</html>