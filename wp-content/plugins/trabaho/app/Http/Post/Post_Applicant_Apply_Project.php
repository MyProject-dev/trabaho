<?php
if(isset($_POST['applicant_submit'])) {

    //print_r($_POST);

    if(empty($_POST['subject'])) {
        $_SESSION['error_message'] = '<span class="error">Subject required. </span>';
    }

    if (empty($_POST['message'])) {
        echo "message is empty";
        $_SESSION['error_message'] .= '<br><span class="error">Message required. </span>';
    }

    if(!empty($_POST['subject']) && !empty($_POST['message'])) {
        $user = new App\Users_Controller();
        // echo "<br>application submitted";
        //echo "project id " . $_SESSION['project_id'];

        global $wpdb;
        $r = $wpdb->insert(
            'wp_timelog_applications',
            array(
                'user_id' => $user->current_user_id,
                'project_id' => $_SESSION['project_id'],
                'subject' => $_POST['subject'],
                'message' => $_POST['message'],
                'resume' => ''
            )
        );

        if($r) {
            // $_SESSION['error_message'] .= '<br> application not submitted';
            $_SESSION['error_message'] = '<span class="success">Your application  submitted. </span>';

            wp_redirect(uri_application_submit_success); exit;
            //echo "<br>inserted";
        } else {
            // $_SESSION['error_message'] .= '<br> application not submitted';
            $_SESSION['error_message'] = '<span class="error">Your appication not submitted</span>';
            //echo "<be> not inserted";
        }
    }

} else {
    ///echo "<br> application not submitted";
//    $_SESSION['error_message'] = '<span class="warning">Please submit application for this project</span>';

}

