<?php include('includes/header.php'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>Users List
                        <a href="users-create.php" class="btn btn-primary btn-sm float-end">Add User</a>
                    </h4>
                </div>
                <div class="card-body pt-0 pb-2">
                    <?php alertSuccess(); ?>
                    
                    <div class="table-responsive p-0">
                        <table id="myTable" class="table table-striped align-items-center justify-content-center">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Role</th>
                                    <th>Is Ban</th>
                                    <th>Is Verified</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $users = getAll('users');

                                    if(mysqli_num_rows($users) > 0){
                                        foreach($users as $userItem) :
                                        ?>
                                        <tr>
                                            <td><?= $userItem['id']; ?></td>
                                            <td><?= $userItem['name']; ?></td>
                                            <td><?= $userItem['email']; ?></td>
                                            <td><?= $userItem['phone']; ?></td>
                                            <td><?= $userItem['role']; ?></td>
                                            <td><?= $userItem['is_ban'] == 1 ? 'Banned':'Active'; ?></td>
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
                                                <a href="users-edit.php?id=<?= $userItem['id'];?>" class="btn mb-0 btn-success btn-sm">Edit</a>
                                                <a href="users-delete.php?id=<?= $userItem['id'];?>" 
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
                                            <td colspan="6">No Record Found!</td>
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
