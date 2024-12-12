<?php include('includes/header.php'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>Cars
                        <a href="cars-create.php" class="btn btn-primary btn-sm float-end">Add Car</a>
                    </h4>
                </div>
                <div class="card-body pt-0 pb-2">
                    <?php alertSuccess(); ?>
                    
                    <div class="table-responsive p-0">
                        <table id="myTable" class="table table-striped align-items-center justify-content-center">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Car Name</th>
                                    <th>Model</th>
                                    <th>Car Reg. No.</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $cars = getAll('cars');
                                    if($cars)
                                    {
                                        if(mysqli_num_rows($cars) > 0){
                                            foreach($cars as $item) :
                                            ?>
                                            <tr>
                                                <td><?= $item['id']; ?></td>
                                                <td><?= $item['name']; ?></td>
                                                <td><?= $item['model']; ?></td>
                                                <td><?= $item['car_reg_no']; ?></td>
                                                <td><?= $item['status'] == true ? 'Hidden':'Visible'; ?></td>
                                                <td>
                                                    <a href="cars-edit.php?id=<?= $item['id'];?>" class="btn px-3 mb-0 btn-success btn-sm">Edit</a>
                                                    <a href="cars-delete.php?id=<?= $item['id'];?>" 
                                                        onclick="return confirm('Are you sure you want to delete data?')"
                                                        class="btn mb-0 px-3 btn-danger btn-sm">
                                                        Delete
                                                    </a>
                                                    <a href="car-images.php?id=<?= $item['id'];?>" class="btn mb-0 px-3 btn-info btn-sm">Upload Images</a>
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
