<?php
        session_start();
	if(isset($_POST))
	{	
		include "koneksi.php";
                include "tracking.php";
		$check="success";
                $level=$_SESSION['SESS_LEVEL'];
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
                        else if($dataCheckList['status']!='wajib' && $isi!=0)
                        {
                                if ($level=='1') 
                                {
                                        $insertDetailChecklist=mysql_query("INSERT INTO `checklistdetail` (`no`, `nobast`, `idchecklist`, `user1`, `user2`, `user3`) VALUES ('', '-NOBAST', '$dataCheckList[idchecklist]', '1', '0', '0')");
                                }
                                else if ($level=='2') 
                                {
                                        $insertDetailChecklist=mysql_query("INSERT INTO `checklistdetail` (`no`, `nobast`, `idchecklist`, `user1`, `user2`, `user3`) VALUES ('', '-NOBAST', '$dataCheckList[idchecklist]', '0', '1', '0')");
                                }
                                
                        }
                }

                
                if($level=='1')
                {
                        $success='tambahbast';
                }
                else if($level=='2')
                {
                        $nobast=$_POST['nobast'];
                        $success='lihatbast&nobast='.$nobast;
                }else{
                        $success='lihatbast';
                }

                if($check=="success")
                {
                        if($level=='2'){
                                $nobast=$_POST['nobast'];
                                $nobastq="update bast set checklistarsip='1' where nobast='$nobast'";
                                $nobastq=mysql_query($nobastq);
                                $qUpdateChecklistDetail=mysql_query("update checklistdetail set nobast='$nobast' where nobast='-NOBAST'");
                                tracking("Checklist BAST: ".$nobast);
                        }
                        header("Location:index.php?hal=$success");
        	}else{
                        if($level=='2'){
                                $nobast="&nobast=".$_POST['nobast'];
                                
                        }else{
                                $nobast="";
                        }
                        // echo "<script type='text/javascript'>history.back();</script>";
        	        header("Location:index.php?hal=checklist&e=1$nobast");
        	}
	}
?>