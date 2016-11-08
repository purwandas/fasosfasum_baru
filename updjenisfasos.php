<?php
	include"koneksi.php";
	$sel1=mysql_query("SELECT * FROM `peruntukan`");//" ORDER BY `peruntukan`.`idperuntukan` DESC limit 500");// where deskripsi like '%SPD%'");
	//3611
	// $no=499;
	while($d1=mysql_fetch_array($sel1)){
			if(strpos($d1['deskripsi'],$d2['display'])!==FALSE){
				mysql_query("update peruntukan set jenisfasos='$d2[display]' where idperuntukan='$d1[idperuntukan]'");
				break;
			}
		// $no++;
		// echo "<br> $no";
	}
?>