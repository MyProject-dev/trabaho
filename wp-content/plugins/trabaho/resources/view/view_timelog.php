<?php
error_reporting(0);


add_shortcode("view_timelog", "display_view_timelog");


function display_view_timelog($atts, $content=null) {


    $employer =array('cris', 'pcoup');
    $html = '';
    for($j=0; $j<count($employer); $j++ ) {
        $html .= '<div class="bs-example" data-example-id="panel-without-body-with-table">
                    <div class="panel panel-default">  <div class="panel-heading">PHP DEVELOPER hired by <em>' . $employer[$j] . '</em></div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Monday</th>
                                <th>Tuesday</th>
                                <th>Wednesday</th>
                                <th>Thursday</th>
                                <th>Friday</th>
                                <th>Saturday</th>
                                <th>Sunday</th>
                                <th>Total Hours</th>
                                <th>Total Earning</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>';

                            for($i=1; $i<=2; $i++) {
                                $html .=
                                '
                                <td> 0'. rand(1,8). ':' .rand(10,59) . ' hrs</td>
                                <td> 0'. rand(1,8). ':' .rand(10,59) . ' hrs</td>
                                <td> 0'. rand(1,8). ':' .rand(10,59) . ' hrs</td>
                                <td> 0'. rand(1,8). ':' .rand(10,59) . ' hrs</td>
                                <td> 0'. rand(1,8). ':' .rand(10,59) . ' hrs</td>
                                <td> 0'. rand(1,8). ':' .rand(10,59) . ' hrs</td>
                                <td> 0'. rand(1,8). ':' .rand(10,59) . ' hrs</td>
                                <td> ' . rand(0,50) .' hrs</td>
                                <td> $' . rand(100,1000) .  '</td>
                                </tr> <tr>';
                            }

                            $html .=
                                '
                                <td style="border-top:1px solid grey;"  > </td>
                                <td style="border-top:1px solid grey;"  >  </td>
                                <td style="border-top:1px solid grey;"  > </td>
                                <td style="border-top:1px solid grey;"  > </td>
                                <td style="border-top:1px solid grey;"  > </td>
                                <td style="border-top:1px solid grey;"  > </td>
                                <td style="border-top:1px solid grey;"  > </td>
                                <td style="border-top:1px solid grey;"> ' . rand(0,50) .' hrs</td>
                                <td style="border-top:1px solid grey;" > $' . rand(100,1000) .  '</td>
                                </tr> <tr>';

                            $html .= '
                            </tr>
                        </tbody>
                   </table>
                </div>
            </div>';
    }




    return $content . $html;
}

?>

