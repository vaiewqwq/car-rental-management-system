<?php include('includes/header.php'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>Edit Body Type
                        <a href="body-types.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php alertSuccess(); ?>

                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <?php 
                            $paramResult = checkParamId('id');
                            if(!is_numeric($paramResult)){
                                echo '<h5>'.$paramResult.'</h5>';
                                return false;
                            }

                            $bodyType = getById('body_types',checkParamId('id'));
                            if($bodyType['status'] == 200){
                        ?>

                        <input type="hidden" name="bodyTypeId" required value="<?= $bodyType['data']['id']; ?>" />

                        <div class="mb-3">
                            <label>Brand Name *</label>
                            <input type="text" name="name" value="<?= $bodyType['data']['name']; ?>" required class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Brand Image</label>
                            <input type="file" name="image" class="form-control" />
                            <?php if($bodyType['data']['image'] != ''){ ?> 
                                <img src="<?= '../'.$bodyType['data']['image']; ?>" style="width: 70px;height: 70px;" alt="brand" />
                            <?php }else{ echo "No Image Uploaded"; } ?>
                        </div>
                        <div class="mb-3">
                            <label>Status (unchecked=Show, checked=Hide)  *</label>
                            <br/>
                            <input type="checkbox" style="width:30px;height:30px;" name="status" <?= $bodyType['data']['status'] == true ? 'checked':''; ?> />
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" name="updateBodyType" class="btn btn-primary">Submit</button>
                        </div>

                        <?php 
                            } else { 
                                echo '<h5>'.$bodyType['message'].'</h5>';
                            }
                        ?>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>
