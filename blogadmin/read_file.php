<?php
$file = 'c:\xampp\htdocs\CampCodes\resblog\resblog\blogadmin\incCommon.php';
$lines = file($file);
for($i=300; $i<450; $i++) {
    if(isset($lines[$i])) {
        echo ($i+1) . ': ' . $lines[$i];
    }
}
?>
