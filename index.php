<?php echo "hello world"; //--tes
$folder = "/data/tes/nama/";
if(file_exists($folder)){
    print_r(scandir($folder));
}
else{
    mkdir($folder, 0777);
    echo "DIBUAT";
}