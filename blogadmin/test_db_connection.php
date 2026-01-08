<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$currDir = dirname(__FILE__);
echo "Current directory: " . $currDir . "\n";

if (!file_exists("$currDir/config.php")) {
    die("Error: config.php not found.\n");
}
include("$currDir/config.php");
echo "Loaded config.php\n";

if (!file_exists("$currDir/db.php")) {
    die("Error: db.php not found.\n");
}
include("$currDir/db.php");
echo "Loaded db.php\n";

echo "Database type: " . DATABASE . "\n";
echo "Connecting to $dbServer as $dbUsername...\n";

$link = db_connect($dbServer, $dbUsername, $dbPassword, $dbDatabase);

if ($link) {
    echo "Connection successful!\n";
    db_close($link);
} else {
    echo "Connection failed!\n";
    echo "Error: " . db_error($link, true) . "\n";
}
?>
