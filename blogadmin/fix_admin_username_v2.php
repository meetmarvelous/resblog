<?php
$file = 'c:\xampp\htdocs\CampCodes\resblog\resblog\blogadmin\admin\incFunctions.php';
$lines = file($file);
$found = false;

$search = "if(isset(\$adminConfig['adminUsername']) && \$adminConfig['adminUsername']!=''){";
$replace = "if(isset(\$adminConfig['adminUsername']) && \$adminConfig['adminUsername']!='')";

foreach ($lines as $i => $line) {
    if (trim($line) == $search) {
        // Keep indentation
        $indent = str_replace($search, '', $line); // This might be wrong if trim removes indentation
        // Better: use str_replace on the line
        $lines[$i] = str_replace('{', '', $line);
        $found = true;
        echo "Removed trailing brace on line " . ($i + 1) . "\n";
        break;
    }
}

if ($found) {
    file_put_contents($file, implode("", $lines));
    echo "File updated.\n";
} else {
    echo "Pattern not found.\n";
}
?>
