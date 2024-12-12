<?php include('includes/header.php'); ?>


<div class="py-5 bg-secondary">
    <div class="container text-center">
        <h4 class="text-white">Contact Us</h4>
    </div>
</div>


<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="card shadow-sm">
                    <div class="card-header bg-web">
                        <h4 class="title1 mb-0 text-white">Contact Us</h4>
                    </div>
                    <div class="card-body">
                                
                        <form action="#" method="POST">
                            <div class="mb-3">
                                <label>Name *</label>
                                <input type="text" name="name" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Phone *</label>
                                <input type="text" name="phone" required class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" />
                            </div>
                            <div class="mb-3">
                                <label>  Message</label>
                                <textarea name="comment" class="form-control" rows="3"></textarea>
                            </div>
                            <div class="mb-1">
                                <button type="sumbit" name="enquiryBtn" class="btn btn-primary w-100">SUBMIT</button>
                                <!-- You can configure your email with this form -->
                            </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="col-md-6">
                <h4>Address Info</h4>
                <div class="underline"></div>
                <p>Address: <?= webSetting('address'); ?></p>

                <hr>

                <h4>Email Address</h4>
                <div class="underline"></div>
                <p><?= webSetting('email1'); ?></p>
                <p><?= webSetting('email2'); ?></p>

                <hr>

                <h4>Phone Number</h4>
                <div class="underline"></div>
                <p><?= webSetting('phone1'); ?></p>
                <p><?= webSetting('phone2') ?? '-'; ?></p>

            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>
