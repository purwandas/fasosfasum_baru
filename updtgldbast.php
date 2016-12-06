<?php
	include"koneksi.php";
	$selectBast=mysql_query("select idbast, tglbast from bast");
	$true=$false=0;
	while ($dselectBast=mysql_fetch_array($selectBast)) 
	{
		$tglbastd=substr($dselectBast['tglbast'], -4).'-'.substr($dselectBast['tglbast'], 3,2)."-".substr($dselectBast['tglbast'], 0,2);
		echo "$tglbastd -> ";
		$updtgl="update bast set tglbastd='$tglbastd' where idbast='$dselectBast[idbast]'";
		echo "$updtgl -- ";
		if($updtgl=mysql_query($updtgl))
		{
			echo "true<br>";
			$true++;
		}else{
			echo "false<br>";
			$false++;
		}
	}
	echo "true: $true<br>false: $false";
?>