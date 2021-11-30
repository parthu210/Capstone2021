<?php
session_start();


if(! isset($_SESSION['name'],$_SESSION['password']))
{
	header('location:admin_login.php');
}

//database connection
include('db_connection.php');
include('nav.html');

$i=$_SESSION['id'];

$record=mysqli_query($db,"select * from admin where id_admin=$i");

$r = mysqli_fetch_row($record);

$_SESSION['name']=$r[1];
$name=$_SESSION['name'];

?>

<body background="back.jpg">
<div class="container pt-5">
    <div class="card" style="margin-top: 1%;">
        <div class="card-body">
        	<div class="display-4 text-center">
            <img src='Logo1.png' height='300px' width='300px' style='border-radius: 100%;' />
            Welcome <?= $_SESSION['name']; ?>
            </div>
            <p class="text-center mt-5">
                <a href="logout.php" class="btn btn-danger" style="width: 150px;">Logout</a>
        </div>
    </div>
</div>
</body>
