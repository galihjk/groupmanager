<?php

$data_global = [];

include_once("helpers/hlp_str.php");

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

function data_get_one($table, $id, $cols = [], $refresh = false){
    global $data_global;
    if(!$refresh){
        if(empty($data_global[$table][$id])){
            $refresh = true;
        }
    }
    if(!$refresh){
        if(!empty($cols)){
            foreach($cols as $col){
                if(empty($data_global[$table][$id][$col])){
                    $refresh = true;
                    break;
                }
            }
        }
    }
    if(!$refresh){
        if(empty($cols)){
            return $data_global[$table][$id];
        }
        else{
            $data_got = [];
            foreach($cols as $col){
                $data_got[$col] = $data_global[$table][$id][$col];
            }
            return $data_got;
        }
    }
    if($refresh){
        $data_got = [];
        if(empty($cols)){
            $scandir = scandir("data/$table/");
            foreach($scandir as $item){
                if(str_contains($item, '.')) continue;
                $cols[] = $item;
            }
        }
        foreach($cols as $col){
            $value = "";
            $value_file = "data/$table/$col/$id";
            if(file_exists($value_file)){
                $value = file_get_contents($value_file);
            }
            $data_got[$col] = $value;
        }
        $data_global[$table][$id] = $data_got;
        return $data_got;
    }
    die("eh?");
}

function data_update($table, $id, $data_update){
    foreach($data_update as $col=>$val){
        file_put_contents("data/$table/$col/$id",$val);
    }
}