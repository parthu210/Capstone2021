<?php include('db_connection.php');?>

<?php

session_start();

$error = '';


// if(! empty($_SESSION['error'])) {
//     $error = "
//         <div class='alert alert-danger'>
//             <h6 class='mt-2'>" . $_SESSION['error'] . "<h6>
//         </div>
//     ";
//     $_SESSION['error'] = '';
// }

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/momentjs/2.14.1/moment.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script
   src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet"
   href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.37/css/bootstrap-datetimepicker.min.css">
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
      <div class="panel-heading">Schedule an Event</div>

         <div class="row justify-content-center">
         <div><?= $error; ?></div>
            <form _lpchecked="2" action="insert_booking.php" method="post" enctype="multipart/form-data">
               <div class="form-group" >
                  <label class="control-label">First Name</label>
                  <input type="text" class="form-control" id="fname" name="fname" placeholder="" required>
               </div>
               <div class="form-group" >
                  <label class="control-label">Last Name</label>
                  <input type=" text" class="form-control" id="lname" name="lname" placeholder="" required>
               </div>
               <div class="form-group" >
                  <label class="control-label">Contact No</label>
                  <input type=" tel" class="form-control" id="tel" name="tel" placeholder="" required>
               </div>
               <div class="form-group" >
                  <label class="control-label">Email</label>
                  <input type=" email" class="form-control" id="email" name="email" placeholder="" required>
               </div>
               <div class="form-group" >
                  <label class="control-label">Event Date</label>

                  <input type="datetime-local" id="Test_DatetimeLocal" name="Test_DatetimeLocal" class="form-control"
                     placeholder="" required>
               </div>
               <div class="form-group" >

                  <label class="control-label">Duration </label>
                  <input type="hour" id="customDays" name="customDays" class="form-control" placeholder="Hours" />
               </div>
               <div>
                  <input type="submit" class="btn btn-primary" value="Submit"
                     >
               </div>
            </form>
         

      </div>

   </div>

</div>
