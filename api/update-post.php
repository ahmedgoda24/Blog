<?php
require_once("../function.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
   
    $id=$_POST['id'];
    $title = isset($_POST['title'])? trim(htmlspecialchars($_POST['title'])):"";
    $body = isset($_POST['body'])? trim(htmlspecialchars($_POST['body'])):"";
    $errors = [];
    
    //validation  required|string|maxlengnth255
    if (empty($title)) {
        $errors[] = "title is required";
    } elseif (!is_string($title)) {
        $errors[] = "title must be string";
    } elseif (strlen($title) > 255) {
        $errors[] = "title must be lessthan 255";
    }
    if (empty($body)) {
        $errors[] = "body is required";
    } elseif (!is_string($body)) {
        $errors[] = "body must be string";
    }

    //insert db
    if (empty($errors)) {
        $query ="UPDATE posts SET title='$title',body='$body'WHERE id=$id";
        $result = mysqli_query($conn, $query);
    
        if ($result) {
            echo json_encode("post updated sucssefully");
        } else {
            renderError("post failed update", 500);
        }
    } else {
        $errorjson = json_encode($errors);
        echo $errorjson;
    }
}
