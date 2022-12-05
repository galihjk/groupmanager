<?php

function data_insert($table, $data){
    $cols = array_keys($data);
    foreach($cols as $col){
        $folder = "data/$table/$col/";
        if(!file_exists($folder)){
            mkdir($folder, 0777, true);
        }
    }
    $id = 1;
    if(is_readable($folder)){
        $scandir = scandir($folder);
        sort($scandir);
        $scandircount = count($scandir);
        if($scandircount > 2){
            $id = $scandir[$scandircount-1] + 1;
        }
        else{
            $id = 1;
        }
    }
    foreach($data as $col=>$val){
        file_put_contents("data/$table/$col/$id",$val);
    }
    return $id;
}