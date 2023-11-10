<?php
/*$dbServer="fdb4.freehostingeu.com";
$dbUser="1204594_medc";
$dbUserPwd="3a3be6ea27";
$dbName="1204594_medc";*/
$dbServer="localhost";
$dbUser="root";
$dbUserPwd="";
$dbName="medc";
@$dbLink =mysql_connect($dbServer,$dbUser,$dbUserPwd) or die(mysql_error());
mysql_select_db($dbName,$dbLink);
?>