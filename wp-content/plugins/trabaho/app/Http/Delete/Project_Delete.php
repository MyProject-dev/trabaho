<?php


if(isset($_POST['project_delete'])) {
    // delete this project via id
    echo "<br>delete project";
    // delete applicant of this project via project id
    echo "<br> delete applications";

    global $wpdb;

    $projectDetail = new App\Project_Controller();

    $projectDetail->deleteProject($_POST['project_id']);

}