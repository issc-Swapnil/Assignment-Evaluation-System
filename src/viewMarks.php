<?php
require "header.php";
if(!isset($_SESSION["userId"]))
	header("Location: login.php");

require "navigationFaculty.php";
?>

<html>

<body>
<div class="content-wrapper">

      <div class="container-fluid">
      <?php if(isset($_POST['radioInput']))
      		{ 
	      	$id=$_POST['radioInput'];
	      	?>
      	<div class="card mb-3">
          
          <div class="card-header">
            <i class="fa fa-table"></i>
            <?php 
            $conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
			if ($conn->connect_error)
  				die("Connection failed: " . $conn->connect_error);
            $query="select courseId,name,maxMarks from assignment where assignmentId=".$id;
            $result=$conn->query($query);
            $row=$result->fetch_assoc();
            echo $row['name'];
            $co=$row['courseId'];
            $max=$row['maxMarks'];
            ?>
          </div>
          <div class="card-body">
          <div class="table-responsive">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  	<th>Roll No</th>
                    <th>Student Name</th>
                    <th>Marks</th>
                    <th>Remarks</th>
                  </tr>
                </thead>
                <tbody>
                	<?php
                	$query="select userId,rollNo,name from student where userId in (select userId from student_course where courseId=".$co.")";
                	$result=$conn->query($query);
                	$jsonArray=array();
        			$jsonArray1=array();
                	while($row = $result->fetch_assoc())
                	{
                	$query1="select marks,remarks from student_assignment where userId=".$row['userId']." AND assignmentId=".$id;
                	$result1=$conn->query($query1);
                	if($row1 = $result1->fetch_assoc())
                	{
                		array_push($jsonArray,$row1['marks']);
            			array_push($jsonArray1,$row['name']);
                	?>

                  		<tr>
                  		<td><?php echo $row['rollNo']; ?></td>
                    	<td><?php echo $row['name']; ?></td>
                    	<td><?php echo $row1['marks']; ?></td>
                    	<td><?php echo $row1['remarks']; ?></td>
                  		</tr>
                  	<?php 
                  	}
                  	}
                  	$conn->close();
					$arrayMarks=json_encode($jsonArray);
					$arrayName=json_encode($jsonArray1);?>
                </tbody>
              </table>
          </div>
          </div>
        </div>
       
        <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-bar-chart"></i>
                Student Marks
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-8 my-auto">
                    <canvas id="myBarChart1" width="100" height="50"></canvas>
                  </div>
                </div>
              </div>
            </div>

        <?php } else { ?>
		<div class="card mb-3">
          
          <div class="card-header">
            <i class="fa fa-table"></i>
            Assignments
          </div>
          <div class="card-body">
          <form method="POST" action="">
            <div class="table-responsive">
            	
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                  	<th>Publish Date</th>
                    <th>Assignment Name</th>
                    <th>Course</th>
                    <th>Select</th>
                  </tr>
                </thead>
                <tbody>
                	<?php
                	$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
            		if ($conn->connect_error)
            			die("Connection failed: " . $conn->connect_error);
                	$query="select assignmentId,publishDate,assignment.name as aname,course.name as cname from assignment,course where  assignment.courseId=course.courseId AND course.courseId in (select courseId from faculty_course where userId=".$_SESSION['userId'].") AND publishDate <= now() AND processed=1";
                	$result=$conn->query($query);
    				while($row = $result->fetch_assoc())
                	{
                	?>
                  <tr>
                  	<td><?php echo $row['publishDate']; ?></td>
                    <td><?php echo $row['aname']; ?></td>
                    <td><?php echo $row['cname']; ?></td>
                    <td><input type="radio" name="radioInput" value="<?php echo $row['assignmentId']; ?>" required></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <center>
              <button type="submit" name="submit" class="btn btn-default">View Marks</button>
              </center>
          </form>
          </div>
        </div>
		<?php } ?>

      </div>
      
    </div>
    <!-- /.content-wrapper -->
 <script type="text/javascript">
    	var obj = JSON.parse('<?= $arrayMarks; ?>');
    	var obj1 = JSON.parse('<?= $arrayName; ?>');
    	var ctx = document.getElementById("myBarChart1");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: obj1,
    datasets: [{
      label: "Marks",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: obj,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: <?= $max; ?>,
          maxTicksLimit: 5
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
		</script>
   
</body>
<html>