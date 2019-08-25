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

        <div class="card mb-3">
          
          <div class="card-header">
            <i class="fa fa-table"></i>
            Assignments
          </div>
          <div class="card-body">
          <form method="POST" action="assignmentAction.php">
            <div class="table-responsive">
            	
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                  	<th>Publish Date</th>
                    <th>Assignment Name</th>
                    <th>Course</th>
                    <th>Uploader</th>
                    <th>Submission Date</th>
                    <th>File</th>
                    <th>Select</th>
                  </tr>
                </thead>
                <tbody>
                	<?php
                	$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
            		if ($conn->connect_error)
            			die("Connection failed: " . $conn->connect_error);
                	$query="select assignmentId,publishDate,submissionDate,assignment.name as aname,filePath,course.name as cname,faculty.name as fname from assignment,course,faculty where assignment.userId=faculty.userId AND assignment.courseId=course.courseId AND course.courseId in (select courseId from faculty_course where userId=".$_SESSION['userId'].") AND publishDate <= now()";
                	$result=$conn->query($query);
    				while($row = $result->fetch_assoc())
                	{
                	?>
                  <tr>
                  	<td><?php echo $row['publishDate']; ?></td>
                    <td><?php echo $row['aname']; ?></td>
                    <td><?php echo $row['cname']; ?></td>
                    <td><?php echo $row['fname']; ?></td>
                    <td><?php echo $row['submissionDate']; ?></td>
                    <td><a href="<?php echo $row['filePath']; ?>">Open</a></td>
                    <td><input type="radio" name="radioInput" value="<?php echo $row['assignmentId']; ?>" required></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
            </div>
            <center>
              <button type="submit" name="viewSub" class="btn btn-default">View Submissions</button>
              <button type="submit" name="subDate" class="btn btn-default">Change Submission Date</button>
              </center>
          </form>
          </div>
        </div>

      </div>
      
    </div>
    <!-- /.content-wrapper -->

   
</body>
<html>