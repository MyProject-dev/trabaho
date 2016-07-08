<?php
/**
 * Created by PhpStorm.
 * User: JESUS
 * Date: 7/4/2016
 * Time: 9:25 PM
 */


if(isset($_POST['post_update_project'])) {




    $counter = 0;
    $r = false;
    global $wpdb;

    if(empty($_POST['description'])) {
        $counter++;
        $_SESSION['error_message'] .= '<br> <span class="error"> '. $counter . '. Project Description should be filled </span>';
    } if (empty($_POST['title'])) {
        $counter++;
        $_SESSION['error_message'] .= '<br> <span class="error"> '. $counter . '. Project title should be fielled </span>';
    }




    if (!empty($_POST['title']) and !empty($_POST['description'])) {
        global $wpdb;
        $project = new App\Project_Controller();

        $r = $wpdb->update(
            'wp_timelog_projects',
            array(
                'title' => $_POST['title'],
                'description' => $_POST['description'],
                'rate' => $_POST['rate'],
                'work_type' => $_POST['work_type'],
                'duration' => $_POST['duration'],
                'work_require' => $_POST['work_require'],
                'vacancy' => $_POST['vacancy']
            ),
            array(
                'id' => $_POST['project_id']
            ),
            array(
                '%s',
                '%s',
                '%d',
                '%s',
                '%s',
                '%s',
                '%d',
            ),
            array(
                '%d'
            )
        );

        if ($r) {
            $_SESSION['error_message'] = '<span class="success"> Project successfully updated</span>';
        } else {
            $_SESSION['error_message'] = '<span class="error"> Project failed to update</span>';
        }
    }

} else {
//    $_SESSION['error_message'] = '<span class="warning">Please update this project</span>';
}
