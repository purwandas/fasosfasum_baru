<?php
	include"koneksi.php";
	$selectBAst="SELECT * FROM `bast` ORDER BY `tglbastd` ASC";
	$selectBAst=mysql_query($selectBAst);
	$true=$false=0;
	$id=0;
	while ($dselectBast=mysql_fetch_array($selectBAst)) 
	{
		$id++;
		$upd="update bast set idbast='$id' where nobast='$dselectBast[nobast]' and idbast='$dselectBast[idbast]' and tglbastd='$dselectBast[tglbastd]'";
		echo "$upd <-- ";
		if($upd=mysql_query($upd))
		{
			echo "true <br>";
			$true++;
		}else{
			echo "false <br>";
			$false++;
		}
	}
	echo"true= $true<br>$false= $false";
?>