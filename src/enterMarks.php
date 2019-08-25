<?php
require "header.php";
if(!isset($_SESSION["userId"]))
	header("Location: login.php");
if(isset($_POST["mark"]))
	{
		$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
        if ($conn->connect_error)
            die("Connection failed: " . $conn->connect_error);
        $query="select userId from student where userId in (select userId from student_course where courseId=".$_POST['cId'].")";
        $result=$conn->query($query);
        while($row = $result->fetch_assoc())
        {
        	$sdate="sdate".$row['userId'];
            $marks="marks".$row['userId'];
            $remarks="remarks".$row['userId'];
            $sdate=$_POST["$sdate"];
            $marks=$_POST["$marks"];
            $remarks=$_POST["$remarks"];
        	$query1="insert into student_assignment (userId,assignmentId,marks,remarks,submissionDate,status) values (".$row['userId'].",".$_POST['aId'].",'".$marks."','".$remarks."','".$sdate."',1) ON DUPLICATE KEY update marks='".$marks."',remarks='".$remarks."',submissionDate='".$sdate."'";
        	if(!$conn->query($query1))
            		die($conn->error);
            
        }
        $query2="update assignment set processed=1 where assignmentId=".$_POST['aId'];
        if(!$conn->query($query2))
            		die($conn->error);
        $conn->close();
       	header("Location: dashboardFaculty.php");
	}
require "navigationFaculty.php";
?>

<html>

<body>
<div class="content-wrapper">

      <div class="container-fluid">
      <?php if(!isset($_POST['submit']) && !isset($_POST['mark'])) { ?>
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
                	$query="select assignmentId,publishDate,assignment.name as aname,course.name as cname from assignment,course where  assignment.courseId=course.courseId AND course.courseId in (select courseId from faculty_course where userId=".$_SESSION['userId'].") AND publishDate <= now() AND processed=0";
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
              <button type="submit" name="submit" class="btn btn-default">Enter Marks</button>
              </center>
          </form>
          </div>
        </div>
        <?php 
        }
        elseif(isset($_POST['submit']))
        {
        	$id=$_POST['radioInput'];
			$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
            if ($conn->connect_error)
            	die("Connection failed: " . $conn->connect_error);
        ?>
		<div class="card mb-3">
          
          <div class="card-header">
            <i class="fa fa-table"></i>
            <?php 
            $query="select maxMarks,courseId,name from assignment where assignmentId=".$id;
            $result=$conn->query($query);
            $row=$result->fetch_assoc();
            echo $row['name'];
            $co=$row['courseId'];
            $ma=$row['maxMarks'];
            ?>
          </div>
          <div class="card-body">
          <form method="POST" action="">
              <table class="table table-bordered" width="100%" cellspacing="0">
                <thead>
                  <tr>
                  	<th>Roll No</th>
                    <th>Student Name</th>
                    <th>Submitted On</th>
                    <th>Marks</th>
                    <th>Remarks</th>
                  </tr>
                </thead>
                <tbody>
                	<?php
                	$query="select userId,rollNo,name from student where userId in (select userId from student_course where courseId=".$co.")";
                	$result=$conn->query($query);
                	if($row = $result->fetch_assoc())
                	{
                		$sdate="sdate";
                		$marks="marks";
                		$remarks="remarks";
                		do
                			{
                			?>
                			<?php
                			$query1="select submissionDate from student_assignment where userId=".$row['userId'];
                			$result1=$conn->query($query1);
                			if($row1 = $result1->fetch_assoc())
                				$oldDate=$row1["submissionDate"];
                			else
                				$oldDate=date('Y-m-d');
                			?>
                  			<tr>
                  			<td><?php echo $row['rollNo']; ?></td>
                    		<td><?php echo $row['name']; ?></td>
                    		<td><input type="date" name="<?php echo $sdate.$row['userId']; ?>" value="<?php echo $oldDate; ?>" min="<?php echo date('Y-m-d')?>"></td>
                    		<td><input type="number" name="<?php echo $marks.$row['userId']; ?>" step="0.25" min="0" max="<?php echo $ma; ?>" required></td>
                    		<td><input type="form-control" name="<?php echo $remarks.$row['userId']; ?>"></td>
                  			</tr>
                  		<?php 
                  		}while($row = $result->fetch_assoc());?>
                  	</tbody>
              </table>
              <input type="hidden" name="aId" value="<?php echo $id; ?>">
              <input type="hidden" name="cId" value="<?php echo $co; ?>">
              <button type="submit" name="mark" class="btn btn-default">Upload Marks</button>
                  	<?php
                  	} else { ?>
                  	<tr><td colspan=5><center>No data</center></td></tr>
                  	</tbody>
              </table>
                  	<?php
                  	} $conn->close(); ?>
                
          </form>
          </div>
        </div>
		<?php } ?>

      </div>
      
    </div>
    <!-- /.content-wrapper -->

   
</body>
<html>