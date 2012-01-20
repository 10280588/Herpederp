<?php
$db="webdb1227";
mysql_connect('localhost','webdb1227','chusa5ra') or die("Kon niet inloggen op de database! Zie dit: ".mysql_error());
mysql_select_db($db) or die("Kon geen database selecteren :s Zie dit: ".mysql_error());
mysql_query("SET NAMES 'utf8'"); //this is new
mysql_query("SET CHARACTER SET 'utf8'"); //this is new

?>
