<html>
<head>
<link rel="stylesheet" href="style.css" />
<title>Profile Players</title>
</head>
<body>
<br />
<?PHP
include('config.php');
$sql=mysql_query("SELECT * FROM player WHERE PlayerId=".$_GET['id']."");
        while($row = mysql_fetch_array($sql)){ 
		$playerID = $row['PlayerId'];
		$AccountStatus = $row['AccountStatus'];
		$AccountPrivileges = $row['AccountPrivileges'];
		$LastUpdateTime = $row['LastUpdateTime'];
		
		$avatar = $row["Avatar"];
		$avatarObj = json_decode($row["Avatar"], true);
		$gameobjects = $row["GameObjects"];
		$gameobjectsObj = json_decode($row["GameObjects"], true);
		
		$players[] = array(
			"PlayerId" => $row['PlayerId'],
			"AccountStatus" => $row['AccountStatus'],
			"AccountPrivileges" => $row['AccountPrivileges'],
			"LastUpdateTime" => $row['LastUpdateTime'],
			"avatar" => $avatar,
			"avatarObj" => $avatarObj,
			"gameobjects" => $gameobjects,
		);
	}
foreach($players as $player){
	$playername = $player['avatarObj']['avatar_name'];
	$th = $player['avatarObj']['townhall_level'] + 1;
	$sc = $player['avatarObj']['score'];
	$ava_level = $player['avatarObj']['avatar_level'];
	$gems = $player['avatarObj']['current_gems'];
	$exp = $player['avatarObj']['experience'];
//townhall
if($th == 1){ $th ='<img src="images/townhall/'.$th.'.png" alt="1" width="148" height="157"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 2){ $th ='<img src="images/townhall/'.$th.'.png" alt="2" width="148" height="157"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 3){ $th ='<img src="images/townhall/'.$th.'.png" alt="3" width="148" height="157"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 4){ $th ='<img src="images/townhall/'.$th.'.png" alt="4" width="148" height="157"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 5){ $th ='<img src="images/townhall/'.$th.'.png" alt="5" width="148" height="157"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 6){ $th ='<img src="images/townhall/'.$th.'.png" alt="6" width="148" height="157"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 7){ $th ='<img src="images/townhall/'.$th.'.png" alt="7" width="148" height="157"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 8){ $th ='<img src="images/townhall/'.$th.'.png" alt="8" width="148" height="157"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 9){ $th ='<img src="images/townhall/'.$th.'.png" alt="9" width="148" height="157"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 10){ $th ='<img src="images/townhall/'.$th.'.png" alt="10" width="148" height="157"><FONT SIZE=1>'.$th.'</font>';
}
//score
$lt=array(0,400,500,600,800,1000,1200,1400,1600,1800,2000,2200,2400,2600,2800,3000,3200,3500,3800,4100,4400,4700,5000,9999);
$lt2=array(399,499,599,799,999,1199,1399,1599,1799,1999,2199,2399,2599,2799,2999,3199,3499,3799,4099,4399,4699,4999,99999);

$legend = count($lt);
for ($x = 0; $x < $legend; $x++)
{
    if (($player ['avatarObj']['score'] >= $lt[$x]) && ($player ['avatarObj']['score'] < $lt2[$x]))
    {
        $y = $x;
        $sx = '<img src="images/'.$y.'.png" alt="10" width="22" height="19">';
    }
}
//AccountPrivileges
if($player["AccountPrivileges"] == 0){ $player["AccountPrivileges"] ='Player';
}
if($player["AccountPrivileges"] == 1){ $player["AccountPrivileges"] ='<font color="red"><b>Moderator</b></font>';
}
if($player["AccountPrivileges"] == 2){ $player["AccountPrivileges"] ='<font color="red"><b>High Moderator</b></font>';
}
if($player["AccountPrivileges"] == 3){ $player["AccountPrivileges"] ='<font color="red"><b>Undefined</b></font>';
}
if($player["AccountPrivileges"] == 4){ $player["AccountPrivileges"] ='<font color="red"><b>Administrator</b></font>';
}
if($player["AccountPrivileges"] == 5){ $player["AccountPrivileges"] ='<font color="red"><b>Owner</b></font>';
}
//AccountStatus
if($player["AccountStatus"] == 0){ $player["AccountStatus"] ='Normal';
}
if($player["AccountStatus"] <> 0){ $player["AccountStatus"] ='<font color="red">Banned</font>';
}
	echo'
	<table class="themain" align="center" cellpadding="2" cellspacing="0" width="10%"><tbody><tr>
	  <td>
	<table width="700" class="themain" border="0" align="center" cellpadding="1" cellspacing="1" >
  <tr class="trhover">
    <td height="26" colspan="3" class="topp2"><b>Profile - <b>'.$player["AccountPrivileges"].'</b></b> - <font color="red"><b>'.$playername.'</b></font></b></td>
  </tr>
  <tr class="trhover">
    <td width="174" rowspan="7" align="center">'.$th.'</td>
    <td width="124"><b>Player ID:</b></td>
    <td>'.$player["PlayerId"].'</td>
    </tr>
  <tr class="trhover">
    <td><b>Name:</b></td>
    <td>'.$playername.'</td>
    </tr>
  <tr class="trhover">
    <td><b>Level:</b></td>
    <td>'.$ava_level.'</td>
    </tr>
  <tr class="trhover">
    <td><b>Experience:</b></td>
    <td>'.$exp.'</td>
    </tr>
  <tr class="trhover">
    <td><b>Trophies:</b></td>
    <td>'.$sx.' '.$sc.'</td>
    </tr>
  <tr class="trhover">
    <td><b>Gems:</b></td>
    <td>'.$gems.'</td>
    </tr>
  <tr class="trhover">
    <td><b>Latest Update</b></td>
    <td>'.$player["LastUpdateTime"].'</td>
    </tr>
  <tr class="trhover">
    <td width="174" align="center">'.$player["AccountStatus"].'</td>
    <td colspan="2">&nbsp;</td>
    </tr>
  </table>
<br>
<table class="themain" align="center" cellpadding="2" cellspacing="0" width="100%">
  <tr>
    <td class="topp2">Buildings</td>
  </tr>
  <tr class="trhover">
    <td>'.$player["gameobjects"].'</td>
  </tr>
</table>
</table>';
	}
?>
</body>
</html>