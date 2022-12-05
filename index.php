<?php echo "hello world"; //--tes
$fi = new FilesystemIterator('data/tes/nama', FilesystemIterator::SKIP_DOTS);
printf("There were %d Files", iterator_count($fi));