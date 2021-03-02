<!DOCTYPE html>
<head>

<meta charset="utf-8">

<link rel="stylesheet type="text/css" href="signin.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Nosifer' rel='stylesheet'>
<link rel="stylesheet" href="../../maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

.body{
color:#999;
background-color:white;
font-family:'Roboto', sans-serief;
background-size:cover;
}
.form-control{
min-height:40px;
box-shadow:none;
width:350px;
border-color:#e1e1e1;

}
.form-control,.btn{
border-color:#00cb82;
}
.form-header{
margin:-30px -30px 20px;
padding:30px 30px 10px;
text-align:center;
background:blue;
border-bottom:1px solid #eee;
color:white;
}
.form-header h2{
font-size:34px;
font-weight:bold;
margin:0 0 10px;
font-family:'pacifico',sans-serif;
}
.form-header p{
margin:20px 0 15px;
font-size:17px;
Line-height:normal;
font-family:'Courgette',sans-serif;
}
.signin-form form{
color:#999;
border-radius:3px;
margin-bottom;15px;
background:#006666;

box-shadow:0px 2px 2px rgba(0,0,0,0.3);
padding:30px;
}
.signin-form label{
font-weight:normal;
font-size:11px;
}
.signin-form .btn{
font-size:20px;
font-weight:bold;
background:#00cb82;
border:10px;
cursor:pointer;
width:350px;
padding:20px;
border-radius:20px;
min-width:200px;
}.signin-form .btn:hover, .signin-form .btn:focus{
background:#00b073;
outline:none;
}
.signin-form a{
color:#00cb82;
padding:28px;
}
.signin-form a:hover{
text-decoration:underline;
}
.container{border:3px white;}


</style>
</head>
<body class="body">
<div class="signin-form">
<form action="home.php" method="post">
<div class="form-header">
	<h2>Student Login</h2>
</div>
<center>
<div class="container"><br><br>
<fieldset style="width:100px;"><h3 style="color:white;font-size:30px;"><u>Login form</u></h3><br>

<input type="text" class="form-control" name="username" placeholder="Enter username" autocomplete="off" required><br><br>
<input type="password" class="form-control" name="password" placeholder="Enter passsord" autocomplete="off" required><br><br><br>

<div class="form-group">
<button type="submit" style="width:150px;height:50px;border-radius:80px;background:yellow;font-weight:bold;font-size:30px;color:maroon;font-family:Nosifer;" name="Login"></span>Login</button>
</div>
</div>
</form></fieldset>

</center>
</div><?php
$conn=new mysqli("localhost","root","","ProjectDatabase");
if($conn->connect_error){
	die("connection failed.".$conn->connect_error);}
if(isset($_POST['Login']))
{
	$username=$_POST['username'];
	$password=$_POST['password'];
	$sql="select * from studentDeatails where username='$username' and password='$password'";
	$result=mysqli_query($conn,$sql);
	$result1=mysqli_num_rows($result);
	if($result1==1)
	{header("location:home.php");}
	else
	{echo "<h3 style='color:red;'><center>Invalid username or password</center></h3>";}

}?>

</body>
</html>
