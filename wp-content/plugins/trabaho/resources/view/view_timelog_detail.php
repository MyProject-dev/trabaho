<?php

add_shortcode("view_timelog_detail", "display_view_timelog_detail");


function display_view_timelog_detail($atts, $content=null) {


    $html = '<div class="bs-example" data-example-id="panel-without-body-with-table">
                <div class="panel panel-default">  <div class="panel-heading">PHP DEVELOPER</div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Time Start</th>
                            <th>Time End</th>
                            <th>Total Time</th>
                            <th>Note</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr>';


                            for($i=1; $i<=10; $i++) {
                                $html .= '
                                <td> 0'. rand(1,8). ':' .rand(10,59) . ' :' .rand(10,59) . '</td>
                                <td> 0'. rand(1,8). ':' .rand(10,59) . ' :' .rand(10,59) . '</td>
                                <td> 0'. rand(1,8). ':' .rand(10,59) . ' :' .rand(10,59) . '</td>
                                <td>  This is my note for this tisda sdasd asd asdme  </td>
                                </tr> <tr>';
                            }

                            $html .= '
                            <td style="border-top:1px solid grey" >  </td>
                            <td style="border-top:1px solid grey" > </td>
                            <td style="border-top:1px solid grey"> 0'. rand(1,8). ':' .rand(10,59) . ' :' .rand(10,59) . '</td>
                            <td style="border-top:1px solid grey" >  </td>';







    $html .= '
                        </tr>
                    </tbody>
               </table>
            </div>
        </div>';




    return $content . $html;
}

?>

