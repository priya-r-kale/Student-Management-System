<!DOCTYPE html>
<html>
<head>
<title>Register</title>

<style>

body{
margin:0;
height:100vh;
display:flex;
justify-content:center;
align-items:center;
font-family:Arial;
background: linear-gradient(to bottom,#6b7280,#3b82f6);
}

.container{
background:white;
padding:40px;
border-radius:10px;
width:350px;
text-align:center;
}

input{
width:100%;
padding:12px;
margin:10px 0;
border-radius:6px;
border:1px solid #ccc;
}

button{
width:100%;
padding:12px;
background:#2563eb;
color:white;
border:none;
border-radius:6px;
font-size:16px;
cursor:pointer;
}

button:hover{
background:#1d4ed8;
}

</style>

</head>

<body>

<div class="container">

<h2>Student Register</h2>

<form action="register_process.php" method="POST">

<input type="text" name="name" placeholder="Full Name" required>

<input type="email" name="email" placeholder="Email" required>

<input type="text" name="username" placeholder="Username" required>

<input type="password" name="password" placeholder="Password" required>

<button type="submit">Register</button>

</form>
<p style="margin-top:10px;">
Already have account?
<a href="login.php">Login</a>
</p>
</div>

</body>
</html>