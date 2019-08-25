<?php
require "header.php";
if(!isset($_SESSION["userId"]))
	header("Location: login.php");
$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
if ($conn->connect_error)
  die("Connection failed: " . $conn->connect_error);
$query="select name from faculty where userId='".$_SESSION["userId"]."'";
$result=$conn->query($query);
$row = $result->fetch_assoc();
$name=$row["name"];
$query="select COUNT(assignmentId) as cnt from assignment where userId=".$_SESSION['userId']." AND publishDate > now()";
$result=$conn->query($query);
$row = $result->fetch_assoc();
$cntUnP=$row["cnt"];
$query="select COUNT(assignmentId) as cnt from assignment where userId=".$_SESSION['userId']." AND publishDate <= now() AND processed=0";
$result=$conn->query($query);
$row = $result->fetch_assoc();
$cntP=$row["cnt"];
$conn->close();
require "navigationFaculty.php";
?>

<html>

<body>
<div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Welcome <?php echo $name; ?>!</li>
          </ol>
        <div class="row">
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-tasks"></i>
                </div>
                <div class="mr-5">
                  <?php echo $cntUnP; ?> Unpublished Assignments!
                </div>
              </div>
              <a href="unpublishedAssignment.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>
          <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
              <div class="card-body">
                <div class="card-body-icon">
                  <i class="fa fa-fw fa-list"></i>
                </div>
                <div class="mr-5">
                  <?php echo $cntP; ?> Unprocessed Assignments!
                </div>
              </div>
              <a href="enterMarks.php" class="card-footer text-white clearfix small z-1">
                <span class="float-left">View Details</span>
                <span class="float-right">
                  <i class="fa fa-angle-right"></i>
                </span>
              </a>
            </div>
          </div>

      </div>
      
    </div>
    <!-- /.content-wrapper -->

   
</body>
<html>