<?php 

include('includes/header.php'); 

$paramResult = checkParamId('id');
if(!is_numeric($paramResult)){
    echo '<h5>'.$paramResult.'</h5>';
    return false;
}
?>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>Upload Car Images
                        <a href="car-images.php?id=<?=checkParamId('id');?>" class="btn btn-primary btn-sm float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php alertSuccess(); ?>
                    
                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <input type="hidden" name="car_id" value="<?=checkParamId('id');?>" />

                        <div class="mb-3">
                            <label>Car Image (Max 20 images at once) (Only : jpeg, jpg, png file)</label>
                            <input type="file" name="files[]" multiple class="form-control" />
                        </div>

                        <div class="mb-3">
                            <label>Status (unchecked=Show, checked=Hide)  *</label>
                            <br/>
                            <input type="checkbox" style="width:30px;height:30px;" name="status" />
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" name="saveImageUpload" class="btn btn-primary">Upload</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>
