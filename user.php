<?php 
include('connect.php');
session_start();
@$uid=$_SESSION['u_id'];
$u_pid=$_GET['id'];
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
		<base href="/medc/" />
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
<div id="bg_pattern"></div>
<?php 
	if($uid==NULL)
		{
?>
	<div class="user">
	<form action="login" method="POST">
		<input type="text" value="" name="username" placeholder="Username"/>
		<input type="Password" value="" name="password" placeholder="Password"/>
		<input id="submit" type="submit" value="Go" name="submit"/>
	
	<br>
	<?php 
	@$c=$_GET['link'];
	if($c!=NULL)
		{
			?>
				<span style="color:white;font-size:9px;">Incorrect Username or Password.<br>
				Forgotpassword? <a style="color:white;" href="">Click Here</a>
				</span>
			<?php
		}
	?>
	</div>
	</form>
	<?php 
	}
	else
	{
		$myinfo=mysql_query("select * from user_info where u_id='$uid'");
		$row=mysql_fetch_array($myinfo);
	?>
	<div class="user">
		<img id="user" src="<?php echo $row['u_imgurl'];?>"></img>
			<div id="user-info">
				<div id="user-img">
					<img src="<?php echo $row['u_imgurl'];?>"></img>
				<!--<img src="img/logo.png"></img>-->
				</div>
				<div id="user-info-holder">
					<div id="user-full-name"><?php echo "".$row['u_lname'].", ".$row['u_fname']."";?></div>
					<div id="user-uid"><?php echo $row['u_username'];?></div>
					<a id="acc" href="">Account</a> - <a id="acc" href="<?php echo $row['u_username'];?>">My Profile</a>
				</div>
				<div id="button">
					<a href="logout"><button>Logout</button></a>
				</div>
			</div>
	</div>
	<?php 
	}
	?>
	<div class="head">
		<!--<div class="head-cont">
                        <a href="#" style="float:left;"><img src="../img/logo.png" height="140px;" style="margin-top:5px;"></img></a>
                <h1 style="margin-top:10px;padding-top:0px;float:left;padding-left:10px;font-size:36px;font-weight: bold;color:white;font-family: "Times New Roman", Times, serif;">Middle East Dota 2 Community </h1>
		</div>-->
	</div>
	<div id="menu">
			<ul>
			<li>Home</li>
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
			<li>Sign Up</li>
		    </ul>
	</div>
	<div class="body-cont">
		<div id="center">
	   <div style="margin-top:6px;" id="content-holder1">
		<?php 
			$q=mysql_query("select * from user_info where u_username='$u_pid'");
			$datag=mysql_fetch_array($q);
			if(!$datag)
			{
			?>
			<center>
			<img style="width:50%;height:50%;"src="img/loading.gif"></img>
			<h4>It seems that you're lost. enjoy this bouncy tits.</h4>
			<br>
			</center>
			<?php
			}
			else
			{
			?>
			<div class="myprofile-holder">
				<div id="myprofile-info">
					<div id="myprofile-img-holder">
						<img src="<?php echo $datag['u_imgurl'];?>"></img>
					</div>
					<div id="myprofile-info-holder">
					<h1><?php echo $datag['u_fname']." &quot;".$datag['u_ign']."&quot; ".$datag['u_lname'];?></h1>
					<h3>Location: <?php echo $datag['u_location'];?></h3>
					<h3>SteamID: <a href="<?php echo $datag['u_steamid'];?>"><?php echo $datag['u_steamid'];?></a></h3>
					<h3>MeCoins: 10,000</h3>
					<h3>Total Bets: 32</h3>
					<h3>Role: <?php echo $datag['u_role'];?></h3>
					<h3>Role Rank: #143</h3>
					</div>
				</div>
				<div id="myprofile-details">
				<h1>About</h1>
				<p><?php echo $datag['u_about'];?></p>
				</div>
				<div id="myprofile-details">
				<h1>Team</h1>
				<p><?php echo $datag['u_team'];?></p>
				</div>
				<div id="myprofile-details">
				<h1>Achieve</h1>
				axaxa
				</div>
				<div id="myprofile-details">
				<h1>Logs</h1>
				axaxa
				</div>
			</div>
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
								<div id="r-data-hover"><a href="team.php?id=<?php echo $nt['id'];?>"><div id="sname"><?php echo $nt['name'];?></div><div id="sstatus" style="color:black"><?php echo $nt['points'];?> pts</div></a></div>
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
		<div class="f_holder">
				<div id="fb_logo">
					<a href="https://www.facebook.com/groups/MiddleEastDota2Community/"><img src="img/fb.png"></img></a>
				</div>

				<div id="fb_text">
					Tel. 12314 1231<br>
					Fax: 123124 1231211<br>
					Kingdom of Saudi Arabia<br>
					Develop by: 487<br>
					lorence_143@hotmail.com
					
				</div>						
				 <div id="f_credit">2014 &copy; Middle East Dota 2 Community</div>	
		</div>
		
		
	</div>
		<script src="js/libs/jquery.secret-source.min.js"></script>
	<script>
	$(document).ready(function(){
	$("#user-info").hide();
		$("#user").click(function(){
			$("#user-info").toggle();
		});
	});
	</script>
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
