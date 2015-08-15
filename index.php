<table width='676' border='1' align='center' cellpadding='1' cellspacing='1'>
    <tr>
      <td width='106' align='center' valign='top' bgcolor='#999999'><strong>Player ID</strong></td>
      <td width='96' align='center' valign='top' bgcolor='#999999'><strong>Name</strong></td>
      <td width='130' align='center' valign='top' bgcolor='#999999'><strong>Town Hall level</strong></td>
	  <td width='133' align='center' valign='top' bgcolor='#999999'><strong>Last online</strong></td>
	  <td width='42' align='center' valign='top' bgcolor='#999999'><strong>Status</strong></td>
      <td width='136' align='center' valign='top' bgcolor='#999999'><strong>Server Permissions</strong></td>
    </tr>
<?
include "config.php";
$sql1=mysql_query("SELECT * FROM player");//cambiar nombre de la tabla de busqueda
    while($row = mysql_fetch_array($sql1)){ 
		$avatar = $row["Avatar"];
		$avatarObj = json_decode($row["Avatar"], true);

		$players1[] = array(
		"avatarObj" => $avatarObj,
		);
	}
foreach($players1 as $player){
	$th = $player['avatarObj']['townhall_level'] + 1;
}
$sql=mysql_query("SELECT * FROM player order by ".$th." asc") or die ('Database name is not available!');
//cambiar nombre de la tabla de busqueda
        while($row = mysql_fetch_array($sql)){ 
		$playerID = $row['PlayerId'];
		$AccountStatus = $row['AccountStatus'];
		$AccountPrivileges = $row['AccountPrivileges'];
		$LastUpdateTime = $row['LastUpdateTime'];
		
		$avatar = $row["Avatar"];
		$avatarObj = json_decode($row["Avatar"], true);
		
		$players[] = array(
			"PlayerId" => $row['PlayerId'],
			"AccountStatus" => $row['AccountStatus'],
			"AccountPrivileges" => $row['AccountPrivileges'],
			"LastUpdateTime" => $row['LastUpdateTime'],
			"avatar" => $avatar,
			"avatarObj" => $avatarObj,
		);
	}
foreach($players as $player){
	$playername = $player['avatarObj']['avatar_name'];
	$th = $player['avatarObj']['townhall_level'] + 1;
echo "<tr bgcolor=''>
      <td align='center' valign='top'>".$player["PlayerId"]."</td>
      <td align='center' valign='top'>".$playername."</td>
      <td align='center' valign='top'>".$th."</td>
	  <td align='center' valign='top'>".$player["LastUpdateTime"]."</td>
	  <td align='center' valign='top'>".$player["AccountStatus"]."</td>
	  <td align='center' valign='top'>".$player["AccountPrivileges"]."</td>
    </tr>";
	}
?>
</table> 