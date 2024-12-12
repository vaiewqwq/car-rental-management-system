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
                    <h4>Car Images
                        <a href="cars.php" class="btn btn-danger btn-sm float-end mx-2">Back</a>
                        <a href="car-images-create.php?id=<?=checkParamId('id');?>" class="btn btn-primary btn-sm float-end">Upload Images</a>
                    </h4>
                </div>
                <div class="card-body pt-0 pb-2">
                    <?php alertSuccess(); ?>
                    <?php
                                    
                        $carId = checkParamId('id');
                        $query = "SELECT * FROM car_images WHERE car_id='$carId' ";
                        $result = mysqli_query($conn, $query);

                        if($result)
                        {
                            if(mysqli_num_rows($result) > 0){
                                ?>
                                                        
                                <div class="table-responsive p-0">
                                    <table id="myTable" class="table table-striped align-items-center justify-content-center">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                    
                                                foreach($result as $item) :
                                                ?>
                                                <tr>
                                                    <td><?= $item['id']; ?></td>
                                                    <td>
                                                        <?php if($item['image'] != ''){ ?> 
                                                            <img src="<?= '../'.$item['image']; ?>" style="width: 50px;height: 50px;" alt="Brand" />
                                                        <?php }else{ echo "No Image"; } ?>
                                                    </td>
                                                    <td><?= $item['status'] == true ? 'Hidden':'Visible'; ?></td>
                                                    <td>
                                                        <a href="car-images-edit.php?id=<?= $item['id'];?>" class="btn px-3 mb-0 btn-success btn-sm">Edit</a>
                                                        <a href="car-images-delete.php?id=<?= $item['id'];?>" 
                                                            onclick="return confirm('Are you sure you want to delete data?')"
                                                            class="btn mb-0 px-3 btn-danger btn-sm">
                                                            Delete
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                endforeach;
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                                <?php
                            }else{
                                echo "<h5>No Record Found!</h5>";

                            }
                        }
                        else
                        {
                            echo "<h5>No Record Available!</h5>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>
