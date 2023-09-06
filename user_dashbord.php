<?php
require('include/conn.php');
session_start();
if (!isset($_SESSION['IS_LOGIN'])) 
{
header('location:index.html');
}
$id=$_SESSION['id'];
$total_work=mysqli_query($conn,"select count(*) from work_tbl where user_id='$id'");
$total_work = mysqli_fetch_row($total_work);

$submitted_work=mysqli_query($conn,"select count(*) from work_tbl where status=1 and user_id='$id'");
$submitted_work = mysqli_fetch_row($submitted_work);

$pending_work=mysqli_query($conn,"select count(*) from work_tbl where status=0 and user_id='$id'");
$pending_work = mysqli_fetch_row($pending_work);

$total_leave = mysqli_query($conn,"select count(*) from leave_tbl where user_id='$id'");
$total_leave = mysqli_fetch_row($total_leave);

$pending_leave = mysqli_query($conn,"select count(*) from leave_tbl where status=0 and user_id='$id'");
$pending_leave = mysqli_fetch_row($pending_leave);

$approved_leave = mysqli_query($conn,"select count(*) from leave_tbl where status=1 and user_id='$id'");
$approved_leave = mysqli_fetch_row($approved_leave);



include "include/header.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>WELCOM</title>
	<style type="text/css">
		.card
		{
			display: inline-block;
			width: 29%;
			margin-left:17px;
			border:1px solid #888;
		}
		.card-header{border-bottom:1px solid #888;background-color: #ccc;}
		.container a
		{
			color: black;
			text-decoration: none;
		}
	</style>
</head>
<body >
	<div class="container">
	 	<a href="view-work.php" >
	 	<div class="card text-bg-light mb-3 box"  >
  			<div class="card-header"><h1><i class="fa fa-briefcase"></i></h1></div>
  			<div class="card-body">
  			  <h5 class="card-title">Total Tasks</h5>
  			  <h1><?php echo $total_work[0];?></h1>
    		</div>
		</div>
		</a>

	 	<a href="view-work.php" >
	 	<div class="card text-bg-light mb-3 box"  >
  			<div class="card-header"><h1><i class="fa fa-check-square-o"></i></h1></div>
  			<div class="card-body">
  			  <h5 class="card-title">Submitted Tasks</h5>
  			  <h1><?php echo $submitted_work[0];?></h1>
    		</div>
		</div>
		</a>

	 	<a href="view-work.php" >
	 	<div class="card text-bg-light mb-3 box"  >
  			<div class="card-header"><h1><i class="fa fa-clock-o"></i></h1></div>
  			<div class="card-body">
  			  <h5 class="card-title">Pending Tasks</h5>
  			  <h1><?php echo $pending_work[0];?></h1>
    		</div>
		</div>
		</a>



		<a href="view-leave.php">
		<div class="card text-bg-light mb-3 box" >
  			<div class="card-header"><h1><i class="fa fa-calendar-o"></i></h1></div>
  			<div class="card-body">
  			  <h5 class="card-title">Total Leaves</h5>
  			  <h1><?php echo $total_leave[0];?></h1>
    		</div>
		</div>
		</a>

		<a href="view-leave.php">
		<div class="card text-bg-light mb-3 box" >
  			<div class="card-header"><h1><i class="fa fa-calendar-minus-o"></i></h1></div>
  			<div class="card-body">
  			  <h5 class="card-title">Pending Leaves</h5>
  			  <h1><?php echo $pending_leave[0];?></h1>
    		</div>
		</div>
		</a>

	 	<a href="view-leave.php" >
	 	<div class="card text-bg-light mb-3 box"  >
  			<div class="card-header"><h1><i class="fa fa-calendar-check-o"></i></h1></div>
  			<div class="card-body">
  			  <h5 class="card-title">Approved Leaves</h5>
  			  <h1><?php echo $approved_leave[0];?></h1>
    		</div>
		</div>
		</a>

	</div>
</body>
</html>