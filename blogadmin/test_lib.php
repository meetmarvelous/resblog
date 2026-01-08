<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$currDir = dirname(__FILE__);
echo "Current directory: " . $currDir . "\n";

echo "Including settings-manager.php...\n";
include("$currDir/settings-manager.php");
echo "OK.\n";

echo "Detecting config...\n";
detect_config();
echo "OK.\n";

echo "Including config.php...\n";
include("$currDir/config.php");
echo "OK.\n";

echo "Including db.php...\n";
include("$currDir/db.php");
echo "OK.\n";

echo "Including ci_input.php...\n";
include("$currDir/ci_input.php");
echo "OK.\n";

echo "Including datalist.php...\n";
include("$currDir/datalist.php");
echo "OK.\n";

echo "Including incCommon.php...\n";
include("$currDir/incCommon.php");
echo "OK.\n";

echo "Including admin/incFunctions.php...\n";
include("$currDir/admin/incFunctions.php");
echo "OK.\n";

echo "Done.\n";
?>
