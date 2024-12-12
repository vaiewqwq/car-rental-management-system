<?php

if(isset($_SESSION['loggedIn']))
{
    if(isset($_SESSION['loggedInUserRole'])){

        $email = mysqli_real_escape_string($conn, $_SESSION['loggedInUser']['email']);
        $role = mysqli_real_escape_string($conn, $_SESSION['loggedInUserRole']);

        $query = "SELECT * FROM users WHERE email='$email' AND role='$role' LIMIT 1";
        $result = mysqli_query($conn, $query);
        
        if(mysqli_num_rows($result) == 0){
            
            logoutSession();
            redirect('../login.php','Access Denied!');
        }
        else
        {
            $result = mysqli_fetch_array($result, MYSQLI_ASSOC);
            if($result['role'] != 'admin') {
                logoutSession();
                redirect('../login.php','Access Denied!');
            }

            if($result['is_ban'] == 1) {
                logoutSession();
                redirect('../login.php','You account has been banned. Please contact admin.');
            }
        }
    }
    else
    {
        redirect('../login.php','No Role...');
    }
}
else
{
    redirect('../login.php','Login to continue...');
}

?>
