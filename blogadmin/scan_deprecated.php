<?php
$file = 'c:\xampp\htdocs\CampCodes\resblog\resblog\blogadmin\admin\incFunctions.php';
$content = file_get_contents($file);

// Regex to find $var{...}
// Matches $ followed by var name, then {, then anything not }, then }
// This is a simple approximation.
$pattern = '/\$([a-zA-Z0-9_]+)\{([^}]+)\}/';

preg_match_all($pattern, $content, $matches, PREG_OFFSET_CAPTURE);

echo "Found " . count($matches[0]) . " matches:\n";

foreach ($matches[0] as $match) {
    echo "Match: " . $match[0] . "\n";
}
?>
