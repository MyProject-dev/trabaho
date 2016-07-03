<?php

namespace App;

use App\Controller;

class Project_Controller extends Controller {


    private $wpdb;
    private $table_name = 'wp_timelog_projects';
    function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
    }

    public function getAllProjects($limit=null) {

        global $wpdb;
        $results = $wpdb->get_results(
            $wpdb->prepare("Select * from wp_timelog_projects limit " . $limit, ARRAY_A)
        );
        return $results;

    }

    public function getProjectByProjectId($project_id) {
            global $wpdb;
            $results = $wpdb->get_results(
                $wpdb->prepare("Select * from wp_timelog_projects where id = " . $project_id, ARRAY_A)
            );
        return $results;
    }

    public function getTotalApplication($project_id) {
        global $wpdb;
        $results = $wpdb->get_results(
            $wpdb->prepare("Select count(id) as total_applicant from wp_timelog_applications where project_id = " . $project_id, ARRAY_A)
        );
        return $results[0]->total_applicant;
    }

}