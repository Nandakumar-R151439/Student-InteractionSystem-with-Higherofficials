<!DOCTYPE html>
<title>Login Form</title>
<head>
<style>
#grad
{

background:linear-gradient(90deg,#fed400 60%,#45c67a 60%);
}
#form
{
height:20%;
width:30%;
position:center;
border:3px solid #45c67a;
left:40;
top:30;
}
#button:focus
{
border-color:yellow;
border-radius:50%;
height:100%;
background-color:#45c67a;
}
input[type=submit]:hover,input[type=submit]:focus
{
background-color:orange;
font-size:100%;
}
</style>
</head>
<body id="grad">


<form id="form" method="POST" action="" align="center">
<h1 style="color:maroon;text-align:center;">Login</h1>
Username<br><input type="text" placeholder="username" name="username" required><br>
Password<br><input type="password" placeholder="password" name="password" required><br>
<br>
<input type="submit" value="Login" name="submit">

</form>


</body>
</html>
