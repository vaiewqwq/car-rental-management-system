<?php

require '../config/function.php';

$paramResult = checkParamId('id');
if(is_numeric($paramResult)){

    $socialMediaId = validate($paramResult);

    // Checking user exists or not
    $socialMedia = getById('social_medias',$socialMediaId);
    if($socialMedia['status'] == 200){

        $response = deleteQuery('social_medias',$socialMediaId);

        if($response){
            redirect('social-media.php','Social Media Delete Successfully');
        }else{
            redirect('social-media.php','Something Went Wrong!');
        }
    }else{
        redirect('social-media.php',$socialMedia['message']);
    }

}else{
    redirect('social-media.php',$paramResult);
}

?>