<?php

use App\Users_Controller;

$user = new Users_Controller();

if(isset($_POST['post_project'])) {

    $counter = 0;
    $r = false;
    global $wpdb;

    if(empty($_POST['description'])) {
        $counter++;
        $_SESSION['error_message'] .= '<br> '. $counter . '. Project Description should be filled';
    } if (empty($_POST['title'])) {
        $counter++;
        $_SESSION['error_message'] .= '<br> '. $counter . '. Project title should be fielled';
    }

    if (!empty($_POST['title']) and !empty($_POST['description'])) {
        $r  = $wpdb->insert(
            'wp_timelog_projects',
            array(
                'title'=>$_POST['title'],
                'description'=>$_POST['description'],
                'work_type'=>$_POST['work_type'],
                'rate'=>$_POST['rate'],
                'duration'=>$_POST['duration'],
                'vacancy'=>$_POST['vacancy'],
                'work_require'=>$_POST['work_require'],
                'status'=>1
            )
        );
    }

    if($r) {
        $_SESSION['error_message'] = '<span style="color:green" >Successfully added</span>';
        // echo "<br> project added";
        wp_redirect(home_url()); exit;
    } else {
        $counter ++;
        // $_SESSION['error_message'] .= '<br> '. $counter . '. Failed to add new project.';
        $_SESSION['error_message'] = '<span style="color:red" > '.$_SESSION['error_message'].'</span>';
        // echo "<br> failed to add new project";
    }


echo "<br> Project posted ";

} else {
    echo "<br> Project not posted";
}



