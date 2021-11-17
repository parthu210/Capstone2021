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
	<form action="insert_event.php" method="post" enctype="multipart/form-data">

		<!--name textbox -->
		<div class="form-group">
			<label for="event" class="text">Event</label>
			<input type="text" name="event" class="form-control" placeholder="Enter Event" required> 
		</div>

    <!--schedule textbox -->
		<div class="form-group">
			<label for="schedule" class="text">Schedule</label>
			<input type="text" class="form-control datetimepicker" name="schedule" placeholder="Enter Schedule" value="<?php echo isset($schedule) ? date("Y-m-d H:i",strtotime($schedule)) :'' ?>" required autocomplete="off">
		</div>

    <!--Venue textbox -->
    <div class="form-group">
							<label for="" class="control-label">Venue</label>
							<select name="venue_id" id="" required="" class="custom-select select2">
								<option value=""></option>
								<?php
									$artist = $db->query("SELECT * FROM venues");
									while($row=$artist->fetch_assoc()):
								?>
									<option value="<?php echo $row['id'] ?>" <?php echo isset($venue_id) && $venue_id == $row['id'] ? "selected" : '' ?>><?php echo ucwords($row['name']) ?></option>
								<?php endwhile; ?>
							</select>
					</div>
					
	<!-- description -->
      <div class="form-group">
        <label for="descreption" class="text">Description</label>
        <input type="text" name="description" class="form-control" cols="30" rows="5" placeholder="Enter description" required>
      </div>

        <!-- event banner -->
      <label for="image" class="text">Upload banner Image</label>
      <div class="custom-file">
        <!-- MAX FILE SIZE -->
        <input type="hidden" name="MAX_FILE_SIZE" value="2048000">
        <!-- Image selection -->
        <input type="file" accept="image/*" class="custom-file-input" name="event_image" id="venue_picture">
        <label class="custom-file-label" for="event_image">Select banner image</label>
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

