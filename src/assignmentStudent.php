<?php
require "header.php";
if(!isset($_SESSION["userId"]))
	header("Location: login.php");
$error=0;
if(isset($_POST['upload']))
	{
		if (isset($_FILES["inputFile"]))
				{
					$myFile = $_FILES["inputFile"];
					if($myFile['error'] > 0)
						$error=3;
					else
					{
					$fname = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);
					$i = 0;
					$parts = pathinfo($fname);
					while (file_exists("submit/" . $fname)) 
					{
						$i++;
						$fname = $parts["filename"] . "-" . $i . "." . $parts["extension"];
					}
					$success = move_uploaded_file($myFile["tmp_name"],"submit/" . $fname);
					if (!$success)
						die("Sorry unable to upload file");
					else
					{
						chmod("submit/" . $fname, 0644);
						$fpath="submit/".$fname;
					}
					}
				}
			else
				$error=2;
			if($error==0)
			{
				$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
            	if ($conn->connect_error)
            		die("Connection failed: " . $conn->connect_error);
            	$query="insert into student_assignment (userId,assignmentId,filePath,submissionDate,status) values (".$_SESSION['userId'].",".$_POST['aId'].",'".$fpath."',now(),1) ON DUPLICATE KEY UPDATE filePath='".$fpath."',submissionDate=now()";
            	if(!$conn->query($query))
            		die($conn->error);
            	else
            		header("Location: assignmentStudent.php");
            	$conn->close();
            }
	}
require "navigationStudent.php";
?>

<html>

<body>
<div class="content-wrapper">

      <div class="container-fluid">
      <?php if(!isset($_POST['submit']) && !isset($_POST['upload'])) { ?>

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
                	$query="select assignmentId,publishDate,submissionDate,assignment.name as aname,filePath,course.name as cname,faculty.name as fname from assignment,course,faculty where assignment.userId=faculty.userId AND assignment.courseId=course.courseId AND course.courseId in (select courseId from student_course where userId=".$_SESSION['userId'].") AND publishDate <= now()";
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
              <button type="submit" name="submit" class="btn btn-default">Submit</button>
              </center>
          </form>
          </div>
        </div>
        <?php } elseif(isset($_POST['submit'])) {?>
		<div class="row">
        	<div class="col-lg-12">
            	<div class="panel panel-default">
                	<div class="panel-heading">
                    	Upload Assignment
                    </div>
                    <div class="panel-body">
                    	<div class="row">
                        	<div class="col-lg-6">
                            	<form method="POST" action="" enctype="multipart/form-data">
                                	<div class="form-group">
                                		<b>Upload Assignment</b><br/>
                                    	<input name="inputFile" type="file">
                                    </div>
                                    <div class="d-block small" style="color: blue">NOTE: If uploaded, this file will replace any submissions made before</div>
                                    <?php if($error!=0) { ?>
                                    <div class="d-block small" style="color: red">Error while uploading the assignment</div>
                                    <?php } ?>
                                    <input type="hidden" name="aId" value="<?php echo $_POST['radioInput']; ?>">
                                    <button type="submit" name="upload" class="btn btn-default">Upload</button>
                                </form>
                            </div>
                                <!-- /.col-lg-6 (nested) -->
                                
                        </div>
                            <!-- /.row (nested) -->
                    </div>
                        <!-- /.panel-body -->
                </div>
                    <!-- /.panel -->
            </div>
                <!-- /.col-lg-12 -->
        </div>
        <?php } ?>
      </div>
      
    </div>
    <!-- /.content-wrapper -->

   
</body>
<html>