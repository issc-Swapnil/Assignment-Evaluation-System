<?php
require "header.php";
if(!isset($_SESSION["userId"]))
	header("Location: login.php");
$error=0;
if(isset($_POST["aname"]))
{
	if($_POST["sdate"] < $_POST["pdate"])
		$error=1;
	else
		{
			if(!empty($_POST['atext']))
				{
					$fname = preg_replace("/[^A-Z0-9._-]/i", "_", $_POST['aname']);
					$fname = "upload/".$fname.".txt";
					$myfile=fopen($fname,"w");
					fwrite($myfile, $_POST['atext']);
					fclose($myfile);
					$fpath=$fname;
				}
			elseif (isset($_FILES["inputFile"]))
				{
					$myFile = $_FILES["inputFile"];
					if($myFile['error'] > 0)
						$error=3;
					else
					{
					$fname = preg_replace("/[^A-Z0-9._-]/i", "_", $myFile["name"]);
					$i = 0;
					$parts = pathinfo($fname);
					while (file_exists("upload/" . $fname)) 
					{
						$i++;
						$fname = $parts["filename"] . "-" . $i . "." . $parts["extension"];
					}
					$success = move_uploaded_file($myFile["tmp_name"],"upload/" . $fname);
					if (!$success)
						die("Sorry unable to upload file");
					else
					{
						chmod("upload/" . $fname, 0644);
						$fpath="upload/".$fname;
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
                $query="select email from student where userId in (select userId from student_course where courseId=".$_POST['course'].")";
                $result=$conn->query($query);
                while($row=$result->fetch_assoc())
                     mail($row['email'],"New Assignment","Please view the AES account to recieve the new assignment.");
            	$query="insert into assignment (name,courseId,userId,uploadDate,publishDate,submissionDate,filePath,maxMarks) values ('".$_POST['aname']."','".$_POST['course']."',".$_SESSION['userId'].",'".date('Y-m-d')."','".$_POST['pdate']."','".$_POST['sdate']."','".$fpath."','".$_POST['marks']."')";
            	if(!$conn->query($query))
            		die($conn->error);
            	else
            		{
            			if($_POST['pdate']<date('Y-m-d'))
            				header("Location: assignmentFaculty.php");
            			else
            				header("Location: unpublishedAssignment.php");
            		}
            	$conn->close();
            }
		}
}
require "navigationFaculty.php";
?>

<html>

<body>
<div class="content-wrapper">
	<div class="container-fluid">
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
                                    	<B>Assignment Name</B>
                                        <input name="aname" class="form-control" autofocus required>
                                    </div>
                                    <div class="form-group">
                                    	<B>Upload Assignment</B><br/>
                                    	<input name="inputFile" type="file">
                                    </div>
                                    OR
                                    <div class="form-group">
                                    	<B>Write Assignment</B><br/>
                                    	<textarea name="atext" cols="50" rows="5"></textarea>
                                    </div>
                                    <div class="form-group">
                                    	<B>Course</B>
                                        <select name="course" class="form-control">
                                        	<?php 
                                        	$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
                                        	if ($conn->connect_error)
                                        		die("Connection failed: " . $conn->connect_error);
                                        	$query="select course.courseId,name from course INNER JOIN faculty_course ON course.courseId=faculty_course.courseId where userId=".$_SESSION['userId'];
                                        	$result=$conn->query($query);
                                        	while($row = $result->fetch_assoc())
                                        	{
                                        	?>
                                        	<option value="<?php echo $row['courseId']; ?>"><?php echo $row['name']; ?></option>
                                            <?php
                                            }
                                            $conn->close();
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                    	<B>Maximum marks for the assignment</B>
                                    	<input type="number" name="marks" step="5" min="0" required>
                                    </div>
                                    <div class="form-group">
                                    	<B>Publish Date</B><br/>
                                    	<input type="date" name="pdate" min="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                    <div class="form-group">
                                    	<B>Last Date for Submission</B><br/>
                                    	<input type="date" name="sdate" min="<?php echo date('Y-m-d'); ?>" required>
                                    </div>
                                    <?php if($error==1) { ?>
                                    <div class="d-block small" style="color: red">Please enter valid dates</div>
                                    <?php } elseif($error==3) { ?>
                                    <div class="d-block small" style="color: red">Error while uploading the assignment.</div>
                                    <?php } elseif($error==2) { ?>
                                    <div class="d-block small" style="color: red">Error while uploading the assignment. Please make sure that either file is uploaded or the text area contains desired assignment</div>
                                    <?php } ?>
                                    <button type="submit" name="submit" class="btn btn-default">Upload</button>
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

	</div>
      
</div>
    <!-- /.content-wrapper -->

   
</body>
<html>