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
    $cols = scandir("data/$table/");
    foreach($cols as $col) {
        if(!isset($data_insert[$col])){
            $data_insert[$col] = "";
        }
    }
    $checkcols = $scandir[2] ?? false;
    if($checkcols) $folder = "data/$table/$foldercheck/";
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
    foreach($data_insert as $col=>$val){
        file_put_contents("data/$table/$col/$id",$val);
    }
    return $id;
}