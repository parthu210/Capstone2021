<?php
session_start();

//database connection
include('db_connection.php'); 

    $id = $_SESSION['id_event'];
    
    $c=$_FILES['event_image'];

        //use fo uplode a file in tmp-file.
        if(is_uploaded_file($c['tmp_name']))
        {  //move the image from tmp-file file.
            move_uploaded_file($c['tmp_name'],"images/".time()."test.png");
            $image = 'images/' .time(). 'test.png';
            
        }
    
    $u=mysqli_query($db,"update events set banner='$image' where id_event='$id' ");

	if($u)
	{
		echo"<script>location='event_table.php'</script>";
	}

?>