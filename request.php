
<?php
error_reporting(0);
include('includes/config.php');
if(isset($_POST['submit']))
  {  
	  	  
$fullname=$_POST['fullname'];
$cntname=$_POST['cntname'];
$mobile=$_POST['mobileno'];
$email=$_POST['emailid'];
$age=$_POST['age'];
$gender=$_POST['gender'];
$blodgroup=$_POST['bloodgroup'];
$address=$_POST['address'];
$dname=$_POST['dname'];
$date=$_POST['date'];
$other=$_POST['other'];
$city=$_POST['city'];

$sql="INSERT IGNORE INTO  bloodrequest(PatientName,ContactName,ContactNumber,ContactEmail,Age,Gender,BloodGroup,Address,DoctorName,City,RequireDate,OtherMessage) VALUES(:fullname,:cntname,:mobile,:email,:age,:gender,:blodgroup,:address,:dname,:city,:date,:other)";
$query = $dbh->prepare($sql);
$query->bindParam(':fullname',$fullname,PDO::PARAM_STR);
$query->bindParam(':cntname',$cntname,PDO::PARAM_STR);
$query->bindParam(':mobile',$mobile,PDO::PARAM_STR);
$query->bindParam(':email',$email,PDO::PARAM_STR);
$query->bindParam(':age',$age,PDO::PARAM_STR);
$query->bindParam(':gender',$gender,PDO::PARAM_STR);
$query->bindParam(':blodgroup',$blodgroup,PDO::PARAM_STR);
$query->bindParam(':address',$address,PDO::PARAM_STR);
$query->bindParam(':date',$date,PDO::PARAM_STR);
$query->bindParam(':other',$other,PDO::PARAM_STR);
$query->bindParam(':dname',$dname,PDO::PARAM_STR);
$query->bindParam(':city',$city,PDO::PARAM_STR);
$query->execute();
$lastInsertId = $dbh->lastInsertId();
                            print_r($lastInsertId);
if($lastInsertId)
{
$msg="Your Request submitted successfully,We will contact you on blood availability";
}
else 
{
$error="Something went wrong. Please try again";
}
}
?>
<!DOCTYPE html>
<html lang="en">
<head>


    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>BloodBank & Donor Management System | Request For Blood</title>
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="css/modern-business.css" rel="stylesheet">
    <style>
    .navbar-toggler {
        z-index: 1;
    }
    
    @media (max-width: 576px) {
        nav > .container {
            width: 100%;
        }
    }
    </style>
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

<?php include('includes/header.php');?>

    <!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <h1 class="mt-4 mb-3">Request Blood</h1>

        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="index.php">Back</a>
            </li>
            <li class="breadcrumb-item active">Request</li>
        </ol>
		
		
            <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>
        <!-- Content Row -->
        <form name="donar" method="post">
<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">Patient Name<span style="color:red">*</span></div>
<div><input type="text" name="fullname" class="form-control" required></div>
</div>

<div class="col-lg-4 mb-4">
<div class="font-italic">Blood Group<span style="color:red">*</span></div>
<div><select name="bloodgroup" class="form-control" required><option value="">Select</option>
<?php $sql = "SELECT * from  tblbloodgroup ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{               ?>  
<option value="<?php echo htmlentities($result->BloodGroup);?>"><?php echo htmlentities($result->BloodGroup);?></option>
<?php }} ?>
</select>
</div>
</div>

<div class="col-lg-4 mb-4">
<div class="font-italic">Age<span style="color:red">*</span></div>
<div><input type="text" name="age" class="form-control" required></div>
</div>
</div>



<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">Gender<span style="color:red">*</span></div>
<div><select name="gender" class="form-control" required>
<option value="">Select</option>
<option value="Male">Male</option>
<option value="Female">Female</option>
</select>
</div>
</div>

<div class="col-lg-4 mb-4">
<div class="font-italic">Contact Name<span style="color:red">*</span></div>
<div><input type="text" name="cntname" class="form-control" required></div>

</div>
<div class="col-lg-4 mb-4">
<div class="font-italic"> Contact Email Id<span style="color:red">*</span></div>
<div><input type="email" name="emailid" class="form-control"required></div>
</div>
</div>

<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">Contact Number<span style="color:red">*</span></div>
<div><input type="text" name="mobileno" class="form-control" required></div>
</div>



<div class="col-lg-4 mb-4">
<div class="font-italic">City<span style="color:red">*</span></div>
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

<div class="col-lg-4 mb-2">
<div class="font-italic"> Hospital Name & Address<span style="color:red">*</span></div>
<div><textarea class="form-control" name="address"required></textarea></div>
</div>
</div>

<div class="row">
<div class="col-lg-4 mb-4">
<div class="font-italic">Doctor Name<span style="color:red">*</span></div>
<div><input type="text" name="dname" class="form-control" required></div>
</div>

<div class="col-lg-4 mb-4">
<div class="font-italic">When Required<span style="color:red">*</span></div>
<div><input type="date" name="date" class="form-control" required></div>
</div>

<div class="col-lg-4 mb-4">
<div class="font-italic">Other Message</div>
<div><textarea class="form-control" name="other"></textarea></div>
</div>
</div>


<div class="row">
 <div class="col-lg-4 mb-4">
<div><input type="submit" name="submit" class="btn btn-primary" value="submit" style="cursor:pointer"></div>
</div>
</div>

      
</form> 
</div>  
 
<br><br>
  <?php include('footer.php');?>
    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/tether/tether.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

</body>

</html>
