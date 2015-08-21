<style type="text/css">
<!--
.red {
	color: #800000;
}
.grey {
	color: #000000;
}
.gold {
	color: #BEC402;
}
.blue {
	color: #0080FF;
}
.green {
	color: #00FF40;
}
.themain {
background: #d56900;
-moz-border-radius: 8px 8px 8px 8px;
font-family:Georgia, "Times New Roman", Times, serif;
}

.topp1 {
font-size:13px;
background: #ff7e00;
color: #ffcfcf;
font-weight: bold;
-moz-border-radius: 8px 0 0 0;
}

.topp2 {
font-size:13px;
background: #ff7e00;
color: #ffcfcf;
font-weight: bold;
}

.topp3 {
font-size:13px;
background: #ff7e00;
color: #ffcfcf;
font-weight: bold;
}
.trhover {
background: #FFFFFF;
}

.trhover:hover{background: #ffeab0;}
.trhover:active{background: #ffeab0;}

-->
</style>
<div align="center"><img src="images/image.jpg" alt="" width="420" height="179" border="0"><br /></div><br />
<table class="themain" align="center" cellpadding="2" cellspacing="0" width="10%"><tbody><tr><td>
<table width='1054' class="themain" border='0' align='center' cellpadding='1' cellspacing='1'>
    <tr>
      <td width='43' align='center' valign='top' class="topp2"><strong>#</strong></td>
      <td width='119' align='center' valign='top' class="topp2"><strong>Player ID</strong></td>
      <td width='70' align='center' valign='top' class="topp2"><strong>Name</strong></td>
      <td width='107' align='center' valign='top' class="topp2"><strong>Town Hall</strong></td>
      <td width='67' align='center' valign='top' class="topp2"><strong>Level</strong></td>
	  <td width='133' align='center' valign='top' class="topp2"><strong>Latest Update</strong></td>
	  <td width='55' align='center' valign='top' class="topp2"><strong>Status</strong></td>
      <td width='131' align='center' valign='top' class="topp2"><strong>Account Privileges</strong></td>
      <td width='70' align='center' valign='top' class="topp2"><strong>Trophies</strong></td>
      <td width='86' align='center' valign='top' class="topp2"><strong>Gems</strong></td>
      <td width='95' align='center' valign='top' class="topp2"><strong>Experience</strong></td>
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
$sql=mysql_query("select * FROM player order by ".$player['avatarObj']['townhall_level']." desc") or die ('Database name is not available!');
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
foreach($players as $player){
	$playername = $player['avatarObj']['avatar_name'];
	$th = $player['avatarObj']['townhall_level'] + 1;
	$sc = $player['avatarObj']['score'];
	$ava_level = $player['avatarObj']['avatar_level'];
	$gems = $player['avatarObj']['current_gems'];
	$exp = $player['avatarObj']['experience'];
	$i = $i+1;
if($th == 1){ $th ='<img src="images/townhall/'.$th.'.png" alt="1" width="30" height="30"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 2){ $th ='<img src="images/townhall/'.$th.'.png" alt="2" width="30" height="30"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 3){ $th ='<img src="images/townhall/'.$th.'.png" alt="3" width="30" height="30"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 4){ $th ='<img src="images/townhall/'.$th.'.png" alt="4" width="30" height="30"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 5){ $th ='<img src="images/townhall/'.$th.'.png" alt="5" width="30" height="30"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 6){ $th ='<img src="images/townhall/'.$th.'.png" alt="6" width="30" height="30"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 7){ $th ='<img src="images/townhall/'.$th.'.png" alt="7" width="30" height="30"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 8){ $th ='<img src="images/townhall/'.$th.'.png" alt="8" width="30" height="30"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 9){ $th ='<img src="images/townhall/'.$th.'.png" alt="9" width="30" height="30"><FONT SIZE=1>'.$th.'</font>';
}
if($th == 10){ $th ='<img src="images/townhall/'.$th.'.png" alt="10" width="30" height="30"><FONT SIZE=1>'.$th.'</font>';
}
//score
$legend = 4000;

if($sc  == 3600){ $sc ='<img src="images/champion.png" alt="10" width="22" height="19">1';
}
if($sc  == 3700){ $sc ='<img src="images/champion.png" alt="10" width="22" height="19">2';
}
if($sc   >= $legend){ $sc ='<img src="images/crystal.png" alt="10" width="22" height="19">L';
}
echo "<tr class='trhover'>
      <td align='center' valign='top'>".$i."</td>
      <td align='center' valign='top'>".$player["PlayerId"]."</td>
      <td align='center' valign='top'>".$playername."</td>
      <td align='center' valign='top'>".$th."</td>
	  <td align='center' valign='top'>".$ava_level."</td>
	  <td align='center' valign='top'>".$player["LastUpdateTime"]."</td>
	  <td align='center' valign='top'>".$player["AccountStatus"]."</td>
	  <td align='center' valign='top'>".$player["AccountPrivileges"]."</td>
	  <td align='center' valign='top'>".$sc."</td>
	  <td align='center' valign='top'>".$gems."</td>
	  <td align='center' valign='top'>".$exp."</td>

    </tr>";
	}
?>
</table></table>
<br />
<table class="themain" align="center" cellpadding="2" cellspacing="0" width="80%"><tbody><tr><td>
    <table border="0" cellpadding="3" cellspacing="1" width="100%">
      <tbody><tr>

        <td width="7%" align="center" class="topp1">#</td>
        <td class="topp2" align="center">Statistics of Server</td><td class="topp3" align="center">Status</td>
      </tr>
<?
$date = "'".date("Y-m-d H:i:s")."'"; // getting date
$date1 = "'".date('Y-m-d H:i:s', strtotime('-5 minutes'))."'"; // Calculating online players
$accounts = mysql_query("SELECT count(*) FROM player");
$totalacc = mysql_fetch_row($accounts);
$guild = mysql_query("SELECT count(*) FROM clan");
$totalguilds = mysql_fetch_row($guild);
$onlinepl = mysql_query("SELECT count(*) FROM player WHERE LastUpdateTime BETWEEN ".$date1." AND ".$date."");
$online = mysql_result($onlinepl, 0, 0);
$bannedchar = mysql_query("SELECT count(*) FROM player WHERE AccountStatus <> 0");
$bannchar = mysql_fetch_row($bannedchar);
$gm = mysql_query("SELECT * FROM player WHERE AccountPrivileges='5'");
$gms = mysql_num_rows($gm);
$gmon = mysql_fetch_array($gm);
$gmonline = mysql_query("SELECT * FROM player WHERE LastUpdateTime BETWEEN ".$date1." AND ".$date."");
$gmsonline = mysql_num_rows($gmonline);
$load = substr(100 * $online / 150, 0, 5);
echo "<tr>
<td class='trhover' align='center'>".@++$count."</td>
<td class='trhover' align='center'>Total Accounts:</td>		<td class='trhover' align='center'>$totalacc[0]</td>
</tr>
<tr>
<td class='trhover' align='center'>".++$count."</td>
<td class='trhover' align='center'>Total Guilds:</td>		<td class='trhover' align='center'>$totalguilds[0]</td>
</tr>
<tr>
<td class='trhover' align='center'>".++$count."</td>
<td class='trhover' align='center'>Accounts Banned:</td>	<td class='trhover' align='center'>$bannchar[0]</td>
</tr>
<tr>
<td class='trhover' align='center'>".++$count."</td>
<td class='trhover' align='center'>Administrators conected:</td>		<td class='trhover' align='center'>$gmsonline/<span style='color:#F00;'>$gms</span></td>
</tr>
<tr>
<td class='trhover' align='center'>".++$count."</td>
<td class='trhover' align='center'>Total Players Online:</td>	<td class='trhover' align='center'>$online /<span style='color:#F00;'>100</span></td>
</tr>

";
?>



</table></table>