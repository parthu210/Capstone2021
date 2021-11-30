<?php

session_start();
//database connection
include('db_connection.php'); 

    $id = $_GET['id_bookings'];

    $u=mysqli_query($db,"delete from bookings where id_bookings=$id");

	if($u)
	{
		echo"<script>location='bookedvenue_table.php'</script>";
	}
?>