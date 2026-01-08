<?php
function read_lines($file, $start, $end) {
    if (!file_exists($file)) {
        echo "File not found: $file\n";
        return;
    }
    $lines = file($file);
    echo "Reading $file lines $start to $end:\n";
    for($i=$start-1; $i<$end; $i++) {
        if(isset($lines[$i])) {
            echo ($i+1) . ": " . trim($lines[$i]) . "\n";
        }
    }
    echo "\n";
}

read_lines('c:\xampp\htdocs\CampCodes\resblog\resblog\blogadmin\incCommon.php', 270, 280);
read_lines('c:\xampp\htdocs\CampCodes\resblog\resblog\blogadmin\admin\incFunctions.php', 375, 385);
?>
