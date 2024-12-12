<?php include('includes/header.php'); ?>

<div class="container">
    <?= alertSuccess(); ?>
</div>

<div id="carouselExample" class="carousel slide">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="assets/images/slider-1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/images/slider-1.jpg" class="d-block w-100" alt="...">
    </div>
    <div class="carousel-item">
      <img src="assets/images/slider-1.jpg" class="d-block w-100" alt="...">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>


<div class="py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h4 class="main-heading">Welcome to <?= webSetting('title') ?? 'Car Rental Services'; ?></h4>
                <div class="underline mx-auto"></div>
                <p>
                    Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.
                </p>
            </div>
        </div>
    </div>
</div>


<div class="bg-car1">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <h2 class="text-white">Rent a car in few steps</h2>
                <div class="underline"></div>
                <h4 class="text-white">Drive worry free with <?= webSetting('title') ?? 'Car Rental Services'; ?></h4>
                <h4 class="text-white">24X7 Roadside assistance whenever you need</h4>
            </div>
            <div class="col-md-4 my-auto">
                <a href="cars.php" class="btn btn-web text-white w-100 fw-bold">Book a car now !</a>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <h4 class="main-heading text-center">Our Testimonials</h4>
                <div class="underline mx-auto"></div>

                <div class="owl-carousel owl-theme car-testi">
                    <div class="item">
                        <div class="testi-card text-center">
                            <h4 class="title1 fs-16 mb-2">Ved Prakash</h4>
                            <p class="testi-para">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testi-card text-center">
                            <h4 class="title1 fs-16 mb-2">Ved Prakash</h4>
                            <p class="testi-para">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                            </p>
                        </div>
                    </div>
                    <div class="item">
                        <div class="testi-card text-center">
                            <h4 class="title1 fs-16 mb-2">Ved Prakash</h4>
                            <p class="testi-para">
                                Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard
                            </p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
