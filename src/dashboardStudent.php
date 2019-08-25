<?php
require "header.php";
if(!isset($_SESSION["userId"]))
	header("Location: login.php");
$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
if ($conn->connect_error)
  die("Connection failed: " . $conn->connect_error);
$query="select name from student where userId='".$_SESSION["userId"]."'";
$result=$conn->query($query);
$row = $result->fetch_assoc();
$name=$row["name"];
$cnt=array();
$query="select COUNT(assignmentId) as cnt from assignment where courseId in (select courseId from student_course where userId=".$_SESSION['userId'].") AND publishDate <= now() AND processed=0";
$result=$conn->query($query);
$row = $result->fetch_assoc();
array_push($cnt,$row["cnt"]);
$query="select COUNT(assignmentId) as cnt from assignment where courseId in (select courseId from student_course where userId=".$_SESSION['userId'].") AND publishDate <= now() AND processed=1";
$result=$conn->query($query);
$row = $result->fetch_assoc();
array_push($cnt,$row["cnt"]);
$arrayJSON=json_encode($cnt);
$conn->close();
require "navigationStudent.php";
?>

<html>

<body>
<div class="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Welcome <?php echo $name; ?>!</li>
        </ol>
        <div class="col-lg-4">
<div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-pie-chart"></i>
                Assignments
              </div>
              <div class="card-body">
                <canvas id="myPieChart1" width="100%" height="100"></canvas>
              </div>
            </div>
      </div>
      </div>
    </div>
    <!-- /.content-wrapper -->
    <script type="text/javascript">
    var d=JSON.parse('<?= $arrayJSON; ?>');
var ctx = document.getElementById("myPieChart1");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: ["Assignments Pending", "Assignment Done"],
    datasets: [{
      data: d,
      backgroundColor: ['#dc3545','#007bff'],
    }],
  },
});
   </script>
</body>
<html>