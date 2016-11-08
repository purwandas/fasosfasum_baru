<?php
	include"koneksi.php";
	$sel1=mysql_query("SELECT * FROM `peruntukan`");
	while($d1=mysql_fetch_array($sel1))
	{
		if($d1["sertifikasi"]=="Sertifikat")
		{
			mysql_query("update peruntukan set statussertifikat='Sudah SHP Pemprov. DKI Jakarta' where idperuntukan='$d1[idperuntukan]'");
		}else
		{
			mysql_query("update peruntukan set statussertifikat='Belum SHP Pemprov. DKI Jakarta' where idperuntukan='$d1[idperuntukan]'");
		}
	}
?>