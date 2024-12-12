<?php

require '../config/function.php';

$paramResult = checkParamId('id');
if(is_numeric($paramResult)){

    $bodyTypeId = validate($paramResult);

    // Checking user exists or not
    $bodyType = getById('body_types',$bodyTypeId);
    if($bodyType['status'] == 200){

        $response = deleteQuery('body_types',$bodyTypeId);

        if($response){

            $deleteImage = "../".$bodyType['data']['image'];
            if(file_exists($deleteImage)){
                unlink($deleteImage);
            }

            redirect('body-types.php','Body Type Delete Successfully');
        }else{
            redirect('body-types.php','Something Went Wrong!');
        }
    }else{
        redirect('body-types.php',$bodyType['message']);
    }

}else{
    redirect('body-types.php',$paramResult);
}

?>