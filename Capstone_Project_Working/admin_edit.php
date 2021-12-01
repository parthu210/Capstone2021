<?php

session_start();

//database connection
include('db_connection.php'); 
include('nav.html');

//code for error message
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

//validation
/*if(isset($_POST['update-submit']))
{
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
     
    if($password !== $confirm_password )
    {
        //if dosn't match prints an error at the top of registration form
        $_SESSION['error'] = 'Password and confirm password dose not match!';
        header('Location: admin_edit.php');
    }
}*/

$i=$_GET['id_admin'];
$_SESSION['id_admin']=$i;
$id = $_SESSION['id_admin'];

$record=mysqli_query($db,"select * from admin where id_admin=$i");

$r = mysqli_fetch_row($record);

$_SESSION['name']=$r[1];
$name=$_SESSION['name'];

$_SESSION['username']=$r[2];
$username=$_SESSION['username'];


$_SESSION['password']=$r[2];
$password=$_SESSION['password'];


$_SESSION['type']=$r[4];
$type=$_SESSION['type'];


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
    <form  _lpchecked="2" action="admin_update.php" method="post" enctype="multipart/form-data">

      <!--name textbox -->
      <div class="form-group">
        <label for="name" class="control-label">Name</label>
        <input type="text" name="name" pattern="[A-Za-z]+" class="form-control" placeholder="Enter Name" value="<?= $_SESSION['name'] ?>" required> 
      </div>

      <!--address textbox -->
      <div class="form-group">
        <label for="uname" class="control-label">Username</label>
        <input type="text" name="uname" class="form-control" placeholder="Enter Username" value="<?= $_SESSION['username'] ?>" required> 
      </div>

      <!--description textbox -->
      <div class="form-group">
        <label for="password" class="control-label">Password</label>
        <input type="password" name="password" class="form-control"  placeholder="Enter Password"> 
      </div>

      <!-- Confirm Password -->
      <div class="form-group">
          <label for="confirm-password" class="control-label">Confirm password *</label>
          <input type="password" name="confirm-password" id="confirm-password" class="form-control" placeholder="Confirm your password">
        </div>

        <!-- rate  -->
        <div class="form-group">
          <label for="rate" class="control-label">Admin Type</label>
          <select name="type" id="type" class="custom-select" >
          <option value="<?php echo $type ?>" > <?php echo $type ?> </option>
          <option value="Artist" >Artist</option>
          <option value="Admin" >Admin</option>
        </select>
        </div>
<div class="row">
    <div class="col-sm-12 text-center">
        <button type="submit" value="Update" name="update-submit" class="btn btn-success btn-md">Update</button>
        <button type="reset" value="Reset" name="reset" class="btn btn-danger btn-md">Reset</button>
     </div>
          </form>
  </div>
  </div>
  </div>
  </div>

