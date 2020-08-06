<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:login2.php');
}
else{

	?>
<!doctype html>
<html lang="en" class="no-js">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">
	<meta name="theme-color" content="#3e454c">
	
	<title>Profile</title>

	<!-- Font awesome -->
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<!-- Sandstone Bootstrap CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<!-- Bootstrap Datatables -->
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
	<!-- Bootstrap social button library -->
	<link rel="stylesheet" href="css/bootstrap-social.css">
	<!-- Bootstrap select -->
	<link rel="stylesheet" href="css/bootstrap-select.css">
	<!-- Bootstrap file input -->
	<link rel="stylesheet" href="css/fileinput.min.css">
	<!-- Awesome Bootstrap checkbox -->
	<link rel="stylesheet" href="css/awesome-bootstrap-checkbox.css">
	<!-- Admin Stye -->
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include('includes/header2.php');?>
												
<?php 
$sql ="SELECT * from tblblooddonars WHERE FullName='".$_SESSION['alogin']."'";
$query = $dbh -> prepare($sql);
$query->execute();
$s=$query->fetchAll(PDO::FETCH_OBJ);
if($query->rowCount() > 0)
{
foreach($s as $ss)

{
		?>	<br>
<br><br>
		
													
	<h1 style="background-color:black; color:white;" align="center" height="200"><strong>Welcome &nbsp<?php echo htmlentities($ss->FullName);?> </strong> </h1>
								
		<br>						
<table width="400"border="1" cellspacing="5"cellpadding="5"align="center">
<thead>
<th bgcolor="black" style="color:cyan"  colspan="2" height="35">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp 
&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp Details</th>
</thead>
<tbody align="center">
<td><img src="images/21.png" height="150" width="150"> </td>

<td>
<table rules="all" height="200" width="250" align="center" border="0">
<tbody align="center">
<tr>
<td bgcolor="black"style="color:pink"><strong><i>Name</i></strong></td>
<td>
<?php echo htmlentities($ss->FullName);?>
</td>
</tr>

<tr>
<td bgcolor="black"style="color:white"><strong><i>Mobile No</i></strong></td>
<td><?php echo htmlentities($ss->MobileNumber);?>
</td>
</tr>

<tr>
<td bgcolor="black"style="color:red"><strong><i>Blood Group</strong></i></td>
<td>
<?php echo htmlentities($ss->BloodGroup);?>
</td>
</tr>

<tr>
<td bgcolor="black"style="color:yellow"><strong><i>Email</strong></i></td>
<td><?php echo htmlentities($ss->EmailId);?>
</td>
</tr>

<tr>
<td bgcolor="black" style="color:orange"><strong><i>City</strong></i></td>
<td><?php echo htmlentities($ss->City);?>
</td>
</tr>
</td>

</tbody>
</tbody>
</table>
</table>
	

						
<?php }} ?>									
									
<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>								
<footer>
<h1 style="background-color:black;color:orange;" align="center">Copyright &copy; Blood Bank & Donar Management System 2019<h1>

	</footer>					
	<!-- Loading Scripts -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap-select.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/dataTables.bootstrap.min.js"></script>
	<script src="js/Chart.min.js"></script>
	<script src="js/fileinput.js"></script>
	<script src="js/chartData.js"></script>
	<script src="js/main.js"></script>
	
</body>
</html>
<?php } ?>