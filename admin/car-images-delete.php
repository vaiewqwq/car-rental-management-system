<?php

require '../config/function.php';

$paramResult = checkParamId('id');
if(is_numeric($paramResult)){

    $carImageId = validate($paramResult);

    // Checking user exists or not
    $carImage = getById('car_images',$carImageId);
    if($carImage['status'] == 200){

        $response = deleteQuery('car_images',$carImageId);

        if($response){

            $deleteImage = "../".$carImage['data']['image'];
            if(file_exists($deleteImage)){
                unlink($deleteImage);
            }

            redirect('car-images.php?id='.$carImage['data']['car_id'],'Car Image Delete Successfully');
        }else{
            redirect('car-images.php?id='.$carImage['data']['car_id'],'Something Went Wrong!');
        }
    }else{
        redirect('car-images.php?id='.$carImage['data']['car_id'],$car['message']);
    }

}else{
    redirect('car-images.php?id='.$carImage['data']['car_id'],$paramResult);
}

?>