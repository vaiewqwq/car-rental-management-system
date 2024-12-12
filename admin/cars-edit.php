<?php include('includes/header.php'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>Edit Car
                        <a href="cars.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php alertSuccess(); ?>

                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <?php 
                            $paramResult = checkParamId('id');
                            if(!is_numeric($paramResult)){
                                echo '<h5>'.$paramResult.'</h5>';
                                return false;
                            }

                            $cars = getById('cars',checkParamId('id'));
                            if($cars['status'] == 200){
                        ?>

                        <input type="hidden" name="carId" required value="<?= $cars['data']['id']; ?>" />

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Car Name *</label>
                                <input type="text" name="name" value="<?= $cars['data']['name']; ?>"  required class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Car Model *</label>
                                <input type="date" name="model" value="<?= $cars['data']['model']; ?>" required class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Select Brand *</label>
                                <select name="brand_id" class="form-select" required>
                                    <option value="">Select Brand</option>
                                    <?php
                                    $brands = getAll('brands');
                                    if($brands){
                                        if(mysqli_num_rows($brands) > 0){
                                            foreach($brands as $brandItem){
                                                ?>
                                                <option 
                                                    value="<?= $brandItem['id']; ?>"
                                                    <?= $cars['data']['brand_id'] == $brandItem['id'] ? 'selected':''; ?>
                                                >
                                                    <?= $brandItem['name']; ?>
                                                </option>
                                                <?php
                                            }
                                        }else{
                                            echo '<option value="">No Brands Available</option>';
                                        }
                                    }else{
                                        echo '<option value="">Something Went Wrong</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Select Body Types *</label>
                                <select name="body_type_id" class="form-select" required>
                                    <option value="">Select Body Types</option>
                                    <?php
                                    $bodyTypes = getAll('body_types');
                                    if($bodyTypes){
                                        if(mysqli_num_rows($bodyTypes) > 0){
                                            foreach($bodyTypes as $bodyTypeItem){
                                                ?>
                                                <option 
                                                    value="<?= $bodyTypeItem['id']; ?>"
                                                    <?= $cars['data']['body_type_id'] == $bodyTypeItem['id'] ? 'selected':''; ?>
                                                >
                                                    <?= $bodyTypeItem['name']; ?>
                                                </option>
                                                <?php
                                            }
                                        }else{
                                            echo '<option value="">No Body Types Available</option>';
                                        }
                                    }else{
                                        echo '<option value="">Something Went Wrong</option>';
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Select Transmission *</label>
                                <select name="transmission" class="form-select" required>
                                    <option value="">Select Transmission</option>
                                    <option value="Automatic" <?= $cars['data']['transmission'] == 'Automatic' ? 'selected':''; ?>>Automatic</option>
                                    <option value="Manual" <?= $cars['data']['transmission'] == 'Manual' ? 'selected':''; ?>>Manual</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Select Fuel</label>
                                <select name="fuel" class="form-select" required>
                                    <option value="">Select Fuel Tyoe</option>
                                    <option value="Petrol" <?= $cars['data']['fuel'] == 'Petrol' ? 'selected':''; ?>>Petrol</option>
                                    <option value="Diesel" <?= $cars['data']['fuel'] == 'Diesel' ? 'selected':''; ?>>Diesel</option>
                                    <!-- <option value="CNG" <?= $cars['data']['fuel'] == 'CNG' ? 'selected':''; ?>>CNG</option>
                                    <option value="LPG" <?= $cars['data']['fuel'] == 'LPG' ? 'selected':''; ?>>LPG</option> -->
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Seating Capacity</label>
                                <input type="text" name="seating_capacity" value="<?= $cars['data']['seating_capacity']; ?>" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Car Reg No. *</label>
                                <input type="text" name="car_reg_no" value="<?= $cars['data']['car_reg_no']; ?>" class="form-control" />
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>kms Driven</label>
                                <input type="text" name="kms_driven" value="<?= $cars['data']['kms_driven']; ?>" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Price Per Hour *</label>
                                <input type="text" name="price_per_hour" value="<?= $cars['data']['price_per_hour']; ?>" class="form-control" required />
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Fastag</label>
                                <br/>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fastag" value="1" <?= $cars['data']['fastag'] == true ? 'checked':''; ?>  id="fastagYes">
                                    <label class="form-check-label" for="fastagYes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fastag" value="0" <?= $cars['data']['fastag'] == false ? 'checked':''; ?>  id="fastagNo">
                                    <label class="form-check-label" for="fastagNo">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label>Sun Roof</label>
                                <br/>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sun_roof" value="1" <?= $cars['data']['sun_roof'] == true ? 'checked':''; ?>  id="sunRoofYes">
                                    <label class="form-check-label" for="sunRoofYes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sun_roof" value="0"  <?= $cars['data']['sun_roof'] == false ? 'checked':''; ?> id="sunRoofNo">
                                    <label class="form-check-label" for="sunRoofNo">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label>Cruise Control</label>
                                <br/>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="cruise_control" value="1" <?= $cars['data']['cruise_control'] == true ? 'checked':''; ?>  id="cruise_controlYes">
                                    <label class="form-check-label" for="cruise_controlYes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="cruise_control"  value="0"  <?= $cars['data']['cruise_control'] == false ? 'checked':''; ?> id="cruise_controlNo">
                                    <label class="form-check-label" for="cruise_controlNo">
                                        No
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <label>360 Camera</label>
                                <br/>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="360_camera" value="1" <?= $cars['data']['360_camera'] == true ? 'checked':''; ?>  id="360_cameraYes">
                                    <label class="form-check-label" for="360_cameraYes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="360_camera" value="0"  <?= $cars['data']['360_camera'] == false ? 'checked':''; ?> id="360_cameraNo">
                                    <label class="form-check-label" for="360_cameraNo">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label>Home Delivery</label>
                                <br/>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="home_delivery" value="1" <?= $cars['data']['home_delivery'] == true ? 'checked':''; ?>  id="home_deliveryYes">
                                    <label class="form-check-label" for="home_deliveryYes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="home_delivery" value="0"  <?= $cars['data']['home_delivery'] == false ? 'checked':''; ?> id="home_deliveryNo">
                                    <label class="form-check-label" for="home_deliveryNo">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label>Air Bags</label>
                                <br/>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="airbags" value="1" <?= $cars['data']['airbags'] == true ? 'checked':''; ?>  id="airbagsYes">
                                    <label class="form-check-label" for="airbagsYes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="airbags" value="0"  <?= $cars['data']['airbags'] == false ? 'checked':''; ?> id="airbagsNo">
                                    <label class="form-check-label" for="airbagsNo">
                                        No
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Status (unchecked=Show, checked=Hide)  *</label>
                                <br/>
                                <input type="checkbox" style="width:30px;height:30px;" name="status" <?= $cars['data']['status'] == true ? 'checked':''; ?> />
                            </div>
                            <div class="col-md-5 mb-3">
                                <label>Upload Car Front Image</label>
                                <input type="file" name="image" class="form-control" />
                                <?php if($cars['data']['image'] != ''){ ?> 
                                    <img src="<?= '../'.$cars['data']['image']; ?>" style="width: 70px;height: 70px;" alt="car" />
                                <?php }else{ echo "No Image Uploaded"; } ?>
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea name="description" required class="form-control" rows="3"><?= $cars['data']['description']; ?></textarea>
                            </div>
                        
                            
                            <div class="col-md-12 mb-3 text-end">
                                <button type="submit" name="updateCar" class="btn btn-primary">Update</button>
                            </div>

                        </div>

                        <?php 
                            } else { 
                                echo '<h5>'.$cars['message'].'</h5>';
                            }
                        ?>

                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>
