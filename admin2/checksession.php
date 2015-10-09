<?php
error_reporting(0);
session_start();
if(empty($_SESSION['adminusername2']))
{
echo "<META HTTP-EQUIV=REFRESH CONTENT='1;URL=index.php'>";
exit;
}
?>
