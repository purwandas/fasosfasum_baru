<?php
	require"admin/auth.php";
	if(isset($_POST['ubah']) || isset($_POST['tambah']))
	{
		
		$nama=explode(' ',$_POST['nama'],2);
		$wilayah=$_POST['wilayah'];
		$level=$_POST['level'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$waktu = gmdate("Y-m-d H:i:s", time()+60*60*7);
		$user = $_SESSION['SESS_FIRST_NAME'].' '.$_SESSION['SESS_LAST_NAME'];
		if(isset($_POST['ubah']))
		{
			if($password!=''){
				$password=", passwd='".md5($password)."'";
			}
			$id=$_POST['id'];
			// echo"
			// 	$nama[0] . $nama[1] . $wilayah . $level . $username . $password
			// ";
			$query = mysql_query("insert into loging values('','$user','Ubah User: $nama[0] $nama[1]','$waktu')") or die(mysql_error());
			mysql_query("update members set firstname='$nama[0]', lastname='$nama[1]', wilayah='$wilayah', level='$level', login='$username' $password where member_id='$id'");
		}
		else
		if(isset($_POST['tambah']))
		{
			$password=md5($password);
			// echo"
			// 	$nama[0] . $wilayah . $level . $username . $password
			// ";
			$query = mysql_query("insert into loging values('','$user','Tambah User: $nama[0] $nama[1]','$waktu')") or die(mysql_error());
			$query2 = mysql_query("INSERT INTO `members` (`member_id`, `firstname`, `lastname`, `wilayah`, `level`, `login`, `passwd`, `status`) VALUES ('', '$nama[0]', '$nama[1]', '$wilayah', '$level', '$username', '$password', '1')");
			if(!$query2){
				echo"
				<p class='alert alert-warning'>
				".mysql_error($koneksi)."
				</p>
				";
			}
		}
	}
?>
<article class="col-sm-12 col-md-12 col-lg-12">
	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-user"></i></span>
		<h5 style='margin-left:25px'>Semua User</h5>
	</header>
		<!-- widget div-->
		<div class="smart-form">
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<table class="table table-striped table-hover">
								<tr>
									<td>
										<div class='col col-sm-1 col-md-1 col-lg-1'>
											<b>No.</b>
										</div>
										<div class='col col-sm-2 col-md-2 col-lg-2'>
											<b>Nama Lengkap</b>
										</div>
										<div class='col col-sm-2 col-md-2 col-lg-2'>
											<b>Wilayah</b>
										</div>
										<div class='col col-sm-2 col-md-2 col-lg-2'>
											<b>Jabatan</b>
										</div>
										<div class='col col-sm-2 col-md-2 col-lg-2'>
											<b>Username</b>
										</div>
										<div class='col col-sm-2 col-md-2 col-lg-2'>
											<b>Password</b>
										</div>
										<div class='col col-sm-1 col-md-1 col-lg-1'>
											<b>Act.</b>
										</div>
									</td>
								</tr>
								<?php
									$no=0;
									$queryUser=mysql_query("select * from members inner join memberslevel on members.level=memberslevel.level where members.level<6 and status='1' ORDER BY `members`.`member_id` ASC");
									while ($dataUser=mysql_fetch_array($queryUser)) 
									{
										$no++;
										echo"
											<tr>
												<td>
												<form method='post' action=''>
													<div class='col col-sm-1 col-md-1 col-lg-1'>
														$no
													</div>
													<div class='col col-sm-2 col-md-2 col-lg-2'>
														<label class='input'>
											<input type='text' name='nama' value='$dataUser[firstname] $dataUser[lastname]'>
											<input type='hidden' name='id' value='$dataUser[member_id]'>
														</label>
													</div>
													
													<div class='col col-sm-2 col-md-2 col-lg-2'>
														<select class='btn btn-sm btn-default' name='wilayah'>
															<option value='$dataUser[wilayah]'>
																$dataUser[wilayah]
															</option>
														";
														$queryWilayah=mysql_query("select wilayah from wilayah");
														while ($dataWilayah=mysql_fetch_array($queryWilayah)) 
														{
															echo"
																<option value='$dataWilayah[wilayah]'>$dataWilayah[wilayah]</option>
															";
														}
														echo"
														</select>
													</div>
													<div class='col col-sm-2 col-md-2 col-lg-2'>
														<select class='btn btn-sm btn-default' name='level'>
															<option value='$dataUser[level]'>
																$dataUser[role]
															</option>
														";
														$queryJabatan=mysql_query("select * from memberslevel  where level < 6");
														while ($dataJabatan=mysql_fetch_array($queryJabatan)) 
														{
															echo"
																<option value='$dataJabatan[level]'>$dataJabatan[role]</option>
															";
														}
														echo"
														</select>
													</div>
													<div class='col col-sm-2 col-md-2 col-lg-2'>
														<label class='input'>
											<input type='text' name='username' value='$dataUser[login]'>
														</label>
													</div>
													<div class='col col-sm-2 col-md-2 col-lg-2'>
														<label class='input'>
											<input type='password' name='password' placeholder='Password Baru'>
														</label>
													</div>
													<div class='col col-sm-1 col-md-1 col-lg-1'>
											<input type='submit' value='Simpan' name='ubah' class='btn btn-info btn-sm col-md-6' style='    padding-left: 3px;'>
											<a href='admin/hapususer.php?id=$dataUser[member_id]' class='btn btn-danger btn-sm col-md-6' style='    padding-left: 0px;'>Hapus</a>
													</div>
												</form>
												</td>
											</tr>
										";
									}
										$no++;
										echo"
											<tr>
												<td>
												<form method='post' action=''>
													<div class='col col-sm-1 col-md-1 col-lg-1'>
														$no
													</div>
													<div class='col col-sm-2 col-md-2 col-lg-2'>
														<label class='input'>
											<input type='text' name='nama' placeholder='Nama Lengkap' required>
														</label>
													</div>
													
													<div class='col col-sm-2 col-md-2 col-lg-2'>
														<select class='btn btn-sm btn-default' name='wilayah'>
															<option value='Semua Wilayah'>Semua Wilayah</option>
														";
														$queryWilayah=mysql_query("select wilayah from wilayah");
														while ($dataWilayah=mysql_fetch_array($queryWilayah)) 
														{
															echo"
																<option value='$dataWilayah[wilayah]'>$dataWilayah[wilayah]</option>
															";
														}
														echo"
														</select>
													</div>
													<div class='col col-sm-2 col-md-2 col-lg-2'>
														<select class='btn btn-sm btn-default' name='level'>
														";
														$queryJabatan=mysql_query("select * from memberslevel where level < 6");
														while ($dataJabatan=mysql_fetch_array($queryJabatan)) 
														{
															echo"
																<option value='$dataJabatan[level]'>$dataJabatan[role]</option>
															";
														}
														echo"
														</select>
													</div>
													<div class='col col-sm-2 col-md-2 col-lg-2'>
														<label class='input'>
											<input type='text' name='username' placeholder='Username' value='' required>
														</label>
													</div>
													<div class='col col-sm-2 col-md-2 col-lg-2'>
														<label class='input'>
											<input type='password' name='password' placeholder='Password Baru' value='' required>
														</label>
													</div>
													<div class='col col-sm-1 col-md-1 col-lg-1'>
											<input type='submit' value='Tambah' name='tambah' class='btn btn-success btn-sm'>
													</div>
												</form>
												</td>
											</tr>
										";
										
								?>
							</table>
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
