<?php
require "header.php";
if(!isset($_SESSION["userId"]))
  header("Location: login.php");
if(isset($_POST["inputEmail"]))
{
$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
if ($conn->connect_error)
  die("Connection failed: " . $conn->connect_error);
$query="select status from credentials where email='".$_POST["inputEmail"]."'";
$result=$conn->query($query);
if($row = $result->fetch_assoc())
  {
    if($row["status"]==0)
      $message="Email is already suspended";
    else
      {
        $query="update credentials set status=0 where email='".$_POST["inputEmail"]."'";
        if($conn->query($query))
          $message="Credentials suspended";
        else
          $message="Could not suspend credentials, unknown error.";
      }
  }
else
  $message="Email not found";
$conn->close();
}
else
  $message="";

if(isset($_POST["inputEmail2"]))
{
$conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
if ($conn->connect_error)
  die("Connection failed: " . $conn->connect_error);
$query="select status from credentials where email='".$_POST["inputEmail2"]."'";
$result=$conn->query($query);
if($row = $result->fetch_assoc())
  {
    if($row["status"]==1)
      $message2="Email is already active";
    else
      {
        $query="update credentials set status=1 where email='".$_POST["inputEmail2"]."'";
        if($conn->query($query))
          $message2="Credentials activated";
        else
          $message2="Could not activate credentials, unknown error.";
      }
  }
else
  $message2="Email not found";
$conn->close();
}
else
  $message2="";

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
                Suspend Credentials
              </div>
              <div class="panel-body">
                <div class="row">                  
                  <div class="col-lg-6">
                    <form action="" method="POST">
                      <div class="form-group">                        
                        <?php if(strcmp($message,"")!=0) { ?><div class="d-block small" style="color: blue"> <?php echo $message."</div>";} ?>
                        <label>Please enter the email id to suspend:</label>
                        <input type="email" class="form-control" placeholder="Enter email id" name="inputEmail" autofocus required><br>
                        <button type="submit" class="btn btn-default">Suspend Credentials</button>
                      </div>                    
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <div class="panel panel-default">              
              <div class="panel-heading">
                Reinstate Credentials
              </div>
              <div class="panel-body">
                <div class="row">                  
                  <div class="col-lg-6">
                    <form action="" method="POST">
                      <div class="form-group">                        
                        <?php if(strcmp($message2,"")!=0) { ?><div class="d-block small" style="color: blue"> <?php echo $message2."</div>";} ?>
                        <label>Please enter the email id to reinstate:</label>
                        <input type="email" class="form-control" placeholder="Enter email id" name="inputEmail2" required><br>
                        <button type="submit" class="btn btn-default">Reinstate Credentials</button>
                      </div>                    
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>

</html>
