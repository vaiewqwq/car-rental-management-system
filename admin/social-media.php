<?php include('includes/header.php'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>Social Media Lists
                        <a href="social-media-create.php" class="btn btn-primary btn-sm float-end">Add Social</a>
                    </h4>
                </div>
                <div class="card-body pt-0 pb-2">
                    <?php alertSuccess(); ?>
                    
                    <div class="table-responsive p-0">
                        <table id="myTable" class="table table-striped align-items-center justify-content-center">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Social Name</th>
                                    <th>Link</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $socialMedia = getAll('social_medias');
                                    if($socialMedia)
                                    {
                                        if(mysqli_num_rows($socialMedia) > 0){
                                            foreach($socialMedia as $serviceMediaItem) :
                                            ?>
                                            <tr>
                                                <td><?= $serviceMediaItem['id']; ?></td>
                                                <td><?= $serviceMediaItem['name']; ?></td>
                                                <td><?= $serviceMediaItem['slug']; ?></td>
                                                <td><?= $serviceMediaItem['status'] == true ? 'Hidden':'Visible'; ?></td>
                                                <td>
                                                    <a href="social-media-edit.php?id=<?= $serviceMediaItem['id'];?>" class="btn mb-0 btn-success btn-sm">Edit</a>
                                                    <a href="social-media-delete.php?id=<?= $serviceMediaItem['id'];?>" 
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
                                                <td colspan="4">No Record Found!</td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        ?>
                                        <tr>
                                            <td colspan="4">No Record Available</td>
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
