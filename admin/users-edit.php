<?php include('includes/header.php'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h6>Edit User
                        <a href="users.php" class="btn btn-danger btn-sm float-end">Back</a>
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

                            $user = getById('users',checkParamId('id'));
                            if($user['status'] == 200){
                        ?>

                        <input type="hidden" name="userId" required value="<?= $user['data']['id']; ?>" />

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Name *</label>
                                    <input type="text" name="name" value="<?= $user['data']['name']; ?>" required class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Email *</label>
                                    <input type="email" name="email" value="<?= $user['data']['email']; ?>" required class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Password *</label>
                                    <input type="password" name="password" value="<?= $user['data']['password']; ?>" required class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="<?= $user['data']['phone']; ?>" required class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Alternate Phone</label>
                                    <input type="text" name="alt_phone" value="<?= $user['data']['alt_phone']; ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Address</label>
                                    <input type="text" name="address" value="<?= $user['data']['address']; ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>DL Number</label>
                                    <input type="text" name="dl_number" value="<?= $user['data']['dl_number']; ?>" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>DL Image Front Side</label>
                                    <input type="file" name="dl_image_front" class="form-control" />

                                    <?php if($user['data']['dl_image_front'] != ''){ ?> 
                                        <img src="<?= '../'.$user['data']['dl_image_front']; ?>" style="width: 70px;height: 70px;" alt="DL Image Front Side" />
                                    <?php }else{ echo "No Image Uploaded"; } ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>DL Image Back Side</label>
                                    <input type="file" name="dl_image_back" class="form-control" />
                                    <?php if($user['data']['dl_image_back'] != ''){ ?> 
                                        <img src="<?= '../'.$user['data']['dl_image_back']; ?>" style="width: 70px;height: 70px;" alt="DL Image Front Side" />
                                    <?php }else{ echo "No Image Uploaded"; } ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Id/Document Proof Type</label>
                                    <select name="id_proof_type" class="form-select" required>
                                        <option value="">Select Id Proof</option>
                                        <option value="Aadhar"  <?= $user['data']['id_proof_type'] == 'Aadhar' ? 'selected':''; ?> >Aadhar</option>
                                        <option value="PAN"  <?= $user['data']['id_proof_type'] == 'PAN' ? 'selected':''; ?> >PAN</option>
                                        <option value="Voter"  <?= $user['data']['id_proof_type'] == 'Voter' ? 'selected':''; ?> >Voter</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Id Proof Number</label>
                                    <input type="text" name="id_proof_number"  value="<?= $user['data']['id_proof_number']; ?>" class="form-control" />
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Select Role</label>
                                    <select name="role" class="form-select" required>
                                        <option value="">Select Role</option>
                                        <option value="admin" <?= $user['data']['role'] == 'admin' ? 'selected':''; ?> >Admin</option>
                                        <option value="user" <?= $user['data']['role'] == 'user' ? 'selected':''; ?>>User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label>Is Ban</label>
                                    <br/>
                                    <input type="checkbox" style="width:30px;height:30px;" name="is_ban" <?= $user['data']['is_ban'] == true ? 'checked':''; ?> />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label>Is Verified</label>
                                    <br/>
                                    <input type="checkbox" style="width:30px;height:30px;" name="is_verified" <?= $user['data']['is_verified'] == true ? 'checked':''; ?> />
                                </div>
                            </div>

                            <div class="col-md-5 mb-3 text-end">
                                <br/>
                                <button type="submit" name="updateUser" class="btn btn-primary">Update</button>
                            </div>
                        </div>

                        <?php 
                            } else { 
                                echo '<h5>'.$user['message'].'</h5>';
                            }
                        ?>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>
