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
include "koneksi.php";
if (isset($_POST['submit'])){
  $id=$_POST['id'];
  $idperuntukan= $_POST['idperuntukan'];
  $nobast= $_POST['nobast'];
  $idaset= $_POST['idaset'];
  $skpd= $_POST['skpd'];
  $alamatskpd= $_POST['alamatskpd'];
  $luasskpd= $_POST['luasskpd'];
  $keterangan= $_POST['ketskpd'];
  $nilai= $_POST['nilaimix']; 			
  $nilaiskpd= $_POST['nilaiskpd'];


  $check = mysql_query("SELECT idperuntukan FROM skpd WHERE idperuntukan = '$idperuntukan'") or die(mysql_error());
  $check2 = mysql_num_rows($check);

    					//if the name exists it gives an error
  if ($check2 != 0)
  {
    ?>
    <script type="text/javascript">
     alert("ID PERUNTUKAN No:  <?php echo $idperuntukan; ?> has already registered on SKPD data.");
     history.back();
   </script>
   <?php

 }else

//update data ke database
 $query="insert into skpd values ('$idperuntukan','$nobast','$idaset','$skpd','$alamatskpd','$luasskpd','$keterangan','$nilai','$nilaiskpd','1')";
 echo $query;
 $query = mysql_query($query) or die(mysql_error());




 if ($query) {
   
   echo 'simpan skpd  berhasil...........';

   $waktu = gmdate("Y-m-d H:i:s", time()+60*60*7);
   $user = $_SESSION['SESS_FIRST_NAME'];
   $query9 = mysql_query("insert into loging values('','$user','entry skpd no : $id, ','$waktu')") or die(mysql_error());


 }


 

}
?>

<article class="col-sm-12 col-md-12 col-lg-6">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Edit SKPD</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<?php 
						         $id = $_GET['id'];

						         $query = mysql_query("select * from akun a inner join bast b on a.nobast=b.nobast inner join detaildokacuan d on b.nodokacuan=d.nodokacuan inner join dataaset s on a.idaset=s.idaset inner join peruntukan p on a.idperuntukan=p.idperuntukan inner join lokasidokumen l on a.nobast=l.nobastlokasi  where a.idperuntukan='$id'") or die(mysql_error());

						         $data = mysql_fetch_array($query);
						         ?>

						         <form name="editdokumenacuan" action="" method="post">
						           <input type="hidden" name="id" value="<?php echo $id; ?>" />
						           <center>
						           <table>
						             
						            <!-- <tr>
						             <td >Id Peruntukan </td>           
						             <td height="21"><label class='input'> -->
						             <input type="hidden" name="idperuntukan" value="<?php echo $data['idperuntukan']; ?>"/>
						             <!-- </label></td>
						           </tr> -->
						           <tr>
						            <td >Deskripsi Peruntukan </td>           
						            <td height="21"><label class='input'><input type="text" name="deskripsi" maxlength="80" required="required" value="<?php echo $data['deskripsi']; ?>"/></label></td>
						          </tr>
						          <tr>
						            <td>Volume</td>
						            <td><label class='input'><input type="text" name="volume" maxlength="50" required="required" value="<?php echo $data['volume']; ?>"/></label></td>
						          </tr>
						          <tr>
						           <td>Nilai</td>
						           <td><label class='input'><input type="text" name="nilaimix" maxlength="50" required="required" value="<?php echo $data['nilaimix']; ?>"/></label></td>
						         </tr>
						         <td>Id Aset</td>
						         <td><label class='input'><input type="text" name="idaset" maxlength="50" required="required" value="<?php echo $data['idaset']; ?>"/></label></td>
						       </tr>
						       <td>No. BAST</td>
						       <td><label class='input'><input type="text" name="nobast" maxlength="100" required="required" value="<?php echo $data['nobast']; ?>"/></label></td>
						     </tr>
						     <?php
						     $query=mysql_query("select * from skpd where idperuntukan='$data[idperuntukan]'");
						     $data2=mysql_fetch_array($query);
						     ?>
						     <tr>
						       <td>SKPD Pengguna</td>
						       <td><label class='input'><input type="text" name="skpd" maxlength="90" required="required" value="<?php echo $data2['pengguna'];?>" /></label></td>
						     </tr>

						     <tr>
						       <td>Alamat Aset SKPD </td>
						       <td><label class='input'><input type="text" name="alamatskpd" maxlength="200" required="required" value="<?php echo $data2['alamatskpd'];?>" /></label></td>
						     </tr>

						     <tr>
						       <td>Luas Aset SKPD </td>
						       <td><label class='input'><input type="text" name="luasskpd" maxlength="200" required="required" value="<?php echo $data2['luasskpd'];?>" /></label></td>
						     </tr>

						     <tr>
						       <td>Nilai Aset SKPD </td>
						       <td><label class='input'><input type="text" name="nilaiskpd" maxlength="200" required="required" value="<?php echo $data2['nilaiskpd'];?>" /></label></td>
						     </tr>

						     <tr>
						       <td>Keterangan</td>
						       <td><label class='input'><input type="text" name="ketskpd" maxlength="90" required="required" value="<?php echo $data2['keterangan'];?>" /></label></td>
						     </tr>
						     <tr>		
						      <td align="center" colspan="2"><input type="submit" name="submit" value="Simpan SKPD" class="btn btn-lg btn-info"> </td>
						    </tr>

						  </table>
						  </center>
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