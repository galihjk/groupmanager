<?php echo "hello world"; //--tes

$folder = "/data/tes/nama/";
if(file_exists($folder)){
    print_r(scandir($folder));
}
else{
    echo "ERROR: File does not exist [$folder]";
}