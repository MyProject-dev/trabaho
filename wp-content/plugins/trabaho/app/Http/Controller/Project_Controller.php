<?php

namespace App;

use App\Controller;

class Project_Controller extends Controller {


    private $wpdb;
    private $table_name = 'wp_timelog_projects';
    private $table_name_application = 'wp_timelog_applications';

    function __construct()
    {
        global $wpdb;
        $this->wpdb = $wpdb;
    }


    public function deleteProject($project_id) {

        echo "project id " . $project_id;

        global $wpdb;

        if($wpdb->delete($this->table_name, array('id'=>$project_id))){
            echo "<br>project is deleted";
        } else {
            echo "<br>project failed to deleted";
        }

        if($wpdb->delete($this->table_name_application, array('project_id'=>$project_id))){
            echo "<br>project applications are deleted";
        } else {
            echo "<br>project applications failed to deleted";
        }

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

    public function update($wpdb, $table_name, $update_row = array(), $row_id_name, $row_id_value)
    {
        return parent::update($wpdb, $table_name, $update_row, $row_id_name, $row_id_value); // TODO: Change the autogenerated stub
    }




}