<?php
session_start();

//database connection
include('db_connection.php'); 

    $id = $_SESSION['id_venues'];
    $name = $_POST['venue'];
    $address = $_POST['address'];
    $description = $_POST['description'];
    $rate = $_POST['rate'];
    $capacity = $_POST['capacity'];

    //check database connection
    if(! mysqli_connect_errno()) {

            $u=mysqli_query($db,"update venues set name='$name',address='$address',description='$description',rate='$rate',capacity='$capacity' where id_venues='$id' ");

            if($u)
            {
                echo"<script>location='venue_table.php'</script>";
            }
        }

    else{
        die("Connection to database failed: " .mysqli_connect_error());
    }
?>