c<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index1.php');
}
else{ 

if(isset($_POST['submit']))
  {
$fullname=$_POST['fullname'];
$mobile=$_POST['mobileno'];
$email=$_POST['emailid'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$blodgroup=$_POST['bloodgroup'];
$exblodgroup=$_POST['exbloodgroup'];
$city=$_POST['city'];
$address=$_POST['address'];
if($blodgroup!=$exblodgroup)
{

$q1="SELECT * From tblblooddonars where BloodGroup='$blodgroup'";
$st=$dbh->query($q1);
$result=$st->fetch();
$id=$result['id'];
$nm=$result['FullName'];
$no=$result['MobileNumber'];
$bg=$result['BloodGroup'];
$email=$result['EmailId'];
$city=$result['City'];
$address=$result['Address'];
if($st->rowcount()>0)
{

$q2="INSERT INTO outstock(Name,MobileNumber,BloodGroup,EmailId,City,Address) VALUES(?,?,?,?,?,?)";
$st1=$dbh->prepare($q2);
$st1->execute([$nm,$no,$bg,$email,$city,$address]);
	 
$q3="delete from tblblooddonars where id='$id'";
$st2=$dbh->prepare($q3);
$st2->execute();

$status=1;
$sql="INSERT INTO  tblblooddonars(FullName,MobileNumber,EmailId,Age,Gender,BloodGroup,Address,City,status) VALUES(:fullname,:mobile,:email,:age,:gender,:exblodgroup,:address,:city,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':exblodgroup',$exblodgroup,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();



$status=1;
$sql="INSERT INTO  exchangeblood(FullName,MobileNumber,EmailId,Age,Gender,BloodGroup,ExchangeBloodGroup,Address,City,status) VALUES(:fullname,:mobile,:email,:age,:gender,:blodgroup,:exblodgroup,:address,:city,:status)";
$query = $dbh->prepare($sql);
$query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':blodgroup',$blodgroup,PDO::PARAM_STR);
$query->bindParam(':exblodgroup',$exblodgroup,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->bindParam(':status',$status,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Your info submitted successfully";
}
else 
{
$error="Something went wrong. Please try again";
}
}
else
{
	$msg1="Blood Group Not Available";
}
}
else
{
	$msg2="Both Blood Groups Should be different";
}
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
	
	<title>BBDMS| Admin Exchange Blood</title>

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
<script language="javascript">
function isNumberKey(evt)
      {
         
        var charCode = (evt.which) ? evt.which : event.keyCode
                
        if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode!=46)
           return false;

         return true;
      }
      </script>
</head>

<body>
	<?php include('includes/header1.php');?>
	<div class="ts-main-content">
	<?php include('includes/leftbar.php');?>
		<div class="content-wrapper">
			<div class="container-fluid">

				<div class="row">
					<div class="col-md-12">
					
						<h2 class="page-title">Exchange</h2>

						<div class="row">
							<div class="col-md-12">
								<div class="panel panel-default">
									<div class="panel-heading">Basic Info</div>
									<?php if($msg2){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($msg2); ?> </div><?php }	?>			
	<?php if($msg1){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($msg1); ?> </div><?php }	?>							
<?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

									<div class="panel-body">
<form method="post" class="form-horizontal" enctype="multipart/form-data">
<div class="form-group">
<label class="col-sm-2 control-label">Full Name<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="fullname" class="form-control" required>
</div>
<label class="col-sm-2 control-label">Mobile No<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="mobileno" onKeyPress="return isNumberKey(event)"  maxlength="10" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Email id<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="email" name="emailid" class="form-control"required>
</div>
<label class="col-sm-2 control-label">Age<span style="color:red">*</span></label>
<div class="col-sm-4">
<input type="text" name="age" class="form-control" required>
</div>
</div>

<div class="form-group">
<label class="col-sm-2 control-label">Gender <span style="color:red">*</span></label>
<div class="col-sm-4">
<select name="gender" class="form-control" required>
<option value="">Select</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>

<label class="col-sm-2 control-label">Blood Group<span style="color:red">*</span></label>
<div class="col-sm-4">
<select name="bloodgroup" class="form-control" required>
<option value="">Select</option>
<option value="A-">A-</option>
<option value="A+">A+</option>
<option value="B-">B-</option>
<option value="B+">B+</option>
<option value="O-">O-</option>
<option value="AB-">AB-</option>
<option value="AB+">AB+</option>
<option value="O+">O+</option>

</select>

</div>
</div>

<label class="col-sm-2 control-label">Exchange BloodGroup<span style="color:red">*</span></label>
<div class="col-sm-4">
<select name="exbloodgroup" class="form-control" required>
<option value="">Select</option>
<option value="A+">A+</option>
<option value="B+">B+</option>
<option value="AB+">AB+</option>
<option value="O+">O+</option>
<option value="A-">A-</option>
<option value="B-">B-</option>
<option value="AB-">AB-</option>
<option value="O-">O-</option>
</select>
</div>



										
<div class="hr-dashed"></div>
<div class="form-group">
<label class="col-sm-2 control-label">Address</label>
<div class="col-sm-4">
<textarea class="form-control" name="address" ></textarea>
</div>
</div>

<label class="col-sm-2 control-label">City<span style="color:red">*</span></label>
<div class="col-sm-2">
<div><select name="city" class="form-control" required>
<option value="">Select</option>
<option value="Ranchi">Ranchi</option>
<option value="Delhi">Delhi</option>
<option value="Nagpur">Nagpur</option>
<option value="Patna">Patna</option>
<option value="Bhopal">Bhopal</option>
</select>

</div>
</div>
<br><br><br><br>



											<div class="form-group">
												<div class="col-sm-8 col-sm-offset-2">
													<button class="btn btn-default" type="reset">Cancel</button>
													<button class="btn btn-primary" name="submit" type="submit">Save</button>
												</div>
											</div>

										</form>
									</div>
								</div>
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
<?php } ?>