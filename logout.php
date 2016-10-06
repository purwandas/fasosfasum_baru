<?php
	//Start session
	session_start();

			mysql_connect("localhost","ff2016_repo","g4KhtXLJ");
			mysql_select_db("ff2016_repo");
			$waktu = gmdate("Y-m-d H:i:s", time()+60*60*7);
			$user = $_SESSION['SESS_FIRST_NAME'];
			$query = mysql_query("insert into loging values('','$user','logout','$waktu')") or die(mysql_error());


			

	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);

	header("location: login.php");

?>