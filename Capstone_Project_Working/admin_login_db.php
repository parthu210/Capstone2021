<?php
session_start();


//database connection
include('db_connection.php');


if(isset($_POST['login-submit']))
{
    $uname = $_POST['uname'];
    $password = md5($_POST['password']);

    $_SESSION['uname'] = $uname;
    $_SESSION['password'] = $password;

    if(! mysqli_connect_errno()) {

        // Check username 
        $sql = "SELECT * FROM admin WHERE username = '$uname'";
        
        $query = mysqli_query($db, $sql);
        
        $user = mysqli_fetch_assoc($query);

        // Check password
        $sqlp = "SELECT * FROM admin WHERE password = '$password'";
        
        $queryp = mysqli_query($db, $sqlp);
        
        $userp = mysqli_fetch_assoc($queryp);


        if($user && $userp) 
        {
            
            $_SESSION['name'] = $user['name'];

            $_SESSION['id'] = $user['id_admin'];

            header('Location: home.php');

        } 
        elseif(empty($user))
        {
            $_SESSION['error']  = 'Invalid Username!';
            header('Location: admin_index.php');     
        }
        elseif(empty($userp))
        {
            $_SESSION['error']  = 'Invalid Password!';
            header('Location: admin_index.php');     
        }

    }
 
}
?>
