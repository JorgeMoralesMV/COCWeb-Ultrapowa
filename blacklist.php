<?PHP
include "config.php";
?>
<html>
<head>
<link rel="icon" type="image/x-icon" href="ClashFavicon.ico">
<link rel="stylesheet" href="style.css" />
<title><?=$myservername;?> - Black List</title>
</head>
<body>
<body>
<div align="center"><img src="images/image.jpg" alt="" width="420" height="179" border="0"><br /></div><br />
<?PHP include "header.php"; ?><br />
<table class='themain' align="center" cellpadding='2' cellspacing='0' width='54%'><tbody><tr><td>
<table width='100%' class='themain' border='0' align='center' cellpadding='1' cellspacing='1'>
    <tr>
      <td width='53' align='center' valign='top' class='topp2'><strong>#</strong></td>
      <td width='53' align='center' valign='top' class='topp2'><strong>ID</strong></td>
      <td width='426' align='center' valign='top' class='topp2'><strong>Name</strong></td>
      <td width='321' align='center' valign='top' class='topp2'><strong>Townhall</strong></td>
	  <td width='321' align='center' valign='top' class='topp2'><strong>LatestUpdate</strong></td>
	  <td width='321' align='center' valign='top' class='topp2'><strong>Trophies</strong></td>
    </tr>
<?PHP
$sql=mysql_query("SELECT * FROM `player` WHERE AccountStatus <> 0");
//cambiar nombre de la tabla de busqueda
        $i = 0;
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
foreach(@$players as $player){
	$playername = $player['avatarObj']['avatar_name'];
	$th = $player['avatarObj']['townhall_level'] + 1;
	$sc = $player['avatarObj']['score'];
	$ava_level = $player['avatarObj']['avatar_level'];
	$gems = $player['avatarObj']['current_gems'];
	$exp = $player['avatarObj']['experience'];
	$i = $i+1;
//Score
$lt=array(0,400,500,600,800,1000,1200,1400,1600,1800,2000,2200,2400,2600,2800,3000,3200,3500,3800,4100,4400,4700,5000,9999);
$lt2=array(399,499,599,799,999,1199,1399,1599,1799,1999,2199,2399,2599,2799,2999,3199,3499,3799,4099,4399,4699,4999,99999);

$legend = count($lt);
for ($x = 0; $x < $legend; $x++)
{
    if (($player ['avatarObj']['score'] >= $lt[$x]) && ($player ['avatarObj']['score'] < $lt2[$x]))
    {
        $y = $x;
        $sx = '<img src="images/'.$y.'.png" alt="10" width="22" height="19"><br>';
    }
}
	echo"
    <tr class='trhover'>
	  <td align='center' valign='center'>".$i."</td>
      <td align='center' valign='center'>".$player["PlayerId"]."</td>
      <td align='center' valign='center'><a href='profile.php?id=".$player["PlayerId"]."'>".$playername."</a></td>
      <td align='center' valign='center'>".$th."</td>
	  <td align='center' valign='center'>".$player["LastUpdateTime"]."</td>
	  <td align='center' valign='center'>".$sx."".$sc."</td>
    </tr>";
	}
?>
</table>
</table>
<br>
<?PHP include "footer.php"; ?>
</body>
</html>
