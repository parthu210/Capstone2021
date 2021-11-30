<?php

session_start();
//database connection
include('db_connection.php'); 

    $id = $_GET['id_venues'];

    $u=mysqli_query($db,"delete from venues where id_venues=$id");

	if($u)
	{
		echo"<script>location='venue_table.php'</script>";
	}
?>