<?php 
ob_start();
session_start();
$conn = mysqli_connect("localhost", "root", "", "blog");
if(isset($_POST["submit"])) {
    $email = trim($_POST['email']);
    $password = $_POST['password'];
    $errors=[];

    //validation  required|string|maxlengnth255
    if (empty($email)) {
        $errors[] = "email is required";
    } elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
        $errors[] = "email must be valid";
    } elseif (strlen($email) > 255) {
        $errors[] = "email must be lessthan 255";
    }
    if (empty($password)) {
        $errors[] = "password is required";
    } elseif (!is_string($password)) {
        $errors []= "password must be string";
    }

    //db
    if(empty($errors)){
        $query="SELECT * FROM users WHERE email='$email'";
        $result=mysqli_query($conn,$query);
        if(mysqli_num_rows($result)==1){
            $user=mysqli_fetch_assoc($result);
            $islogin=password_verify($password,$user['password']);
            if($islogin){
            $_SESSION['islogin']=true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name'];
            $_SESSION['user_email'] = $user['email'];
            header("Location:index.php");
            die();
            }else{
                $_SESSION['errors']="credential is not correct";
            }
        }else{
            $_SESSION['errors']="credential is not correct";
        }
    }else{
        $_SESSION['errors']=$errors;
    }
}
header("Location:login.php");