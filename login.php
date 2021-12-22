<?php require('inc/header.php'); ?>
<?php require('inc/navbar.php'); ?>
<?php if(isset($_SESSION["user_name"])) header("location:index.php"); ?>

<div class="container-fluid pt-4">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="d-flex justify-content-between border-bottom mb-5">
                <div>
                    <h3>Login</h3>
                </div>
                <div>
                    <a href="index.php" class="text-decoration-none">Back</a>
                </div>
            </div>
            <?php if (isset($_SESSION['errors'])) : ?>
                <div class="alert alert-danger">
                 <?php echo $_SESSION['errors']; ?>  
                    <?php unset($_SESSION['errors']) ?>
                          
                </div>
                
            <?php endif; ?>
            
            <form method="POST" action="handle-login.php">
    
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email">
                </div>
    
                <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control" id="password" name="password">
                </div>
                
                <button type="submit" class="btn btn-primary" name="submit"  value="Login">Login</button>
            </form>
        </div>
    </div>
</div>

<?php require('inc/footer.php'); ?>