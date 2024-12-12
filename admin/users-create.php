<?php include('includes/header.php'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>Add User
                        <a href="users.php" class="btn btn-danger btn-sm float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php alertSuccess(); ?>

                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Name *</label>
                                    <input type="text" name="name" required class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Email *</label>
                                    <input type="email" name="email" required class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Password *</label>
                                    <input type="password" name="password" required class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Phone</label>
                                    <input type="text" name="phone" required class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Alternate Phone</label>
                                    <input type="text" name="alt_phone" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>Address</label>
                                    <input type="text" name="address" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>DL Number</label>
                                    <input type="text" name="dl_number" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>DL Image Front Side</label>
                                    <input type="file" name="dl_image_front" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label>DL Image Back Side</label>
                                    <input type="file" name="dl_image_back" class="form-control" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Id/Document Proof Type</label>
                                    <select name="id_proof_type" class="form-select" required>
                                        <option value="">Select Id Proof</option>
                                        <option value="Aadhar">Aadhar</option>
                                        <option value="PAN">PAN</option>
                                        <option value="Voter">Voter</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label>Id Proof Number</label>
                                    <input type="text" name="id_proof_number" class="form-control" />
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="mb-3">
                                    <label>Select Role</label>
                                    <select name="role" class="form-select" required>
                                        <option value="">Select Role</option>
                                        <option value="admin">Admin</option>
                                        <option value="user">User</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label>Is Ban</label>
                                    <br/>
                                    <input type="checkbox" style="width:30px;height:30px;" name="is_ban" />
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="mb-3">
                                    <label>Is Verified</label>
                                    <br/>
                                    <input type="checkbox" style="width:30px;height:30px;" name="is_verified" />
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="mb-3 text-end">
                                    <br/>
                                    <button type="submit" name="saveUser" class="btn btn-primary">Submit</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>
