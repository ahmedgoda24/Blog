<?php
require_once("../function.php");


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title =isset($_POST['title'])? trim(htmlspecialchars($_POST['title'])):"";
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
        $query = "INSERT INTO posts(title,body,user_id) VALUES('$title','$body',1)";
        $result = mysqli_query($conn, $query);

        if ($result) {
            echo json_encode("post stored sucssefully");
        } else {
            renderError("post failed store", 500);
        }
    } else {
        $errorjson = json_encode($errors);
        echo $errorjson;
    }
}
