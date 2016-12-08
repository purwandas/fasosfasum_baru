<?php
	//Start session
	session_start();

			include 'koneksi.php';
			mysql_select_db("ff2016_repo");
			$waktu = gmdate("Y-m-d H:i:s", time()+60*60*7);
			$user = $_SESSION['SESS_FIRST_NAME'].' '.$_SESSION['SESS_LAST_NAME'];
			$query = mysql_query("insert into loging values('','$user','logout','$waktu')");


			

	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);

	header("location: login.php");

?>