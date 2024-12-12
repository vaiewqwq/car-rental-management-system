<?php include('includes/header.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="card mb-4">
                <div class="card-header border-bottom mb-2 pb-0">
                    <h4>Verify Users
                    </h4>
                </div>
                <div class="card-body pt-0 pb-2">
                    <?php alertSuccess(); ?>
                    
                    <?php
                    $query = "SELECT * FROM users WHERE dl_number!='' AND dl_image_front!='' AND is_verified='0'";
                    $users = mysqli_query($conn, $query);
                    
                    if(mysqli_num_rows($users) > 0){
                    ?>
                    <div class="table-responsive p-0">
                        <table id="myTable" class="table table-striped align-items-center justify-content-center">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Registered On</th>
                                    <th>Is Verified</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach($users as $userItem) :
                                ?>
                                <tr>
                                    <td><?= $userItem['id']; ?></td>
                                    <td><?= $userItem['name']; ?></td>
                                    <td><?= $userItem['email']; ?></td>
                                    <td><?= $userItem['phone']; ?></td>
                                    <td><?= date('d M Y', strtotime($userItem['created_at'])); ?></td>
                                    <td>
                                        <?php  
                                            if($userItem['is_verified'] == 1){
                                                echo '<span class="badge bg-primary">Verified</span>';
                                            }else{
                                                echo '<span class="badge bg-warning">Pending</span>';
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <a href="verify-user.php?id=<?= $userItem['id'];?>" class="btn mb-0 btn-info btn-sm">View</a>
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
                            ?>
                                <h5 class="mb-0">No Record Found!</h5>
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>
