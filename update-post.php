<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "blog");
if (isset($_POST["submit"])) {
    $id=$_POST['id'];
    $title = trim(htmlspecialchars($_POST['title']));
    $body = trim(htmlspecialchars($_POST['body']));
    $errors=[];

    //validation  required|string|maxlengnth255
    if (empty($title)) {
        $errors[] = "title is required";
    } elseif (!is_string($title)) {
        $errors []= "title must be string";
    } elseif (strlen($title) > 255) {
        $errors[] = "title must be lessthan 255";
    }
    if (empty($body)) {
        $errors = "body is required";
    } elseif (!is_string($body)) {
        $errors[] = "body must be string";
    }
  
    if (empty($errors)) {
        //insert DB


        $query = "UPDATE posts SET title='$title',body='$body'WHERE id=$id";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("location:index.php");
        }
        else{
            $_SESSION['errors']=["error occurred p;ease,try again"];
            header("location:edit-post.php?id=$id");
        }
    }else{
        $_SESSION['errors']=$errors;
        header("location:edit-post.php?id=$id");
    }
}
