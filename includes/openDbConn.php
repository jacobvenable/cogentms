<?php
@ $db = mysql_pconnect("localhost", "root", "funisfun");
mysql_select_db("cms");

if(!$db){
	echo "Error: Unable to connect to database";
	exit;
}
?>