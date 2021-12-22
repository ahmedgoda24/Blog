<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "blog");
if (isset($_POST["submit"])) {
    $title = trim(htmlspecialchars($_POST['title']));
    $body = trim(htmlspecialchars($_POST['body']));
    $errors=[];

    //validation  required|string|maxlengnth255
    if (empty($title)) {
        $errors[] = "title is required";
    } elseif (!is_string($title)) {
        $errors[] = "title must be string";
    } elseif (strlen($title) > 255) {
        $errors[] = "title must be lessthan 255";
    }
    if (empty($body)) {
        $errors []= "body is required";
    } elseif (!is_string($body)) {
        $errors[] = "body must be string";
    }
  
    if (empty($errors)) {
        //insert DB

            
     $query = "INSERT INTO posts(title,body,user_id) VALUES('$title','$body',1)";
        $result = mysqli_query($conn, $query);

        if ($result) {
            header("location:index.php");
        }
        else{
        }
    }else{
        $_SESSION['errors']=$errors;
        header("location:create-post.php");
    }
}


 /*<?php/* if(isset($_SESSION['errors'])){ ?> 
    <div class="alert alert-danger" role="alert">
        <?php foreach($_SESSION['errors'] as $error){?>
            <p><?= $error;?></p>
        <?php }?>
    </div>
    
        <?php unset($_SESSION['errors']) ?>
<?php }*/  
