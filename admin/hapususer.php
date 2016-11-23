<?php
	if(isset($_GET['id']))
	{
		$id=$_GET['id'];
		include"../koneksi.php";
		if(mysql_query("delete from members where member_id='$id'"))
		{
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