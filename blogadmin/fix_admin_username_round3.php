<?php
$file = 'c:\xampp\htdocs\CampCodes\resblog\resblog\blogadmin\admin\incFunctions.php';
$lines = file($file);
$found = false;

// The warning is consistently reported around line 380/381.
// The context is likely:
// if($_SESSION['adminUsername']!=''){
// OR
// if($adminConfig['adminUsername']!=''){

// We want to replace it with:
// if(isset($adminConfig['adminUsername']) && $adminConfig['adminUsername']!=''){
// OR if it really is session:
// if(isset($_SESSION['adminUsername']) && $_SESSION['adminUsername']!=''){

// Let's look at the lines and decide.
for ($i = 375; $i < 385; $i++) {
    if (isset($lines[$i])) {
        $line = $lines[$i];
        // Check for adminUsername check without isset
        if (strpos($line, "['adminUsername']!=''") !== false && strpos($line, 'isset') === false) {
            
            // Check if it's using $adminConfig or $_SESSION
            if (strpos($line, '$adminConfig') !== false) {
                $lines[$i] = "         if(isset(\$adminConfig['adminUsername']) && \$adminConfig['adminUsername']!=''){";
            } elseif (strpos($line, '$_SESSION') !== false) {
                $lines[$i] = "         if(isset(\$_SESSION['adminUsername']) && \$_SESSION['adminUsername']!=''){";
            }
            
            // Add newline
            if (substr($lines[$i], -1) != "\n") $lines[$i] .= "\n";
            
            $found = true;
            echo "Fixed adminUsername on line " . ($i + 1) . "\n";
            break;
        }
    }
}

if ($found) {
    file_put_contents($file, implode("", $lines));
    echo "File updated.\n";
} else {
    echo "Pattern not found. Dumping lines for manual inspection:\n";
    for ($i = 375; $i < 385; $i++) {
        if (isset($lines[$i])) echo ($i+1) . ": " . $lines[$i];
    }
}
?>
