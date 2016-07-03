<?php

namespace App;

use App\Controller;

class Project_Controller extends Controller {


    private $wpdb;

    function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
    }


    public function getProjectByProjectId($project_id) {
//        echo 'project id = ' . $project_id . '';
            global $wpdb;
            $results = $wpdb->get_results(
                $wpdb->prepare("Select * from wp_timelog_projects where id = " . $project_id, ARRAY_A)
            );
        // $project = $this->wpdb->query("Select * from wp_timelog_projects where id = " . $project_id);

//        echo '<pre>';
//        print_r($results);
//
//        echo '</pre>';
//        echo "amazin!";
        //        return $project;
        return $results;
    }

}