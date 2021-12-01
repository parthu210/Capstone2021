<?php include('db_connection.php');?>

<?php

session_start();

$error = '';


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
      <div class="panel-heading" style="text-align:center;background-color: cadetblue">Admin Login</div>
      <div class="row justify-content-center">

	<div><?= $error; ?></div>
	<form _lpchecked="2" action="admin_login_db.php" method="post" enctype="multipart/form-data">

    <!--address textbox -->
		<div class="form-group">
			<label for="uname" class="text">Username</label>
			<input type="text" name="uname" class="form-control" cols="30" rows="5" placeholder="Enter Username" required> 
		</div>

    <!--description textbox -->
		<div class="form-group">
			<label for="password" class="text">Password</label>
			<input type="password" name="password" class="form-control"  placeholder="Enter Password" required> 
		</div>

    <div class="row">
    <div class="col-sm-12 text-center">
    <button type="submit" value="login-submit" name="login-submit" class="btn btn-success btn-md">Login</button>
        <button type="reset" value="Reset" name="reset" class="btn btn-danger btn-md">Reset</button>
    </div>
       	</form>
</div>
</div>
</div>
</div>

