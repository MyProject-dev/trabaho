<?php



add_shortcode(
    'project_list',
    'project_list_display'
);


function project_list_display($atts, $content=null) {

    $variable = extract(
        shortcode_atts(
            array('var'=>'var content'),
            $atts
        )
    );

    $counter1 = 0;



    $project = new App\Project_Controller();
    $application = new App\Application_Controller();
    $user = new \App\Users_Controller();



    $projectDetails = $project->getAllProjects(10);







    $html = '<div class="container data-container">';

    foreach($projectDetails as $projectDetail) {
        $counter1 = 0;

        $totalApplication = $project->getTotalApplication($projectDetail->id);

        $html .= '<h3>'.$projectDetail->title.'</h3>';

        $html .= '<h5>' . $project->getTotalApplication($projectDetail->id) . ' applicants</h5>';

        $html .= '<ul>';

        $applicationDetails = $application->getApplicationsByProjectId($projectDetail->id, 5);

        foreach($applicationDetails as $applicationDetail) {
            $counter1++;
            $userDetail = $user->getUserInfoByUserId($applicationDetail->user_id);
            // print_r( $userDetail);
            $html .= '<li>';
                $html .=  $counter1 . '. ' . '<span> Subject:  <b>' . $applicationDetail->subject . '</b></span>';
                $html .= '<br>';
                $html .= ' <span> Applicant Name: <a href="'. uri_user_profile . '?user_id='.$userDetail->ID.'" target="_blank"> ' . $userDetail->display_name . '</a></span>';
                $html .= '<br><br>';
            $html .= '</li>';
        }
            //        if($totalApplication > 5) {
            $html .= '<a href="'. uri_project_list_details .'?project_id='. $projectDetail->id . '" > View more details... </a>';
            //        }

        $html .= '</ul>';
    }


    $html .= '</div>';
    return $content . $html;

}