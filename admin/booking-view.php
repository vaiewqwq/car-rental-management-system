<?php include('includes/header.php'); ?>



<div class="section">
    <div class="container">
        <div class="row justify-content-center">

        <?php 
            alertSuccess();

            if(isset($_GET['booking_id']))
            {
                if($_GET['booking_id'] != ''){
                    $bookingId = validate($_GET['booking_id']);
                }else{
                    return false;
                }
            }
            else
            {
                ?>
                <div class="col-md-12">
                    <h4>No Booking Id Found</h4>
                </div>
                <?php
                return false;
            }
        ?>

        <?php

        $bookingQuery = "SELECT * FROM bookings WHERE booking_no='$bookingId' LIMIT 1";
        $booking = mysqli_query($conn, $bookingQuery);

        if($booking)
        {
            if(mysqli_num_rows($booking) > 0)
            {
                $booking = mysqli_fetch_array($booking, MYSQLI_ASSOC);
                $carId = $booking['car_id'];
                $car = getById('cars',$carId);
                
                $bodyTypeId = $car['data']['body_type_id'];
                
                $bodyType = getById('body_types',$bodyTypeId);
                
        ?>

            <div class="col-md-12 my-3">
                <div class="card shadow rounded-4 mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Booking Details
                            <a href="bookings.php" class="btn btn-sm btn-danger float-end">Back</a>
                        </h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="title-sm fs-14 mb-1"> Booking Id: <span class="text-dark fw-bold"> <?=$booking['booking_no'];?></span> </p>
                            </div>
                            <div class="col-md-6">
                                <p class="title-sm fs-14 mb-1"> Booking Date: <span class="text-dark fw-bold"> <?=$booking['booking_date'];?></span> </p>
                            </div>
                            
                            <div class="col-md-6">
                                <p class="title-sm fs-14 mb-1"> Start Time: <span class="text-dark fw-bold"> <?=$booking['start_date'];?></span> </p>
                            </div>
                            <div class="col-md-6">
                                <p class="title-sm fs-14 mb-1"> End Time: <span class="text-dark fw-bold"> <?=$booking['end_date'];?></span> </p>
                            </div>
                            
                            <div class="col-md-6">
                                <p class="title-sm fs-14 mb-1"> Payment Mode: <span class="text-dark fw-bold"> <?=$booking['payment_mode'];?></span> </p>
                            </div>
                            <div class="col-md-6">
                                <p class="title-sm fs-14 mb-1"> Payment Id: <span class="text-dark fw-bold"> <?=$booking['payment_id'];?></span> </p>
                            </div>

                            <div class="col-md-6">
                                <p class="title-sm fs-14 mb-1"> 
                                    Payment Status: <br/>
                                    <?php
                                    if($booking['payment_status'] == 'completed'){
                                        echo '<span class="btn btn-success btn-sm text-white py-1 fs-14 fw-bold">Completed</span>';
                                    }elseif($booking['booking_status'] == 'pending'){
                                        echo '<span class="btn btn-danger text-white py-1 fs-14 fw-bold">Pending</span>';
                                    }else{
                                        echo '<span class="btn btn-info py-1 text-white fs-14 fw-bold">Refunded</span>';
                                    }
                                    ?>
                                </p>
                            </div>
                            
                            <div class="col-md-6">
                                <p class="title-sm fs-14 mb-1"> 
                                    Booking Status:  <br/>
                                    <?php
                                    if($booking['booking_status'] == 'booked'){
                                        echo '<span class="btn btn-success text-white py-1 fs-14 fw-bold">Upcoming</span>';
                                    }elseif($booking['booking_status'] == 'completed'){
                                        echo '<span class="btn btn-info text-white py-1 fs-14 fw-bold">Completed</span>';
                                    }elseif($booking['booking_status'] == 'cancelled'){
                                        echo '<span class="btn btn-danger text-white py-1 fs-14 fw-bold">Cancelled</span>';
                                    }else{
                                        echo '<span class="btn btn-warning py-1 text-white fs-14 fw-bold">Live</span>';
                                    }
                                    ?>
                                </p>
                            </div>

                            <hr class="bg-dark">
                            <div class="col-md-12">
                                <p class="title-sm fs-14 mb-1"> Total Price: <span class="text-dark fw-bold"> <?=$booking['total_price'];?></span> </p>
                            </div>


                            <?php if($booking['cancel_status']) : ?>
                            <div class="col-md-12">
                                <p class="title-sm fs-14 mb-1"> Cancel Status: <span class="text-dark fw-bold"> <?=$booking['cancel_status'];?></span> </p>
                                <hr class="my-2">
                            </div>
                            <?php endif; ?>

                        </div>
                    </div>
                </div>

              
                <div class="card shadow rounded-4 mb-3">
                    <div class="card-header">
                        <h5 class="mb-0">Update Status</h5>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">
                            <input type="hidden" name="booking_id" value="<?= $bookingId ?>">

                            <div class="row">
                                <div class="col-md-6">
                                    <label class="mb-1"> Select the status: </label>
                                    <select name="booking_status" class="form-select">
                                        <option <?= $booking['booking_status'] == 'booked'?'selected':'' ?> value="booked">Booked</option>
                                        <option <?= $booking['booking_status'] == 'live'?'selected':'' ?> value="live">Live</option>
                                        <option <?= $booking['booking_status'] == 'cancelled'?'selected':'' ?> value="cancelled">Cancelled</option>
                                        <option <?= $booking['booking_status'] == 'completed'?'selected':'' ?> value="completed">Completed</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-1"> Select Payment Status: </label>
                                    <select name="payment_status" required class="form-select">
                                        <option value="">Select Payment Status</option>
                                        <option <?= $booking['payment_status'] == 'completed'?'selected':'' ?> value="completed">Completed</option>
                                        <option <?= $booking['payment_status'] == 'refunded'?'selected':'' ?> value="refunded">Refunded</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="mb-1"> Cancel Reason: </label>
                                    <textarea name="cancel_reason" class="form-control" rows="3"><?= $booking['cancel_reason'] ?? '' ?></textarea>
                                </div>
                                <div class="col-md-6 text-end">
                                    <br/>
                                    <button type="submit" name="update_booking_btn" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                            
                            
                        </form>
                    </div>
                </div>

                <div class="card shadow rounded-4">
                    <div class="card-header">
                        <h5 class="mb-0">Car Features / Details</h5>
                    </div>
                    <div class="card-body">
                        <h5 class="car-card-title"><?=$car['data']['name'];?></h5>
                        <hr class="my-2">
                        <table class="table fs-14 table-striped table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <td class="w-25">Fastag</td>
                                    <td><?=$car['data']['fastag'] == true ? 'Yes':'No';?></td>
                                </tr>
                                <tr>
                                    <td class="w-25">Sun Roof</td>
                                    <td><?=$car['data']['sun_roof'] == true ? 'Yes':'No';?></td>
                                </tr>
                                <tr>
                                    <td class="w-25">Cruise Control</td>
                                    <td><?=$car['data']['cruise_control'] == true ? 'Yes':'No';?></td>
                                </tr>
                                <tr>
                                    <td class="w-25">360 Camera</td>
                                    <td><?=$car['data']['360_camera'] == true ? 'Yes':'No';?></td>
                                </tr>
                                <tr>
                                    <td class="w-25">Home Delivery</td>
                                    <td><?=$car['data']['home_delivery'] == true ? 'Yes':'No';?></td>
                                </tr>
                                <tr>
                                    <td class="w-25">Air Bags</td>
                                    <td><?=$car['data']['airbags'] == true ? 'Yes':'No';?></td>
                                </tr>
                                <tr>
                                    <td class="w-25">Car Name</td>
                                    <td><?=$car['data']['name'];?></td>
                                </tr>
                                <tr>
                                    <td class="w-25">Body Type</td>
                                    <td><?=$bodyType['data']['name'] ?? '-';?></td>
                                </tr>
                                <tr>
                                    <td class="w-25">Transmission</td>
                                    <td><?=$car['data']['transmission'];?></td>
                                </tr>
                                <tr>
                                    <td class="w-25">Fuel</td>
                                    <td><?=$car['data']['fuel'];?></td>
                                </tr>
                                <tr>
                                    <td class="w-25">Model</td>
                                    <td><?=$car['data']['model'];?></td>
                                </tr>
                                <tr>
                                    <td class="w-25">Car Reg No. </td>
                                    <td><?=$car['data']['car_reg_no'];?></td>
                                </tr>
                                <tr>
                                    <td class="w-25">kms Driven </td>
                                    <td><?=$car['data']['kms_driven'];?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
           
        <?php
            }
            else
            {
                ?>
                <div class="col-md-12">
                    <h4>No Booking Found</h4>
                </div>
                <?php
            }
        }
        else
        {
            ?>
            <div class="col-md-12">
                <h4>Something Went Wrong!</h4>
            </div>
            <?php
        }
        ?>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
