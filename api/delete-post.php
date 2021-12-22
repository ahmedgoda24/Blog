<?php
require_once("../function.php");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];

    $query = "DELETE FROM posts WHERE id=$id";
    $result = mysqli_query($conn, $query);
    if ($result) {
        echo json_encode("post deleted sucssefully");
    } else {
        renderError("post failed delete", 500);
    }
} else {
    renderError("Method not allowed", 405);
}
