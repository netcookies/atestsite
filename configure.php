<?php
$cfgDB_HOST = "localhost";
$cfgDB_PORT = "3306";
$cfbDB_USERNAME = "pcdata";
$cfgDB_PASSWORD = "WdAYM54Bd9XVYrrR";
$cfgDB_NAME = "pcdata";
$link = mysql_connect($cfgDB_HOST . ":" . $cfgDB_PORT, $cfbDB_USERNAME, $cfgDB_PASSWORD);
mysql_select_db($cfgDB_NAME, $link);
mysql_query("SET NAMES 'utf8'",$link);
?>
