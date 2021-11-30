<?php

session_start();

//check if field is empty or not
if(isset($_POST['submit']))
{
    //get data
    $name = $_POST['name'];
    $uname = $_POST['uname'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $type = $_POST['type'];

    // check boolean variable value 
    $is_valid = 1;
     
    // ---------------------- form validation ---------------------- //
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }

    // check if name only contains letters and whitespace
    $test_name = test_input($_POST["name"]);
    $test_pass = test_input($_POST["password"]);

    if (!preg_match("/^[a-zA-Z-' ]*$/",$test_name)) 
    {
        $_SESSION['error'] = 'Enter a valid NAME!(only letters and white space are allowed.)';
        header('Location: admin_addNew.php');
        $is_valid = 0;
      }
    
    //match password and confirm password     
    elseif($password !== $confirm_password )
    {
        //if dosn't match prints an error at the top of registration form
        $_SESSION['error'] = 'Password and confirm password dose not match!';
        header('Location: admin_addNew.php');
        $is_valid = 0;
    }
 
    $pass = md5($_POST['password']);

    if($is_valid == 1 ){

        //Database connection
        $db=mysqli_connect("localhost","root","","event_management");

        if(!$db){
            die("Connection to database failed: " .mysqli_connect_error());
        }

        //check database connection
        if(! mysqli_connect_errno()) {

            // Check name
            $sql = "SELECT * FROM admin WHERE username = '$uname'";
                
            $query = mysqli_query($db, $sql);
            
            $user = mysqli_fetch_assoc($query);

            if(! empty($user)) 
            {
                $_SESSION['error'] = 'Username already registered enter a unique name!';
                header('Location: admin_addNew.php');

            }
            else{

                //enter data in to database
                $insert=mysqli_query($db,"insert into admin(name,username,password,admin_type) values ('$name','$uname','$pass','$type')");
                if($insert)
                {
                    echo"<script>location='admin_table.php'</script>";
                }
                
            }

        }

    }

    
}


?>
