<?php
	$id=$_SESSION['SESS_MEMBER_ID'];
	$level=$_SESSION['SESS_LEVEL'];

	if(isset($_POST['submit']))
	{	
		$password= $_POST['password'];
			if($password!=''){
				$password=md5($password);
			}
		$passwordb= $_POST['passwordb'];
			if($passwordb!=''){
				$passwordb=md5($passwordb);
			}
		$queryCek=mysql_query("select passwd from members where member_id='$id'");
		$dataCek=mysql_fetch_array($queryCek);
		// echo "lama: $dataCek[passwd]<br>lama2: $password<br>baru: $passwordb";
		if(($password==$dataCek['passwd']))
		{
			$username= $_POST['username'];
			$password=", passwd='".$passwordb."'";
			$namauser=explode(' ',$_POST['namauser'],2);
			if($level=='1' || $level=='2' || $level=='3' )
			{
				$namattd= $_POST['namattd'];
				$jabatanttd= $_POST['jabatanttd'];
			}else{
				$namattd='';
				$jabatanttd='';
			}

			$query="update members set firstname='$namauser[0]', lastname='$namauser[1]', login='$username', namattd='$namattd', jabatanttd='$jabatanttd' $password where member_id='$id'";
			if($query=mysql_query($query))
			{
				$e="
				<p class='alert alert-success' style='margin-bottom: 20px;'>
					Update Data Sukses
				</p>
				";
			}else{
				$e= mysql_error($koneksi);
				$e="
				<p class='alert alert-warning' style='margin-bottom: 20px;'>
				$e
				</p>
				";
			}
		}else{
			$e="
				<p class='alert alert-warning' style='margin-bottom: 20px;'>
				Ada Kesalahan Password
				</p>
			";
		}
		// echo "$username - $password - $namauser - $namattd - $jabatanttd";
	}

	$query="select * from members where member_id='$id'";
	$query=mysql_query($query);
	$data=mysql_fetch_array($query);
?>
	<article class="col-sm-12 col-md-12 col-lg-6">
		<!-- Widget ID (each widget will need unique ID)-->
		<div class="jarviswidget jarviswidget-color-darken" id="wid-id-41" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
		<header>
			<span class="widget-icon"> <i class="fa fa-user"></i></span>
			<h2>Data Pengguna</h2>
		</header>
			<!-- widget div-->
			<div class="smart-form">
				<div class="widget-body no-padding">
					<fieldset>
						<form name="userprofile" action="" method="post" enctype="multipart/form-data">
						<div class="row">
							<section class="col col-sm-12 col-md-12 col-lg-12">
								<?php echo $e; ?>
								<div class="col col-sm-12 col-md-6 col-lg-6">
									Login Username
								</div>
								<div class="col col-sm-12 col-md-6 col-lg-6">
									<label class="input">
										<input type="text" name="username" value="<?php echo $data['login']; ?>" readonly="readonly">
									</label>
								</div>
								<div class="col col-sm-12 col-md-6 col-lg-6">
									Password
								</div>
								<div class="col col-sm-12 col-md-6 col-lg-6">
									<label class="input">
										<input type="password" name="password" value="" placeholder="Password Lama">
									</label>
								</div>
								<div class="col col-sm-12 col-md-6 col-lg-6">
									&nbsp
								</div>
								<div class="col col-sm-12 col-md-6 col-lg-6">
									<label class="input">
										<input type="password" name="passwordb" value="" placeholder="Password Baru">
									</label>
								</div>
								<div class="col col-sm-12 col-md-6 col-lg-6">
									Nama Pengguna
								</div>
								<div class="col col-sm-12 col-md-6 col-lg-6">
									<label class="input">
										<input type="text" name="namauser" value="<?php echo $data['firstname'].' '.$data['lastname']; ?>">
									</label>
								</div>
								<?php
									if($level=='1' || $level=='2' || $level=='3' )
									{
								?>
								<div class="col col-sm-12 col-md-6 col-lg-6">
									Nama Penandatangan Checklist
								</div>
								<div class="col col-sm-12 col-md-6 col-lg-6">
									<label class="input">
										<input type="text" name="namattd" value="<?php echo $data['namattd']; ?>">
									</label>
								</div>
								<div class="col col-sm-12 col-md-6 col-lg-6">
									Jabatan Penandatangan Checklist
								</div>
								<div class="col col-sm-12 col-md-6 col-lg-6">
									<label class="input">
										<input type="text" name="jabatanttd" value="<?php echo $data['jabatanttd']; ?>">
									</label>
								</div>
								<?php
									}
								?>
								<div class="col col-sm-12 col-md-12 col-lg-12 text-center" style="margin-top: 13px">
									<label class="btn btn-sm ">
										<input type="submit" name="submit" value="Simpan" class="btn btn-info btn-sm">
									</label>
								</div>
							</section>
						</div>
		                </form>
					</fieldset>
				</div>
			</div>
			<!-- end widget div -->

		</div>
		<!-- end widget -->

	</article>
	<!-- WIDGET END -->
