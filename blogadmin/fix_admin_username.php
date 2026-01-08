<?php
$file = 'c:\xampp\htdocs\CampCodes\resblog\resblog\blogadmin\admin\incFunctions.php';
$lines = file($file);
$found = false;

foreach ($lines as $i => $line) {
    if (strpos($line, '$adminConfig[\'adminUsername\']') !== false && strpos($line, 'if') !== false) {
        $lines[$i] = "         if(isset(\$adminConfig['adminUsername']) && \$adminConfig['adminUsername']!=''){";
        // Preserve original line ending if possible, or just add \n
        if (substr($line, -2) === "\r\n") {
            $lines[$i] .= "\r\n";
        } elseif (substr($line, -1) === "\n") {
            $lines[$i] .= "\n";
        }
        $found = true;
        echo "Found and replaced on line " . ($i + 1) . "\n";
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
