<?php
$file = 'c:\xampp\htdocs\CampCodes\resblog\resblog\blogadmin\admin\incFunctions.php';
$lines = file($file);
for($i=375; $i<385; $i++) {
    if(isset($lines[$i])) {
        echo ($i+1) . ": " . trim($lines[$i]) . "\n";
    }
}
?>
