<?php
require_once("../function.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id']) and $_GET['id'] != 0) {
        $id=$_GET['id'];
        $query = "SELECT * FROM posts where id=$id";
        $result = mysqli_query($conn, $query);
        if(mysqli_num_rows($result)!=0){
        $post = mysqli_fetch_assoc($result);
        $postjson = json_encode($post);
        echo $postjson;
        }else{
            renderError("not Found",404);
        
        }
    }
}
else {
    renderError("Method not allowed",405);
    
}


