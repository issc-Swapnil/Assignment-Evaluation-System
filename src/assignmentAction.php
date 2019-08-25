<?php
require "header.php";
if(!isset($_SESSION["userId"]))
	header("Location: login.php");
$id=$_POST['radioInput'];
if(isset($_POST['delete']))
{
	$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
    if ($conn->connect_error)
        die("Connection failed: " . $conn->connect_error);
    $query="delete from assignment where assignmentId=".$id;
    $conn->query($query);
    $conn->close();
    header("Location: unpublishedAssignment.php");
}
elseif(isset($_POST['publish']))
{
	$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
    if ($conn->connect_error)
        die("Connection failed: " . $conn->connect_error);
    $query="update assignment set publishDate='".date('Y-m-d')."' where assignmentId=".$id;
    $conn->query($query);
    $query="select email from student where userId in (select userId from student_course where courseId=(select courseId from assignment where assignmentId=".$id."))";
    $result=$conn->query($query);
    while($row=$result->fetch_assoc())
        mail($row['email'],"New Assignment","Please view the AES account to recieve the new assignment.");
    $conn->close();
    header("Location: assignmentFaculty.php");
}
elseif(isset($_POST['updPub']))
{
	$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
    if ($conn->connect_error)
    	die("Connection failed: " . $conn->connect_error);
    $query="update assignment set publishDate='".$_POST['pdate']."' where assignmentId=".$id;
    $conn->query($query);
    $conn->close();
    header("Location: unpublishedAssignment.php");
}
elseif(isset($_POST['updSub']))
{
	$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
    if ($conn->connect_error)
    	die("Connection failed: " . $conn->connect_error);
    $query="update assignment set submissionDate='".$_POST['sdate']."' where assignmentId=".$id;
    $conn->query($query);
    $conn->close();
    header("Location: unpublishedAssignment.php");
}
require "navigationFaculty.php";
?>

<html>

<body>
<div class="content-wrapper">
	<div class="container-fluid">
		<?php
		if(isset($_POST['viewSub'])) 
		{
			$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
            if ($conn->connect_error)
            	die("Connection failed: " . $conn->connect_error);
        ?>
		<div class="card mb-3">
          
          <div class="card-header">
            <i class="fa fa-table"></i>
            <?php 
            $query="select name from assignment where assignmentId=".$id;
            $result=$conn->query($query);
            $row=$result->fetch_assoc();
            echo $row['name'];
            ?>
          </div>
          <div class="card-body">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  	<th>Roll No</th>
                    <th>Student Name</th>
                    <th>Submitted On</th>
                    <th>File</th>
                  </tr>
                </thead>
                <tbody>
                	<?php
                	$query="select rollNo,name,submissionDate,filePath from student INNER JOIN student_assignment ON student.userId=student_assignment.userId where assignmentId=".$id;
                	$result=$conn->query($query);
                	if($row = $result->fetch_assoc())
                	{
                		do
                			{
                			?>
                  			<tr>
                  			<td><?php echo $row['rollNo']; ?></td>
                    		<td><?php echo $row['name']; ?></td>
                    		<td><?php echo $row['submissionDate']; ?></td>
                    		<td><a href="<?php echo $row['filePath']; ?>">Open</a></td>
                  			</tr>
                  		<?php 
                  		}while($row = $result->fetch_assoc());
                  	} else { ?>
                  	<tr><td colspan=4><center>No data</center></td></tr>
                  	<?php } ?>
                </tbody>
              </table>
          </div>
        </div>
		<?php 
		$conn->close();
		} 
		else 
		{
		?>
		<div class="row">
        	<div class="col-lg-12">
            	<div class="panel panel-default">
                	<div class="panel-heading">
                    	<?php
                    	if(isset($_POST['pubDate']))
                    		echo "Change publish date";
                    	elseif(isset($_POST['subDate']))
                    		echo "Change submission date";
                    	?>
                    	
                    </div>
                    <div class="panel-body">
                    	<div class="row">
                        	<div class="col-lg-6">

                            	<form method="POST" action="" enctype="multipart/form-data">
                                	<?php if(isset($_POST['pubDate'])) { ?>
                                	<div class="form-group">
                                    	<B>Publish Date</B><br/>
                                    	<?php
                                    	$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
                                    	if ($conn->connect_error)
                                    		die("Connection failed: " . $conn->connect_error);
                                    	$query="select publishDate,submissionDate from assignment where assignmentId=".$id;
    									$result=$conn->query($query);
    									$row=$result->fetch_assoc();
    									?>
                                    	<input type="date" name="pdate" min="<?php echo date('Y-m-d'); ?>" max="<?php echo $row['submissionDate'];?>" value="<?php echo $row['publishDate'];?>" required>
                                    	<?php $conn->close(); ?>
                                    	<input type="hidden" name="radioInput" value="<?php echo $id; ?>">
                                    </div>
                                    <button type="submit" name="updPub" class="btn btn-default">Update</button>
                                    <?php } elseif(isset($_POST['subDate'])) {?>
                                    <div class="form-group">
                                    	<B>Submission Date Date</B><br/>
                                    	<?php
                                    	$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
                                    	if ($conn->connect_error)
                                    		die("Connection failed: " . $conn->connect_error);
                                    	$query="select publishDate,submissionDate from assignment where assignmentId=".$id;
    									$result=$conn->query($query);
    									$row=$result->fetch_assoc();
    									?>
                                    	<input type="date" name="sdate" min="<?php echo $row['publishDate']; ?>" value="<?php echo $row['submissionDate']; ?>" required>
                                    	<?php $conn->close(); ?>
                                    	<input type="hidden" name="radioInput" value="<?php echo $id; ?>">
                                    </div>
                                    <button type="submit" name="updSub" class="btn btn-default">Update</button>
                                    <?php } ?>
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