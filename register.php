<?php 
include('connect.php');
@$submit=$_POST['submit'];
@$uid=$_SESSION['u_id'];
if($submit!=NULL)
	{
		$username=$_POST['username'];
		$fname=ucfirst($_POST['fname']);
		$lname=ucfirst($_POST['lname']);
		$password=$_POST['password'];
		$cpassword=$_POST['cpassword'];
		$enpass=md5($_POST['password']);
		$enuser=md5($_POST['username']);
		$email=$_POST['email'];
		
		$query=mysql_query("select * from user_info where u_username='$username'");
		$result=mysql_fetch_array($query);
		if($result)
			{
			$error="*Username is already taken.<br>";
			}
			else
			{
				if($password!=$cpassword)
					{
						$error="*Password not match.<br>";
					}
					else
					{
						$query=mysql_query("select * from user_info where u_email='$email'");
						$result=mysql_fetch_array($query);
						if($result)
							{
							$error="*E-Mail Address is already taken.<br>";
							}
							else
							{
								if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
								  {
												$error= 'Invalid Email';
								  }
								  else
									{
										$track = mysql_query("Insert into user_info (u_id,u_fname,u_lname,u_rank,u_username,u_pass,u_email) VALUES ('$enuser','$fname','$lname','20','$username','$enpass','$email')");
										$success="1";
									}
							}
					}
			}
		
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
<div id="bg_pattern"></div>
	<div class="user">
		<input type="text" value="" name="username" placeholder="Username"/>
		<input type="Password" value="" name="password" placeholder="Password"/>
		<input id="submit" type="submit" value="Go" name="submit"/>
	</div>
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
		<div id="banner-slide">

        <!-- start Basic Jquery Slider -->
        <ul class="bjqs">
          <li><a href=""><img src="img/banner/1.jpg" title="The International 2014"></a></li>
            <li><a href=""><img src="img/banner/2.jpg" title="test"></a></li>
			   <li><a href=""><img src="img/banner/3.jpg" title="Automatically generated caption"></a></li>
			      <li><a href=""><img src="img/banner/4.jpg" title="Automatically generated caption"></a></li>
        </ul>
        <!-- end Basic jQuery Slider -->

       </div>
	   <div id="content-holder">
	   <div id="reg-holder">
		
		
		<?php 
			if(@$success==1)
			{
				?><br>
				<br>
				<br>
				<hr>
					<span style="margin-left:25px;color:black;font-size:12px;">
					<center><b>THANK YOU FOR YOUR REGISTRATION</b><br>
					<b style="font-size:15px;">"</b>We're a gamer not because we don't have a life, <br>but because we choose to have many<b style="font-size:15px;">"</b><br>
					<span style="color:red">&#10084;&#10084;&#10084;&#10084;&#10084;&#10084;&#10084;&#10084;&#10084;</span>&#9825;
					</center>
					<br>
					<br>
					
					</span>
					
					<br>
					<hr>
					<br>
					
				<?php
			}
			else
			{
		?>
		<center><h1>Registration Form</h1></center>
		<hr>
		<span style="margin-left:25px;color:red;font-size:12px;">
		<?php
		echo @$error;
		?></span>
		<form method="post" action="#">
		<input type="text" id="username" name="username" placeholder="Username" required/>
		<input type="text" id="fname" name="fname" placeholder="First Name" required/>
		<input type="text" id="lname" name="lname" placeholder="Last Name" required/>
		<input type="password" id="username" name="password" placeholder="Password" required/>
		<input type="password" id="username" name="cpassword" placeholder="Confirm Password" required/>
		<input type="text" id="username" name="email" placeholder="E-mail" required/>
		<input type="submit" id="signup" name="submit" value="Sign-Up"/>
		<br>
		<br>
		</form>
		<br>
		<hr>
		<br>
		<?php
		}
		?>
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
		<div class="f_holder">
				<div id="fb_logo">
					<a href="https://www.facebook.com/groups/MiddleEastDota2Community/"><img src="img/fb.png"></img></a>
				</div>

				<div id="fb_text">
					Tel. 12314 1231<br>
					Fax: 123124 1231211<br>
					Kingdom of Saudi Arabia<br>
					Develop by: 487
					Email: lorence_143@hotmail.com
					
				</div>						
				 <div id="f_credit">2014 &copy; Middle East Dota 2 Community</div>	
		</div>
		
		
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
