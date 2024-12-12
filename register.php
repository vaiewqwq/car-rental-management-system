<?php 
include('includes/header.php'); 

if(isset($_SESSION['loggedIn'])){
    redirect('admin/dashboard.php','Welcome Back');
}
?>

<div class="section">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-header bg-primary">
                        <h3 class="text-white">Register</h3>
                    </div>
                    <div class="card-body">

                        <?php alertSuccess(); ?>

                        <form action="code.php" method="POST">
                            <div class="mb-3">
                                <label>Enter Name</label>
                                <input type="text" name="name" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label>Enter Phone Number</label>
                                <input type="text" name="phone" max="10" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label>Enter Email Id</label>
                                <input type="email" name="email" class="form-control" required />
                            </div>
                            <div class="mb-3">
                                <label>Enter Password</label>
                                <input type="password" name="password" class="form-control" required />
                            </div>
                            <div class="mb-3 mt-4">
                                <button type="submit" name="registerBtn" class="btn btn-primary w-100">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
      
        </div>
    </div>
</div>

        

<?php include('includes/footer.php'); ?>
