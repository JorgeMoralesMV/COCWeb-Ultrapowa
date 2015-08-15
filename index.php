<?PHP
include "config.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>top</title>
</head>
<body>
<table width='550' border='1' align='center' cellpadding='1' cellspacing='1'>
    <tr>
      <td width='53' align='center' valign='top' bgcolor='#999999'><strong>ID</strong></td>
      <td width='426' align='center' valign='top' bgcolor='#999999'><strong>Nombre</strong></td>
      <td width='321' align='center' valign='top' bgcolor='#999999'><strong>Ayuntamiento</strong></td>
	  <td width='321' align='center' valign='top' bgcolor='#999999'><strong>Ultima conexión</strong></td>
	  <td width='321' align='center' valign='top' bgcolor='#999999'><strong>Perfil</strong></td>
    </tr>
<?php
$sql = "SELECT * FROM player";
$result = $conn->query($sql);
if ($result->num_rows > 0) {

    while($row = $result->fetch_assoc()) {
		$avatar = (json_decode($row["Avatar"], true));
		$playername = $avatar['avatar_name'];
		$th = ($avatar['townhall_level']+1);
		echo "
    <tr bgcolor=''>
      <td align='center' valign='top'>".$row["PlayerId"]."</td>
      <td align='center' valign='top'>".$playername."</td>
      <td align='center' valign='top'>".$th."</td>
	  <td align='center' valign='top'>".$row["LastUpdateTime"]."</td>
	  <td align='center' valign='top'><a href=\"#\" target=\"_blank\">Click Aquí</a></td>
    </tr>
";
}
} 
else
{
    echo "There are 0 results";
}
$conn->close();
?>
</table>
</body>
</html>