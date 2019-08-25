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

        <!-- Breadcrumbs -->
        <ol class="breadcrumb">
          <li class="breadcrumb-item active">Welcome Admin!</li>
        </ol>
        
        
      </div>
      
    </div>
    <!-- /.content-wrapper -->

   
</body>
<html>