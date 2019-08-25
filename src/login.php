<?php
require "header.php";
session_unset();
$error=0;
if(isset($_POST['exampleInputEmail1']) || isset($_POST['exampleInputPassword1']))
  {
    $email=$_POST['exampleInputEmail1'];
  	$pass=$_POST['exampleInputPassword1'];
  	$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
		if ($conn->connect_error)
			die("Connection failed: " . $conn->connect_error);
		$query="select * from credentials where email='".$email."'";
		$result=$conn->query($query);
		while($row = $result->fetch_assoc())
		{
			if(strcmp($row["password"],$pass)==0)
			{
         $_SESSION["userId"]=$row["userId"];
         if(strcasecmp($row["role"],"admin")==0)
           header("Location: dashboardAdmin.php");
         elseif(strcasecmp($row["role"],"student")==0)
           header("Location: dashboardStudent.php");
         else
           header("Location: dashboardFaculty.php");
			}
		}
    $error=1;
		$conn->close();
  }
?>

<html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <meta name="description" content="">
    <meta name="author" content="">
    <title>AES - Assignment Evaluation System</title>

    <!-- Bootstrap core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template -->
    <link href="../css/sb-admin.css" rel="stylesheet">

  </head>

  <body class="bg-dark">

    <div class="container">

      <div class="card card-login mx-auto mt-5">
        <div class="card-header">
          Login
        </div>
        <div class="card-body">
          <form action="" method="POST">
            <div class="text-center">
              <?php
              if ($error==1) {
              ?>
              <div class="d-block small" style="color: red">Invalid credentials, Please try again.</div>
              <?php } ?>
            </div>
            <div class="form-group">
              <label for="exampleInputEmail1">Email address</label>
              <input type="email" class="form-control" name="exampleInputEmail1" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Email" autofocus required>
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" class="form-control" name="exampleInputPassword1" id="exampleInputPassword1" placeholder="Password" required>
            </div>
            <input type="submit" class="btn btn-primary btn-block" value="Login">
          </form>
          <div class="text-center">
            <a class="d-block small" href="forgotPassword.php">Forgot Password?</a>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/popper/popper.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

  </body>

</html>
