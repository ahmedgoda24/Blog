<?php require('inc/header.php'); ?>
<?php require('inc/navbar.php'); ?>
<?php if(isset($_SESSION["user_name"])) header("location:index.php"); ?>

<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3>Register</h3>
                </div>
                <div>
                    <a href="index.php" class="text-decoration-none">Back</a>
                </div>
            </div>
            <?php if(isset($_SESSION['success'])): ?> 
                    <h5 class="bg-success text-center p-3"> <?php echo $_SESSION['success']; ?>  </h5>
                    <?php unset($_SESSION['success']) ?>
                <?php  endif; ?>

                <?php if(isset($_SESSION['error'])): ?> 
                    <h5 class="bg-danger text-center p-3"> <?php echo $_SESSION['error']; ?>  </h5>
                    <?php unset($_SESSION['error']) ?>
                <?php  endif; ?>
               
            <form method="POST" action="handle-register.php">
                <div class="mb-3">
                    <label for="name" class="form-label">UserName</label>
                    <input type="text" class="form-control" id="name" name="name">
                </div>
    
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
    
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                
                <button type="submit" class="btn btn-primary" name="submit">Login</button>
            </form>
        </div>
    </div>
</div>
    
    <?php require('inc/footer.php'); ?>