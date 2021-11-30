<?php

session_start();
//database connection
include('db_connection.php'); 

    $id = $_GET['id_admin'];

    $u=mysqli_query($db,"delete from admin where id_admin=$id");

	if($u)
	{
		echo"<script>location='admin_table.php'</script>";
	}
?>