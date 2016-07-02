<?php
/**
 * Load needed to make plugin works
 */
if(!function_exists('wp_get_current_user')) {
    include(ABSPATH . "wp-includes/pluggable.php");
}



/**
 * Get current user
 */



/**
 * Requirea all the js here
 */


/**
 * Require all the css here
 */


/**
 * Require all the model here
 */

 /**
 * Require all the controller here
 */
require( plugin_dir_path(__FILE__)  . 'app/Http/Controller/Controller.php');
require( plugin_dir_path(__FILE__)  . 'app/Http/Controller/Users_Controller.php');



/**
 * Post actions here
 */
require( plugin_dir_path(__FILE__)  . 'app/Http/Post/Users_Post.php');


/**
 * Get actions here
 */


/**
 * Require all short code views here
 */

require( plugin_dir_path(__FILE__)  . '/resources/view/tshirt_designer.php');
require( plugin_dir_path(__FILE__)  . '/resources/view/first_login.php');





