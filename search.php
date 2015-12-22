<?PHP
include "config.php";
?>
<html>
<head>
<link rel="icon" type="image/x-icon" href="ClashFavicon.ico">
<link rel="stylesheet" href="style.css" />
<title><?=$myservername;?> - Search Players</title>
</head>
<body>
<div align="center"><img src="images/image.jpg" alt="" width="420" height="179" border="0"><br /></div><br />
<?php include "header.php"; ?><br />
<?PHP
// comprobamos que se haya iniciado la sesión
if(isset($_GET["Search"])){
	$Search = $_GET["Search"];
	
$sql=mysql_query("SELECT * FROM player WHERE PlayerID LIKE '%".$_GET['Search']."%'") or die ('Database name is not available!');//cambiar nombre de la tabla de busqueda
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
echo "<table width='700' height='203' border='0' align='center' cellpadding='1' cellspacing='1' class='themain'>
  <tr>
    <td colspan='2' class='topp2'>Player: ".$playername."</td>
  </tr>
  <tr class='trhover'>
    <td width='164' height='129' rowspan='4'>".$th."</td>
    <td width='529'>".$exp."</td>
  </tr>
  <tr class='trhover'>
    <td>".$ava_level."</td>
  </tr>
  <tr class='trhover'>
    <td>".$sx." ".$sc."</td>
  </tr>
  <tr class='trhover'>
    <td height='43'><a href='profile.php?id=".$player["PlayerId"]."'>Go to profile</a></td>
  </tr>
  <tr class='trhover'></tr>
</table>
";//cambiar los nombres de los campos de busqueda
                }
    }else {
?>
<table class="themain" align="center" cellpadding="2" cellspacing="0" width="10%">
<table width="700" class="themain" border="0" align="center" cellpadding="1" cellspacing="1">
  <tr>
    <td colspan="2" class="topp2">Search Users</td>
  </tr>
  <tr class='trhover'>
    <td align='center' valign='center' width="137">Player ID :</td>
    <form name="form1" method="get" action="search.php">
    <td align='left' valign='center' width="408">    <input name="Search" type="text" id="Search">
  <input type="submit" value="Search"/></td>
  </form>
  </tr>
  <tr class='trhover'>
    <td align='center' valign='center' colspan="2">Nothing to search for a specific user, you must put your Player ID</td>
  </tr>
</table>
</table>
<?PHP
}
?>
<br>
<?PHP include "footer.php"; ?>
</body>
</html>
