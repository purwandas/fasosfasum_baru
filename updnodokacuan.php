<?php
	include"koneksi.php";
	$sel1=mysql_query("SELECT nobast FROM `peruntukan` order by idperuntukan desc");
	while($d1=mysql_fetch_array($sel1)){
		$sel2=mysql_query("select nodokacuan from bast where nobast='$d1[nobast]'");
		while ($d2=mysql_fetch_array($sel2)) {

				mysql_query("update peruntukan set nodokacuan='$d2[nodokacuan]' where nobast='$d1[nobast]'");
		}
	}
?>