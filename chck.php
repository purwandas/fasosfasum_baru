<?php
	if(isset($_POST['submit']))
	{
		include"tracking.php";
		include("config_dir.php");
	    $nama=mysql_fetch_array(mysql_query("select * from checklistupload order by idupload desc"));
	    if($nama=='')
	    {
	      $namanya=$namadefaultC;
	    }else{
	      $ext=end(explode('.', $nama['namafile']));      
	      $namanya=basename($nama['namafile'],".".$ext);  
	    }
	    $namabaru=incrementName($namanya);
	    $ext=end(explode('.', $_FILES['checklist']['name']));
	    $target_file = $target_dir . "$namabaru.".$ext;

	    $nobast=$_POST['nobast'];
		if($_FILES["checklist"]["tmp_name"]!='')
		{
		    if (move_uploaded_file($_FILES["checklist"]["tmp_name"], $target_file)) 
		    {
		      $jabatan=$_SESSION['SESS_JABATAN'];
		      $namafile=$_FILES['checklist']['name'];
		      if($nobast!=''){
		        $dupload=mysql_query("delete from checklistupload where nobast='$nobast' and jabatan='$jabatan'");
		      }
		      $size=filesize($target_dir.$namabaru.'.'.$ext);
		      $upload="INSERT INTO `checklistupload` (`idupload`, `nobast`, `jabatan`, `namaasli`, `namafile`, `path`, `size`) VALUES ('', '$nobast', '$jabatan', '$namafile', '$namabaru.$ext', '$target_dir', '$size');";
		      // echo "$upload";
		      $upload=mysql_query($upload);
		      tracking("Upload Checklist BAST: $nobast");
		    } else {
		      echo $_FILES["checklist"]["error"]."$target_file- ";
		      echo "Sorry, there was an error uploading your file.";
		    }
		}else{
			echo "Tidak Ada File yang di Upload";
		}
	}
?>
<article class="col-sm-12 col-md-12 col-lg-12">
	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-22" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Checklist BAST</h2>
	</header>
		<!-- widget div-->
		<div class="smart-form">
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
						<section class="col col-sm-12 col-md-12 col-lg-6">
							<a class='btn btn-lg btn-info' target='_blank' href='printchecklist.php?<?php echo "p=$_GET[pbast]&s=$_GET[noacuan]&bast=$_GET[nobast]"; ?>'>
								<img src="img/printer.gif">
								Print Checklist
							</a>
							
							<?php
								$nobast=$_GET['nobast'];
								$jabatan=$_SESSION['SESS_JABATAN'];
								$fileUpload=mysql_query("select * from checklistupload where nobast='$nobast' and jabatan='$jabatan'");
								$fileUpload=mysql_fetch_array($fileUpload);
								if($fileUpload['namaasli']!='')
								{
									echo "
										<br>
										<br>
										Checklist Terupload:
										<a href='downloadchecklist.php?id=$fileUpload[idupload]'>
										$fileUpload[namaasli]
										</a>
									";
								}
							?>
						</section>
						<section class="col col-sm-12 col-md-12 col-lg-6">
							<form name="inputdetaildokumenacuan" action="" method="post" enctype="multipart/form-data">
								Upload Checklist<br><br>
								<input type="hidden" name="nobast" value="<?php echo $_GET['nobast']; ?>">
								<input type="file" name="checklist" class="btn btn-lg btn-default">
								<input type="submit" name="submit" value="Upload" class="btn btn-sm btn-info">
			                </form>
						</section>
					</div>
				</fieldset>
			</div>
		</div>
		<!-- end widget div -->

	</div>
	<!-- end widget -->

</article>
<!-- WIDGET END -->
