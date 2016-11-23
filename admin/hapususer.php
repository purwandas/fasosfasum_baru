<?php
	session_start();
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		include"../koneksi.php";
		$queryNamaUser=mysql_query("select firstname, lastname from members where member_id='$id'");
		$dataNamaUser=mysql_fetch_array($queryNamaUser);
		if(mysql_query("update members set status='0' where member_id='$id'"))
		{
			$waktu = gmdate("Y-m-d H:i:s", time()+60*60*7);
			$user = $_SESSION['SESS_FIRST_NAME'].' '.$_SESSION['SESS_LAST_NAME'];
			$query = mysql_query("insert into loging values('','$user','Hapus User: $dataNamaUser[firstname] $dataNamaUser[lastname]','$waktu')") or die(mysql_error());
			header("Location:../index.php?hal=lihatuser");
		}
		else
		{
			echo "delete from members where member_id='$id'";
		}
	}
	else
	{
		header("Location:../index.php?hal=lihatuser");
	}
	
?>