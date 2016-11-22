<?php
	//Start session
	session_start();
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if 	(
		!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '')
		||
		!isset($_SESSION['SESS_LEVEL']) || ($_SESSION['SESS_LEVEL'])<1 || ($_SESSION['SESS_LEVEL'])>6
		) 
	{
		header("location: login.php?e=1");
		exit();
	}
?>