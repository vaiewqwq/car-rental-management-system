<?php 

include('includes/header.php'); 
$paramResult = checkParamId('id');
if(!is_numeric($paramResult)){
    echo '<h5>'.$paramResult.'</h5>';
    return false;
}

$carImage = getById('car_images',checkParamId('id'));

?>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>Edit Car Images
                        <a href="car-images.php?id=<?=$carImage['data']['car_id'];?>" class="btn btn-primary btn-sm float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php alertSuccess(); ?>
                    
                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <?php 
                            if($carImage['status'] == 200){
                        ?>

                        <input type="hidden" name="car_image_id" value="<?=checkParamId('id');?>" />

                        <div class="row">
                            <div class="col-md-8 mb-3">
                                <div class="mb-3">
                                    <label>Car Image (Only : jpeg, jpg, png file)</label>
                                    <input type="file" name="image" class="form-control" />
                                </div>
                                <div class="mb-3">
                                    <label>Is Thumbnail (unchecked=no, checked=Show)  *</label>
                                    <br/>
                                    <input type="checkbox" style="width:30px;height:30px;" <?= $carImage['data']['is_thumbnail'] == true ? 'checked':''; ?> name="is_thumbnail" />
                                </div>
                                <div class="mb-3">
                                    <label>Status (unchecked=Show, checked=Hide)  *</label>
                                    <br/>
                                    <input type="checkbox" style="width:30px;height:30px;" <?= $carImage['data']['status'] == true ? 'checked':''; ?> name="status" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <?php if($carImage['data']['image'] != ''){ ?> 
                                    <img src="<?= '../'.$carImage['data']['image']; ?>" class="w-100" alt="Brand" />
                                <?php }else{ echo "No Image"; } ?>
                            </div>
                           
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" name="updateImageUpload" class="btn btn-primary">Upload</button>
                        </div>

                        <?php 
                            } else { 
                                echo '<h5>'.$carImage['message'].'</h5>';
                            }
                        ?>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>
