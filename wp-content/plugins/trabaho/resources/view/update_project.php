<?php


add_shortcode("update_project", "display_update_project");

function display_update_project($atts, $content=null) {


    $project = new App\Project_Controller();

    $projectDetail = $project->getProjectByProjectId($_GET['project_id'])[0];

    $html  = '<div class="container add_product data-container">';

    $html .= $_SESSION['error_message'];

    $html .= ' <form method="post" name="add_project" >';

    $html .= '<input type="hidden" value="'.$_GET['project_id'].'" name="project_id"  />';

    $html .= '<br>';
    $html .= '<h4> Project Title: </h4>';
    $html .= '<input type="text" placeholder="" name="title" value="'.$projectDetail->title.'" />';

    $html .= '<br>';
    $html .= '<h4> Project Description:</h4>';
    $html .= '<textarea rows="10" style="resize:none" name="description"  >'.$projectDetail->description.'</textarea>';

    $html .= '<br>';
    $html .= '<h4> Rate $: </h4>';
    $html .= '<input type="number" placeholder=""  value="'.$projectDetail->rate.'" name="rate" />';

    $html .= '<br>';
    $html .= '<h4> Work Type: </h4>';
    $html .= '<select name="work_type"   >';
    $html .= '<option ' . (($projectDetail->work_type == 'Hourly') ? 'selected ' : '' ) . ' >Hourly</option>';
    $html .= '<option ' . (($projectDetail->work_type == '1st and 16th of the month') ? 'selected ' : '' ) .  ' >1st and 16th of the month</option>';
    $html .= '<option ' . (($projectDetail->work_type == 'Monthly') ?'selected ' : ''  )  . ' >Monthly</option>';
    $html .= '</select>';

    $html .= '<br>';
    $html .= '<h4> Duration: </h4>';
    $html .= '<select name="duration"    >';
    $html .= '<option ' . (($projectDetail->duration == '1 month') ?'selected ' : ''   ) .' >1 month</option>';
    $html .= '<option ' . (($projectDetail->duration == '6 months') ?'selected ' : ''  ) .' >6 months</option>';
    $html .= '<option ' . (($projectDetail->duration == '1 year') ?'selected ' : ''    ) .' >1 year</option>';
    $html .= '<option>More than 1 year</option>';
    $html .= '</select>';

    $html .= '<br>';
    $html .= '<h4> Work Required: </h4>';
    $html .= '<select name="work_require"  >';
    $html .= '<option ' . (($projectDetail->work_require == 'Full Time') ? 'selected ' : ''   ) . ' >Full Time</option>';
    $html .= '<option ' . (($projectDetail->work_require == 'Part Time') ?'selected ' : ''    ) .' >Part Time</option>';
    $html .= '<option ' . (($projectDetail->work_require == 'Contractual') ?'selected ' : ''  ) .' >Contractual</option>';
    $html .= '</select>';

    $html .= '<br>';
    $html .= '<h4> Vacancy: </h4>';
    $html .= '<input type="number" placeholder="" name="vacancy" value="'.$projectDetail->vacancy.'"  />';



    $html .= '<br><br>';
    $html .= '<input type="submit" value="Update Project" name="post_update_project"/>';
    $html .= '<br><br>';

    $html .= '</form>';

    $html .= '</div>';



    return $content . $html;
}