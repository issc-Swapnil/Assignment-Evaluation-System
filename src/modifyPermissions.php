<?php
require "header.php";
if(!isset($_SESSION["userId"]))
  header("Location: login.php");
$error=0;
$status=0;
$per=0;
if(isset($_POST["inputEmail"]))
  {
    $email=$_POST["inputEmail"];
    $conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
    if ($conn->connect_error)
      die("Connection failed: " . $conn->connect_error);
    $query="select status,permissions from credentials where email='".$email."'";
    $result=$conn->query($query);
    if($row = $result->fetch_assoc())
    {
      if($row["permissions"]==0)
        $error=1;
      else
        {
          $status=$row["status"];
          $per=$row["permissions"];
        }
    }
    else
      $error=1;
    $conn->close();
  }
elseif(isset($_POST["submit"]))
  {
    $status=1;
    $per=$_POST["hiddenPer"];
    $b=isset($_POST["Basic"]);
    $m=isset($_POST["ModMark"]);
    $v=isset($_POST["ViewRep"]);
    if(($m && !$b) || (!$b && !$m && !$v))
      $error=2;
    else
    {
      if($b)
      {
        if($m)
        {
          if($v)
            $per=4;
          else
            $per=2;
        }
        else
        {
          if($v)
            $per=5;
          else
            $per=1;
        }
      }
      else
        $per=3;
      $conn = mysqli_connect($hostdb ,$userdb ,$passdb ,$database);
      if ($conn->connect_error)
        die("Connection failed: " . $conn->connect_error);
      $query="update credentials set permissions=".$per." where email='".$_POST['hiddenEmail']."'";
      $conn->query($query);
      $error=3;
      $per=0;
      $conn->close();
    }
  }
require "navigationAdmin.php";
?>

<html>

  <body>

    <div class="content-wrapper">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <?php
            if($per==0)
            {
            ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                Modify Permissions
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-6">
                    <form method="POST" action="">
                      <div class="form-group">
                        <label>Please enter the email id to modify permissions for:</label>
                        <input type="email" class="form-control" placeholder="Enter email id" name="inputEmail" autofocus required><br>
                        <button type="submit" class="btn btn-default">Modify Permissions</button>
                        <?php if($error==1) { ?>
                        <div class="d-block small" style="color: red">Invalid email</div>
                        <?php } elseif($error==3) { ?>
                        <div class="d-block small" style="color: green">Modification Successful</div> <?php } ?>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php } else { ?>
            <div class="panel panel-default">
              <div class="panel-heading">
                Modify Permissions
              </div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-lg-6">
                    <form method="POST" action="">
                      <div class="form-group">
                        <?php if($status==0) { ?>
                        <fieldset disabled>
                        <div class="checkbox">
                          <input type="checkbox" name="Basic" value="Basic">Basic Subinstructor Permissions
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="ModMark" value="ModMark"> Modify Marks
                        </div>
                        <div class="checkbox">
                          <input type="checkbox" name="ViewRep" value="ViewRep"> View Reports
                        </div><br/>
                        <button type="submit" name="submit" class="btn btn-default"> Modify Permissions</button>
                        </fieldset>
                        <div class="d-block small" style="color: red"> Account is suspended. Please reactivate to modify.</div>
                        <?php } else { if($per==1 || $per==2 || $per==4 || $per==5) { ?>
                        <div class="checkbox">
                          <input type="checkbox" name="Basic" value="Basic" checked> Basic Subinstructor Permissions
                        </div>
                        <?php } else { ?>
                        <div class="checkbox">
                          <input type="checkbox" name="Basic" value="Basic"> Basic Subinstructor Permissions
                        </div>
                        <?php } if($per==2 || $per==4) { ?>
                        <div class="checkbox">
                          <input type="checkbox" name="ModMark" value="ModMark" checked> Modify Marks
                        </div>
                        <?php } else { ?>
                        <div class="checkbox">
                          <input type="checkbox" name="ModMark" value="ModMark"> Modify Marks
                        </div>
                        <?php } if($per==3 || $per==4 || $per==5) { ?>
                        <div class="checkbox">
                          <input type="checkbox" name="ViewRep" value="ViewRep" checked> View Reports
                        </div>
                        <?php } else { ?>
                        <div class="checkbox">
                          <input type="checkbox" name="ViewRep" value="ViewRep"> View Reports
                        </div>
                        <?php } ?>
                        <input type="hidden" name="hiddenEmail" value="<?php echo $email ; ?>">
                        <input type="hidden" name="hiddenPer" value="<?php echo $per ; ?>">
                        <br/><button type="submit" name="submit" class="btn btn-default">Modify Permissions</button>
                        <?php if($error==2) { ?>
                        <div class="d-block small" style="color: red">Invalid selection</div>
                        <?php } } ?>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>
            <?php } ?>

          </div>
        </div>
      </div>
    </div>
    <!-- /.content-wrapper -->
  </body>

</html>
