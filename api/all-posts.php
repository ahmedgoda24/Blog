<?php
require_once("../function.php");


if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $query = "SELECT * FROM posts";
    $result = mysqli_query($conn, $query);
    $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
    $postsjson = json_encode($posts);
    echo $postsjson;
} else {
    renderError("Method not allowed", 405);
}
