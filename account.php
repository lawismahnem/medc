<?php 
include('connect.php');
session_start();
@$uid=$_SESSION['u_id'];
if(!$uid)
{
		header('location:index');
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
		<base href="/medc/" />
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<link href="css/team.css" rel="stylesheet" type="text/css" />
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
			<li><a href="index">Home</a></li>
		    <li><a href="about">About</a></li>
		    <!--<li>
				Team
				<ul>
					<li>Team	A</li>
				    <li>Team	B</li>
				    <li>Team	C</li>
			     </ul>
		    </li>-->
		    <li>Contact</li>
			<?php if(!$uid)
				{
					?>
					<li><a href="register">Sign-up</a></li>
					<?php
					
				}?>
			
		    </ul>
	</div>
	<div class="body-cont">
		<div id="center">
	   <div style="margin-top:6px;" id="content-holder">
		<div class="account_info">
		<h3>Account Information</h3>
		
				
					<div style="float:left;text-align:right;padding-right:5px;width:30%;">Account Type:</div>
					<div style="float:left;width:50%"><?php 
					$myrank=$row['u_rank'];
					if($myrank==1)
					{
						echo "Administrator";
					}
					if($myrank==20)
					{
						echo "Member";
					}
					?></div>
					
					<div style="float:left;text-align:right;padding-right:5px;width:30%;margin-top:10px;">Username:</div>
					<div style="float:left;width:50%;margin-top:10px;"><input type="text" value="<?php echo$row['u_username'];?>"/></div>
					<div style="float:left;text-align:right;padding-right:5px;width:30%;margin-top:10px;">First Name:</div>
					<div style="float:left;width:50%;margin-top:10px;"><input type="text" value="<?php echo$row['u_fname'];?>"/></div>
					<div style="float:left;text-align:right;padding-right:5px;width:30%;margin-top:10px;">Last Name:</div>
					<div style="float:left;width:50%;margin-top:10px;"><input type="text" value="<?php echo$row['u_lname'];?>"/>
					</div>
					<div style="float:left;text-align:right;padding-right:5px;width:30%;margin-top:10px;">Location:</div>
					<div style="float:left;width:50%;margin-top:10px;"><input type="text" value="<?php echo$row['u_location'];?>"/>
					</div>
					<div style="float:left;text-align:right;padding-right:5px;width:30%;margin-top:10px;">In Game Name:</div>
					<div style="float:left;width:50%;margin-top:10px;"><input type="text" value="<?php echo$row['u_ign'];?>"/>
					</div>
					<div style="float:left;text-align:right;padding-right:5px;width:30%;margin-top:10px;">Steam ID:</div>
					<div style="float:left;width:50%;margin-top:10px;"><input type="text" value="<?php echo$row['u_steamid'];?>"/>
					</div>
					<div style="float:left;text-align:right;padding-right:5px;width:30%;margin-top:10px;">Image Url</div>
					<div style="float:left;width:50%;margin-top:10px;"><input type="text" value="<?php echo$row['u_imgurl'];?>"/>
					</div>
					
					<div style="float:left;text-align:right;padding-right:5px;width:30%;margin-top:10px;">About:</div>
					<div style="float:left;width:50%;margin-top:10px;"><textarea style="resize: vertical;height:100px;width:285px;"><?php echo$row['u_about'];?></textarea>
					</div>
					<div style="float:left;text-align:right;padding-right:5px;width:30%;margin-top:10px;">Role:</div>
					<select style="float:left;width:290px;margin-top:10px;">
						<option><?php echo $row['u_role']?></option>
						<option>Carry</option>
						<option>Disabler</option>
						<option>Lane Support</option>
						<option>Initiator</option>
						<option>Jungler</option>
						<option>Support</option>
						<option>Durable</option>
						<option>Nuker</option>
						<option>Pusher</option>
						<option>Escape</option>
					</select>
					<center><div style="float:left;width:30%;margin-top:30px;text-align:center;"><input type="Submit" value="Save"/>
					</div></center>
					
		
		</div>
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
