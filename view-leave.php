<?php
session_start();
include ('include/conn.php');
$name = $_SESSION['user_name'];
$id = $_SESSION['id'];
if(empty($id))
{
    header("Location:index.html"); 
}

include "include/header.php";
?>
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <title>View Attendance</title>
  <style type="text/css">
    *{box-sizing: border-box;}
  .table
  {  
    margin:0% 1% ;
    width: 98%;
    border: 1px solid #bbb;
  }
  .alert
  {
    margin-left: 10px;
    margin-right:10px;
  }
  </style>
</head>
<body>
  <div class="alert alert-primary" role="alert" style="">
  Leave Table
</div>
  <div class="tbl">
  <table class="table">
  <thead class="thead-dark">
    <tr>
        <th style="text-align: center;">S.No.</th>
        <th style="text-align: center;">Leave Start Date</th>
        <th style="text-align: center;">Leave End Date</th>
        <th style="text-align: center;">Description</th>
        <th style="text-align: center;">Status</th>
    </tr>
  </thead>
  <tbody>
     <?php
        $select_query = mysqli_query($conn, "select * from leave_tbl where user_id='$id'");
        $sn = 1;
        while($row = mysqli_fetch_array($select_query))
        { 
            $startdate = date('d M Y', strtotime($row['start_date']));
            $enddate = date('d M Y', strtotime($row['end_date']));
                      //$leavedate = date('d M Y', strtotime($row['leave_date']));
                     //$timeperiod = $row['time_period'];
       ?>
    <tr>
          <td  style="text-align: center"><?php echo $sn; ?></td>
          <td  style="text-align: center"><?php echo $startdate;?></td>
          <td  style="text-align: center"><?php echo $enddate; ?></td>
          <td  style="text-align: center"><?php echo  $row['description']; ?></td>
          <?php
          if($row['status']==0)
          { ?>
          <td style="color:blue;font-weight: 700;text-align: center">Pending</td>
          <?php }
          else if($row['status']==1)
          { ?>
          <td style="color:green;font-weight: 700;text-align: center">Approved</td>
          <?php  }
          else 
          { ?>
          <td style="color:red;font-weight: 700;text-align: center">Rejected</td>
          <?php  } ?>
        </tr>
        <?php $sn++; } ?>
  </tbody>
</table>
</div>

</body>
</html>
          
  <!-- <table width="100%" cellspacing="0" border="1">
    <thead>
      <tr>
        <th>S.No.</th>
        <th>Leave Start Date</th>
        <th>Leave End Date</th>
        <th>Description</th>
        <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $select_query = mysqli_query($conn, "select * from leave_tbl where user_id='$id'");
        $sn = 1;
        while($row = mysqli_fetch_array($select_query))
        { 
            $startdate = date('d M Y', strtotime($row['start_date']));
            $enddate = date('d M Y', strtotime($row['end_date']));
                      //$leavedate = date('d M Y', strtotime($row['leave_date']));
                     //$timeperiod = $row['time_period'];
       ?>
        <tr>
          <td  style="text-align: center"><?php echo $sn; ?></td>
          <td  style="text-align: center"><?php echo $startdate;?></td>
          <td  style="text-align: center"><?php echo $enddate; ?></td>
          <td  style="text-align: center"><?php echo  $row['description']; ?></td>
          <?php
          if($row['status']==0)
          { ?>
          <td style="color:blue;font-weight: 700;text-align: center">Pending</td>
          <?php }
          else if($row['status']==1)
          { ?>
          <td style="color:green;font-weight: 700;text-align: center">Approved</td>
          <?php  }
          else 
          { ?>
          <td style="color:red;font-weight: 700;text-align: center">Rejected</td>
          <?php  } ?>
        </tr>
        <?php $sn++; } ?>
    </tbody>
  </table>
 -->