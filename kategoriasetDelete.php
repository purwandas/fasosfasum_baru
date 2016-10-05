<?php
if(isset($_GET['kat'])&&$_GET['kat']!=''){
include('koneksi.php');
	
 	$kategori=$_GET["kat"];
 	$qr="delete from kategoriaset where kategoriaset='$kategori'";
 	$queryDelete=mysql_query("$qr");
 	if($queryDelete)
 	{
 		header("location:index.php?hal=kategoriaset");
 	}
 	else
 	{
 		echo $qr;
 	}
 }
 ?>