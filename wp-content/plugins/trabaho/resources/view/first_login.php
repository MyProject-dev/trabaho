<?php
/**
 * Created by PhpStorm.
 * User: JESUS
 * Date: 7/2/2016
 * Time: 12:07 PM
 */





add_shortcode("select_user_type", "display_user_type");


function display_user_type($atts, $content=null) {
    $variable = extract(
        shortcode_atts(
            array(
                'type' => "this is the user type"
            ), $atts
        )
    );  
    return $content . "adsasd" . $type;
}
