<?php
error_reporting(0);


add_shortcode("view_hired_status", "display_view_hired_status");


function display_view_hired_status($atts, $content=null) {




    $html = '<h2>Hired status</h2>';

    $html .= '<b>  </b>';




    return $content . $html;
}

?>

