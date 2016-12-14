<?php
        session_start();
	if(isset($_POST))
	{	
		include "koneksi.php";
                include "tracking.php";
		$check="success";
        $nobast=$_POST['nobast'];
        $level=$_SESSION['SESS_LEVEL'];
            $statuschecklist=$_POST['jenisInput'];
            $optional=$_POST['jenisInput'];
              if($optional=='1'){
                $optional='';
              }else if($optional=='2'){
                $optional=" where idgroup!='B' ";
              }else if($optional=='3'){
                $optional=" where idgroup!='A' ";
              }
              $queryCheckList="select * from checklist $optional";
              echo "$queryCheckList";
        		$queryCheckList=mysql_query($queryCheckList);
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
                    else
                    {
                        if ($level=='1') 
                        {
                            $usr1='1';
                            $usr2='0';
                            $usr3='0';
                            $user1k=$_POST["input$dataCheckList[idchecklist]"];
                            $user2k='';
                            $user3k='';
                            $user='checklistwalikota';
                        }
                        else if ($level=='2') 
                        {
                            $usr1='0';
                            $usr2='1';
                            $usr3='0';
                            $user1k='';
                            // $user2k=$_POST["input$dataCheckList[idchecklist]"];
                            $user3k='';
                            $user='checklistarsip';
                        }else{
                            $usr1='0';
                            $usr2='0';
                            $usr3='1';
                            $user1k='';
                            $user2k='';
                            // $user3k=$_POST["input$dataCheckList[idchecklist]"];
                            $user='checklistaset';
                        }
                        $check2="select no from checklistdetail where nobast='$nobast' and idchecklist='$dataCheckList[idchecklist]'";
                        // echo "$check2<br>";
                        $check2=mysql_query($check2);
                        $check2=mysql_fetch_array($check2);
                        // echo "$check2[no]<br>";
                        if($check2['no']=='' && $isi!=0)
                        {
                            $query="INSERT INTO `checklistdetail` (`no`, `nobast`, `idchecklist`, `user1`, `user2`, `user3`, user1k, user2k, user3k) VALUES ('', '$nobast', '$dataCheckList[idchecklist]', '$usr1', '$usr2', '$usr3', '$user1k', '$user2k', '$user3k')";

                        }else if($isi!=0){
                            if ($level=='1') 
                            {
                            $query="update checklistdetail set user1='$usr1', user1k='$user1k' where idchecklist='$dataCheckList[idchecklist]' and nobast='$nobast'";
                            }
                            else if ($level=='2') 
                            {
                            $query="update checklistdetail set user2='$usr2' where idchecklist='$dataCheckList[idchecklist]' and nobast='$nobast'";
                            }else{
                            $query="update checklistdetail set user3='$usr3' where idchecklist='$dataCheckList[idchecklist]' and nobast='$nobast'";
                            }
                        }

                            echo "$query <-- <hr>";
                            $query=mysql_query($query);
                            
                    }
                }
                // echo "$check <<<--";
                
                if($level=='1')
                {
                    $success='lihatbast';
                }
                else if($level=='2')
                {
                    $success='lihatbast&nobast='.$nobast;
                }else{
                        $success='lihatbast';
                }

            if($check!="fail")
            {
                        if($level=='1'){
                            $nobastq="update bast set $user='1', statuschecklist='$statuschecklist' where nobast='$nobast'";
                                $nobastq=mysql_query($nobastq);
                                tracking("Checklist BAST: ".$nobast);
                        }else
                        if($level=='2')
                        {
                                $nobastq="update bast set checklistarsip='1' where nobast='$nobast'";
                                $nobastq=mysql_query($nobastq);
                                $qUpdateChecklistDetail=mysql_query("update checklistdetail set nobast='$nobast' where nobast='-NOBAST'");
                                tracking("Checklist BAST: ".$nobast);
                        }
                        else if ($level=='3') 
                        {
                                $nobastq="update bast set checklistaset='1' where nobast='$nobast'";
                                $nobastq=mysql_query($nobastq);
                                $qUpdateChecklistDetail=mysql_query("update checklistdetail set nobast='$nobast' where nobast='-NOBAST'");
                                tracking("Checklist BAST: ".$nobast);
                        }
                        // header("Location:index.php?hal=$success");
        	}else{
                        if($level=='2'){
                                $nobast="&nobast=".$_POST['nobast'];
                                
                        }else{
                                $nobast="";
                        }
                        echo "<script type='text/javascript'>alert('Lengkapi Data Checklist');history.back();</script>";
        	        // header("Location:index.php?hal=checklist&e=1$nobast");
        	}
	}
?>