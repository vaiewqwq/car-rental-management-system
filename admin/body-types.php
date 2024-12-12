<?php include('includes/header.php'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>Body Types
                        <a href="body-types-create.php" class="btn btn-primary btn-sm float-end">Add Body Type</a>
                    </h4>
                </div>
                <div class="card-body pt-0 pb-2">
                    <?php alertSuccess(); ?>
                    
                    <div class="table-responsive p-0">
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
                                    $bodyTypes = getAll('body_types');
                                    if($bodyTypes)
                                    {
                                        if(mysqli_num_rows($bodyTypes) > 0){
                                            foreach($bodyTypes as $bodyTypeItem) :
                                            ?>
                                            <tr>
                                                <td><?= $bodyTypeItem['id']; ?></td>
                                                <td><?= $bodyTypeItem['name']; ?></td>
                                                <td>
                                                    <?php if($bodyTypeItem['image'] != ''){ ?> 
                                                        <img src="<?= '../'.$bodyTypeItem['image']; ?>" style="width: 50px;height: 50px;" alt="Brand" />
                                                    <?php }else{ echo "No Image"; } ?>
                                                </td>
                                                <td><?= $bodyTypeItem['status'] == true ? 'Hidden':'Visible'; ?></td>
                                                <td>
                                                    <a href="body-types-edit.php?id=<?= $bodyTypeItem['id'];?>" class="btn mb-0 btn-success btn-sm">Edit</a>
                                                    <a href="body-types-delete.php?id=<?= $bodyTypeItem['id'];?>" 
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
