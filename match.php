<?php 
include('connect.php');
session_start();
@$uid=$_SESSION['u_id'];
@$u_pid=$_GET['tid'];
include('gametimer.php');
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
		<link href="css/match.css" rel="stylesheet" type="text/css" />
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
	   <div style="margin-top:6px;" id="content-holder">
		<?php 
			$q=mysql_query("select * from team where id='$u_pid' or name='$u_pid'");
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
			<div class="match">
			<div style="background:url('img/match.jpg');  
			background-size: 100%;
			height:300px;" class="team-background-holder">
		
			<div class="team-header-holder">
					<span id="tour-n" style="padding-top:10px;">Middle East Dota 2 Community Second Tournament<br>March</span>
					<table id="match-t" style="width:100%;padding-top:5px;">
						<tr>
							<td style="width:40%;"><img src="img/usernoimg.jpg"><h1>Abakada</h1><h5>0%</h5></td>
							<td style="width:10%;font-size:30px;color:red;"><h6>(UTC+03:00) Kuwait, Riyadh<br>Best of 3</h6><b><?php $date = "2015-03-26 9:08"; $result = nicetime($date);  if($result=="LIVE"){echo "<span style='color:green;'>".$result."</span>";}else{echo "<span style='color:red;'>".$result."</span>";}?></b></td>
							<td style="width:40%;"><img src="img/pplogo.jpg"><h1>XXXHAHAHAHAHAAAAAAAAA</h1><h5>100%</h5></td>
						</tr>
						<tr>
						<td></td>
							<td><button id="bet">Place Bet</button></td>
						</tr>
					</table>
					
					<div id="placebet">
					<?php if($uid==NULL)
					{
						echo "Please login to place bet";
					}	
					else
					{
					?>
					<select>
						<option disabled selected>Select Team</option>
						<option>1</option>
						<option>2</option>
					</select>
					<input type="text" name="amountbet" placeholder="Bet Amount"/> <br>
					<input type="submit" name="placebet" value="Submit"/> 
					<?php }?>
					</div>
				</div>
				</div>
			
			
			<div id="myprofile-details">
				<h1>Bet History</h1>
				<div id="bh"><p>Pol placed 100 for XXXHAHAHAHAHAAAAAAAAA.</p>
				<p>test placed 23 	for XXXHAHAHAHAHAAAAAAAAA.</p></div>
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
	$(document).ready(function(){
	$("#placebet").hide();
		$("#bet").click(function(){
			$("#placebet").toggle();
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
