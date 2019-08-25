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
	<?php
        $conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
        if ($conn->connect_error)
           die("Connection failed: " . $conn->connect_error);
        $query="select courseId from course";
        $result=$conn->query($query);
        $jsonArray=array();
        $jsonArray1=array();
    	while($row = $result->fetch_assoc())
            {
            $query1="select AVG(marks) as mark,maxMarks from assignment,student_assignment where assignment.assignmentId=student_assignment.assignmentId AND courseId=".$row['courseId']." GROUP BY student_assignment.assignmentId";
            $result1=$conn->query($query1);
            $total=0;
            $cnt=0;
            while($row1 = $result1->fetch_assoc())
            	{
            		$per=($row1['mark']*100)/$row1['maxMarks'];
            		$total=$total+$per;
            		$cnt=$cnt+1;
            	}
            if($cnt>0)
            {
            $total=$total/$cnt;
            array_push($jsonArray,$total);
            array_push($jsonArray1,$row['courseId']);
        }
        	}
            $arrayMarks=json_encode($jsonArray);
			$arrayName=json_encode($jsonArray1);
				?>
        <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-bar-chart"></i>
                Course-Wise Average Marks
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-8 my-auto">
                    <canvas id="myBarChart1" width="100" height="50"></canvas>
                  </div>
                </div>
              </div>
            </div>

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
          max: 100,
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