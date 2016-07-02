<?php

use App\Users_Controller;

$user = new Users_Controller();


if(isset($_POST['next'])) {

    // update user memberships type
    $user->updateMembershipType($user->current_user_id, $_POST['membership_type']);

    // detect if error occur or success then redirect
    if($_POST['membership_type'] == 0){
        $_SESSION['error_message'] = '<span style="color:red">  Failed to select! </span>';
    } else {
       wp_redirect( home_url() ); exit;
    }
}



