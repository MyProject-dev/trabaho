<?php



add_shortcode(
    'project_list',
    'project_list_display'
);


function project_list_display($atts, $content=null) {

    $variable = extract(
        shortcode_atts(
            array('var'=>'var content'),
            $atts
        )
    );


    $html = 'This is the html';

    $html .= 'This is another html';

    return $content . $html;

}