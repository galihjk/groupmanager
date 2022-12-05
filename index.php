<?php echo "hello world"; //--tes

$folder = "data/tes/nama/";

include_once("helpers/hlp_data.php");

if(file_exists($folder)){
    if(!is_readable($folder)){
        $id = 1;
        echo "not readable";
    }
    else{
        $scandir = scandir($folder);
        sort($scandir);
        $scandircount = count($scandir);
        echo "[scandircount$scandircount]<pre>";
        print_r($scandir);
        if($scandircount > 2){
            $id = $scandir[$scandircount-1] + 1;
        }
        else{
            $id = 1;
        }
    }
    echo "NEW ID=$id";
}
else{
    mkdir($folder, 0777, true);
    echo "DIBUAT";
}