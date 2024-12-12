<?php include('includes/header.php'); ?>

    <div class="row">
        <div class="col-md-12">
            <div class="p-2 mb-3">
                <h6>Verify User
                    <a href="verify-users.php" class="btn btn-danger btn-sm float-end">Back</a>
                </h6>
            </div>
                <?php alertSuccess(); ?>
            
                <?php 
                    $paramResult = checkParamId('id');
                    if(!is_numeric($paramResult)){
                        echo '<h5>'.$paramResult.'</h5>';
                        return false;
                    }

                    $user = getById('users',checkParamId('id'));
                    if($user['status'] == 200){
                ?>


                <div class="card mb-4">
                    <div class="card-header py-3 border-bottom">
                        <h4 class="mb-0">Documents</h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <input type="hidden" name="userId" required value="<?= $user['data']['id']; ?>" />

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mb-3">
                                        <label>DL Number</label>
                                        <input type="text" name="dl_number" value="<?= $user['data']['dl_number']; ?>" readonly class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>DL Image Front Side</label>
                                        <br/>
                                        <?php if($user['data']['dl_image_front'] != ''){ ?> 
                                            <img src="<?= '../'.$user['data']['dl_image_front']; ?>" class="img-size" alt="DL Image Front Side" />
                                        <?php }else{ echo "No Image Uploaded"; } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>DL Image Back Side</label>
                                        <br/>
                                        <?php if($user['data']['dl_image_back'] != ''){ ?> 
                                            <img src="<?= '../'.$user['data']['dl_image_back']; ?>"  class="img-size" alt="DL Image Front Side" />
                                        <?php }else{ echo "No Image Uploaded"; } ?>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Id/Document Proof Type</label>
                                        <input type="text" name="dl_number" value="<?= $user['data']['id_proof_type']; ?>" readonly class="form-control text-uppercase" />
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Id Proof Number</label>
                                        <input type="text" name="id_proof_number"  value="<?= $user['data']['id_proof_number']; ?>" readonly class="form-control" />
                                    </div>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label>Remarks (Optional)</label>
                                    <input type="text" name="remarks"  value="<?= $user['data']['remarks']; ?>" class="form-control" />
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label>Is Verified</label>
                                        <br/>
                                        <input type="checkbox" style="width:30px;height:30px;" name="is_verified" <?= $user['data']['is_verified'] == true ? 'checked':''; ?> />
                                    </div>
                                </div>
                                <div class="col-md-6 text-end">
                                    <br/>
                                    <button type="submit" name="updateVerification" class="btn btn-primary">Submit</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>


                <div class="card">
                    <div class="card-header py-3 border-bottom">
                        <h4 class="mb-0">User Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Name *</label>
                                    <input type="text" name="name" value="<?= $user['data']['name']; ?>" readonly class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Email *</label>
                                    <input type="email" name="email" value="<?= $user['data']['email']; ?>" readonly class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Phone</label>
                                    <input type="text" name="phone" value="<?= $user['data']['phone']; ?>" readonly class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Alternate Phone</label>
                                    <input type="text" name="alt_phone" value="<?= $user['data']['alt_phone']; ?>" readonly class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Address</label>
                                    <input type="text" name="address" value="<?= $user['data']['address']; ?>" readonly class="form-control" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <?php 
                    } else { 
                        echo '<h5>'.$user['message'].'</h5>';
                    }
                ?>
        </div>
    </div>

<?php include('includes/footer.php'); ?>
