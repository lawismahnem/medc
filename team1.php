<?php 
include('connect.php');
$tid=$_GET['id'];
if($tid=="")
	{
		header('location:index.php');
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!--[if lt IE 7]><html class="ie9 ie8 ie7 ie6" lang="en"><![endif]-->
<!--[if IE 7]><html class="ie9 ie8 ie7" lang="en"><![endif]-->
<!--[if IE 8]><html class="ie9 ie8" lang="en"><![endif]-->
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if gt IE 9]><!--><html lang="en"><!--<![endif]-->
<html>
	<head>
		<title>
			Welcom to Middle East Dota 2 Community
		</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		 <link rel="stylesheet" href="bjqs.css">

		<!-- some pretty fonts for this demo page - not required for the slider -->
		<link href='http://fonts.googleapis.com/css?family=Source+Code+Pro|Open+Sans:300' rel='stylesheet' type='text/css'> 

		<!-- demo.css contains additional styles used to set up this demo page - not required for the slider --> 
		<link rel="stylesheet" href="demo.css">

		<!-- load jQuery and the plugin -->
		<script src="http://code.jquery.com/jquery-1.7.1.min.js"></script>
		<script src="js/bjqs-1.3.min.js"></script>
	</head>
<body>
	<div class="head">
		<div class="head-cont">
                        <a href="#"><img src="../img/logo.png" height="140px;" style="margin-top:5px;"></img></a>
		</div>
	</div>
	<div id="menu">
			<ul>
			<li><a href="index.php">Home</a></li>
		    <li>About</li>
		    <!--<li>
				Team
				<ul>
					<li>Team	A</li>
				    <li>Team	B</li>
				    <li>Team	C</li>
			     </ul>
		    </li>-->
		    <li>Contact</li>
		    </ul>
	</div>
	<?php 
		$res=mysql_query("SELECT * FROM `team` where id='$tid'");
		$d=mysql_fetch_array($res)
	?>
	<div class="body-cont">
		<div id="center">
			<div id="team_bio">
				<div id="img">
					<img src="img/team_logo/<?php echo $d['logo'];?>.png" width="128px" height="128px"></img>
				</div>
				<div id="team_data">
				<h2><?php echo $d['name'];?></h2>
				<p style="padding-top:0px;padding-bottom:10px;font-size:10px;"><?php echo $d['location'];?></p>
				<p>Match Played</p>
				<table>
					<tr>
						<td width="50px">
							<b>Win</b>
						</td>
						<td width="50px">
							<b>Lost</b>
						</td>
						<td width="50px">
							<b>Total</b>
						</td>
					</tr>
					<tr>
						<td width="50px">
							<p style="color:green;"><?php echo $d['win'];?></p>
						</td>
						<td width="50px">
							<p style="color:red;"><?php echo $d['lost'];
							$st=$d['win']+$d['lost'];
							?></p>
						</td>
						<td width="50px">
							<p><?php echo $st;?></p>
						</td>
					</tr>
				</table>
				</div>
			</div>
			<div id="team_info">
			<hr>
			<h3>Roster</h3>
			<b>Captain</b><br>
			<?php echo $d['captain'];?><br><br>
			<b>Squad</b><br>
			<?php echo $d['squad'];?>
			</div>
			<div id="team_bios">
			<hr>
			<h3>About Team Name</h3>
			<p><br>
				<?php echo $d['about'];?>
			</p>
			</div>
			<div id="match">
			<hr>
			<h3>Match History</h3>
			<br>
			<?php 
				$rtt=mysql_query("SELECT * FROM `match_his` where Team_A='$tid' or Team_B='$tid'");
				while ( $ntt=mysql_fetch_array($rtt))
					{
						?>
			<table width="100%" style="padding:0px;margin:0px;">
				<tr>
					<td width="20%" style="text-align:left;">
						<?php echo $ntt['eventname'];?>
					</td>
					<td width="20%" style="text-align:right;">
						<?php $tname=$ntt['Team_A'];
						$idn=mysql_query("SELECT * FROM `team` where id = '$tname'");
						$idnn=mysql_fetch_array($idn);
						$teamid=$idnn['name'];
						echo $teamid;
						?>
					</td>
					<td width="10%" style="text-align:center;">
						Vs.
					</td>
					<td width="20%" style="text-align:left;">
						<?php $tname=$ntt['Team_B'];
						$idn=mysql_query("SELECT * FROM `team` where id = '$tname'");
						$idnn=mysql_fetch_array($idn);
						$teamid=$idnn['name'];
						echo $teamid;
						?>
					</td>
					<td width="10%"  style="text-align:center;color:green;">
						<?php $tname=$ntt['Winner'];
						$idn=mysql_query("SELECT * FROM `team` where id = '$tname'");
						$idnn=mysql_fetch_array($idn);
						$teamid=$idnn['name'];
						echo $teamid;
						?>
					</td>
					<td width="10%"  style="text-align:center;">
						<?php echo $ntt['Game_ID'];?>
					</td>
				</tr>
			</table>
				<?php 
					}
				?>
			</div>
		</div>
	
		<div id="right">
			<div id="r-data">
			<h2>Stream</h2>
			<div id="sname">487</div><div id="sstatus">Offline</div>
			</div>
				<div id="r-data">
				<h2>Team Rank</h2>
				<?php 
				$rt=mysql_query("SELECT * FROM `team` ORDER BY cast(points as unsigned) desc");
				while ( $nt=mysql_fetch_array($rt))
					{
						?>
							 <hr>
								<a href="team.php?id=<?php echo $nt['id'];?>"><div id="sname"><?php echo $nt['name'];?></div><div id="sstatus" style="color:black"><?php echo $nt['points'];?> pts</div></a>
						<?php 
					}
				?>
				
				</div>
					<div id="r-data">
					<h2>Team Match</h2>
					<!--<div id="sname">Testing Vs. Testing</div><div id="sstatus" style="color:black">Live</div>-->
					
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="footer">
				<p>Copyright &copy; 2014 <br>
					Design by. 487</p>
				</div>
		<script src="js/libs/jquery.secret-source.min.js"></script>

    <script>
    jQuery(function($) {

        $('.secret-source').secretSource({
            includeTag: false
        });

    });
    </script>
<script>
        jQuery(document).ready(function($) {
          
          $('#banner-slide').bjqs({
            animtype      : 'slide',
            height        : 320,
            width         : 697,
            responsive    : true,
            randomstart   : true,
			animspeed     : 10000
          });
          
        });
      </script>	
</body>
</html>
