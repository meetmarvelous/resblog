<?php
$file = 'c:\xampp\htdocs\CampCodes\resblog\resblog\blogadmin\admin\incFunctions.php';
$lines = file($file);
$found = false;

// The warning is on line 380.
// Let's look at line 380 (index 379)
if (isset($lines[379])) {
    echo "Line 380 content: " . $lines[379] . "\n";
    // It seems from previous output it might be checking $_SESSION instead of $adminConfig?
    // Or maybe I misread the output.
    // Let's just replace the line if it looks like the problematic one.
    
    if (strpos($lines[379], "if(\$adminConfig['adminUsername']!='')") !== false || 
        strpos($lines[379], "if(\$_SESSION['adminUsername']") !== false) { // Just in case
        
        $lines[379] = "         if(isset(\$adminConfig['adminUsername']) && \$adminConfig['adminUsername']!=''){";
        // Ensure newline
        if (substr($lines[379], -1) != "\n") $lines[379] .= "\n";
        
        $found = true;
    }
}

if ($found) {
    file_put_contents($file, implode("", $lines));
    echo "Fixed line 380.\n";
} else {
    echo "Line 380 did not match expected pattern. Dumping surrounding lines:\n";
    for($i=375; $i<385; $i++) echo ($i+1) . ": " . $lines[$i];
}
?>
