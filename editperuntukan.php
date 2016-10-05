<SCRIPT language=Javascript>
  <!--
  function isNumberKey(evt)
  {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
    return true;
  }
//-->
</SCRIPT>


<?php
if (isset($_POST['submit'])){

	$id=$_GET['idperuntukan'];
  $deskripsi= $_POST['deskripsi'];
  $jenis= $_POST['jenis'];
  $luas= $_POST['luas'];
  $sertifikasi= $_POST['sertifikasi'];
  $pemilik= $_POST['pemilik'];
  $jenissertifikat= $_POST['jenissertifikat'];
  $masaberlaku= $_POST['masaberlaku'];
  $keterangan= $_POST['keterangan'];
  $statussertifikat=$_POST['statussertifikat'];
  $nosertifikat= $_POST['nosertifikat'];
  $tglsertifikat=$_POST['tglsertifikat'];
  $luassertifikat= $_POST['luassertifikat'];
  $statuspenggunaan=$_POST['statuspenggunaan'];
  $nosk= $_POST['nosk'];
  $tglsk=$_POST['tglsk'];
  $skpd= $_POST['skpd'];
  $statusplang=$_POST['statusplang'];
  $sensusfasos=$_POST['sensusfasos'];



//update data ke database
  $query = mysql_query("update peruntukan set  deskripsi='$deskripsi',jenis='$jenis',luas='$luas',deskripsi='$deskripsi',jenis='$jenis',luas='$luas',sertifikasi='$sertifikasi',pemilik='$pemilik',jenissertifikat='$jenissertifikat',masaberlaku='$masaberlaku',keterangan='$keterangan',statussertifikat='$statussertifikat', nosertifikat='$nosertifikat',tglsertifikat='tglsertifikat', luassertifikat='$luassertifikat', statuspenggunaan='$statuspenggunaan', nosk='$nosk',tglsk='tglsk', skpd='$skpd', statusplang='$statusplang', sensusfasos='$sensusfasos' where idperuntukan='$id'") or die(mysql_error());



  mysql_connect("localhost","root","");
  mysql_select_db("phplogin");
  $waktu = gmdate("Y-m-d H:i:s", time()+60*60*7);
  $user = $_SESSION['SESS_FIRST_NAME'];
  $query9 = mysql_query("insert into loging values('','$user','edit Peruntukan no : $id, ','$waktu')") or die(mysql_error());



  if ($query) {

   echo 'simpan perbahan data peruntukan berhasil...........';

 }
}
?>
<article class="col-sm-12 col-md-12 col-lg-6">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Edit Data Peruntukan</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<?php 
				             include "koneksi.php";
				             $id = $_GET['idperuntukan'];

				             $query = mysql_query("select * from peruntukan where idperuntukan='$id'") or die(mysql_error());

				             $data = mysql_fetch_array($query);
				             ?>

				             <form name="editdokumenacuan" action="" method="post">
				               <input type="hidden" name="id" value="<?php echo $id; ?>" />
				               <table>

				                <tr>
				                 <td >Id Peruntukan </td>           
				                 <td height="21"><input type="text" name="idperuntukan" maxlength="15" required="required" value="<?php echo $data['idperuntukan']; ?>" disabled /></td>
				               </tr>
				               <tr>
				                <td >Deskripsi Peruntukan </td>           
				                <td height="21"><input type="text" name="deskripsi" maxlength="80" required="required" value="<?php echo $data['deskripsi']; ?>"/></td>
				              </tr>
				              <tr>
				               <td>Jenis Peruntukan</td>
				               <td><select name="jenis">
				                 <option value="<?php echo $data['jenis']; ?>"><?php echo $data['jenis']; ?></option><option>Tanah</option><option>Non-Tanah</option></select></td> 
				               </tr>

				               <tr>
				                <td>Volume </td>
				                <td height="21"><input name="luas" type="text" id="luas" size="10" maxlenght="18" onkeypress="return isNumberKey(event)" required="required" value="<?php echo $data['luas']; ?>"/>
				                </td>         
				              </tr>
				              <tr>
				               <td>Sertifikasi</td>
				               <td><select name="sertifikasi">
				                 <option value="<?php echo $data['sertifikasi']; ?>"><?php echo $data['sertifikasi']; ?></option><option>Sertifikat</option><option>Non-Sertifikat</option></select></td>
				               </tr>
				               <tr>
				                 <td>Pemilik</td>
				                 <td><input type="text" name="pemilik" maxlength="20" required="required" value="<?php echo $data['pemilik']; ?>"/></td>
				               </tr>

				               <tr>
				                 <td>Jenis Sertifikat</td>
				                 <td><select name="jenissertifikat">
				                   <option value="<?php echo $data['jenissertifikat']; ?>"><?php echo $data['jenissertifikat']; ?></option><option>DKI</option><option>SHM</option><option>HGB</option><option>Non-Sertifikat</option></select></td>
				                 </tr>
				                 <tr>
				                   <td>Masa Berlaku</td>
				                   <td><input type="text" name="masaberlaku" maxlength="10" required="required" value="<?php echo $data['masaberlaku']; ?>"/></td>
				                 </tr>

				                 <tr>
				                   <td>Keterangan</td>
				                   <td><input type="text" name="keterangan" maxlength="40" required="required" value="<?php echo $data['keterangan']; ?>"/></td>
				                 </tr>

				                 <tr>
				                   <td>Status Sertifikat</td>
				                   <td>
				                     <select name="statussertifikat">
				                      <option value="<?php echo $data['statussertifikat']; ?>">-<?php echo $data['statussertifikat']; ?></option>
				                      <?php
				                      $query=mysql_query("select display from ref_statussertifikat");
				                      while ($dss=mysql_fetch_array($query)) {
				                       echo"
				                       <option value='$dss[display]'>
				                         $dss[display]
				                       </option>
				                       ";
				                     }
				                     ?>
				                   </select>
				                 </td>
				               </tr>
				               <tr>
				                 <td>No.Sertifikat</td>
				                 <td><input type="text" name="nosertifikat" maxlength="20" required="required" value="<?php echo $data['nosertifikat']; ?>"/></td>
				               </tr>
				               <tr>
				                 <td>Tgl.Sertifikat</td>
				                 <td><input type="text" name="tglsertifikat" maxlength="20" required="required" value="<?php echo $data['tglsertifikat']; ?>"/></td>
				               </tr>
				               <tr>
				                 <td>Luas Sertifikat</td>
				                 <td><input type="text" name="luassertifikat" maxlength="10" required="required" value="<?php echo $data['luassertifikat']; ?>"/></td>
				               </tr>
				               <tr>
				                 <td>Status Plang</td>
				                 <td>
				                   <select name="statusplang">
				                    <option value="<?php echo $data['statusplang']; ?>">-<?php echo $data['statusplang']; ?></option>
				                    <?php
				                    $query=mysql_query("select display from ref_statusplangaset");
				                    while ($dss=mysql_fetch_array($query)) {
				                     echo"
				                     <option value='$dss[display]'>
				                       $dss[display]
				                     </option>
				                     ";
				                   }
				                   ?>
				                 </select>
				               </td>
				             </tr>
				             <tr>
				               <td>Status Penggunaan</td>
				               <td>
				                 <select name="statuspenggunaan">
				                  <option value="<?php echo $data['statuspenggunaan']; ?>">-<?php echo $data['statuspenggunaan']; ?></option>
				                  <?php
				                  $query=mysql_query("select display from ref_statuspenggunaanfasosfasum");
				                  while ($dss=mysql_fetch_array($query)) {
				                   echo"
				                   <option value='$dss[display]'>
				                     $dss[display]
				                   </option>
				                   ";
				                 }
				                 ?>
				               </select>
				             </td>
				           </tr>
				           <tr>
				           <td>No.SK</td>
				             <td><input type="text" name="nosk" maxlength="20" required="required" value="<?php echo $data['nosk']; ?>"/></td>
				           </tr>
				           <tr>
				             <td>Tgl.SK</td>
				             <td><input type="text" name="tglsk" maxlength="20" required="required" value="<?php echo $data['tglsk']; ?>"/></td>
				           </tr>
				           <tr>
				             <td>SKPD</td>
				             <td><input type="text" name="skpd" maxlength="10" required="required" value="<?php echo $data['skpd']; ?>"/></td>
				           </tr>
				           <tr>
				             <td>Sensus Fasos</td>
				             <td>
				               <select name="sensusfasos">
				                <option value="<?php echo $data['sensusfasos']; ?>">-<?php echo $data['sensusfasos']; ?></option>
				                <?php
				                $query=mysql_query("select display from ref_sensusfasosfasum");
				                while ($dss=mysql_fetch_array($query)) {
				                 echo"
				                 <option value='$dss[display]'>
				                   $dss[display]
				                 </option>
				                 ";
				               }
				               ?>
				             </select>
				           </td>
				         </tr>
				         <!-- <tr>
				           <td>No. Dok. Acuan</td>
				           <td><input type="text" name="nodokacuan" maxlength="40" required="required" value="<?php echo $data['nodokacuan']; ?>"/></td>
				         </tr> -->

				         <tr>		
				          <td align="right" colspan="2"><input type="submit" name="submit" value="Simpan Perubahan"> </td>
				        </tr>

				      </table>
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