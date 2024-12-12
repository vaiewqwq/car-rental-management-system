<?php include('includes/header.php'); ?>
    
<div class="row">
  <div class="col-md-12">
    <?php alertSuccess(); ?>
  </div>
  <div class="col-xl-3 mb-3">
    <div class="card card-body p-3">
      <p class="text-sm mb-0 text-capitalize font-weight-bold">Today Bookings</p>
      <h5 class="font-weight-bolder mb-0">
        <?php 
          $todayDate = date('Y-m-d');
          $bookings = "SELECT * FROM bookings WHERE booking_date='$todayDate' ";
          $bookingResult = mysqli_query($conn, $bookings);
          if($bookingResult){
            if(mysqli_num_rows($bookingResult) > 0){
              $totalCount = mysqli_num_rows($bookingResult);
              echo $totalCount;
            }else{
              echo "0";
            }
          }else{
            echo "Something Went Wrong!";
          }
        ?>
      </h5>
    </div>
  </div>

  <div class="col-xl-3 mb-3">
    <div class="card card-body p-3">
      <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Brands</p>
      <h5 class="font-weight-bolder mb-0">
        <?= getCount('brands') ?>
      </h5>
    </div>
  </div>
  <div class="col-xl-3 mb-3">
    <div class="card card-body p-3">
      <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Body Types</p>
      <h5 class="font-weight-bolder mb-0">
        <?= getCount('body_types') ?>
      </h5>
    </div>
  </div>
  <div class="col-xl-3 mb-3">
    <div class="card card-body p-3">
      <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Cars</p>
      <h5 class="font-weight-bolder mb-0">
        <?= getCount('cars') ?>
      </h5>
    </div>
  </div>
  <div class="col-xl-3 mb-3">
    <div class="card card-body p-3">
      <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Car Images</p>
      <h5 class="font-weight-bolder mb-0">
        <?= getCount('car_images') ?>
      </h5>
    </div>
  </div>
  <div class="col-xl-3 mb-3">
    <div class="card card-body p-3">
      <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Admin/Users</p>
      <h5 class="font-weight-bolder mb-0">
        <?= getCount('users') ?>
      </h5>
    </div>
  </div>
  <div class="col-xl-3 mb-3">
    <div class="card card-body p-3">
      <p class="text-sm mb-0 text-capitalize font-weight-bold">Total Social Media</p>
      <h5 class="font-weight-bolder mb-0">
        <?= getCount('social_medias') ?>
      </h5>
    </div>
  </div>
</div>
      
<?php include('includes/footer.php'); ?>
