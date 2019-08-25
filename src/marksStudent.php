<?php
require "header.php";
if(!isset($_SESSION["userId"]))
	header("Location: login.php");
require "navigationStudent.php";
?>

<html>

<body>
<div class="content-wrapper">

      <div class="container-fluid">

       <div class="card mb-3">
          
          <div class="card-header">
            <i class="fa fa-table"></i>
            Assignment Marks &amp; Remarks
          </div>
          <div class="card-body">
            <div class="table-responsive">
            	
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                  	<th>Publish Date</th>
                    <th>Assignment Name</th>
                    <th>Course</th>
                    <th>Uploader</th>
                    <th>Obtained Marks</th>
                    <th>Out of</th>
                    <th>Remarks</th>
                  </tr>
                </thead>
                <tbody>
                	<?php
                	$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
            		if ($conn->connect_error)
            			die("Connection failed: " . $conn->connect_error);
                	$query="select publishDate,assignment.name as aname,course.courseId,course.name as cname,faculty.name as fname,marks,remarks,maxMarks from assignment,course,faculty,student_assignment where assignment.userId=faculty.userId AND assignment.courseId=course.courseId AND assignment.assignmentId=student_assignment.assignmentId AND student_assignment.userId=".$_SESSION['userId']." AND course.courseId in (select courseId from student_course where userId=".$_SESSION['userId'].") AND publishDate <= now()";
                	$result=$conn->query($query);

                  $jsonCourse1=array();
                  $jsonCourse2=array();
                  $jsonCourse3=array();
                  $jsonCourse4=array();

                  $jsonAss1=array();
                  $jsonAss2=array();
                  $jsonAss3=array();
                  $jsonAss4=array();
    				    while($row = $result->fetch_assoc())
                	{
                   $per=($row['marks']*100)/$row['maxMarks'];
                    if($row['courseId']==101)
                    {
                      array_push($jsonCourse1,$per);
                      array_push($jsonAss1,$row['aname']);
                    }
                    elseif($row['courseId']==102)
                    {
                      array_push($jsonCourse2,$per);
                      array_push($jsonAss2,$row['aname']);
                    }
                    if($row['courseId']==103)
                    {
                      array_push($jsonCourse3,$per);
                      array_push($jsonAss3,$row['aname']);
                    }
                    if($row['courseId']==104)
                    {
                      array_push($jsonCourse4,$per);
                      array_push($jsonAss4,$row['aname']);
                    }
                	?>
                  <tr>
                  	<td><?php echo $row['publishDate']; ?></td>
                    <td><?php echo $row['aname']; ?></td>
                    <td><?php echo $row['cname']; ?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['marks']; ?></td>
                    <td><?php echo $row['maxMarks']; ?></td>
                    <td><?php echo $row['remarks']; ?></td>
                  </tr>
                  <?php } 
                  $arrayC1=json_encode($jsonCourse1);
                  $arrayC2=json_encode($jsonCourse2);
                  $arrayC3=json_encode($jsonCourse3);
                  $arrayC4=json_encode($jsonCourse4);
                  $arrayA1=json_encode($jsonAss1);
                  $arrayA2=json_encode($jsonAss2);
                  $arrayA3=json_encode($jsonAss3);
                  $arrayA4=json_encode($jsonAss4);
                  $conn->close();
                  ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
    <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-bar-chart"></i>
                SC-101
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-8 my-auto">
                    <canvas id="myBarChart1" width="100" height="50"></canvas>
                  </div>
                </div>
              </div>
            </div>
      
      <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-bar-chart"></i>
                SC-102
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-8 my-auto">
                    <canvas id="myBarChart2" width="100" height="50"></canvas>
                  </div>
                </div>
              </div>
            </div>
      <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-bar-chart"></i>
                SC-103
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-8 my-auto">
                    <canvas id="myBarChart3" width="100" height="50"></canvas>
                  </div>
                </div>
              </div>
            </div>
      <div class="card mb-3">
              <div class="card-header">
                <i class="fa fa-bar-chart"></i>
                SC-104
              </div>
              <div class="card-body">
                <div class="row">
                  <div class="col-sm-8 my-auto">
                    <canvas id="myBarChart4" width="100" height="50"></canvas>
                  </div>
                </div>
              </div>
            </div>
    </div>
    </div>
    <!-- /.content-wrapper -->
   <script type="text/javascript">
      var obj1 = JSON.parse('<?= $arrayC1; ?>');
      var obj2 = JSON.parse('<?= $arrayC2; ?>');
      var obj3 = JSON.parse('<?= $arrayC3; ?>');
      var obj4 = JSON.parse('<?= $arrayC4; ?>');
      var obj5 = JSON.parse('<?= $arrayA1; ?>');
      var obj6 = JSON.parse('<?= $arrayA2; ?>');
      var obj7 = JSON.parse('<?= $arrayA3; ?>');
      var obj8 = JSON.parse('<?= $arrayA4; ?>');
      var ctx1 = document.getElementById("myBarChart1");
      var ctx2 = document.getElementById("myBarChart2");
      var ctx3 = document.getElementById("myBarChart3");
      var ctx4 = document.getElementById("myBarChart4");
var myLineChart1 = new Chart(ctx1, {
  type: 'line',
  data: {
    labels: obj5,
    datasets: [{
      label: "Percentage",
      fill: false,
      borderColor: "rgba(2,117,216,1)",
      data: obj1,
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
var myLineChart2 = new Chart(ctx2, {
  type: 'line',
  data: {
    labels: obj6,
    datasets: [{
      label: "Percentage",
      fill: false,
      borderColor: "rgba(2,117,216,1)",
      data: obj2,
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
var myLineChart3 = new Chart(ctx3, {
  type: 'line',
  data: {
    labels: obj7,
    datasets: [{
      label: "Percentage",
      fill: false,
      borderColor: "rgba(2,117,216,1)",
      data: obj3,
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
var myLineChart4 = new Chart(ctx4, {
  type: 'line',
  data: {
    labels: obj8,
    datasets: [{
      label: "Percentage",
      fill: false,
      borderColor: "rgba(2,117,216,1)",
      data: obj4,
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