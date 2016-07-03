<?php
/**
 * Load needed to make plugin works
 */
if(!function_exists('wp_get_current_user')) {
    include(ABSPATH . "wp-includes/pluggable.php");
}


/**
 * Header
 */

require( plugin_dir_path(__FILE__)  . 'bootstrap/bootstrap.php');


/**
 * Require config here
 */

require( plugin_dir_path(__FILE__)  . 'config/config_data.php');


/**
 * Get current user
 */





/**
 * Requirea all the js here
 */


/**
 * Require all the css here
 */

echo "<link rel='stylesheet' type='text/css' href='" . plugins_url( 'public/css/style.css', __FILE__ )  . "' >";


/**
 * Require all the model here
 */

 /**
 * Require all the controller here
 */
require( plugin_dir_path(__FILE__)  . 'app/Http/Controller/Controller.php');
require( plugin_dir_path(__FILE__)  . 'app/Http/Controller/User_Controller.php');
require( plugin_dir_path(__FILE__)  . 'app/Http/Controller/Project_Controller.php');



/**
 * Post actions here
 */
require( plugin_dir_path(__FILE__)  . 'app/Http/Post/Users_Post.php');
require( plugin_dir_path(__FILE__)  . 'app/Http/Post/Project_Post.php');
require( plugin_dir_path(__FILE__)  . 'app/Http/Post/Applicant_Apply_Project_Post.php');


/**
 * Get actions here
 */


/**
 * Require all short code views here
 */

require( plugin_dir_path(__FILE__)  . '/resources/view/tshirt_designer.php');
require( plugin_dir_path(__FILE__)  . '/resources/view/first_login.php');
require( plugin_dir_path(__FILE__)  . '/resources/view/add_project.php');
require( plugin_dir_path(__FILE__)  . '/resources/view/applicant_apply_project.php');
require( plugin_dir_path(__FILE__)  . '/resources/view/home_view_project.php');





