<?php
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if 	(!isset($_SESSION['SESS_MEMBER_ID']) || (trim($_SESSION['SESS_MEMBER_ID']) == '') || (!isset($_SESSION['SESS_LEVEL'])) )		
	{
		if(($_SESSION['SESS_LEVEL'])!=6)
		{
			header("location: login.php?e=2");
		}
		header("location: login.php");
		exit();
	}
?>