<?php
include "config.php";
?>
<table width='550' border='1' align='center' cellpadding='1' cellspacing='1'>
    <tr>
      <td width='53' align='center' valign='top' bgcolor='#999999'><strong>ID</strong></td>
      <td width='426' align='center' valign='top' bgcolor='#999999'><strong>Nombre</strong></td>
      <td width='321' align='center' valign='top' bgcolor='#999999'><strong>Ayuntamiento</strong></td>
	  <td width='321' align='center' valign='top' bgcolor='#999999'><strong>Ultima conexión</strong></td>
	  <td width='321' align='center' valign='top' bgcolor='#999999'><strong>Perfil</strong></td>
    </tr>
<?
//Una consulta para obtener el resultado deseado
$sql=mysql_query("SELECT * FROM player");
    while($row = mysql_fetch_array($sql)){ 
    $avatar = (json_decode($row["Avatar"], true));
	$th = ($avatar['townhall_level']+1);
	}
$sql=mysql_query("SELECT * FROM player order by ".$avatar['townhall_level']." asc") or die ('Database name is not available!');
//Ordenamos de forma ascendente.
    while($row = mysql_fetch_array($sql)){ 
    $avatar = (json_decode($row["Avatar"], true));
    $playername = $avatar['avatar_name'];
	$th = ($avatar['townhall_level']+1);
	
echo "<tr bgcolor=''>
      <td align='center' valign='top'>".$row["PlayerId"]."</td>
      <td align='center' valign='top'>".$playername."</td>
      <td align='center' valign='top'>".$th."</td>
	  <td align='center' valign='top'>".$row["LastUpdateTime"]."</td>
	  <td align='center' valign='top'><a href=\"#\" target=\"_blank\">Click Aquí</a></td>
    </tr>";
	}
?>
</table> 