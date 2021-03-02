<html>
<head>
<style>
.body
{
background-image:url('sea.jpg');
}
.button {
    background-color: #4CAF50; /* Green */
    border: none;

	bottom:
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}

.button1 {
    background-color: white; 
    color: black; 
    border-radius:40px;
    font-weight:bold;
    font-size:24px;
    height:25%;
    border: 2px solid #ff0066;
}

.button1:hover {
    background-color:#ff0066;
    color: white;
    width:30%;
}

.button2 {
    background-color: white; 
    color: black; 
     height:25%;
     font-size:24px;
     font-weight:bold;
    border-radius:40px;
    border: 2px solid #00ff00;
}

.button2:hover {
    background-color:#00ff00;
    width:30%;
    color: white;
}
</style>
</head>
<body class="body"><center>
<h2 style="color:white;">Student Interaction System with Higher Authorities</h2><br><br><br><br><br><br>
<form method="POST">
<button class="button button1" name="b1">Student Login</button>
<button class="button button2" name="b2">Employee Login</button></center></form>
<?php
if(isset($_POST['b1']))
{header("location:signin.php");}
if(isset($_POST['b2']))
{header("location:signin1.php");}
?>
</html>
</body>
