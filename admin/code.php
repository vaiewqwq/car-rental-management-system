<?php

include('../config/function.php');

if(isset($_POST['saveUser']))
{
    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    $phone = validate($_POST['phone']);
    $alt_phone = validate($_POST['alt_phone']);

    $address = validate($_POST['address']);
    $dl_number = validate($_POST['dl_number']);

    if($_FILES['dl_image_front']['size'] > 0)
    {
        $image = $_FILES['dl_image_front'];
        $fileResult = uploadImage('dl-docs',$image);
        $dl_image_front = 'assets/uploads/dl-docs/'.$fileResult;
    }
    else{
        $dl_image_front = null;
    }

    if($_FILES['dl_image_back']['size'] > 0)
    {
        $image = $_FILES['dl_image_back'];
        $fileResult = uploadImage('dl-docs',$image);
        $dl_image_back = 'assets/uploads/dl-docs/'.$fileResult;
    }
    else{
        $dl_image_back = null;
    }

    $id_proof_type = validate($_POST['id_proof_type']);
    $id_proof_number = validate($_POST['id_proof_number']);

    $isBan = validate($_POST['is_ban']) == true ? 1:0;
    $isVerified = validate($_POST['is_verified']) == true ? 1:0;
    $role = validate($_POST['role']);
    
    if($name != '' || $email != '' || $password != ''){

        $dlCheckQuery = "SELECT * FROM users WHERE dl_number='$dl_number' OR (id_proof_type='$id_proof_type' AND id_proof_number='$id_proof_number')";
        $checkResult = mysqli_query($conn, $dlCheckQuery);
        if($checkResult){
            if(mysqli_num_rows($checkResult) > 0){
                redirect('users-create.php','Documents Already used by another user');
            }
        }else{
            redirect('users-create.php','Something Went Wrong');
        }


        $query = "INSERT INTO users (name,email,password,phone,alt_phone,address,role,is_ban,is_verified,dl_number,dl_image_front,dl_image_back,id_proof_type,id_proof_number) VALUES 
                ('$name', '$email', '$password', '$phone', '$alt_phone','$address','$role','$isBan','$isVerified',
                '$dl_number','$dl_image_front','$dl_image_back','$id_proof_type','$id_proof_number')";
                
        $result = mysqli_query($conn, $query);

        if($result){

            redirect('users.php','User Created Successfully');
        }else{
            redirect('users-create.php','Something Went Wrong');
        }
    }else{
        redirect('users-create.php','Please fill required fields!');
    }
}

if(isset($_POST['updateUser']))
{
    $userId = validate($_POST['userId']);

    $userData = getById('users',$userId);
    if($userData['status'] != 200){
        redirect('users-edit.php?id='.$userId,'No Such id found');
    }

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);
    $password = validate($_POST['password']);

    $phone = validate($_POST['phone']);
    $alt_phone = validate($_POST['alt_phone']);

    $address = validate($_POST['address']);
    $dl_number = validate($_POST['dl_number']);

    if($_FILES['dl_image_front']['size'] > 0)
    {
        $image = $_FILES['dl_image_front'];
        $fileResult = uploadImage('dl-docs',$image);
        $dl_image_front = 'assets/uploads/dl-docs/'.$fileResult;

        $deleteImage = "../".$userData['data']['dl_image_front'];
        if(file_exists($deleteImage)){
            unlink($deleteImage);
        }
    }
    else{
        $dl_image_front = $userData['data']['dl_image_front'];
    }

    if($_FILES['dl_image_back']['size'] > 0)
    {
        $image = $_FILES['dl_image_back'];
        $fileResult = uploadImage('dl-docs',$image);
        $dl_image_back = 'assets/uploads/dl-docs/'.$fileResult;

        $deleteImage = "../".$userData['data']['dl_image_back'];
        if(file_exists($deleteImage)){
            unlink($deleteImage);
        }
    }
    else{
        $dl_image_back = $userData['data']['dl_image_back'];
    }

    $id_proof_type = validate($_POST['id_proof_type']);
    $id_proof_number = validate($_POST['id_proof_number']);

    $isBan = validate($_POST['is_ban']) == true ? 1:0;
    $isVerified = validate($_POST['is_verified']) == true ? 1:0;
    $role = validate($_POST['role']);
    

    // Checking Id exists or not
    $user = getById('users',$userId);
    if($user['status'] != 200){
        redirect('users-edit.php?id='.$userId,'No Such id found');
    }

    if($name != '' || $email != '' || $password != ''){

        $dlCheckQuery = "SELECT * FROM users WHERE dl_number='$dl_number' OR (id_proof_type='$id_proof_type' AND id_proof_number='$id_proof_number')";
        $checkResult = mysqli_query($conn, $dlCheckQuery);
        if($checkResult){
            if(mysqli_num_rows($checkResult) > 0){
                redirect('users-edit.php?id='.$userId,'Documents Already used by another user');
            }
        }else{
            redirect('users-edit.php?id='.$userId,'Something Went Wrong');
        }

        $query = "UPDATE users SET name='$name', 
                    email='$email', 
                    password='$password',
                    phone='$phone',
                    alt_phone='$alt_phone',
                    address='$address',
                    is_verified='$isVerified',
                    dl_number='$dl_number',
                    dl_image_front='$dl_image_front',
                    dl_image_back='$dl_image_back',
                    id_proof_type='$id_proof_type',
                    id_proof_number='$id_proof_number',
                    is_ban='$isBan',
                    role='$role' 
                    WHERE id='$userId'";

        $result = mysqli_query($conn, $query);

        if($result){
            redirect('users-edit.php?id='.$userId,'User Updated Successfully');
        }else{
            redirect('users-edit.php?id='.$userId,'Something Went Wrong');
        }
    }else{
        redirect('users-edit.php?id='.$userId,'Please fill required fields!');
    }
}

if(isset($_POST['saveSetting']))
{
    $settingId = validate($_POST['settingId']);

    $title = validate($_POST['title']);
    $url = validate($_POST['url']);
    $description = validate($_POST['description']);

    $address = validate($_POST['address']);
    $email1 = validate($_POST['email1']);
    $email2 = validate($_POST['email2']);
    $phone1 = validate($_POST['phone1']);
    $phone2 = validate($_POST['phone2']);

    if($settingId == 'insert')
    {
        if($_FILES['logoImage']['size'] > 0)
        {
            $image = $_FILES['logoImage'];
            $fileResult = uploadImage('',$image);
            $logo = 'assets/uploads/'.$fileResult;
        }
        else{
            $logo = NULL;
        }

        $query = "INSERT INTO web_settings (title,url,description,logo,address,email1,email2,phone1,phone2) VALUES 
            ('$title', '$url', '$description', '$logo', '$address', '$email1', '$email2', '$phone1', '$phone2')";
        $result = mysqli_query($conn, $query);
    }
    
    if(is_numeric($settingId))
    {
        $settingData = getById('web_settings',$settingId);

        if($_FILES['logoImage']['size'] > 0)
        {
            $image = $_FILES['logoImage'];
            $fileResult = uploadImage('',$image);
            $logo = 'assets/uploads/'.$fileResult;
    
            $deleteImage = "../".$settingData['data']['logo'];
            if(file_exists($deleteImage)){
                unlink($deleteImage);
            }
        }
        else{
            $logo = $settingData['data']['logo'];
        }
    
        $query = "UPDATE web_settings SET title='$title', 
                url='$url', 
                description='$description', 
                logo='$logo',
                address='$address', 
                email1='$email1',
                email2='$email2',
                phone1='$phone1',
                phone2='$phone2' 
                WHERE id='$settingId'";

        $result = mysqli_query($conn, $query);
    }

    if($result){
        redirect('settings.php','Settings Saved Successfully');
    }else{
        redirect('settings.php','Something Went Wrong');
    }
}

if(isset($_POST['saveSocialMedia']))
{
    $name = validate($_POST['name']);
    $slug = validate($_POST['link']);
    $status = validate($_POST['status']) == true ? 1:0;

    $query = "INSERT INTO social_medias (name,slug,status) VALUES ('$name','$slug','$status')";
    $result = mysqli_query($conn, $query);

    if($result){
        redirect('social-media.php','Social Media Saved Successfully');
    }else{
        redirect('social-media.php','Something Went Wrong');
    }
}

if(isset($_POST['updateSocialMedia']))
{
    $socialMediaId = validate($_POST['socialMediaId']);
    $name = validate($_POST['name']);
    $slug = validate($_POST['link']);
    $status = validate($_POST['status']) == true ? 1:0;

    $query = "UPDATE social_medias SET name='$name', slug='$slug', status='$status' WHERE id='$socialMediaId'";
    $result = mysqli_query($conn, $query);

    if($result){
        redirect('social-media.php','Social Media Updated Successfully');
    }else{
        redirect('social-media.php','Something Went Wrong');
    }
}

if(isset($_POST['saveBrand']))
{
    $name = validate($_POST['name']);
    $str = validate($_POST['name']);
    $slug = strtolower(str_replace(' ','-',$str));
    $status = isset($_POST['status']) == true ? 1:0;

    if($_FILES['image']['size'] > 0)
    {
        $image = $_FILES['image'];
        $fileResult = uploadImage('brands',$image);
        $finalImage = 'assets/uploads/brands/'.$fileResult;
    }
    else{
        $finalImage = NULL;
    }

    $query = "INSERT INTO brands (name,slug,image,status) VALUES ('$name','$slug','$finalImage','$status')";
    $result = mysqli_query($conn, $query);

    if($result){
        redirect('brands.php','Brands Saved Successfully');
    }else{
        redirect('brands.php','Something Went Wrong');
    }
}

if(isset($_POST['updateBrand']))
{
    $brandId = validate($_POST['brandId']);

    $name = validate($_POST['name']);
    $str = validate($_POST['name']);
    $slug = strtolower(str_replace(' ','-',$str));
    $status = isset($_POST['status']) == true ? 1:0;

    $brandData = getById('brands',$brandId);
    if($_FILES['image']['size'] > 0)
    {
        $image = $_FILES['image'];
        $fileResult = uploadImage('brands',$image);
        $finalImage = 'assets/uploads/brands/'.$fileResult;

        $deleteImage = "../".$brandData['data']['image'];
        if(file_exists($deleteImage)){
            unlink($deleteImage);
        }
    }
    else{
        $finalImage = $brandData['data']['image'];
    }

    $query = "UPDATE brands SET name='$name', slug='$slug', image='$finalImage', status='$status' WHERE id='$brandId'";
    $result = mysqli_query($conn, $query);
    
    if($result){
        redirect('brands-edit.php?id='.$brandId,'Brands Updated Successfully');
    }else{
        redirect('brands-edit.php?id='.$brandId,'Something Went Wrong');
    }
}

if(isset($_POST['saveBodyType']))
{
    $name = validate($_POST['name']);
    $str = validate($_POST['name']);
    $slug = strtolower(str_replace(' ','-',$str));
    $status = isset($_POST['status']) == true ? 1:0;

    if($_FILES['image']['size'] > 0)
    {
        $image = $_FILES['image'];
        $fileResult = uploadImage('bodytypes',$image);
        $finalImage = 'assets/uploads/bodytypes/'.$fileResult;
    }
    else{
        $finalImage = NULL;
    }

    $query = "INSERT INTO body_types (name,slug,image,status) VALUES ('$name','$slug','$finalImage','$status')";
    $result = mysqli_query($conn, $query);

    if($result){
        redirect('body-types.php','Body Type Saved Successfully');
    }else{
        redirect('body-types.php','Something Went Wrong');
    }
}

if(isset($_POST['updateBodyType']))
{
    $bodyTypeId = validate($_POST['bodyTypeId']);

    $name = validate($_POST['name']);
    $str = validate($_POST['name']);
    $slug = strtolower(str_replace(' ','-',$str));
    $status = isset($_POST['status']) == true ? 1:0;

    $bodyTypeData = getById('body_types',$bodyTypeId);
    if($_FILES['image']['size'] > 0)
    {
        $image = $_FILES['image'];
        $fileResult = uploadImage('bodytypes',$image);
        $finalImage = 'assets/uploads/bodytypes/'.$fileResult;

        $deleteImage = "../".$bodyTypeData['data']['image'];
        if(file_exists($deleteImage)){
            unlink($deleteImage);
        }
    }
    else{
        $finalImage = $bodyTypeData['data']['image'];
    }

    $query = "UPDATE body_types SET name='$name', slug='$slug', image='$finalImage', status='$status' WHERE id='$bodyTypeId'";
    $result = mysqli_query($conn, $query);
    
    if($result){
        redirect('body-types-edit.php?id='.$bodyTypeId,'Body Type Updated Successfully');
    }else{
        redirect('body-types-edit.php?id='.$bodyTypeId,'Something Went Wrong');
    }
}


if(isset($_POST['saveCar']))
{
    $name = validate($_POST['name']);
    $car_cid = rand(11111111,99999999);
    $car_reg_no = validate($_POST['car_reg_no']);

    $model = validate($_POST['model']);
    $brand_id = validate($_POST['brand_id']);
    $body_type_id = validate($_POST['body_type_id']);

    $transmission = validate($_POST['transmission']);
    $fuel = validate($_POST['fuel']);
    $seating_capacity = validate($_POST['seating_capacity']);
    $fastag = validate($_POST['fastag']);
    $kms_driven = validate($_POST['kms_driven']);
    $price_per_hour = validate($_POST['price_per_hour']);

    $sun_roof = validate($_POST['sun_roof']);
    $cruise_control = validate($_POST['cruise_control']);
    $camera360 = validate($_POST['360_camera']);
    $home_delivery = validate($_POST['home_delivery']);
    $airbags = validate($_POST['airbags']);

    $description = validate($_POST['description']);

    if($_FILES['image']['size'] > 0)
    {
        $image = $_FILES['image'];
        $fileResult = uploadImage('cars',$image);
        $finalImage = 'assets/uploads/cars/'.$fileResult;
    }
    else{
        $finalImage = NULL;
    }

    $status = isset($_POST['status']) == true ? 1:0;

    $query = "INSERT INTO cars (brand_id,body_type_id,name,car_cid,car_reg_no,model,transmission,fuel,seating_capacity,fastag,kms_driven,sun_roof,cruise_control,360_camera,price_per_hour,home_delivery,airbags,description,status,image) 
            VALUES ('$brand_id','$body_type_id','$name','$car_cid','$car_reg_no','$model','$transmission','$fuel','$seating_capacity','$fastag','$kms_driven','$sun_roof','$cruise_control',
                    '$camera360','$price_per_hour','$home_delivery','$airbags','$description','$status','$finalImage')";

    $result = mysqli_query($conn, $query);

    if($result){
        redirect('cars.php','Car Saved Successfully');
    }else{
        redirect('cars.php','Something Went Wrong');
    }
}

if(isset($_POST['updateCar']))
{
    $carId = validate($_POST['carId']);

    $name = validate($_POST['name']);
    $car_reg_no = validate($_POST['car_reg_no']);

    $model = validate($_POST['model']);
    $brand_id = validate($_POST['brand_id']);
    $body_type_id = validate($_POST['body_type_id']);

    $transmission = validate($_POST['transmission']);
    $fuel = validate($_POST['fuel']);
    $seating_capacity = validate($_POST['seating_capacity']);
    
    $fastag = validate($_POST['fastag']);
    $kms_driven = validate($_POST['kms_driven']);
    $price_per_hour = validate($_POST['price_per_hour']);

    $sun_roof = validate($_POST['sun_roof']);
    $cruise_control = validate($_POST['cruise_control']);
    $camera360 = validate($_POST['360_camera']);
    $home_delivery = validate($_POST['home_delivery']);
    $airbags = validate($_POST['airbags']);

    $description = validate($_POST['description']);

    $carData = getById('cars',$carId);

    if($_FILES['image']['size'] > 0)
    {
        $image = $_FILES['image'];
        $fileResult = uploadImage('cars',$image);
        $finalImage = 'assets/uploads/cars/'.$fileResult;

        $deleteImage = "../".$carData['data']['image'];
        if(file_exists($deleteImage)){
            unlink($deleteImage);
        }
    }
    else{
        $finalImage = $carData['data']['image'];
    }

    $status = isset($_POST['status']) == true ? 1:0;

    $query = "UPDATE cars SET
                brand_id='$brand_id',
                body_type_id='$body_type_id',
                name='$name',
                car_reg_no='$car_reg_no',
                model='$model',
                transmission='$transmission',
                fuel='$fuel',
                seating_capacity='$seating_capacity',
                fastag='$fastag',
                kms_driven='$kms_driven',
                sun_roof='$sun_roof',
                cruise_control='$cruise_control',
                360_camera='$camera360',
                price_per_hour='$price_per_hour',
                home_delivery='$home_delivery',
                airbags='$airbags',
                description='$description',
                status='$status',
                image='$finalImage'
                WHERE id='$carId' ";

    $result = mysqli_query($conn, $query);

    if($result){
        redirect('cars.php','Car Updated Successfully');
    }else{
        redirect('cars.php','Something Went Wrong');
    }
}

if(isset($_POST['saveImageUpload']))
{
    $carId = validate($_POST['car_id']);
    $status = isset($_POST['status']) == true ? 1:0;

    $error=array();
    $extension=array("jpeg","jpg","png","gif");

    foreach($_FILES["files"]["tmp_name"] as $key=>$tmp_name) {

        $file_name=$_FILES["files"]["name"][$key];
        $file_tmp=$_FILES["files"]["tmp_name"][$key];
        $ext=pathinfo($file_name,PATHINFO_EXTENSION);

        $path = "../assets/uploads/cars/";
        if(in_array($ext,$extension)) {
            
            $filename=basename($file_name,$ext);
            $newFileName=$filename.time().".".$ext;

            $finalFileName = 'assets/uploads/cars/'.$newFileName;
            move_uploaded_file($file_tmp=$_FILES["files"]["tmp_name"][$key],$path.$newFileName);

            $query = "INSERT INTO car_images (car_id,image,status) VALUES ('$carId','$finalFileName','$status')";
            $result = mysqli_query($conn, $query);
        }
        else {
            array_push($error,"$file_name, ");
        }
    }

    if($result){
        redirect('car-images-create.php?id='.$carId,'Car Image Uploaded Successfully');
    }else{
        redirect('car-images-create.php?id='.$carId,'Something Went Wrong');
    }
}

if(isset($_POST['updateImageUpload']))
{
    $car_image_id = validate($_POST['car_image_id']);
    $is_thumbnail = isset($_POST['is_thumbnail']) == true ? 1:0;
    $status = isset($_POST['status']) == true ? 1:0;
    
    $carImageData = getById('car_images',$car_image_id);
    if($_FILES['image']['size'] > 0)
    {
        $image = $_FILES['image'];
        $fileResult = uploadImage('cars',$image);
        $finalImage = 'assets/uploads/cars/'.$fileResult;

        $deleteImage = "../".$carImageData['data']['image'];
        if(file_exists($deleteImage)){
            unlink($deleteImage);
        }
    }
    else{
        $finalImage = $carImageData['data']['image'];
    }

    $query = "UPDATE car_images SET image='$finalImage', is_thumbnail='$is_thumbnail', status='$status' WHERE id='$car_image_id'";
    $result = mysqli_query($conn, $query);
    
    if($result){
        redirect('car-images-edit.php?id='.$car_image_id,'Car Image Updated Successfully');
    }else{
        redirect('car-images-edit.php?id='.$car_image_id,'Something Went Wrong');
    }
}

if(isset($_POST['enquiryCompleteBtn']))
{
    $enquiryId = validate($_POST['enquiry_id']);
    $status = 'completed';

    $query = "UPDATE enquiries SET status='$status' WHERE id='$enquiryId' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result){
        redirect('enquiries-view.php?id='.$enquiryId,'Enquiry Completed Successfully');
    }else{
        redirect('enquiries-view.php?id='.$enquiryId,'Something Went Wrong');
    }
}

if(isset($_POST['update_booking_btn'])){

    $bStatus = validate($_POST['booking_status']);
    $bookingId = validate($_POST['booking_id']);

    $cancel_reason = validate($_POST['cancel_reason']);
    $payment_status = validate($_POST['payment_status']);

    if($bStatus == "cancelled"){

        $cancel_status = "1";
        
    }else{

        $cancel_status = "0";
    }

    $query = "UPDATE bookings SET 
            payment_status='$payment_status',
            cancel_status='$cancel_status',
            cancel_reason='$cancel_reason', 
            booking_status='$bStatus' 
            WHERE booking_no='$bookingId' ";
    $result = mysqli_query($conn, $query);

    if($result){
        redirect('booking-view.php?booking_id='.$bookingId,'Booking status updated Successfully');
    }else{
        redirect('booking-view.php?booking_id='.$bookingId,'Something Went Wrong');
    }
}

if(isset($_POST['updateVerification']))
{
    $userId = validate($_POST['userId']);
    $is_verified = validate($_POST['is_verified']) == true ? 1:0;
    if($is_verified){
        $remarks = NULL;
    }else{
        $remarks = validate($_POST['remarks']);
    }

    $query = "UPDATE users SET is_verified='$is_verified', remarks='$remarks' WHERE id='$userId' ";
    $result = mysqli_query($conn, $query);
    if($result){
        redirect('verify-users.php','Verification Updated');
    }else{
        redirect('verify-users.php','Something Went Wrong.!');
    }
}

?>
