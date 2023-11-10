<?php
function nicetime($date)
{
    if(empty($date)) {
        return "No date provided";
    }
    
    $periods         = array("second", "m", "h", "d", "w", "month", "year", "decade");
    $lengths         = array("60","60","24","7","4.35","12","10");
    
    $now             = time();
    $unix_date         = strtotime($date);
    
       // check validity of date
    if(empty($unix_date)) {    
        return "Bad date";
    }

    // is it future date or past date
    if($now > $unix_date) {    
        $difference     = $now - $unix_date;
        $tense         = "LIVE";
        
    } else {
        $difference     = $unix_date - $now;
    }
    
    for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
        $difference /= $lengths[$j];
    }
    
    $difference = round($difference);
    
    if($difference != 1) {
 
    }
    if($tense==NULL)
	{
    return "$difference$periods[$j] {$tense}";
	}
	else
	{
		 return "{$tense}";
	}
}
$mydate=date('Y-m-d H:i');
$date = "2015-03-21 13:08";
$result = nicetime($date); // 2 days ago
include('connect.php');
$get=mysql_query("Select * from teams order by ABS(points) desc LIMIT 10");
?>
<object width="0" height="0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" id="gsSong2417148879" name="gsSong2417148879"><param name="movie" value="http://grooveshark.com/songWidget.swf" /><param name="wmode" value="window" /><param name="allowScriptAccess" value="always" /><param name="flashvars" value="hostname=grooveshark.com&songID=24171488&style=metal&p=1" /><object type="application/x-shockwave-flash" data="http://grooveshark.com/songWidget.swf" width="0" height="0"><param name="wmode" value="window" /><param name="allowScriptAccess" value="always" /><param name="flashvars" value="hostname=grooveshark.com&songID=24171488&style=metal&p=1" /><span></span></object></object>
<html>
	<title>Professional Gamers Assosciation</title>
		<link href="style.css" type="text/css" rel="stylesheet" />
		<link rel="shortcut icon" href="img/favicon.ico" />
		<body>
			<div id="header">
				<img src="img/scythe_logo.png"></img>
				<h1>Middle East Dota 2 Community</h1>
                        <h3>Middle East / Philippines</h3>
			</div>			
			<div id="site_body">
			<div class="menu">
				<ul>
					<li><a href="#">Home</a></li>
				</ul>
			</div>
			<br>
			<div id="match">
				<div id="TA" style="background:url(logo/mski.png);">
					<div id="TnameA">
					Msi.PowerColor
					<hr>
					</div>
				</div>
				<div id="TVS">
				<center><p>Vs.</p>
				<time>
					<?php if($result=="LIVE")
					{
						echo "<span style='color:green'>".$result."<span>";
					}	
					else
					{
						echo $result;
					}
					?>
				</time>
				</center>
				</div>
				<div id="TB" style="background:url(logo/dreamz.png);">
					<div id="TnameB">
					Dreamz.Ledion.Steelseries
					<hr>
					</div>
				</div>
			</div>
			<hr>
			<div id="wrap">
				<div id="news">
				<div>News.</div>
				<hr>
					<div id="cnews">
						<p>Hello World</p>
                                                <br>
                                                <p>
                                                UNDER CONSTRUCTION
                                                </p>
						<hr>
						<i><u><?php echo $result;?></u>( Admin )</i>
						</p>
						</div>
				</div>
				<div id="pointsmatch">
				
				<p>Top 10 Teams</p>
				<hr>
					<table>
						<tr>
							<td width="50">
							<b>Rank</b>
							</td>
							<td width="250">
								<b>Team Name</b>
							</td>
							<td width="50">
								<b>Points</b>
							</td>
						</tr>
						<?php if(mysql_num_rows($get) > 0 )
								{
								while($row = mysql_fetch_assoc($get)) 
										{
										$x=@$x+1;
										?>
										<tr>
										<td width="50" align="center">
											<?php echo $x;?>
										</td>
										<td width="250">
											<?php echo $row['team_name'];?>
										</td>
										<td width="50" align="center">
											<?php echo $row['points'];?>
										</td>
										</tr>
										<?php
										}
								}
							?>
					</table>
				</div>
			</div>
			<br>
			<div id="sponsor"></div>
			</div>
			<div id="footer">
			&copy; 2013, Design by <a style="text-decoration:none;color:orange;"href="http://fb.com/akolagesilawrence">Lawrence</a>.
			</div>
		</body>
</html>