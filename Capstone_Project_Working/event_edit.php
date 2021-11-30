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

$i=$_GET['id_event'];
$_SESSION['id_event']=$i;
$id = $_SESSION['id_event'];

$record=mysqli_query($db,"SELECT * FROM events JOIN venues ON events.id_venues = venues.id_venues WHERE id_event=$i");

while($r=$record->fetch_assoc()):

$_SESSION['event']=$r['event'];
$event=$_SESSION['event'];

$_SESSION['schedule']= date("Y-m-d H:i",strtotime($r['schedule']));
$schedule=$_SESSION['schedule'];


$_SESSION['name']=$r['name'];
$v_name=$_SESSION['name'];

$_SESSION['id_venues']=$r['id_venues'];
$id_venues=$_SESSION['id_venues'];

$_SESSION['eve_description']=$r['eve_description'];
$description=$_SESSION['eve_description'];

$_SESSION['banner']=$r['banner'];
$eimage=$_SESSION['banner'];

endwhile;
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
      <div class="panel-heading" style="text-align:center;background-color: cadetblue">Update Entry  </div>
      <div class="row justify-content-center">
	<div><?= $error; ?></div>
	<form _lpchecked="2"action="event_update.php" method="post">

		<!--name textbox -->
		<div class="form-group">
			<label for="event" class="control-label">Event</label>
			<input type="text" name="event" class="form-control" value="<?= $_SESSION['event'] ?>"> 
		</div>

    <!--schedule textbox -->
		<div class="form-group">
			<label for="schedule" class="control-label">Schedule</label>
			<input type="text" class="form-control" name="schedule" value="<?= $_SESSION['schedule'] ?>" >
		</div>

    <!--Venue textbox -->
    <div class="form-group">
							<label for="" class="control-label">Venue</label>
							<select name="venue_id" class="custom-select select2">
              <option value="<?php echo $id_venues ?>" > <?php echo $v_name ?> </option>
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
        <label for="descreption" class="control-label">Description</label>
        <textarea type="text" name="description" class="form-control" cols="30" rows="5"><?php echo htmlspecialchars($description); ?></textarea>
      </div>

      <!-- Submit -->
      <div class="row">
    <div class="col-sm-12 text-center">
        <button type="submit" value="Update" name="update-submit"class="btn btn-success btn-md">Submit</button>
        <button type="reset" value="Reset" name="reset"class="btn btn-danger btn-md">Reset</button>
     </div>
       	</form>
        <br>
        <div>
        <form action="event_img_update.php" method="post" enctype="multipart/form-data">
            <!-- event banner -->
      <label for="image" class="control-label">Change banner Image</label>
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
        <button type="submit" value="Update" name="update-submit"class="btn btn-success btn-md">Update</button>
     </div>
        </form>
        </div>
</div>
</div>
</div>
</div>

