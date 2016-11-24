<?php
include "koneksi.php";
$no=0;
$selectKewajiban=mysql_query("select distinct nodokacuan from kewajiban");
while ($dataKewajiban=mysql_fetch_array($selectKewajiban)) 
{
	$queryIdAcuan=mysql_query("select idacuan from detaildokacuan where nodokacuan='$dataKewajiban[nodokacuan]'");
	$dataIdAcuan=mysql_fetch_array($queryIdAcuan);
	$updateKewajiban="update kewajiban set idacuan='$dataIdAcuan[idacuan]' where nodokacuan='$dataKewajiban[nodokacuan]'";
	mysql_query($updateKewajiban);
	echo $updateKewajiban."<hr>";
}
?>