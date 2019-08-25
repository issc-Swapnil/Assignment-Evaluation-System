<?php
require "header.php";
if(!isset($_SESSION["userId"]))
	header("Location: login.php");
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
                    	Add Student
                    </div>
                    <div class="panel-body">
                    	<div class="row">
                        	<div class="col-lg-6">
                            	<form method="POST" action="" enctype="multipart/form-data">
                                	<div class="form-group">
                                		<b>Import Excel File</b><br/>
                                    	<input name="inputFile" type="file">
                                    </div>
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

      </div>
      
      

    </div>
    <!-- /.content-wrapper -->

  </body>

</html>
