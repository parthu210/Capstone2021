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

<div class="container" style="margin-top: 50px;">
<div id="flex-container" class="d-flex justify-content-center align-self-center">
<div class="card shadow-sm col-5 back-img">
<div class="card-body">

    <p class="h4 text-center text">Admin Login</p>
	<div><?= $error; ?></div>
	<form action="admin_login_db.php" method="post" enctype="multipart/form-data">

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

      <!-- Submit -->
      <input type="submit" value="Submit" name="login-submit" class="btn btn-success" style="width: 150px;">
      <!-- Reset -->
      <input type="reset" value="Reset" name="reset" class="btn btn-danger float-right" style="width: 150px;">
      
       	</form>
</div>
</div>
</div>
</div>

