<?php
	function tracking($act)
	{
		$waktu = gmdate("Y-m-d H:i:s", time()+60*60*7);
		$user = $_SESSION['SESS_FIRST_NAME'].' '.$_SESSION['SESS_LAST_NAME'];
		$query = mysql_query("insert into loging values('','$user','$act','$waktu')") or die(mysql_error());
	}
	function lastidacuan(){
		$query=mysql_query("select max(idacuan) as max from detaildokacuan");
		$data=mysql_fetch_array($query);
		return $data['max'];
	}
?>