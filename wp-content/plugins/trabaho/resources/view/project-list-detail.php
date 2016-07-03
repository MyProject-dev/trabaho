<?php
 error_reporting(0);

add_shortcode("project_list_detail", "view_project_list_detail");

function view_project_list_detail($atts, $content=null){


 //   $project = new App\Project_Controller();

  // $projectDetail = $project->getProjectByProjectId(2);



    global $wpdb;
    $applications_results = $wpdb->get_results(
        $wpdb->prepare("Select a.id, p.title, p.description, a.subject, u.user_nicename from wp_timelog_projects as p
        join wp_timelog_applications as a on p.id =a.project_id join wp_users as u on u.id = a.user_id where a.id = 1", ARRAY_A)
    );
    $html  = '<div class="container">';

    $html .= '<h2 >Title: </h2>'.$applications_results[0]->title;
    $html .= '<h2> Description: </h2>'.$applications_results[0]->description.'<br><br>';
    print_r($applications_results);

    $html .= '<table style="width:100%">
          <tr>
            <th>Subject</th>
            <th>User Name</th>
          </tr>';
    foreach($applications_results as $result){
        $html .= '<tr>
            <td>' .$result->subject.'</td>
            <td>' .$result->user_nicename.'</td>
          </tr>';
 }
    $html .= '</table>';
    $html  .= '</div>';


    return $content. $html;
}
?>