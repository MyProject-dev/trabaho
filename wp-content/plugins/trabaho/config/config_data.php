<?php

error_reporting(0);

/**
 * You can set error message here
 */
$_SESSION['error_message'] = '';

/**
 * This will be the session for project id that being apply from the employee
 */
$_SESSION['project_id'] = (!empty($_SESSION['project_id'])) ? $_SESSION['project_id'] : null;

define('site_url', get_site_url());

define('uri_add_project' ,  get_site_url() . '/add-project');

define('uri_member_profile', get_site_url() . '/user/profile');

define('uri_application_submit_success', get_site_url() . '/submit-application-success');

define('uri_apply_project', get_site_url() . '/apply-project');

define('uri_user_profile', get_site_url() . '/user/profile');

define('uri_project_list_details', get_site_url() . '/project-list-detail');




