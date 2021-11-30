<?php

session_start();
//database connection
include('db_connection.php'); 

    $id = $_GET['id_event'];

    $u=mysqli_query($db,"delete from events where id_event=$id");

	if($u)
	{
		echo"<script>location='event_table.php'</script>";
	}
?>