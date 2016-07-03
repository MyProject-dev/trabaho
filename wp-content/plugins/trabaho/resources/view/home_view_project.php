<?php
error_reporting(0);

/**
 * Created by PhpStorm.
 * User: AntiaMir
 * Date: 7/3/2016
 * Time: 12:35 PM
 */

add_shortcode("view_project_home", "display_view_project_home");

/*
 * @param $atts
 * @param null $content
 * @return string
 * Use it under page or post.
 * Ex Input Short Code 1: [view_project_home]
 */

function display_view_project_home($atts, $content=null) {
    global $wpdb;
    $results = $wpdb->get_results(
        $wpdb->prepare("Select * from wp_timelog_projects limit 30", ARRAY_A)
    );

    $html  = '<div class="container">' ;
        foreach($results as $result){
            $html .= '<div style = "border-bottom:1px inset #ccc;margin-bottom: 50px; padding-left: 30px; padding-right: 30px">';
                $html .= '<h2 style = "font-size: 18px;" >Title:'.$result->title.'</h2>';
                $html .= '<h2 style = "font-size: 18px;" > Description: </h2><p>'.$result->description.'</p>';
                $html .= '<div style = "display: block;;margin-bottom: 20px">';
                    $html .= '<div style = "display: inline;padding-right:20px" >Type: '.$result->type.'</div>|';
                    $html .= '<div style = "display: inline;padding-right:20px" >Rate: '.$result->rate.'</div>|';
                    $html .= '<div style = "display: inline;padding-right:20px" >Duration:'.$result->duration.' </div>|';
                    $html .= '<div style = "display: inline;padding-right:20px" >Vacancy: '.$result->vacancy.'</div>';
                $html .= '</div>';
            $html .= '</div>';

        }


    $html .= '</div>';


    return $content . $html;
}


?>

