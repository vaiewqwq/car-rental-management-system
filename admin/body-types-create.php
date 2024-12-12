<?php include('includes/header.php'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>Add Body Type
                        <a href="body-types.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php alertSuccess(); ?>

                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <div class="mb-3">
                            <label>Body Type Name *</label>
                            <input type="text" name="name" required class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Body Type Image</label>
                            <input type="file" name="image" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label>Status (unchecked=Show, checked=Hide)  *</label>
                            <br/>
                            <input type="checkbox" style="width:30px;height:30px;" name="status" />
                        </div>
                        <div class="mb-3 text-end">
                            <button type="submit" name="saveBodyType" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>
