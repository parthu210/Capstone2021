<?php 
include('db_connection.php');
include('nav.html');

?>

<?php

session_start();

$error = '';

$image_msg = 'Aspect Ratio : (1:1) , Square Maximum Size : 2Mb';

if(! empty($_SESSION['error'])) {
    $error = "
        <div class='alert alert-danger'>
            <h6 class='mt-2'>" . $_SESSION['error'] . "<h6>
        </div>
    ";
    $_SESSION['error'] = '';
}

?>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<style>
   form{
   	width:50%;
	margin:50px 25%;
   }
  input{
  width:100%;
  }
</style>
<br>
<div class="container">
<div class="panel panel-primary">
      <div class="panel-heading" style="text-align:center;background-color: cadetblue">New Admin Entry  </div>
      <div class="row justify-content-center">
	<div><?= $error; ?></div>
	<form  _lpchecked="2" action="admin_db.php" method="post" enctype="multipart/form-data">
    <!--Name -->
  <div class="form-group" >
                  <label for="name"class="control-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name" placeholder="" required>
               </div>
               <!--User Name -->
               <div class="form-group" >
                  <label for="uname"class="control-label">Username</label>
                  <input type="text" class="form-control" id="uname" name="uname" placeholder="" required>
               </div>
               <!--Password -->
               <div class="form-group" >
                  <label for="password"class="control-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="" required>
               </div>
               <!--Confirm Password -->
               <div class="form-group" >
                  <label for="confirm-password"class="control-label">Confirm Password*</label>
                  <input type="password" class="form-control" id="confirm-password" name="confirm-password" placeholder="" required>
               </div>
<!-- Admin type selection  -->
<div class="form-group">
        <label for="rate" class="control-label" class="text">Admin Type</label>
        <select name="type" class="form-control" id="type" class="custom-select" required>
				<option value="Artist" >Artist</option>
				<option value="Admin" >Admin</option>
			</select>
      </div> 
<div class="row">
    <div class="col-sm-12 text-center">
        <button type="submit" value="Save" name="submit" class="btn btn-success btn-md">Submit</button>
        <button type="reset" value="Reset" name="reset" class="btn btn-danger btn-md">Reset</button>
     </div>
</div>
</div>
</div>
</div>
