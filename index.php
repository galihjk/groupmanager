<?php echo "hello world"; //--tes

$folder_data = "/data/tes/";
if(!file_exists($folder_data)){
    mkdir($folder_data, 0777, true);
    echo "DIBUAT: [$folder_data] ";
}
$folder = "/data/tes/nama/";
if(file_exists($folder)){
    print_r(scandir($folder));
}
else{
    mkdir($folder, 0777, true);
    echo "DIBUAT";
}