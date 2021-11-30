<?php

session_start();

//database connection
include('db_connection.php');

//check if field is empty or not
if(isset($_POST['submit']))
{
    //get data
    $venue = $_POST['venue'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $rate = $_POST['rate'];
    $capacity= $_POST['capacity'];
    $vimage= $_FILES['venue_image'];
    
    
//check database connection
if(! mysqli_connect_errno()) {

    
    //use fo uplode a file in tmp-file.
    if(is_uploaded_file($vimage['tmp_name']))
    {  //move the image from tmp-file file.
        move_uploaded_file($vimage['tmp_name'],"user/images/".time()."test.png");
        $image = 'user/images/' .time(). 'test.png';
        
    }

    //enter data in to database
    $insert=mysqli_query($db,"insert into venues(name,address,description,rate,capacity,venue_image) values ('$venue','$address','$description','$rate','$capacity','$image')");
    if($insert)
    {
        echo"New venue inserted successfuly";
    }

}

    
}

?>
