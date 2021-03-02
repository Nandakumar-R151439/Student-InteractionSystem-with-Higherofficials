<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet type="text/css" href="inbox.css">
<link rel="stylesheet type="text/css" href="onclick.css">
<link href='https://fonts.googleapis.com/css?family=Actor' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Nosifer' rel='stylesheet'>
<link href='https://fonts.googleapis.com/css?family=Exo' rel='stylesheet'>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

* {box-sizing: border-box}
body{font-family:Exo;
background-image:url('b.jpg');
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

$conn=new mysqli("localhost","root","","ProjectDatabase");
if($conn->connect_error){
	die("connection failed.".$conn->connect_error);}

$username=$_POST['username'];
$password=$_POST['password'];
$sql="select *FROM HigherOfficials";
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
	header("location:signin1.php");
}

?>

<form action="inbox.php" method="post">
</form>
<div class="tab">`
	<button class="tablinks" onclick="openCity(event, 'inbox')" id="defaultOpen"><i class="fa fa-envelope"></i> Inbox</button>
	<button class="tablinks" onclick="openCity(event, 'sent')"><i class="fa fa-chevron-right"></i> Sent</button>
</div>

</div>
<div id="inbox" class="tabcontent">
	<h4 style="color:white;"><u>List of messages</u></h4>
<button style="background-color:blue;color:white;font-family:Actor;border-radius:50px;padding:16px;" onclick="openNav()"> Reply to </button><br>
<div id="navigation" class="sidenav">
	<form method="post" >
		<button class="button1" onclick="closeNav()" style="text-align:right;">&times;</button><br>
		<input type="text" value="<?php echo $username; ?>" name="b101" readonly>
		<h4>Grant Permission TO <input type="text" value="" name="receiver" placeholder="Student id" required></h4>
	<textarea rows="18" cols="38" style="resize:none;font-size:20px;font-family:Actor;" name="msg" required placeholder="grant permission..."></textarea>
	<button class="button3" name="reply">send</button>
<?php

						if(isset($_POST['reply']))
						{
					$receiver=$_POST['receiver'];
					$sql1="select username from studentDeatails where username='$receiver'";
					$abc=mysqli_query($conn,$sql1);
					$bcd=mysqli_num_rows($abc);
					if($bcd==1)
					{
						$sender=$_POST['b101'];
						$msg=$_POST['msg'];
			$sql="insert into students(receiver,sender,msg,timing)values('$receiver','$sender','$msg',CURRENT_TIMESTAMP)";
						mysqli_query($conn,$sql);}
					else
					{?>
					<script> alert("Inavlid Student id"); </script><?php
					}
}


?>
	</form>
	</div>
	<?php
			 
			
					
			
			$sql="select * from official where receiver='$username'";
			$result=mysqli_query($conn,$sql);
			while($row=$result->fetch_assoc())
			{ $d=$row['receiver'];
				$c=$row['sender'];
				$a=nl2br($row['msg']);
				$b=$row['timing']; 
				?>
		
				<button class="accordion"  style="width:80%;height:5%;background:#ff80b3;"><left><?php echo "\t".$b; ?></left></button>
				<div class="panel">
				<u><h3>FROM : <?php echo $c;?></h3></u><br><br>
 				<?php echo $a; ?><br><br>
				
				</div>
		<?php } ?>
		
</div>
<div id="sent" class="tabcontent">
	<h4 style="color:white;">sent page</h4>
	<?php
		$sql="select *from students where sender='$username'";
		$result=mysqli_query($conn,$sql);
			while($row=$result->fetch_assoc())
		{
			$d=$row['receiver'];
			$c=$row['sender'];
			$a=nl2br($row['msg']);
			$b=$row['timing']; ?>
			<button class="accordion"  style="width:80%;height:5%;background:#ff80b3;"><left><?php echo "To : ".$d; ?></left></button>
			<div class="panel">
 			<?php echo $a; ?><br><br>
		<?php } ?>
</div>

<script>
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

function openNav()
{
	document.getElementById("navigation").style.width="40%";
}
function closeNav()
{
	document.getElementById("navigation").style.width="0px";
}

</script>

</body>	
</html>
