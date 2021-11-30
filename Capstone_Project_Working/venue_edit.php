<?php include('db_connection.php');
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

$i=$_GET['id_venues'];
$_SESSION['id_venues']=$i;
$id = $_SESSION['id_venues'];

$record=mysqli_query($db,"select * from venues where id_venues=$i");

$r = mysqli_fetch_row($record);

$_SESSION['name']=$r[1];
$venue=$_SESSION['name'];

$_SESSION['address']= $r[2];
$address=$_SESSION['address'];

$_SESSION['description']=$r[3];
$description=$_SESSION['description'];

$_SESSION['rate']=$r[4];
$rate=$_SESSION['rate'];

$_SESSION['capacity']=$r[5];
$eimage=$_SESSION['capacity'];

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
      <div class="panel-heading" style="text-align:center;background-color: cadetblue">New Entry  </div>
      <div class="row justify-content-center">
	<div><?= $error; ?></div>
	<form _lpchecked="2" action="venue_update.php" method="post">

		<!--name textbox -->
		<div class="form-group">
			<label for="venue" class="control-label">Venue</label>
			<input type="text" name="venue" class="form-control" value="<?= $_SESSION['name'] ?>" > 
		</div>

    <!--address textbox -->
		<div class="form-group">
			<label for="address" class="control-label">Address</label>
			<input type="text" name="address" class="form-control" cols="30" rows="5" value="<?= $_SESSION['address'] ?>" > 
		</div>

    <!--description textbox -->
		<div class="form-group">
			<label for="description" class="control-label">Short Description</label>
			<textarea type="text" name="description" class="form-control" cols="30" rows="5" ><?php echo htmlspecialchars($description); ?> </textarea>
		</div>

	    <!-- rate  -->
      <div class="form-group">
        <label for="rate" class="control-label">Rate Per Hour</label>
        <input type="number" name="rate"  class="form-control text-right" value="<?= $_SESSION['rate'] ?>">
      </div>

      <!-- rate  -->
      <div class="form-group">
        <label for="rate" class="control-label">Audiance Capacity</label>
        <input type="number" name="capacity"  class="form-control text-right" value="<?= $_SESSION['capacity'] ?>">
      </div>

      <!-- Submit -->
      
<div class="row">
    <div class="col-sm-12 text-center">
        <button type="submit" value="Save" name="submit"class="btn btn-success btn-md">Submit</button>
        <button type="reset" value="Reset" name="reset" class="btn btn-danger btn-md">Reset</button>
     </div>
       	</form>
           <br>
           <div>
        <form action="venue_img_update.php" method="post" enctype="multipart/form-data">
            <!-- event banner -->
      <label for="image" class="control-label">Change banner Image</label>
      <div class="custom-file">
        <!-- MAX FILE SIZE -->
        <input type="hidden" name="MAX_FILE_SIZE" value="2048000">
        <!-- Image selection -->
        <input type="file" accept="image/*" class="custom-file-input" name="venue_image" id="venue_picture">
        <label class="custom-file-label" for="venue_image">Select banner image</label>
        <p class="text"><?= $image_msg; ?></p>
      </div><br><br><br>

      <div class="row">
    <div class="col-sm-12 text-center">
        <button type="submit" value="Update" name="update-submit" class="btn btn-success btn-md">Update</button>
    </div>
      
        </form>
        </div>
</div>
</div>
</div>
</div>

