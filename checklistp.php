<?php
	if(isset($_POST))
	{	
		include "koneksi.php";
		$check="success";
		$queryCheckList=mysql_query("select * from checklist");
        while ($dataCheckList=mysql_fetch_array($queryCheckList)) 
        {
        	if(isset($_POST["checklist$dataCheckList[idchecklist]"]))
        	{
        		$isi=$_POST["checklist$dataCheckList[idchecklist]"];
        	}else{
        		$isi=0;
        	}
        	
        	if($dataCheckList['status']=='wajib' && $isi==0)
        	{
        		$check="fail";
        	}
        }

                if($check=="success")
                {
                        header("Location:index.php?hal=tambahbast");
        	}else{
        	        header("Location:index.php?hal=checklist&e=1");
        	}
	}
?>