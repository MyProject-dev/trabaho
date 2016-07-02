<?php
/**
 * Plugin Name: Trabaho
 * Plugin URI: http://www.trabaho.com
 * Description: This plugin will controll all the  content of the trabaho functionality
 * Author URI: http://www.jesuserwinsuarez.com
 * Author: Jesus Erwin Suarez
 * License: GPLv2
 * Version: 1.0
 */

require("autoload.php");

add_action("admin_menu", "tb_admin_menu");
function tb_admin_menu() {
    add_menu_page(
    	'Trabaho General', 
    	'Trabaho General', 
    	'manage_options', 
    	"trabaho-general", 
    	'tb_admin_general'
   	);

    add_submenu_page(
    	'trabaho-general', 
    	'settings',  
        'settings',
    	'manage_options', 
    	'trabaho-settings', 
    	'tb_admin_settings'
    );
 
}

function tb_admin_general(){
    ?>
    <h1> This is the general settings </h1>
<?php 
}
function tb_admin_settings() {
    ?>
        <h1> This is the settings</h1>
    <?php
}
?> 

 



 