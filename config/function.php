<?php
session_start();

require 'dbcon.php';

// $domainRootPath = "omprakash/car-rental"; 
// define("BASE_URL", DIRECTORY_SEPARATOR . $domainRootPath . DIRECTORY_SEPARATOR);
// define("ROOT_PATH", $_SERVER['DOCUMENT_ROOT'] . BASE_URL);

date_default_timezone_set('Asia/Kolkata');

function validate($inputData){

    global $conn;
    $validatedData = mysqli_real_escape_string($conn,$inputData);
    return trim($validatedData);
}

function redirect($url, $status){

    $_SESSION['status'] = $status;
    header('Location: '.$url);
    exit(0);
}

function alertSuccess(){
   
    if(isset($_SESSION['status'])){
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            <h6>'.$_SESSION['status'].'</h6>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>';
        unset($_SESSION['status']);
    }
}

function uploadImage($directory,$imageFile){

    $allowedFileTypes = ["jpg","png","jpeg"];
    $imageFileType = strtolower(pathinfo($imageFile['name'],PATHINFO_EXTENSION));
    if(!in_array($imageFileType, $allowedFileTypes)) {
        redirect('users-create.php','Sorry, only JPG, JPEG, PNG & webp files are allowed');
        return false;
    }

    $path = "../assets/uploads/$directory/"; /** Path for Uploading your Image **/
    $image_extension = pathinfo($imageFile['name'], PATHINFO_EXTENSION); /** Image Extension **/
    $filename = rand(1111,9999).time().'.'.$image_extension; /** Renaming the Image **/
    move_uploaded_file($imageFile['tmp_name'], $path."/".$filename);

    return $filename;
}

function checkParamId($type)
{
    if(isset($_GET[$type])){
        if($_GET[$type] != null){
            return $_GET[$type];
        }else{
            return 'Id not found';
        }
    }else{
        return 'No id given';
    }
}


function getAll($tableName, $status = NULL){

    global $conn;

    $table = mysqli_real_escape_string($conn, $tableName);

    if($status == 'status'){
        $query = "SELECT * FROM $table WHERE status=0";
    }else{
        $query = "SELECT * FROM $table";
    }
    return mysqli_query($conn, $query);
}

function getById($tableName, $id){

    global $conn;

    $table = mysqli_real_escape_string($conn, $tableName);
    $id = mysqli_real_escape_string($conn, $id);

    $query = "SELECT * FROM $table WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result){

        if(mysqli_num_rows($result) == 1){

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

            $response = [
                'status' => 200,
                'data' => $row
            ];
            return $response;
        }else{
    
            $response = [
                'status' => 404,
                'message' => 'No Data Found'
            ]; 
            return $response;
        }
    }else{
        $response = [
            'status' => 500,
            'message' => 'Something Went Wrong!'
        ]; 
        return $response;
    }
}


function getIdByName($tableName, $name){

    global $conn;

    $table = validate($tableName);
    $name = validate($name);

    $query = "SELECT * FROM $table WHERE slug='$name' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result){

        if(mysqli_num_rows($result) == 1){

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $response = [
                'status' => 200,
                'data' => $row
            ];
            return $response;
        }else{
    
            $response = [
                'status' => 404,
                'message' => 'No Data Found'
            ]; 
            return $response;
        }
    }else{
        $response = [
            'status' => 500,
            'message' => 'Something Went Wrong!'
        ]; 
        return $response;
    }
}



function getBySlug($tableName, $slug){

    global $conn;

    $table = mysqli_real_escape_string($conn, $tableName);
    $slug = mysqli_real_escape_string($conn, $slug);

    $query = "SELECT * FROM $table WHERE slug='$slug' LIMIT 1";
    $result = mysqli_query($conn, $query);

    if($result){

        if(mysqli_num_rows($result) == 1){

            $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
            $response = [
                'status' => 200,
                'data' => $row
            ];
            return $response;
        }else{
    
            $response = [
                'status' => 404,
                'message' => 'No Data Found'
            ]; 
            return $response;
        }
    }else{
        $response = [
            'status' => 500,
            'message' => 'Something Went Wrong!'
        ]; 
        return $response;
    }
}

function deleteQuery($tableName, $id){

    global $conn;
    
    $table = mysqli_real_escape_string($conn, $tableName);
    $id = mysqli_real_escape_string($conn, $id);

    $query = "DELETE FROM $table WHERE id='$id' LIMIT 1";
    $result = mysqli_query($conn, $query);
    return $result;
}

function getCount($tableName){

    global $conn;

    $table = mysqli_real_escape_string($conn, $tableName);

    $query = "SELECT * FROM $table";
    $result = mysqli_query($conn, $query);
    $totalCount = mysqli_num_rows($result);
    return $totalCount;
}

function logoutSession(){

    unset($_SESSION['loggedIn']);
    unset($_SESSION['loggedInUserRole']);
    unset($_SESSION['loggedInUser']);
}


function webSetting($string){

    $setting = getById('web_settings',1);
    if($setting['status'] == 200){
        return $setting['data'][$string];
    }
}

?>
