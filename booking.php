<?php 
include('includes/header.php'); 

require 'auth-user.php';

$carCid = mysqli_real_escape_string($conn, $_SESSION['carCid']) ?? "";
?>

<div class="banner py-4">
    <div class="container">
        <h4 class="banner-heading mb-3">Booking Summary</h4>
    </div>
</div>

<?php 

$userId = $_SESSION['loggedInUser']['user_id'];

$checkUserVerifiedQuery = "SELECT * FROM users WHERE id='$userId' ";
$userResult = mysqli_query($conn,$checkUserVerifiedQuery);
if($userResult)
{
    if(mysqli_num_rows($userResult) == 1){

        $userData = mysqli_fetch_array($userResult, MYSQLI_ASSOC);
        if($userData['is_verified'] == 1)   
        {
            ?>
                <div class="section bg-light">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-md-7">
                                <div class="card shadow-sm">
                                    <div class="card-header bg-web">
                                        <h4 class="title1 mb-0 text-white">Booking Details</h4>
                                    </div>
                                    <div class="card-body">
                                    <?php

                                        $carQuery = "SELECT c.*, b.id, b.name as brand_name, bt.id, bt.name as body_type_name FROM cars c, brands b, body_types bt 
                                            WHERE b.id=c.brand_id AND bt.id=c.body_type_id AND c.car_cid='$carCid' LIMIT 1";
                                        $result = mysqli_query($conn,$carQuery);
                                        if($result)
                                        {
                                            if(mysqli_num_rows($result) == 1){

                                                $car = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                                ?>
                                                    <h5 class="car-card-title"><?=$car['name'];?></h5>
                                                    <hr class="my-2">
                                                    <p class="title-sm fs-12 mb-1"> Body Type: <span class="text-dark fw-bold"> <?=$car['body_type_name'];?></span> </p>
                                                    <p class="title-sm fs-12 mb-1"> Transmission: <span class="text-dark fw-bold"> <?=$car['transmission'];?></span> </p>
                                                    <p class="title-sm fs-12 mb-1"> Fuel: <span class="text-dark fw-bold"> <?=$car['fuel'];?></span> </p>

                                                    <hr class="my-2">

                                                    <p class="title-sm fs-12 mb-1"> 
                                                        Start Time: 
                                                        <span class="text-dark fw-bold">  <?= isset($_SESSION['start_date']) ? date("D d, M Y, h:00 A", strtotime($_SESSION['start_date'])): "Something went wrong" ?></span> 
                                                    </p>
                                                    <p class="title-sm fs-12 mb-1"> 
                                                        End Time: 
                                                        <span class="text-dark fw-bold">  <?= isset($_SESSION['end_date']) ? date("D d, M Y, h:00 A", strtotime($_SESSION['end_date'])): "Something went wrong" ?></span> 
                                                    </p>

                                                    <hr class="my-2">

                                                    <?php 
                                                        $datetime1 = isset($_SESSION['start_date']) ? date("d-m-Y h:00 A", strtotime($_SESSION['start_date'])): date("d-m-Y h:00 A");
                                                        $datetime2 = isset($_SESSION['end_date']) ? date("d-m-Y h:00 A", strtotime($_SESSION['end_date'])): date("d-m-Y h:00 A");

                                                        $starttimestamp = strtotime($datetime1);
                                                        $endtimestamp = strtotime($datetime2);
                                                        $difference = abs($endtimestamp - $starttimestamp)/3600;

                                                        $convenienceFee = 99;
                                                        $totalPrice = ($difference * $car['price_per_hour']) + $convenienceFee;
                                                    ?>

                                                    <h5 class="title1 mb-1">Total Price 
                                                        <span class="float-end"> 
                                                            Rs. <?= number_format($totalPrice,0); ?>
                                                        </span>
                                                    </h5>
                                                    <hr class="my-2">

                                                    <label>Pay now</label>
                                                    <br/>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <button class="btn btn-primary razPayBTn w-100 mb-3"> <i class="fa fa-rupee me-1"></i> Pay with Razorpay</button>
                                                            <div id="paypal-button-container"></div>
                                                        </div>
                                                    </div>
                                                    
                                                <?php
                                            }
                                            else
                                            {
                                                ?>
                                                <h4>No Car Found</h4>
                                                <?php
                                            }
                                        }
                                        else
                                        {
                                            ?>
                                            <h4>No Car Found</h4>
                                            <?php
                                        }
                                    
                                    ?>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-5">
                                <img src="assets/images/booking.jpg" class="w-100" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            <?php 
        }
        else
        {
            if($userData['dl_number'] != "" && $userData['dl_image_front'] != "" && $userData['dl_image_back'] != "")   
            {
                ?>
                <div class="section">
                    <div class="container text-center">
                        <div class="alert alert-warning">
                            <h4>We are verifying your details.</h4>
                            <h3>Your account will be verified with 1-2 working days after uploading the documents!</h3>
                        </div>
                    </div>
                </div>
                <?php
            }else{
                ?>
                    <div class="section">
                        <div class="container text-center">
                            <div class="alert alert-warning">
                                <h4>Your Profile is not verified.</h4>
                                <h3>Please upload your documents to get your profile verified!</h3>
                                <a href="profile.php" class="btn btn-web mt-4">Verify your profile now</a>
                            </div>
                        </div>
                    </div>
                <?php
            }
        }
    }
}
        ?>


<?php include('includes/footer.php'); ?>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script>
    
    
function PhoneNumvalidate()
{
var filter = /^[0-9][0-9]{9}$/; //PATTERN FOR MOBILE NUMBER

var a = $(".phone").val();     
if (!(filter.test(a))) {
    swal("","Enter valid mobile number","warning");
    $(".phone").val('');
}
}

</script>

<script src="https://www.paypal.com/sdk/js?client-id=AZs2Jlax_z6GXz7Xo8iCfBF2PwwbatjT0fG0M--HtqzLpL8UZfLx_zbIB8SupDvz_kH98zh5OwL6QV94"> </script>

<script>
    paypal.Buttons({
        style: {
            layout:  'vertical',
            color:   'gold',
        },
        createOrder: function(data, actions) {
            // This function sets up the details of the transaction, including the amount and line item details.
            return actions.order.create({
            purchase_units: [{
                amount: {
                    value: '<?= $totalPrice ?>'
                }
            }]
            });
        },
        onApprove: function(data, actions) {
            // This function captures the funds from the transaction.
            return actions.order.capture().then(function(details) {
            // This function shows a transaction success message to your buyer.
            //   alert('Transaction completed by ' + details.payer.name.given_name);

                $.ajax({
                    method: "POST",
                    url: "order-create.php",
                    data: {
                        'payment_success': true,
                        'payment_mode': 'Paid By PayPal',
                        'payment_id': details.id
                    },
                    success: function (response) {
                        jsonNewResponse = JSON.parse(response);

                        if(jsonNewResponse.status == 200){
                            // alert(jsonNewResponse.message);
                            window.location.href = 'my-bookings.php';
                        }else if(jsonNewResponse.status == 500){
                            alert(jsonNewResponse.message);
                        }else{
                            alert("Something went wrong");
                        }
                    }
                });
               
            });
        }
    }).render('#paypal-button-container');
    //This function displays Smart Payment Buttons on your web page.
</script>

