<?php

session_start();


//database connection
include('db_connection.php');

//check if field is empty or not

    echo '<script>alert("Hiii Again")</script>';
    //get data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $contact = $_POST['tel'];
    $email = $_POST['email'];
    $Test_DatetimeLocal= $_POST['Test_DatetimeLocal'];
    $customDays= $_POST['customDays'];
    
    
//check database connection
if(! mysqli_connect_errno()) {

    //use fo uplode a file in tmp-file.
    // if(is_uploaded_file($vimage['tmp_name']))
    // {  //move the image from tmp-file file.
    //     move_uploaded_file($vimage['tmp_name'],"images/".time()."test.png");
    //     $image = 'images/' .time(). 'test.png';
        
    // }

    echo "<script type='text/javascript'>alert('$Test_DatetimeLocal');</script>";
  
    //enter data in to database
    $insert=mysqli_query($db,"insert into `booked_venue`( `first name`, `last name`, `email`, `contact`, `duration`,`datetime`,`id_venues`, `id_event`) values ('$fname','$lname','$email','$contact','$customDays','$Test_DatetimeLocal',4,2);");

    
    if($insert)
    {
        //echo"New booking inserted successfuly";
        header("Location: bookedvenue_list.php");
    }
    else{
        echo"Failed";

    }

}
    
// INSERT INTO `booked_venue`( `first name`, `last name`, `email`, `contact`, `duration`,`id_venues`, `id_event`) VALUES ('ADFADAS','asjdhakjadaj','asjdhajlfay@gmail.com','1234567890','2',4,2);

?>
