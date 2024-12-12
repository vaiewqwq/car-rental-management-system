<?php include('includes/header.php'); ?>

<div class="row">
    <div class="col-12">
        <div class="card mb-4">
            <div class="card-header pb-0">
                <h4>Website Setting</h4>
            </div>
            <div class="card-body">
                <?php alertSuccess(); ?>
                
                <form action="code.php" method="POST" enctype="multipart/form-data">
                    <?php 
                        $user = getById('web_settings',1);
                        // if($user['status'] == 200){
                    ?>
                    <input type="hidden" name="settingId" value="<?= $user['data']['id'] ?? 'insert' ?>" />

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label>Title</label>
                            <input type="text" name="title" value="<?= $user['data']['title'] ?? '' ?>" required class="form-control" />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Domain Url/Link</label>
                            <input type="text" name="url" value="<?= $user['data']['url'] ?? '' ?>" class="form-control" />
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Description</label>
                            <textarea name="description" class="form-control" rows="3"><?= $user['data']['description'] ?? '' ?></textarea>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label>Logo</label>
                            <input type="file" name="logoImage" class="form-control" />
                            <?php if($user['data']['logo'] != ''){ ?> 
                                <img src="<?= '../'.$user['data']['logo']; ?>" style="width: 70px;height: 70px;" alt="Website Logo" />
                            <?php }else{ echo "No Image Uploaded"; } ?>
                        </div>


                        <h4 class="my-3">Contact Information</h4>
                        <div class="col-md-12 mb-3">
                            <label>Address</label>
                            <input type="text" name="address" value="<?= $user['data']['address'] ?? '' ?>" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email 1</label>
                            <input type="email" name="email1" value="<?= $user['data']['email1'] ?? '' ?>" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Email 2</label>
                            <input type="email" name="email2" value="<?= $user['data']['email2'] ?? '' ?>" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Phone 1</label>
                            <input type="text" name="phone1" value="<?= $user['data']['phone1'] ?? '' ?>" class="form-control" />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label>Phone 2</label>
                            <input type="text" name="phone2" value="<?= $user['data']['phone2'] ?? '' ?>" class="form-control" />
                        </div>
                        
                        <div class="col-md-12 text-end">
                            <button type="submit" name="saveSetting" class="btn btn-primary">Save Setting</button>
                        </div>

                    </div>

                    
                    <?php 
                        // } else { 
                        //     echo '<h5>'.$user['message'].'</h5>';
                        // }
                    ?>
                </form>

            </div>
        </div>
    </div>
</div>

<?php include('includes/footer.php'); ?>