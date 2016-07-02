<?php

use App\Users_Controller;

$user = new Users_Controller();

if(isset($_POST['next'])) {

    // detect if error occur or success then redirect
    if($_POST['membership_type'] == 0) {
        $_SESSION['error_message'] = '<span style="color:red"> Please select your membership type.</span>';
    } else {
        // update user memberships type
        if($user->updateMembershipType($user->current_user_id, intval($_POST['membership_type']))) {
            if($_POST['membership_type'] == 1) {
                // wp_redirect( 'add-project' ); exit;
                wp_redirect( uri_add_project ); exit();
            } else {
                wp_redirect( home_url() ); exit;
            }
        } else {
            $_SESSION['error_message'] = '<span style="color:red"> Something wrong, please try again.</span>';
        }
    }
}



