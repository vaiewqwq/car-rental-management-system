<?php

require '../config/function.php';

$paramResult = checkParamId('id');
if(is_numeric($paramResult)){

    $userId = mysqli_real_escape_string($conn, $paramResult);

    // Checking user exists or not
    $user = getById('users',$userId);
    if($user['status'] == 200){

        $response = deleteQuery('users',$userId);

        if($response){

            $deleteFrontImage = "../".$user['data']['dl_image_front'];
            if(file_exists($deleteFrontImage)){
                unlink($deleteFrontImage);
            }

            $deleteBackImage = "../".$user['data']['dl_image_back'];
            if(file_exists($deleteBackImage)){
                unlink($deleteBackImage);
            }

            redirect('users.php','User Delete Successfully');
        }else{
            redirect('users.php','Something Went Wrong!');
        }
    }else{
        redirect('users.php',$user['message']);
    }

}else{
    redirect('users.php',$paramResult);
}


?>