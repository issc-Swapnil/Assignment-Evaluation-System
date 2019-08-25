<?php
require "header.php";
if(!isset($_SESSION["userId"]))
	header("Location: login.php");
$_SESSION["validate"]=1;
require "navigationFaculty.php";
?>

<html>

  <body>

	<div class="content-wrapper">

      <div class="container-fluid">

        <div class="card mb-3">
          
          <div class="card-header">
            <i class="fa fa-table"></i>
            Unpublished Assignments
          </div>
          <div class="card-body">
          <form method="POST" action="assignmentAction.php">
            <div class="table-responsive">
            	
              <table class="table table-bordered" width="100%" id="dataTable" cellspacing="0">
                <thead>
                  <tr>
                  	<th>Upload Date</th>
                    <th>Assignment Name</th>
                    <th>Course</th>
                    <th>Publish Date</th>
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
                	$query="select assignmentId,publishDate,submissionDate,uploadDate,assignment.name as aname,filePath,course.name as cname from assignment JOIN course ON assignment.courseId=course.courseId where userId=".$_SESSION['userId']." AND publishDate > now()";
                	$result=$conn->query($query);
    				while($row = $result->fetch_assoc())
                	{
                	?>
                  <tr>
                  	<td><?php echo $row['uploadDate']; ?></td>
                    <td><?php echo $row['aname']; ?></td>
                    <td><?php echo $row['cname']; ?></td>
                    <td><?php echo $row['publishDate']; ?></td>
                    <td><?php echo $row['submissionDate']; ?></td>
                    <td><a href="<?php echo $row['filePath']; ?>">Open</a></td>
                    <td><input type="radio" name="radioInput" value="<?php echo $row['assignmentId']; ?>" required></td>
                  </tr>
                  <?php } ?>
                </tbody>
              </table>
              <center>
              <button type="submit" name="delete" class="btn btn-default">Delete</button>
              <button type="submit" name="publish" class="btn btn-default" >Publish</button>
              <button type="submit" name="pubDate" class="btn btn-default">Change Publish Date</button>
              <button type="submit" name="subDate" class="btn btn-default">Change Submission Date</button>
              </center>
              </form>
            </div>
          </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.content-wrapper --> 
  </body>
<html>