<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet type="text/css" href="inbox.css">
<link rel="stylesheet type="text/css" href="onclick.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<link href='https://fonts.googleapis.com/css?family=Nosifer' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Exo' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

* {box-sizing: border-box}
body{font-family:Exo;
background-image:url('t0NnoUj.jpg');
}

div.tab
{
float:left;
/*background-color:#ffb3ff;*/
width:18%;
left:30;
height:630px;
}

div.tab button
{
display:block;
background-color:inherit;
color:white;
font-family:Nosifer;
padding:22px 16px;
width:100%;
cursor:pointer;
border:none;
outline:none;
}

div.tab button:hover
{
background-color:#ffcccc;
}

div.tab button.active
{
background-color:#ffb3b3;
}

.tabcontent
{
float:left;
padding:0px 12px;
border-left:1px solid #ccc;
width:80%;
height:630px;

}
.b1
{
background-color:#f2f2f2 ;
color:black;
width:100%;
height:5%;
cursor:pointer;
}
.b1:focus
{
background-color:#ccccff;
height:90%;
text-decoration:none;
}
div.in
{
width:90%;
height:90%;
background-color:solid yellow;
}
iframe
{
width:100%;
height:85%;
}
</style>
</head>
<body>
<?php


$username=$_POST['username'];
$password=$_POST['password'];
$conn=new mysqli("localhost","root","","ProjectDatabase");
if($conn->connect_error){
	die("connection failed.".$conn->connect_error);}


$sql="select *FROM studentDeatails";
$result=mysqli_query($conn,$sql);
$abc=0;
while($row=$result->fetch_assoc())
{
	$a=$row['username'];
	$b=$row['password'];
	if($a==$username && $b==$password)
	{
		$abc++;
	}
}
if($abc<>1)
{
	header("location:signin.php");
}
?>
<div class="tab">
	<button class="tablinks" onclick="openCity(event, 'compose')">Compose</button>
	<button class="tablinks" onclick="openCity(event, 'inbox')" id="defaultOpen">Inbox</button>
	<button class="tablinks" onclick="openCity(event, 'sent')">Sent</button>
</div>

<div id="compose" class="tabcontent">
	<h1 class="h">Ask Permission</h1>
<form class="form-container" method="POST" action="home.php" VALIDATE>
	<textarea placeholder="Type messsage.." type="text" name='msg' required></textarea>
	<input type="text" value="<?php echo $username ?>" name="b0" style="border:none;left:0;position:fixed;background:#8080ff;" READONLY><br>
	<button type="button" class="button3" onclick="openNav()" required><b>Send to</button><br>
<div id="navigation" class="sidenav">
	<button class="button1" onclick="closeNav()" style="text-align:right;">&times;</button><br><br><br>
	<button class="button1" name="b1">Chancellor</button><br>
	<button class="button1" name="b2">Vice chancellor</button><br>
	<button class="button1" name="b3">Director</button><br>
	<button class="button1" name="b4">AO</button><br>
	<button class="button1" name="b5">Dean of students welfare</button><br>
	<button class="button1" name="b6">Dean of Academics</button><br>
	<button class="button1" name="b7">FO</button><br>
	<div class="dropdown">
	<button class="dropbtn">HOD(B.Tech)</button><br>
	<div class="dropdown-content">
	<button class="button1" name="b8">CSE</button><br>
	<button class="button1" name="b9">ECE</button><br>
	<button class="button1" name="b10">Civil</button><br>
	<button class="button1" name="b11">Mechanical</button><br>
	<button class="button1" name="b12">Chemical</button><br>
	<button class="button1" name="b13">MME</button><br>
	</div>
	</div>
	<div class="dropdown">
	<button class="dropbtn">HOD(PUC)</button><br>
	<div class="dropdown-content">
	<button class="button1" name="b14">Telugu</button><br>
	<button class="button1" name="b15">English</button><br>
	<button class="button1" name="b16">Maths</button><br>
	<button class="button1" name="b17">Physics</button><br>
	<button class="button1" name="b18">Chemistry</button><br>
	<button class="button1" name="b19">Biology</button><br>
	<button class="button1" name="b20">IT</button><br>
	</div>
	</div>
</div>
</form>
<?php
	if(isset($_POST['msg'])){
   $msg=$_POST['msg'];
   $var=$_POST['b0'];}
   if(isset($_POST['b1']))
   {
   	$sql="insert into official(receiver,sender,msg,timing)values('Chancellor_user','$var','$msg',CURRENT_TIMESTAMP)";
   	mysqli_query($conn,$sql);
   }
   if(isset($_POST['b2']))
   {
   	$sql="insert into official(receiver,sender,msg,timing)values('vicechancellor','$var','$msg',CURRENT_TIMESTAMP)";
   	mysqli_query($conn,$sql);
   }
   if(isset($_POST['b3']))
   {
   	$sql="insert into official(receiver,sender,msg,timing)values('Director_user','$var','$msg',CURRENT_TIMESTAMP)";
   	mysqli_query($conn,$sql);
   }
   if(isset($_POST['b4']))
   {
   	$sql="insert into official(receiver,sender,msg,timing)values('AO_user','$var','$msg',CURRENT_TIMESTAMP)";
   	mysqli_query($conn,$sql);
   }
   if(isset($_POST['b5']))
   {
   	$sql="insert into official(receiver,sender,msg,timing)values('deanOfStudentsWelfare','$var','$msg',CURRENT_TIMESTAMP)";
   	mysqli_query($conn,$sql);
   }
   if(isset($_POST['b6']))
   {
   	$sql="insert into official(receiver,sender,msg,timing)values('deanOfAcademics','$var','$msg',CURRENT_TIMESTAMP)";
   	mysqli_query($conn,$sql);
   }
   if(isset($_POST['b7']))
   {
   	$sql="insert into official(receiver,sender,msg,timing)values('fo','$var','$msg',CURRENT_TIMESTAMP)";
   	mysqli_query($conn,$sql);
   }
   if(isset($_POST['b8']))
   {
   	$sql="insert into official(receiver,sender,msg,timing)values('HOD_cse','$var','$msg',CURRENT_TIMESTAMP)";
   	mysqli_query($conn,$sql);
   }
   if(isset($_POST['b9']))
   {
   	$sql="insert into official(receiver,sender,msg,timing)values('HOD_ece','$var','$msg',CURRENT_TIMESTAMP)";
   	mysqli_query($conn,$sql);
   }
   if(isset($_POST['b10']))
   {
   	$sql="insert into official(receiver,sender,msg,timing)values('HOD_civ','$var','$msg',CURRENT_TIMESTAMP)";
   	mysqli_query($conn,$sql);
   }
   if(isset($_POST['b11']))
   {
   	$sql="insert into official(receiver,sender,msg,timing)values('HOD_mech','$var','$msg',CURRENT_TIMESTAMP)";
   	mysqli_query($conn,$sql);
   }
   if(isset($_POST['b12']))
   {
   	$sql="insert into official(receiver,sender,msg,timing)values('HOD_chemical','$var','$msg',CURRENT_TIMESTAMP)";
   	mysqli_query($conn,$sql);
   }
   if(isset($_POST['b13']))
   {
   	$sql="insert into official(receiver,sender,msg,timing)values('HOD_mme','$var','$msg',CURRENT_TIMESTAMP)";
   	mysqli_query($conn,$sql);
   }
   if(isset($_POST['b14']))
   {
   	$sql="insert into official(receiver,sender,msg,timing)values('HOD_tel','$var','$msg',CURRENT_TIMESTAMP)";
   	mysqli_query($conn,$sql);
   }
   if(isset($_POST['b15']))
   {
   	$sql="insert into official(receiver,sender,msg,timing)values('HOD_eng','$var','$msg',CURRENT_TIMESTAMP)";
   	mysqli_query($conn,$sql);
   }
   if(isset($_POST['b16']))
   {
   	$sql="insert into official(receiver,sender,msg,timing)values('HOD_maths','$var','$msg',CURRENT_TIMESTAMP)";
   	mysqli_query($conn,$sql);
   }
   if(isset($_POST['b17']))
   {
   	$sql="insert into official(receiver,sender,msg,timing)values('HOD_phy','$var','$msg',CURRENT_TIMESTAMP)";
   	mysqli_query($conn,$sql);
   }
   if(isset($_POST['b18']))
   {
   	$sql="insert into official(receiver,sender,msg,timing)values('HOD_chem','$var','$msg',CURRENT_TIMESTAMP)";
   	mysqli_query($conn,$sql);
   }
   if(isset($_POST['b19']))
   {
   	$sql="insert into official(receiver,sender,msg,timing)values('HOD_bio','$var','$msg',CURRENT_TIMESTAMP)";
   	mysqli_query($conn,$sql);
   }
   if(isset($_POST['b20']))
   {
   	$sql="insert into official(receiver,sender,msg,timing)values('HOD_IT','$var','$msg',CURRENT_TIMESTAMP)";
   	mysqli_query($conn,$sql);
   }
?>
</div>
<div id="inbox" class="tabcontent">
	<h4 STYLE="color:white;"><u>List of messages</u></h4>
	<?php
			
			
			$sql="select * from students where receiver='$username'";
			$result=mysqli_query($conn,$sql);
			while($row=$result->fetch_assoc())
			{
				$c=$row['sender'];
				$a=nl2br($row['msg']);
				$b=$row['timing']; ?>
				<button class="accordion" style="width:80%;height:5%;background:#ff80b3;"><i class="fa fa-clock-o"></i> <?php echo "From : ".$c; ?></button>
				<div class="panel">
 				<p><?php echo $a."\n\n".$b; ?></p>
				</div>
		<?php } ?>

	
</div>
<div id="sent" class="tabcontent">
	<h4 style="color:white;">sent page</h4>

<?php
			
			
			$sql="select * from official where sender='$username'";
			$result=mysqli_query($conn,$sql);
			while($row=$result->fetch_assoc())
			{
				$c=$row['sender'];
				$a=nl2br($row['msg']);
				$b=$row['timing'];
				$d=$row['receiver']; ?>
				<button class="accordion" style="width:80%;height:5%;background:#ff80b3;"><?php echo "TO : ".$d; ?></button>
				<div class="panel">
 				<p><?php echo $a."\n\n".$b; ?></p>
				</div>
		<?php } ?>


</div>

<script>

function openNav()
{
	document.getElementById("navigation").style.width="20%";
}
function closeNav()
{
	document.getElementById("navigation").style.width="0px";
}

function openCity(evt,cityname)
{
	var i,tabcontent,tablinks;
	tabcontent=document.getElementsByClassName("tabcontent");
	for(i=0;i<tabcontent.length;i++)
	{
		tabcontent[i].style.display="none";
	}
	tablinks=document.getElementsByClassName("tablinks");
	for(i=0;i<tablinks.length;i++)
	{
		tablinks[i].className=tablinks[i].className.replace(" active", "");
	}
	document.getElementById(cityname).style.display="block";
	evt.currentTarget.className+=" active";
}
document.getElementById("defaultOpen").click();

var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].onclick = function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  }
}

</script>	
</body>	
</html>
