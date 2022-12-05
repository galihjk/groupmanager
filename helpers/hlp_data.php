<?php

function data_insert($table, $data_insert){
    $folder = "";
    $checkcols = array_keys($data_insert);
    foreach($checkcols as $col){
        $folder = "data/$table/$col/";
        if(!file_exists($folder)){
            mkdir($folder, 0777, true);
        }
    }
    $id = 1;
    $last_id_file = "data/$table/last.id";
    if(file_exists($last_id_file)){
        $last_id = file_get_contents($last_id_file);
        $id = $last_id+1;
    }
    foreach($data_insert as $col=>$val){
        file_put_contents("data/$table/$col/$id",$val);
    }
    file_put_contents("data/$table/last.id",$id);
    return $id;
}