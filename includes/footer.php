    <div class="footer-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-3 mb-3">
                    <h4><?= webSetting('title') ?? 'Website Name' ?></h4>
                    <div class="underline"></div>
                    <p>
                        <?= webSetting('description') ?? 'Website Description' ?>
                    </p>
                </div>
                <div class="col-md-3 mb-3">
                    <h4>Quick Links</h4>
                    <div class="underline"></div>
                    <p class="mb-1"><a href="index.php">Home</a></p>
                    <p class="mb-1"><a href="about-us.php">About Us</a></p>
                    <p class="mb-1"><a href="contact-us.php">Contact Us</a></p>
                    <p class="mb-1"><a href="cars.php">Book a car</a></p>
                    <p class="mb-1"><a href="login.php">Login</a></p>
                    <p class="mb-1"><a href="register.php">Register</a></p>
                </div>
                <div class="col-md-3 mb-3">
                    <h4>Follow Us</h4>
                    <div class="underline"></div>
                    <ul>
                        <?php 
                            $socials = getAll('social_medias');
                            if($socials){
                                if(mysqli_num_rows($socials) > 1){
                                    foreach($socials as $socialItem){
                                    ?>
                                        <li>
                                            <a href="<?=$socialItem['slug'];?>" target="_blank">
                                                <?=$socialItem['name'];?>
                                            </a>
                                        </li>
                                    <?php
                                    }
                                }else{
                                    echo '<li>No Social Media</li>';
                                }
                            }else{
                                echo '<li>No Social Media</li>';
                            }
                        ?>
                    </ul>
                </div>
                <div class="col-md-3 mb-3">
                    <h4>Contact Info</h4>
                    <div class="underline"></div>
                    <p><i class="fa fa-map-marker"></i> Address: <?= webSetting('address'); ?></p>
                    <p class="mb-1"> <i class="fa fa-envelope"></i> <?= webSetting('email1'); ?></p>
                    <p class="mb-1"> <i class="fa fa-envelope"></i> <?= webSetting('email2'); ?></p>
                    <p class="mb-1"> <i class="fa fa-phone"></i> <?= webSetting('phone1'); ?></p>
                    <p class="mb-1"> <i class="fa fa-mobile"></i> <?= webSetting('phone2'); ?></p>
                </div>
            </div>
        </div>
    </div>
    <div class="py-1 bg-web">
        <div class="container">
            <p class="mb-0 fs-14 text-white text-center">© Copyright | All rights reserved at <?= webSetting('title') ?? 'Car Rental Services'; ?></p>
        </div>
    </div>

    <script src="assets/js/jquery-3.7.0.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl.carousel.min.js"></script>
    <script src="assets/js/razorpay-checkout.js"></script>

    <script>
        $('.car-carousel').owlCarousel({
            loop:true,
            margin:10,
            nav: true,
            dots: true,
            navText: ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
            autoplay: true,
            autoplayHoverPause:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });

        $('.car-testi').owlCarousel({
            loop:true,
            margin:10,
            nav: false,
            dots: true,
            navText: ["<i class='fa fa-arrow-left'></i>","<i class='fa fa-arrow-right'></i>"],
            autoplay: true,
            autoplayHoverPause:false,
            responsive:{
                0:{
                    items:1
                },
                600:{
                    items:1
                },
                1000:{
                    items:1
                }
            }
        });

        $(document).ready(function () {

            $(".filtercar").click(function (e) { 
                e.preventDefault();
                var startDate = $('#start_date').val();
                var endDate = $('#end_date').val();
                startEndDifference = (Math.abs(new Date(startDate) - new Date(endDate)) / 60000) / 60;
                if(startDate >= endDate){
                    $('#end_date').css('border', '2px solid red');
                    alert("End date cannot be less than or equal to start date");

                    return false;
                }
                else if(startEndDifference < 24){
                    $('#end_date').css('border', '2px solid red')

                    alert("Minimum booking period is 24 hours");
                    return false;
                }
                else{
                    // window.location.href = "cars.php?start="+startDate+"&end="+endDate+"#content"
                    const urlParams = new URLSearchParams(window.location.search);
                        urlParams.set('start', startDate);
                        urlParams.set('end', endDate);
                        window.location.search = urlParams;

                }

            });

            $('#start_date').change(function (e) { 
                e.preventDefault();
                var startDate = $('#start_date').val();

                var d = new Date(startDate);
                d.setHours(d.getHours() + 24);
                const dateTimeLocalValue = (new Date(d.getTime() - d.getTimezoneOffset() * 60000).toISOString()).slice(0, -1);
                document.getElementsByName("end_date")[0].value = dateTimeLocalValue;
                document.getElementsByName("end_date")[0].min = dateTimeLocalValue;

            });

        });
    </script>


</body>
</html>