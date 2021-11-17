<?php

session_start();

//database connection
include('db_connection.php');

//check if field is empty or not
if(isset($_POST['submit']))
{
    //get data
    $event = $_POST['event'];
    $schedule = $_POST['schedule'];
    $venue = $_POST['venue_id'];
    $description = $_POST['description'];
    $eimage=$_FILES['event_image'];
    
//check database connection
if(! mysqli_connect_errno()) {

    //use fo uplode a file in tmp-file.
    if(is_uploaded_file($eimage['tmp_name']))
    {  //move the image from tmp-file file.
        move_uploaded_file($eimage['tmp_name'],"images/".time()."test.png");
        $image = 'images/' .time(). 'test.png';
        
    }

    //enter data in to database
    $insert=mysqli_query($db,"insert into venues(schedule,venue,description,banner) values ('$schedule','$venue','$description','$image')");
    if($insert)
    {
        echo"New event inserted successfuly";
    }

}

    
}

$db->close();

?>
