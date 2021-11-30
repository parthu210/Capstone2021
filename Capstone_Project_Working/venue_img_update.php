<?php
session_start();

//database connection
include('db_connection.php'); 

    $id = $_SESSION['id_venues'];
    
    $c=$_FILES['venue_image'];

        //use fo uplode a file in tmp-file.
        if(is_uploaded_file($c['tmp_name']))
        {  //move the image from tmp-file file.
            move_uploaded_file($c['tmp_name'],"images/".time()."test.png");
            $image = 'images/' .time(). 'test.png';
            
        }
    
    $u=mysqli_query($db,"update venues set venue_image='$image' where id_venues='$id' ");

	if($u)
	{
		echo"<script>location='venue_table.php'</script>";
	}

?>