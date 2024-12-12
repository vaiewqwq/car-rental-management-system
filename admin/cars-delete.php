<?php

require '../config/function.php';

$paramResult = checkParamId('id');
if(is_numeric($paramResult)){

    $carId = validate($paramResult);

    // Checking user exists or not
    $car = getById('cars',$carId);
    if($car['status'] == 200){

        $response = deleteQuery('cars',$carId);

        if($response){

            $deleteImage = "../".$car['data']['image'];
            if(file_exists($deleteImage)){
                unlink($deleteImage);
            }

            // Delete related car images
            $carImagesQuery = "SELECT * FROM car_images WHERE car_id='$carId' ";
            $carImgResult = mysqli_query($conn, $carImagesQuery);
            if($carImgResult){

                if(mysqli_num_rows($carImgResult) > 0){

                    foreach($carImgResult as $carImgItem){

                        $deleteImage = "../".$carImgItem['image'];
                        if(file_exists($deleteImage)){
                            unlink($deleteImage);
                        }
                    }
                }
            }

            redirect('cars.php','Car Delete Successfully');
        }else{
            redirect('cars.php','Something Went Wrong!');
        }
    }else{
        redirect('cars.php',$car['message']);
    }

}else{
    redirect('cars.php',$paramResult);
}

?>