<?php include('includes/header.php'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>Brands
                        <a href="brands-create.php" class="btn btn-primary btn-sm float-end">Add Brand</a>
                    </h4>
                </div>
                <div class="card-body pt-0 pb-2">
                    <?php alertSuccess(); ?>
                    
                    <div  class="table-responsive p-0">
                        <table id="myTable" class="table table-striped align-items-center justify-content-center">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Brand Name</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $brands = getAll('brands');
                                    if($brands)
                                    {
                                        if(mysqli_num_rows($brands) > 0){
                                            foreach($brands as $serviceMediaItem) :
                                            ?>
                                            <tr>
                                                <td><?= $serviceMediaItem['id']; ?></td>
                                                <td><?= $serviceMediaItem['name']; ?></td>
                                                <td>
                                                    <?php if($serviceMediaItem['image'] != ''){ ?> 
                                                        <img src="<?= '../'.$serviceMediaItem['image']; ?>" style="width: 50px;height: 50px;" alt="Brand" />
                                                    <?php }else{ echo "No Image"; } ?>
                                                </td>
                                                <td><?= $serviceMediaItem['status'] == true ? 'Hidden':'Visible'; ?></td>
                                                <td>
                                                    <a href="brands-edit.php?id=<?= $serviceMediaItem['id'];?>" class="btn mb-0 btn-success btn-sm">Edit</a>
                                                    <a href="brands-delete.php?id=<?= $serviceMediaItem['id'];?>" 
                                                        onclick="return confirm('Are you sure you want to delete data?')"
                                                        class="btn mb-0 btn-danger btn-sm">
                                                        Delete
                                                    </a>
                                                </td>
                                            </tr>
                                            <?php
                                            endforeach;
                                        }else{
                                            ?>
                                            <tr>
                                                <td colspan="5">No Record Found!</td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr>
                                            <td colspan="5">No Record Available</td>
                                        </tr>
                                        <?php
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>
