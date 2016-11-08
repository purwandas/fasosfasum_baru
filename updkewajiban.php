<?php
include "koneksi.php";
$no=0;
$selectPeruntukan=mysql_query("select idperuntukan, nodokacuan, deskripsi, luas, jenisfasos from peruntukan ");
while ($dataPeruntukan=mysql_fetch_array($selectPeruntukan)) 
{
	$no++;
	$queryInsertKewajiban="INSERT INTO `kewajiban` (`idkewajiban`, `nodokacuan`, `deskripsi`, `jenisfasos`, `luas`, `pelunasan`) VALUES ('', '$dataPeruntukan[nodokacuan]', '$dataPeruntukan[deskripsi]', '$dataPeruntukan[jenisfasos]', '0', '$dataPeruntukan[luas]')";
	$insertKewajiban=mysql_query($queryInsertKewajiban);
	$queryUpdatePeruntukan="update peruntukan set idkewajiban='$no' where idperuntukan='$dataPeruntukan[idperuntukan]'";
	$updatePeruntukan=mysql_query($queryUpdatePeruntukan);
	echo "$queryInsertKewajiban<br>$queryUpdatePeruntukan<hr>";
}
?>