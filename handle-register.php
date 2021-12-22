<?php
$conn=mysqli_connect("localhost","root","","blog");
session_start();
if(isset($_POST['submit']))
{
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING );
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL );
    $password = password_hash(filter_var($_POST['password'], FILTER_SANITIZE_STRING), PASSWORD_DEFAULT );

    $query="INSERT INTO `users`( `name`, `email`, `password`, `created_at` ) VALUES ('$name','$email','$password','')";
    $result = mysqli_query($conn, $query);

    if($result){

        $_SESSION['success'] = "Data Inserted";
        header("location:login.php");
        die();
        
    }else{
        $_SESSION['errors']="data is wrong";
    }

}
 header("location:register.php");

?>
