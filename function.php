
<?php

$conn = mysqli_connect("localhost", "root", "", "blog");
header("Content-Type:application/json");

function renderError(string $message,int $statuscode):void{
    http_response_code($statuscode);
    echo json_encode( $message);
}

