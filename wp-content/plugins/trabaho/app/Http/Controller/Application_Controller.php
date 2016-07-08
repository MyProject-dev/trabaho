<?php

namespace App;

use App\Controller;

class Application_Controller extends Controller {

    private $wpbd;
    private $table_name = 'wp_timelog_applications';

    function __construct() {
        global $wpdb;
        $this->wpbd = $wpdb;
    }



    public function getAllApplicants($limit=null) {
    }

    public function getApplicationsByProjectId($project_id, $limit=100) {

        global $wpdb;
        $results = $wpdb->get_results(
            $wpdb->prepare("Select * from $this->table_name where project_id = " . $project_id . ' limit ' . $limit, ARRAY_A)
        );
        return $results;

    }





}