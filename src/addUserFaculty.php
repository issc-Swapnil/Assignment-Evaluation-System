<?php
require "header.php";
if(!isset($_SESSION["userId"]))
	header("Location: login.php");
if(isset($_POST["submit"]))
{
	/*$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
    if ($conn->connect_error)
    	die("Connection failed: " . $conn->connect_error);
    $query="insert into faculty (name,phone,doj) values ('".$_POST['name']."','".$_POST['phone']."','".$_POST['jdate']."')";
    $query1="";
    if(!$conn->query($query))
    	die($conn->error);
    else*/
        header("Location: dashboardAdmin.php");
    //$conn->close();
}
require "navigationAdmin.php";
?>

<html>

<body>
<div class="content-wrapper">
	<div class="container-fluid">
		<div class="row">
        	<div class="col-lg-12">
            	<div class="panel panel-default">
                	<div class="panel-heading">
                    	Add Faculty Member
                    </div>
                    <div class="panel-body">
                    	<div class="row">
                        	<div class="col-lg-6">
                            	<form method="POST" action="" enctype="multipart/form-data">
                                    <div class="form-group">
                                        <B>E-mail</B>
                                        <input type="email" name="name" class="form-control" autofocus required>
                                    </div>
                                    <div class="form-group">
                                        <B>Password</B>
                                        <input type="password" name="name" class="form-control" autofocus required>
                                    </div>
                                	<div class="form-group">
                                    	<B>Name</B>
                                        <input name="name" class="form-control" autofocus required>
                                    </div>
                                    <div class="form-group">
                                    	<B>Phone No</B>
                                        <input name="phone" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                    	<B>Course</B>
                                        <select multiple name="course" class="form-control" required>
                                        	<?php 
                                        	$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
                                        	if ($conn->connect_error)
                                        		die("Connection failed: " . $conn->connect_error);
                                        	$query="select courseId,name from course";
                                        	$result=$conn->query($query);
                                        	while($row = $result->fetch_assoc())
                                        	{
                                        	?>
                                        	<option value="<?php echo $row['courseId']; ?>">SC - <?php echo $row['courseId']; ?> : <?php echo $row['name']; ?></option>
                                            <?php
                                            }
                                            $conn->close();
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                    	<B>Date of Joining</B><br/>
                                    	<input type="date" name="jdate">
                                    </div>
                                    <button type="submit" name="submit" class="btn btn-default">Add</button>
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