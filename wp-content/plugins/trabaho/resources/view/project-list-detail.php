<?php
 error_reporting(0);

add_shortcode("project_list_detail", "view_project_list_detail");

function view_project_list_detail($atts, $content=null){


 //   $project = new App\Project_Controller();

  // $projectDetail = $project->getProjectByProjectId(2);


    $project_id = $_GET['project_id'];


    $counter=0;
    global $wpdb;
    $applications_results = $wpdb->get_results(
        $wpdb->prepare("Select * from wp_timelog_projects as p
        join wp_timelog_applications as a on p.id =a.project_id join wp_users as u on u.id = a.user_id where p.id = " . $project_id, ARRAY_A)
    );
    $html  = '<div class="container">';

    $html .= '<h2 >Title: </h2>'.$applications_results[0]->title;
    $html .= '<h2> Description: </h2><pre>'.$applications_results[0]->description.'</pre>';
    $html .= '<a href="' . uri_add_project . '?project_id=' . $project_id . '&status=edit"><input type="button" value="Edit" /></a>';
    $html .= '&nbsp; &nbsp';
    $html .= '<input type="button" value="Delete" />';
    $html .= '<br><br>';

    //    print_r($applications_results);




    $html .= '<table style="width:auto">
          <tr>
            <th>Applicant Name</th>
            <th>Subject</th>
            <th>Message</th>
            <th>Resume(CV)</th>
            <th>Status</th>
          </tr>';
    foreach($applications_results as $result){
        $counter++;
        $html .= '<tr>
            <td>' . $counter . '. <a href="'. uri_user_profile . '?user_id='.$result->ID.'" target="_blank"> ' .  $result->display_name . '</a></td>
            <td>' .$result->subject.'</td>
            <td> ' . $result->message . ' </td>
            <td> <a href="#">Download</a> </td>
            <td><a href="'. uri_user_profile . '?user_id='.$result->ID.'" target="_blank">Hire Me</a></td>
          </tr>';
 }
    $html .= '</table>';

    $html .= '<input type="button"  value="View more.." />';

    $html  .= '</div>';


    return $content. $html;
}
?>