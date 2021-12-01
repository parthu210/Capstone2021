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

$i=$_GET['id_bookings'];
$_SESSION['id_bookings']=$i;
$id = $_SESSION['id_bookings'];

$record=$db->query("SELECT * FROM bookings JOIN venues ON bookings.venue = venues.id_venues WHERE id_bookings=$i");

while($r=$record->fetch_assoc()):

$_SESSION['firstname']=$r['firstname'];
$firstname=$_SESSION['firstname'];

$_SESSION['lastname']=$r['lastname'];
$lastname=$_SESSION['lastname'];

$_SESSION['email']=$r['email'];
$email=$_SESSION['email'];

$_SESSION['contact']=$r['contact'];
$contact=$_SESSION['contact'];

$_SESSION['eventtype']=$r['eventtype'];
$eventtype=$_SESSION['eventtype'];

$_SESSION['datetime']= date("Y-m-d H:i",strtotime($r['datetime']));
$datetime=$_SESSION['datetime'];

$_SESSION['duration']=$r['duration'];
$duration=$_SESSION['duration'];

$_SESSION['event_description']=$r['event_description'];
$description=$_SESSION['event_description'];

$_SESSION['venue']=$r['venue'];
$venue=$_SESSION['venue'];

$_SESSION['name']=$r['name'];
$name=$_SESSION['name'];

//echo $name;

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
      <div class="panel-heading" style="text-align:center;background-color: cadetblue">New Entry  </div>
      <div class="row justify-content-center">

	<div><?= $error; ?></div>
	<form  _lpchecked="2" action="booking_update.php" method="post">

		<!--name textbox -->
		<div class="form-group">
			<label for="fname"class="control-label">First Name</label>
			<input type="text" name="fname" pattern="[A-Za-z]+" class="form-control" value="<?= $_SESSION['firstname'] ?>" > 
		</div>
    <!--address textbox -->
		<div class="form-group">
			<label for="lname" class="control-label">Last Name</label>
			<input type="text" name="lname" pattern="[A-Za-z]+" class="form-control" value="<?= $_SESSION['lastname'] ?>" > 
		</div>

    <!--description textbox -->
		<div class="form-group">
			<label for="email" class="control-label">Email</label>
			<input type="email" name="email" class="form-control" value="<?= $_SESSION['email'] ?>" > 
		</div>

	    <!-- rate  -->
      <div class="form-group">
        <label for="contact"class="control-label">Contact Number <i><small>For Example, 226-808-3435 </small></i></label>
        <input type="tel" name="contact" pattern="[0-9]{3}-[0-9]{3}-[0-9]{4}" class="form-control" value="<?= $_SESSION['contact'] ?>">
      </div>

      <!-- rate  -->
      <div class="form-group">
        <label for="event_type" class="control-label">Event Type <i><small>For example, Wedding, Birthday</small></i></label>
        <input type="text" name="event_type"  class="form-control" value="<?= $_SESSION['eventtype'] ?>">
      </div>

      <div class="form-group">
        <label for="date_time" class="control-label" >Date And Time</label>
        <input type="text" name="date_time"  class="form-control" value="<?= $_SESSION['datetime'] ?>">
      </div>

      <div class="form-group">
        <label for="duration" class="control-label">Duration <i><small>For example, 3 Hours, 2 Days</small></i></label>
        <input type="text" name="duration" value="<?= $_SESSION['duration'] ?>" class="form-control">
      </div>
      
      <div class="form-group">
        <label for="description" class="control-label">Description</label>
        <textarea type="text" name="description" cols="30" rows="5" class="form-control"><?php echo htmlspecialchars($description); ?></textarea>
      </div>

      <!--Venue textbox -->
    <div class="form-group">
							<label for="" class="control-label">Venue</label>
							<select name="venue" value="<?= $_SESSION['name'] ?>" class="custom-select select2" > 
								<option value="<?php echo $venue ?>" > <?php echo $name ?> </option>
                                <?php
									$event_venue = $db->query("SELECT * FROM venues");
									while($row=$event_venue->fetch_assoc()):
								?>
									<option value="<?php echo $row['id_venues'] ?>" > <?php echo ucwords($row['name']) ?> </option>
								<?php endwhile; ?>
							</select>
					</div>
			
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

