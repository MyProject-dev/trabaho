<?php
/**
 * Created by PhpStorm.
 * User: JESUS
 * Date: 7/2/2016
 * Time: 12:07 PM
 */


add_shortcode("select_user_type", "display_user_type");


/**
 * @param $atts
 * @param null $content
 * @return string
 * Ex Input Short Code 1: [select_user_type type="Select membership, Employee, Employer" ]
 * Ex Input Short Code 2: [select_user_type type="Select membership, Employee, Employer" id="0,1,2"]
 */
function display_user_type($atts, $content=null) {
    $variable = extract(
        shortcode_atts(
            array(
                'type' => "this is the user type",
                'id' => "0,1,2"
            ), $atts
        )
    );

    $typeA = explode(',', $type);
    $idA = explode(',', $id);

    $html  = '<div class="container">' ;


    $html .= $_SESSION['error_message'];

    $html .= '<form method="post" >';

    $html .= '<select name="membership_type">';
        foreach($typeA as $key => $value) {
            if(!empty($idA[$key])) {
                $id = $idA[$key];
            } else {
                $id = $key;
            }
            $html .= '<option value="' . $id . '" >' . $value. '</option>';
        }

    $html .= '</select> ';

    $html .= '<br><br> <input type="submit" value="Next" name="next" /> ';

    $html .= '</form>';

    $html .= '</div>';











    return $content . $html;
}


?>




