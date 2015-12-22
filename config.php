<?php
$servername = "localhost";
$username = "root";
$password = "password";
$dbname = "ucsdb"; 

mysql_connect($servername, $username, $password); 
mysql_select_db($dbname);

$db_link = mysql_connect('localhost', 'root', 'password');
if(!$db_link){
die('No se pudo conectar: ' . mysql_error());
}
$db_selected = mysql_select_db('ucsdb', $db_link);
if(!$db_selected){
die('No se selecciono la BD: ' . mysql_error());
}
/////////////////////Configs Page Info////////////////////
$myservername = "Clash of THRONES";
$site = "localhost";

$NameOfServer1 = "Clash Server 1";
$ipserver1 = "189.150.142.52";

$NameOfServer2 = "Clash Server 2";
$ipserver2 = "189.150.142.52";

?>
