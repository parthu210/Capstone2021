<?php
session_start();

//database connection
include('db_connection.php'); 

    $id = $_SESSION['id_admin'];
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $password = md5($_POST['password']);
    $type = $_POST['type'];

    //check database connection
    if(! mysqli_connect_errno()) {

            $u=mysqli_query($db,"update admin set name='$name',username='$uname',password='$password',admin_type='$type' where id_admin='$id' ");

            if($u)
            {
                echo"<script>location='admin_table.php'</script>";
            }
                    
        }

    else{
        die("Connection to database failed: " .mysqli_connect_error());
    }
    

?>