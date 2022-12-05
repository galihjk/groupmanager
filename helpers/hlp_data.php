<?php
function is_dir_empty($dir) {
    if (!is_readable($dir)) return null; 
    return (count(scandir($dir)) == 2);
}

function data_insert ($table, $data){
    // $cols = array_keys($data);
    // $primary_key = 
    // return "asd";
}