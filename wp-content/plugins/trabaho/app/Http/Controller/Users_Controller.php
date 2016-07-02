<?php

namespace App;



class Users_Controller extends  Controller {


    public $current_user_id = 0,
        $current_user_login = "",
        $current_user_email = "",
        $current_user_firstname = "",
        $current_user_lastname = "",
        $current_user_display_name = "",
        $current_user_level = "";

    private $table_name = 'wp_users';

    function  __construct()
    {
        $this->loggedInUserInfo();
    }

    public function loggedInUserInfo() {

        global $current_user;
        wp_get_current_user();
        //        echo 'Username: ' . $current_user->user_login . "\n";
        //        echo 'User email: ' . $current_user->user_email . "\n";
        //        echo 'User level: ' . $current_user->user_level . "\n";
        //        echo 'User first name: ' . $current_user->user_firstname . "\n";
        //        echo 'User last name: ' . $current_user->user_lastname . "\n";
        //        echo 'User display name: ' . $current_user->display_name . "\n";
        //        echo 'User ID: ' . $current_user->ID . "\n";
        //        echo "user id= " . get_current_user_id ();
        $this->current_user_id           = $current_user->ID;
        $this->current_user_email        = $current_user->user_email;
        $this->current_user_display_name = $current_user->display_name;
        $this->current_user_firstname    = $current_user->first_name;
        $this->current_user_lastname     = $current_user->last_name;
        $this->current_user_level        = $current_user->user_level;
        $this->user_id = $current_user->ID;
    }

    function insertNewUser() {

    }

    public function updateUserType() {

    }

    public function updateMembershipType($user_id, $membershipType) {
       //echo "user id = " . $user_id . "Update membershipt type";
       global $wpdb;
       return $this->update($wpdb, $this->table_name,array('user_status'=>$membershipType), 'ID', $user_id);
        // $this->query();
        // $this->insert();
    }
}
