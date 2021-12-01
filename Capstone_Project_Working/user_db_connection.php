<?php

//Database connection
$db=mysqli_connect("localhost","root","","event_management");

if(!$db){
    die("Connection to database failed: " .mysqli_connect_error());
}

?>
