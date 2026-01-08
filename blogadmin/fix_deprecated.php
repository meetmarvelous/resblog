<?php
$file = 'c:\xampp\htdocs\CampCodes\resblog\resblog\blogadmin\admin\incFunctions.php';
$content = file_get_contents($file);

$search = '$val{strlen($val)-1}';
$replace = '$val[strlen($val)-1]';

if (strpos($content, $search) !== false) {
    $new_content = str_replace($search, $replace, $content);
    file_put_contents($file, $new_content);
    echo "Fixed deprecated syntax in $file\n";
} else {
    echo "Pattern not found in $file\n";
}
?>
