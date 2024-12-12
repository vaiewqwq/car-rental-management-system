<?php include('includes/header.php'); ?>

    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header pb-0">
                    <h4>Add Car
                        <a href="cars.php" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php alertSuccess(); ?>

                    <form action="code.php" method="POST" enctype="multipart/form-data">

                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Car Name *</label>
                                <input type="text" name="name" required class="form-control" />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Car Model *</label>
                                <input type="date" name="model" required class="form-control" />
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
                                                <option value="<?= $brandItem['id']; ?>"><?= $brandItem['name']; ?></option>
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
                                                <option value="<?= $bodyTypeItem['id']; ?>"><?= $bodyTypeItem['name']; ?></option>
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
                                    <option value="Automatic">Automatic</option>
                                    <option value="Manual">Manual</option>
                                </select>
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Select Fuel</label>
                                <select name="fuel" class="form-select" required>
                                    <option value="">Select Fuel Tyoe</option>
                                    <option value="Petrol">Petrol</option>
                                    <option value="Diesel">Diesel</option>
                                    <!-- <option value="CNG">CNG</option>
                                    <option value="LPG">LPG</option> -->
                                </select>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Seating Capacity</label>
                                <input type="text" name="seating_capacity" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Car Reg No. *</label>
                                <input type="text" name="car_reg_no" class="form-control" />
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>kms Driven</label>
                                <input type="text" name="kms_driven" class="form-control" />
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Price Per Hour *</label>
                                <input type="text" name="price_per_hour" class="form-control" required />
                            </div>

                            <div class="col-md-4 mb-3">
                                <label>Fastag</label>
                                <br/>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fastag" value="1" id="fastagYes">
                                    <label class="form-check-label" for="fastagYes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="fastag" value="0" checked id="fastagNo">
                                    <label class="form-check-label" for="fastagNo">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label>Sun Roof</label>
                                <br/>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sun_roof" value="1" id="sunRoofYes">
                                    <label class="form-check-label" for="sunRoofYes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="sun_roof" value="0" checked id="sunRoofNo">
                                    <label class="form-check-label" for="sunRoofNo">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label>Cruise Control</label>
                                <br/>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="cruise_control" value="1"  id="cruise_controlYes">
                                    <label class="form-check-label" for="cruise_controlYes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="cruise_control"  value="0" checked id="cruise_controlNo">
                                    <label class="form-check-label" for="cruise_controlNo">
                                        No
                                    </label>
                                </div>
                            </div>
                            
                            <div class="col-md-3 mb-3">
                                <label>360 Camera</label>
                                <br/>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="360_camera" value="1"  id="360_cameraYes">
                                    <label class="form-check-label" for="360_cameraYes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="360_camera" value="0" checked id="360_cameraNo">
                                    <label class="form-check-label" for="360_cameraNo">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label>Home Delivery</label>
                                <br/>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="home_delivery" value="1" id="home_deliveryYes">
                                    <label class="form-check-label" for="home_deliveryYes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="home_delivery" value="0" checked id="home_deliveryNo">
                                    <label class="form-check-label" for="home_deliveryNo">
                                        No
                                    </label>
                                </div>
                            </div>

                            <div class="col-md-3 mb-3">
                                <label>Air Bags</label>
                                <br/>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="airbags" value="1" id="airbagsYes">
                                    <label class="form-check-label" for="airbagsYes">
                                        Yes
                                    </label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="airbags" value="0" checked id="airbagsNo">
                                    <label class="form-check-label" for="airbagsNo">
                                        No
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4 mb-3">
                                <label>Status (unchecked=Show, checked=Hide)  *</label>
                                <br/>
                                <input type="checkbox" style="width:30px;height:30px;" name="status" />
                            </div>
                            <div class="col-md-5 mb-3">
                                <label>Upload Car Front Image</label>
                                <input type="file" name="image" class="form-control" />
                            </div>

                            <div class="col-md-12 mb-3">
                                <label>Description</label>
                                <textarea name="description" required class="form-control" rows="3"></textarea>
                            </div>
                        
                            
                            <div class="col-md-12 mb-3 text-end">
                                <button type="submit" name="saveCar" class="btn btn-primary">Submit</button>
                            </div>

                        </div>


                    </form>
                </div>
            </div>
        </div>
    </div>

<?php include('includes/footer.php'); ?>
