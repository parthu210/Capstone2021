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
<div class="container">
<div class="panel panel-primary">
      <div class="panel-heading" style="text-align:center;background-color: cadetblue">New Entry  </div>
      <div class="row justify-content-center">
	<div><?= $error; ?></div>
	<form  _lpchecked="2" action="event_db.php" method="post" enctype="multipart/form-data">

		<!--name textbox -->
		<div class="form-group">
			<label for="event" class="control-label">Event</label>
			<input type="text" name="event" class="form-control" placeholder="Enter Event" required> 
		</div>

    <!--schedule textbox -->
		<div class="form-group">
			<label for="schedule"class="control-label">Schedule</label>
			<input type="datetime-local" class="form-control" name="schedule" placeholder="Enter Schedule" value="<?php echo isset($schedule) ? date("Y-m-d H:i",strtotime($schedule)) :'' ?>" required autocomplete="off">
		</div>

    <!--Venue textbox -->
    <div class="form-group">
							<label for="" class="control-label">Venue</label>
							<select name="venue_id" id="" class="custom-select select2" required>
								 <option value=""></option> 
								<?php
									$event_venue = $db->query("SELECT * FROM venues");
									while($row=$event_venue->fetch_assoc()):
								?>
									<option value="<?php echo $row['id_venues'] ?>" > <?php echo ucwords($row['name']) ?> </option>
								<?php endwhile; ?>
							</select>
					</div>
					
	<!-- description -->
      <div class="form-group">
        <label for="descreption"class="control-label">Description</label>
        <textarea type="text" name="description" class="form-control" cols="30" rows="5" placeholder="Enter description" required></textarea>
      </div>

        <!-- event banner -->
      <label for="image" class="control-label">Upload banner Image</label>
      <div class="custom-file">
        <!-- MAX FILE SIZE -->
        <input type="hidden" name="MAX_FILE_SIZE" value="2048000">
        <!-- Image selection -->
        <input type="file" accept="image/*" class="custom-file-input" name="event_image" id="venue_picture">
        <label class="custom-file-label" for="event_image">Select banner image</label>
        <p class="text"><?= $image_msg; ?></p>
      </div><br><br><br>

      <!-- Submit -->
      <div class="row">
    <div class="col-sm-12 text-center">
        <button type="submit" value="Save" name="submit"class="btn btn-success btn-md">Submit</button>
        <button type="reset" value="Reset" name="reset" class="btn btn-danger btn-md">Reset</button>
     </div>
       	</form>
</div>
</div>
</div>
</div>

