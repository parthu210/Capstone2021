<?php

session_start();

//database connection
include('db_connection.php');

//check if field is empty or not
if(isset($_POST['submit']))
{
    //get data
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $eventtype = $_POST['event_type'];
    $datetime = $_POST['date_time'];
    $duration = $_POST['duration'];
    $description = $_POST['description'];
    $venue = $_POST['venue_id'];

    // check boolean variable value 
    $is_valid = 1;
     
    // ---------------------- form validation ---------------------- //
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    // check if name only contains letters and whitespace
    $test_fname = test_input($_POST["fname"]);
    $test_lname = test_input($_POST["lname"]);
    $valid_number = filter_var($contact, FILTER_SANITIZE_NUMBER_INT);
    $valid_number = str_replace("-", "", $valid_number);   

    if (!preg_match("/^[a-zA-Z-' ]*$/",$test_fname)) 
    {
        $_SESSION['error'] = 'Enter a valid FIRST NAME!(only letters and white space are allowed.)';
        header('Location: user_booking_addNew.php');
        $is_valid = 0;
      }
      elseif (!preg_match("/^[a-zA-Z-' ]*$/",$test_lname)) 
      {
          $_SESSION['error'] = 'Enter a valid LAST NAME!(only letters and white space are allowed.)';
          header('Location: user_booking_addNew.php');
          $is_valid = 0;
        }
       /* elseif (strlen($valid_number) < 10 || strlen($valid_number) > 14){

            $_SESSION['error'] = 'Enter a valid PHONE NUMBER';
            header('Location: user_booking_addNew.php');
            $is_valid = 0;

        } */
        
if($is_valid == 1 ){
            //check database connection
            if(! mysqli_connect_errno()) {

                //enter data in to database
                $insert=mysqli_query($db,"insert into bookings(firstname,lastname,email,contact,eventtype,datetime,duration,event_description,venue) values('$fname','$lname','$email','$contact','$eventtype','$datetime','$duration','$description','$venue')");
                if($insert)
                {
                header('location:user_book_success.php');
                }

            }
            else{
                die("Connection to database failed: " .mysqli_connect_error());
            } 
    }
}

$db->close();

?>
