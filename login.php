<?php 
include('connect.php');
session_start();
@$submit=$_POST['submit'];
if($submit!=NULL)
	{
		$username=$_POST['username'];
		$password=md5($_POST['password']);
		$query=mysql_query("select * from user_info where u_username='$username' && u_pass='$password'");
		$result=mysql_fetch_array($query);
		if($result)
			{
				$_SESSION['u_id']=$result['u_id'];
				header('Location: index.php');
			}
			else
			{
				$link=md5(rand());
				header('Location: index.php?link='.$link.'');
				
			}
	}
	else
	{
		echo "you're lost";
	}
?>