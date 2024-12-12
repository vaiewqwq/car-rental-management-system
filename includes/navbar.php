<div class="shadow sticky-top">
    
    <div class="bg-web py-1">
        <div class="container">
            <div class="row">
                <div class="col-md-6 text-white">
                    <span> <i class="fa fa-phone"></i> Call :</span> 
                    <a href="tel:<?= webSetting('phone1'); ?>" class="top-nav-link"><?= webSetting('phone1'); ?></a> | 
                    <a href="tel:<?= webSetting('phone2'); ?>" class="top-nav-link"><?= webSetting('phone2'); ?></a>
                </div>
                <div class="col-md-6 text-md-end text-white">
                    <span> <i class="fa fa-envelope"></i> Email :</span>
                    <a href="tel:<?= webSetting('email1'); ?>" class="top-nav-link"><?= webSetting('email1'); ?></a>
                </div>
            </div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg bg-white">
        <div class="container">

            <a class="navbar-brand" href="index.php">
                <?= webSetting('title'); ?>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about-us.php">About Us</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="cars.php">Get Car</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="contact-us.php">Contact Us</a>
                    </li>
                    <?php 
                        if(isset($_SESSION['loggedIn'])){
                            ?>
                            <li class="nav-item dropdown my-auto">
                                <a class="btn border me-2 dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-user"></i> <?= $_SESSION['loggedInUser']['name']; ?>
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="profile.php">My Profile</a></li>
                                    <li><a class="dropdown-item" href="my-bookings.php">My Bookings</a></li>
                                    <li><a class="dropdown-item" href="logout.php"> <i class="fa fa-sign-out"></i> Logout</a></li>
                                </ul>
                            </li>
                            <?php
                        }
                        else
                        {
                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="login.php">Login</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="register.php">Register</a>
                            </li>
                            <?php
                        }
                    ?>
                    
                </ul>
        
            </div>
        </div>
    </nav>
</div>

