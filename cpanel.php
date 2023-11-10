<?php
	@$t=$_GET['tid'];
	include('connect.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
    <title>Medc | CPanel</title>
	<link href="css/cpanel.css" rel="stylesheet" type="text/css" />
	<script src="js/js.js" type="text/javascript" charset="utf-8"></script>
	<script type="text/javascript" charset="utf-8">
		$(function () {
			var tabContainers = $('div.tabs > div');
			tabContainers.hide().filter(':first').show();
			
			$('div.tabs ul.tabNavigation a').click(function () {
				tabContainers.hide();
				tabContainers.filter(this.hash).show();
				$('div.tabs ul.tabNavigation a').removeClass('selected');
				$(this).addClass('selected');
				return false;
			}).filter(':first').click();
		});
	</script>
</head>
<body id="page">
    <div class="tabs">
	<h1>MEDC Control Panel</h1>
       <ul class="tabNavigation">
            <li><a href="#first">Dashboard</a></li>
            <li><a href="#second">Tournament</a></li>
            <li><a href="#third">Match</a></li>
        </ul>
       <div class="content" id="first">
		<!-- <div id="dash-top-holder">
			<div id="dash-r"><h5>a</h5>
			<table class="TFtable">
			<tr><td>User</td><td>Bet</td><td>Action</td></tr>
			<tr><td>Text</td><td>Text</td><td>Text</td></tr>
			<tr><td>Text</td><td>Text</td><td>Text</td></tr>
			</table>
			</div>
			<div id="dash-l">b</div>
		</div>-->
			<div>
			<?php 
				$u=mysql_query('select * from user_info');
			?>
			<table class="TFtable">
			<tr><td>User</td><td>DoR</td><td>Action</td></tr>
			<?php 
				while ( $ui=mysql_fetch_array($u))
								{
			?>
			<tr><td><?php echo $ui['u_username'];?></td><td>Text</td><td>Text</td></tr>
			<?php 
								}
			?>
			</table>
			</div>
        </div>
        <div class="content" id="second">
			
			<?php
				if($t==NULL)
				{
			?>
			 <h2>Tournament</h2>
			<div>
				<form>
					<input id="input" type="text" name="tournament" placeholder="Title of the Tournament" required/>
					<input type="submit" name="submit" value="Add"/>
				</form>
				<hr class="style-three">
				</div>
			<?php
				}
				else
				{
			?>
			<div id="tour-tag">Dota 2 Test <a href="cpanel">X</a></div>
			<?php
				}
			?>
			<h2>Add Team</h2>
			<div>
			<?php 
				$teamd=mysql_query('select * from team');
			?>
			<form method="post" action="#">
				<select id="select" required>
					  <option selected="true" disabled="disabled">Select Team</option>
						<?php 
								while ( $di=mysql_fetch_array($teamd))
								{
						?>
						<option value="<?php echo $di['id'];?>"><?php echo $di['name'];?></option>
						<?php 
								}
						?>
				</select>
				<input type="submit" name="submit" value="Add"/>
			</form>
			</div>
			<hr class="style-three">
			 <h2>Tournament History</h2>
			<table class="TFtable">
			<tr><td>Tournament</td><td>Date</td><td>Action</td></tr>
			<tr><td>Test</td><td>Test</td><td><a href="?tid=1">Select</a></td></tr>
			<tr><td>Text</td><td>Text</td><td>Text</td></tr>
			</table>
		</div>
        <div class="content" id="third">
		<?php
		@$cmatch=$_GET['cmatch'];
		if($cmatch=="create")
		{
			@$tnamee=$_GET['tnamee'];
			@$teama=$_GET['teama'];
			@$teamb=$_GET['teamb'];
			$time=$_GET['tad'];
			$track = mysql_query("Insert into t_match (m_tname) VALUES ('$tnamee')");
			echo $time;
		}
		?>
        <form id="match"  method="GET" action="#">
			<input type="hidden" name="cmatch" value="create"/>
			<select name="tnamee" style="width:50%;">
				<option selected="true" disabled>Select Tournament</option>
				<option>Test Tournament</option>
			</select>
			<table>
				<tr>
					<td>
					<select name="teama" style="width:312px;">
					<option selected="true" disabled>Select Tournament</option>
					<?php
						$q=mysql_query("select * from team");
						while($row = mysql_fetch_assoc($q)) 
										{
											?>
												<option value="<?Php echo $row['id'];?>"><?Php echo $row['name'];?></option>
											<?php
										}
					?>
					</select>	
					</td>
					<td>
					Vs
					</td>
					<td>
					<select name="teamb" style="width:312px;">
					<option selected="true" disabled>Select Tournament</option>
					<?php
						$q=mysql_query("select * from team");
						while($row = mysql_fetch_assoc($q)) 
										{
											?>
												<option value="<?Php echo $row['id'];?>"><?Php echo $row['name'];?></option>
											<?php
										}
					?>
					</select>	
					</td>
				</tr>
				<tr>
					<td>
						<input style="width:300px;" type="text" name="tad" placeholder="Year-Month-Day Hour:Minutes"/>
					</td>
				</tr>
			</table>
			<br>
			<input type="submit" value="Create"/>
		</form>
		</div>
    </div>
	<div class="waste"></div>
  </body>
</html>





