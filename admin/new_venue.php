<?php include('db_connection.php');?>

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

<div class="container" style="margin-top: 50px;">
<div id="flex-container" class="d-flex justify-content-center align-self-center">
<div class="card shadow-sm col-5 back-img">
<div class="card-body">

	<p class="h4 text-center text">New Entry</p>
	<div><?= $error; ?></div>
	<form action="insert_venue.php" method="post" enctype="multipart/form-data">

		<!--name textbox -->
		<div class="form-group">
			<label for="venue" class="text">Venue</label>
			<input type="text" name="venue" class="form-control" placeholder="Enter Venue" required> 
		</div>

    <!--address textbox -->
		<div class="form-group">
			<label for="address" class="text">Address</label>
			<input type="text" name="address" class="form-control" cols="30" rows="5" placeholder="Enter Address" required> 
		</div>

    <!--description textbox -->
		<div class="form-group">
			<label for="description" class="text">Short Description</label>
			<input type="text" name="description" class="form-control" cols="30" rows="5" placeholder="Enter a short description about venue" required> 
		</div>

	    <!-- rate  -->
      <div class="form-group">
        <label for="rate" class="text">Rate Per Hour</label>
        <input type="number" name="rate"  class="form-control text-right" step="any" value="<?php echo isset($rate) ? $rate :0 ?>" required>
      </div>

      <!-- rate  -->
      <div class="form-group">
        <label for="rate" class="text">Audiance Capacity</label>
        <input type="number" name="capacity"  class="form-control text-right" step="any" value="<?php echo isset($capacity) ? $capacity :0 ?>" required>
      </div>

        <!-- Venue Picutre -->
      <label for="image" class="text">Upload Venue Image</label>
      <div class="custom-file">
        <!-- MAX FILE SIZE -->
        <input type="hidden" name="MAX_FILE_SIZE" value="2048000">
        <!-- Image selection -->
        <input type="file" accept="image/*" class="custom-file-input" name="venue_image" id="venue_picture">
        <label class="custom-file-label" for="venue_image">Select venue image</label>
        <p class="text"><?= $image_msg; ?></p>
      </div><br><br><br>

      <!-- Submit -->
      <input type="submit" value="Save" name="submit" class="btn btn-success" style="width: 150px;">
      <!-- Reset -->
      <input type="reset" value="Reset" name="reset" class="btn btn-danger float-right" style="width: 150px;">
       	</form>
</div>
</div>
</div>
</div>

