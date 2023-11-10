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
            <li><a href="#second">Second</a></li>
            <li><a href="#third">Third</a></li>
        </ul>
       <div class="content" id="first">
		 <!--<div id="dash-top-holder">
			<div id="dash-r"><h5>a</h5>
			<table class="TFtable">
			<tr><td>User</td><td>Bet</td><td>Action</td></tr>
			<tr><td>Text</td><td>Text</td><td>Text</td></tr>
			<tr><td>Text</td><td>Text</td><td>Text</td></tr>
			</table>
			</div>
			<div id="dash-l">b</div>
		</div>
			<div>
			
			</div>-->
        </div>
        <div class="content" id="second">

            <h2>Second</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="content" id="third">
            <h2>Third</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>
	<div class="waste"></div>
  </body>

</html>





