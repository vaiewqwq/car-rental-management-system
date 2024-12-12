<?php include('includes/header.php'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit Social Media
                        <a href="social-media.php" class="btn btn-danger btn-sm float-end">Back</a>
                    </h6>
                </div>
                <div class="card-body">
                    
                    <?php alertSuccess(); ?>
                    
                    <form action="code.php" method="POST">
                        <?php 
                            $paramResult = checkParamId('id');
                            if(!is_numeric($paramResult)){
                                echo '<h5>'.$paramResult.'</h5>';
                                return false;
                            }

                            $socialMedia = getById('social_medias',checkParamId('id'));
                            if($socialMedia['status'] == 200){
                        ?>

                        <input type="hidden" name="socialMediaId" required value="<?= $socialMedia['data']['id']; ?>" />
                               
                        <div class="mb-3">
                            <label>Name *</label>
                            <input type="text" name="name" required value="<?= $socialMedia['data']['name']; ?>" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Link / Url *</label>
                            <input type="text" name="link" required value="<?= $socialMedia['data']['slug']; ?>" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Status (unchecked=Show, checked=Hide)  *</label>
                            <br/>
                            <input type="checkbox" style="width:30px;height:30px;" name="status" <?= $socialMedia['data']['status'] == true ? 'checked':''; ?> />
                        </div>
                        
                        <div class="mb-3 text-end">
                            <button type="submit" name="updateSocialMedia" class="btn btn-primary">Update</button>
                        </div>

                        <?php 
                            } else { 
                                echo '<h5>'.$socialMedia['message'].'</h5>';
                            }
                        ?>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>
