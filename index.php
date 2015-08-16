<table width='745' border='1' align='center' cellpadding='1' cellspacing='1'>
    <tr>
      <td width='95' align='center' valign='top' bgcolor='#999999'><strong>Player ID</strong></td>
      <td width='84' align='center' valign='top' bgcolor='#999999'><strong>Name</strong></td>
      <td width='136' align='center' valign='top' bgcolor='#999999'><strong>Town Hall level</strong></td>
	  <td width='108' align='center' valign='top' bgcolor='#999999'><strong>Last online</strong></td>
	  <td width='50' align='center' valign='top' bgcolor='#999999'><strong>Status</strong></td>
      <td width='135' align='center' valign='top' bgcolor='#999999'><strong>Server Permissions</strong></td>
      <td width='99' align='center' valign='top' bgcolor='#999999'><strong>Trophies</strong></td>
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
$sql=mysql_query("select * FROM player order by ".$player['avatarObj']['townhall_level']." asc") or die ('Database name is not available!');
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
	$sc = $player['avatarObj']['score'];
echo "<tr bgcolor=''>
      <td align='center' valign='top'>".$player["PlayerId"]."</td>
      <td align='center' valign='top'>".$playername."</td>
      <td align='center' valign='top'>".$th."</td>
	  <td align='center' valign='top'>".$player["LastUpdateTime"]."</td>
	  <td align='center' valign='top'>".$player["AccountStatus"]."</td>
	  <td align='center' valign='top'>".$player["AccountPrivileges"]."</td>
	  <td align='center' valign='top'>".$sc."</td>
    </tr>";
	}
?>
</table>
