<?php






add_shortcode("add_project", "display_add_project");

function display_add_project($atts, $content=null) {

    $variable = extract(
        shortcode_atts(
            array(
                'test'=>'nice'
            ), $atts
        )
    );


    $html  = '<div class="container add_product data-container">';

    $html .= $_SESSION['error_message'];

    $html .= ' <form method="post" name="add_project" >';

    $html .= '<br>';
    $html .= '<h4> Project Title: </h4>';
    $html .= '<input type="text" placeholder="" name="title" value="'.$_POST['title'].'" />';

    $html .= '<br>';
    $html .= '<h4> Project Description:</h4>';
    $html .= '<textarea rows="10" style="resize:none" name="description"  >'.$_POST['description'].'</textarea>';

    $html .= '<br>';
    $html .= '<h4> Rate $: </h4>';
    $html .= '<input type="number" placeholder=""  value="'.$_POST['rate'].'" name="rate" />';

    $html .= '<br>';
    $html .= '<h4> Work Type: </h4>';
    $html .= '<select name="work_type"  value="'.$_POST['work_type'].'" >';
    $html .= '<option>Hourly</option>';
    $html .= '<option>1st and 16th of the month</option>';
    $html .= '<option>Monthly</option>';
    $html .= '</select>';

    $html .= '<br>';
    $html .= '<h4> Duration: </h4>';
    $html .= '<select name="duration" value="'.$_POST['duration'].'"  >';
    $html .= '<option>1 month</option>';
    $html .= '<option>6 months</option>';
    $html .= '<option>1 year</option>';
    $html .= '<option>More than 1 year</option>';
    $html .= '</select>';

    $html .= '<br>';
    $html .= '<h4> Work Required: </h4>';
    $html .= '<select name="work_require" value="'.$_POST['work_require'].'" >';
    $html .= '<option>Full Time</option>';
    $html .= '<option>Part Time</option>';
    $html .= '<option>Contractual</option>';
    $html .= '</select>';

    $html .= '<br>';
    $html .= '<h4> Vacancy: </h4>';
    $html .= '<input type="number" placeholder="" value="1" name="vacancy" value="'.$_POST['vacancy'].'"  />';

    $html .= '<br><br>';
    $html .= '<input type="submit" value="Post" name="post_project"/>';
    $html .= '<br><br>';

    $html .= '</form>';

    $html .= '</div>';



    return $content . $html;
}