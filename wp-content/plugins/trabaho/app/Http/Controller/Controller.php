<?php

namespace App;

class Controller {


    function __construct()
    {

    }

    public function insert() {

    }

    public function update($wpdb, $table_name,$update_row=array(), $row_id_name, $row_id_value) {
        $update_string = '';
        $value1        = '';
        foreach($update_row as $key => $value ){
            if(is_string($value)) {
                    $value1 = "$value";
            }  else {
                $value1 = $value;
            }
            $update_string .=  $key . ' = ' . $value1 . ' ';
        }
        echo  '<br> table name = ' . $table_name . " set  " . $update_string . ' row id name ' . $row_id_name . ' row id value ' . $row_id_value;
       return $wpdb->query($wpdb->prepare("UPDATE $table_name SET $update_string WHERE $row_id_name = $row_id_value"));
    }

    public function delete() {







    }

    public function query() {
        echo "You are about to query here...";
    }
}