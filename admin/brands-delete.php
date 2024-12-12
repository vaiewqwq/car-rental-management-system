<?php

require '../config/function.php';

$paramResult = checkParamId('id');
if(is_numeric($paramResult)){

    $brandId = validate($paramResult);

    // Checking user exists or not
    $brand = getById('brands',$brandId);
    if($brand['status'] == 200){

        $response = deleteQuery('brands',$brandId);

        if($response){

            $deleteImage = "../".$brand['data']['image'];
            if(file_exists($deleteImage)){
                unlink($deleteImage);
            }

            redirect('brands.php','Brand Delete Successfully');
        }else{
            redirect('brands.php','Something Went Wrong!');
        }
    }else{
        redirect('brands.php',$brand['message']);
    }

}else{
    redirect('brands.php',$paramResult);
}

?>