<?php
session_start();

//database connection
include('db_connection.php'); 

    $id = $_SESSION['id_event'];
    $event = $_POST['event'];
    $schedule = $_POST['schedule'];
    $venue = $_POST['venue_id'];
    $description = $_POST['description'];

    //check database connection
    if(! mysqli_connect_errno()) {

            $u=mysqli_query($db,"update events set event='$event',schedule='$schedule',venue='$venue',eve_description='$description',id_venues='$venue' where id_event='$id' ");

            if($u)
            {
                echo"<script>location='event_table.php'</script>";
            }
        }

    else{
        die("Connection to database failed: " .mysqli_connect_error());
    }
?>