<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index1.php');
}
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
	
	<title>BBDMS |Admin Stock Blood List  </title>

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
  <style>
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
		</style>

</head>

<body>
	<?php include('includes/header1.php');?>

	<div class="ts-main-content">
		<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-8">

						<h2 class="page-title"> Stock Blood List</h2>

						<!-- Zero Configuration Table -->
						<div class="panel panel-default">
							<div class="panel-heading">Stock Blood Group List</div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
										
												<th>Blood Groups</th>
											    <th>Quantity</th>
										
									
										</tr>
									</thead>
									<tbody>	
								
									<tr>
											<td><center>A+</center></td>
											<td><center>
											<?php
											$q=$dbh->query("SELECT * FROM tblblooddonars where BloodGroup='A+'");
											echo $result=$q->rowcount();
											?>
											</td></center>
											</tr>
											
											<tr>
											<td><center>A-</center></td>
											<td><center>
											<?php
											$q=$dbh->query("SELECT * FROM tblblooddonars where BloodGroup='A-'");
											echo $result=$q->rowcount();
											?>
											</td></center>
											</tr>
											
											<tr>
											<td><center>B+</center></td>
											<td><center>
											<?php
											$q=$dbh->query("SELECT * FROM tblblooddonars where BloodGroup='B+'");
											echo $result=$q->rowcount();
											?>
											</td></center>
											</tr>
											
											<tr>
											<td><center>AB+</center></td>
											<td><center>
											<?php
											$q=$dbh->query("SELECT * FROM tblblooddonars where BloodGroup='AB+'");
											echo $result=$q->rowcount();
											?>
											</td></center>
											</tr>
											
											<tr>
											<td><center>AB-</center></td>
											<td><center>
											<?php
											$q=$dbh->query("SELECT * FROM tblblooddonars where BloodGroup='AB-'");
											echo $result=$q->rowcount();
											?>
											</td></center>
											</tr>
											
											<tr>
											<td><center>B-</center></td>
											<td><center>
											<?php
											$q=$dbh->query("SELECT * FROM tblblooddonars where BloodGroup='B-'");
											echo $result=$q->rowcount();
											?>
											</td></center>
											</tr>
									
									        <tr>
											<td><center>O+</center></td>
											<td><center>
											<?php
											$q=$dbh->query("SELECT * FROM tblblooddonars where BloodGroup='O+'");
											echo $result=$q->rowcount();
											?>
											</td></center>
											</tr>
											
											<tr>
											<td><center>O-</center></td>
											<td><center>
											<?php
											$q=$dbh->query("SELECT * FROM tblblooddonars where BloodGroup='O-'");
											echo $result=$q->rowcount();
											?>
											</td></center>
											</tr>
							</div>
						</div>

					

					</div>
				</div>

			</div>
		</div>
	</div>


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

