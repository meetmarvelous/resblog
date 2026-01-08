<?php
$file = 'c:\xampp\htdocs\CampCodes\resblog\resblog\blogadmin\admin\incFunctions.php';
$lines = file($file);
$found = false;

// Look for the line checking adminUsername
foreach ($lines as $i => $line) {
    // We are looking for: if($adminConfig['adminUsername']!='')
    // or similar variants.
    if (strpos($line, "\$adminConfig['adminUsername']!=''") !== false && strpos($line, 'isset') === false) {
        // It's the line we want, and it doesn't have isset yet.
        $lines[$i] = "         if(isset(\$adminConfig['adminUsername']) && \$adminConfig['adminUsername']!=''){";
        // Preserve newline
        if (substr($line, -2) === "\r\n") {
            $lines[$i] .= "\r\n";
        } elseif (substr($line, -1) === "\n") {
            $lines[$i] .= "\n";
        }
        $found = true;
        echo "Fixed adminUsername on line " . ($i + 1) . "\n";
        break;
    }
}

if ($found) {
    file_put_contents($file, implode("", $lines));
    echo "File updated.\n";
} else {
    echo "Pattern not found or already fixed.\n";
}
?>
