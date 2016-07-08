<?php
/**
 * Created by PhpStorm.
 * User: JESUS
 * Date: 7/3/2016
 * Time: 12:54 PM
 */




add_shortcode('applicant_apply_project', 'view_applicant_apply_project');


function view_applicant_apply_project($atts, $content=null) {

    $project = new App\Project_Controller();

    $projectDetails  = $project->getProjectByProjectId($_GET['project_id']);

    //echo "session " . $_SESSION['project_id'];

    // @todo: do query project id via title because title is the one clicked from homepage
    $_SESSION['project_id'] = $_GET['project_id'];

    // echo " id = " . $projectDetails[0]->id;

    $variable = extract(
        shortcode_atts(
            array(
                'testvar' => 'test var'
            ), $atts
        )
    );

    $html = '<div class="container data-container" >';

    $html .= $_SESSION['error_message'];

    $html .='<form method="post">';

    $html .= '<h3> Job Title: </h3>';
    $html .= '<p>' . $projectDetails[0]->title .'</p>';

    $html .= '<h3> Job description:</h3>';
    $html .= '<p><pre>' . $projectDetails[0]->description .'</pre></p>';

    $html .= '<h3> Subject: </h3>';
    $html .= '<input type="text" name="subject" value="' . $_POST['subject'] .'" />';

    $html .= '<h3> Message: </h3>';
    $html .= '<textarea name="message" rows="5">'. $_POST['message'].'</textarea>';
    $html .= '<br><br>';

//    $html .='<h3> Upload Resume(CV) </h3>';
//    $html .= '<input type="file" name="file" /> ';

    $html .= '<br><br>';
    $html .= '<input type="submit" value="submit" name="applicant_submit" />';

    $html .= '</form>';

    $html .= '</div>';

    return $content .  $html;

}