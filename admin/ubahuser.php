<?php
	include"koneksi.php";
	$password=md5('test');
	mysql_query("update members set passwd='$password' where login='test'");
?>