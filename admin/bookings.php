<?php include('includes/header.php'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header border-bottom pb-0 mb-2">
                    <h4>Bookings  </h4>
                </div>
                <div class="card-body pt-0 pb-2">
                    <?php alertSuccess(); ?>
                    
                    <?php
                        $todayDate = date('Y-m-d h:i:s');
                        $query = "SELECT b.*, b.id as booking_id, u.name as username, c.image, c.name as car_name 
                                FROM bookings b, users u, cars c WHERE booking_status !='completed' AND b.car_id=c.id 
                                AND b.user_id=u.id AND b.end_date >= '$todayDate' ORDER BY b.start_date";
                        $bookings = mysqli_query($conn, $query);

                        if($bookings)
                        {
                            if(mysqli_num_rows($bookings) > 0){
                                ?>
                                <div class="table-responsive p-0">
                                    <table id="myTable" class="table table-striped align-items-center justify-content-center">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Customer Name</th>
                                                <th>Car</th>
                                                <th>Start Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                
                                            foreach($bookings as $bookingsItem) :
                                            ?>
                                            <tr>
                                                <td><?= $bookingsItem['booking_id']; ?></td>
                                                <td><?= $bookingsItem['username']; ?></td>
                                                <td>
                                                    <?php if($bookingsItem['image'] != ''){ ?> 
                                                        <img src="<?= '../'.$bookingsItem['image']; ?>" style="width: 50px;height: 50px;" alt="Brand" />
                                                        <?= $bookingsItem['car_name']; ?>
                                                    <?php }else{ echo "No Image"; } ?>
                                                </td>
                                                <td><?= $bookingsItem['start_date']; ?></td>
                                                <td class="text-capitalize">
                                                    <?php
                                                    if($bookingsItem['booking_status'] == 'booked'){
                                                        echo '<span class="badge bg-success text-white fs-14 fw-bold">Upcoming</span>';
                                                    }elseif($bookingsItem['booking_status'] == 'completed'){
                                                        echo '<span class="badge bg-info text-white fs-14 fw-bold">Completed</span>';
                                                    }elseif($bookingsItem['booking_status'] == 'cancelled'){
                                                        echo '<span class="badge bg-danger text-white fs-14 fw-bold">Cancelled</span>';
                                                    }else{
                                                        echo '<span class="badge bg-warning text-white fs-14 fw-bold">Live</span>';
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <a href="booking-view.php?booking_id=<?= $bookingsItem['booking_no'];?>" class="btn mb-0 btn-success btn-sm">View</a>
                                                </td>
                                            </tr>
                                            <?php
                                            endforeach;
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                                
                            }
                            else{
                                echo "<h5>No Bookings Found!</h5>";
                            }
                        }
                        else
                        {
                            echo "<h5>Something went Wrong!</h5>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>
