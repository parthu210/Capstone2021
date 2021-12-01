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
      <div class="panel-heading" style="text-align:center;background-color: cadetblue">New Entry</div>
      <div class="row justify-content-center">

	<div><?= $error; ?></div>
	<form  _lpchecked="2" action="venue_db.php" method="post" enctype="multipart/form-data">

		<!--name textbox -->
		<div class="form-group">
			<label for="venue" class="text">Venue</label>
			<input type="text" name="venue" class="form-control" placeholder="Enter Venue" required> 
		</div>

    <!--address textbox -->
		<div class="form-group">
			<label for="address" class="control-label">Address</label>
			<input type="text" name="address" class="form-control" cols="30" rows="5" placeholder="Enter Address" required> 
		</div>

    <!--description textbox -->
		<div class="form-group">
			<label for="description" class="control-label">Short Description</label>
			<textarea type="text" name="description" class="form-control" cols="30" rows="5" placeholder="Enter a short description about venue" required> </textarea>
		</div>

	    <!-- rate  -->
      <div class="form-group">
        <label for="rate" class="control-label">Rate Per Hour</label>
        <input type="number" name="rate"  class="form-control text-right" step="any" value="<?php echo isset($rate) ? $rate :0 ?>" required>
      </div>

      <!-- rate  -->
      <div class="form-group">
        <label for="rate" class="control-label">Audiance Capacity</label>
        <input type="number" name="capacity"  class="form-control text-right" step="any" value="<?php echo isset($capacity) ? $capacity :0 ?>" required>
      </div>

         <!-- event banner -->
      <label for="image" class="control-label">Upload Venue Image</label>
      <div class="custom-file">
        <!-- MAX FILE SIZE -->
        <input type="hidden" name="MAX_FILE_SIZE" value="2048000">
        <!-- Image selection -->
        <input type="file" accept="image/*" class="custom-file-input" name="venue_image" id="venue_picture">
        <label class="custom-file-label" for="venue_image">Select banner image</label>
        <p class="text"><?= $image_msg; ?></p>
      </div><br><br><br>

      <!-- Submit and reset-->
      <div class="row">
    <div class="col-sm-12 text-center">
        <button type="submit" value="Save" name="submit"class="btn btn-success btn-md">Submit</button>
        <button type="reset" value="Reset" name="reset"class="btn btn-danger btn-md">Reset</button>
     </div>
       	</form>
</div>
</div>
</div>
</div>

