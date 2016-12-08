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
	$id=$_POST['id'];
  $idperuntukan= $_POST['idperuntukan'];
  $nobast= $_POST['nobast'];
  $idaset= $_POST['idaset'];
  $bot= $_POST['bot'];
  $alamatbot= $_POST['alamatbot'];
  $luasbot= $_POST['luasbot'];
  $keterangan= $_POST['ketbot'];
  $nilai= $_POST['nilaimix']; 			
  $nilaibot= $_POST['nilaibot'];


  $check = mysql_query("SELECT idperuntukan FROM bot WHERE idperuntukan = '$idperuntukan'") or die(mysql_error());
  $check2 = mysql_num_rows($check);

    					//if the name exists it gives an error
  if ($check2 != 0)
  {
    ?>
    <script type="text/javascript">
     alert("ID PERUNTUKAN No:  <?php echo $idperuntukan; ?> has already registered on BOT/BTO data.");
     history.back();
   </script>
   <?php

 }else

//update data ke database
 $query = mysql_query("insert into bot values ('$idperuntukan','$nobast','$idaset','$bot','$alamatbot','$luasbot','$keterangan','$nilai','$nilaibot','1')") or die(mysql_error());

 if ($query) {
   
   echo 'simpan BOT/BTO  berhasil...........';

   $waktu = gmdate("Y-m-d H:i:s", time()+60*60*7);
   $user = $_SESSION['SESS_FIRST_NAME'];
   $query9 = mysql_query("insert into loging values('','$user','entry bot no : $id, ','$waktu')") or die(mysql_error());


 }
 
}
?>

<article class="col-sm-12 col-md-12 col-lg-6">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Edit BOT</h2>
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

				             <form name="editdokumenacuan" action="index.php?hal=entrybot<?php echo'&id='.$id; ?>" method="post">
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
						     $query=mysql_query("select * from bot where idperuntukan='$data[idperuntukan]'");
						     $data2=mysql_fetch_array($query);
						     ?>
				         <tr>
				           <td>BOT/BTO Pengguna</td>
				           <td><label class='input'><input type="text" name="bot" maxlength="90"  value="<?php echo $data2['pengguna'];?>" /></label></td>
				         </tr>

				         <tr>
				           <td>Alamat Aset BOT/BTO </td>
				           <td><label class='input'><input type="text" name="alamatbot" maxlength="200"  value="<?php echo $data2['alamatbot'];?>" /></label></td>
				         </tr>

				         <tr>
				           <td>Luas Aset BOT/BTO </td>
				           <td><label class='input'><input type="text" name="luasbot" maxlength="200"  value="<?php echo $data2['luasbot'];?>" /></label></td>
				         </tr>

				         <tr>
				           <td>Nilai Aset BOT/BTO</td>
				           <td><label class='input'><input type="text" name="nilaibot" maxlength="200"  value="<?php echo $data2['nilaibot'];?>" /></label></td>
				         </tr>

				         <tr>
				           <td>Keterangan</td>
				           <td><label class='input'><input type="text" name="ketbot" maxlength="90"  value="<?php echo $data2['keterangan'];?>" /></label></td>
				         </tr>
				         <tr>		
				          <td align="center" colspan="2">
				          <br>
				          <input type="submit" name="submit" value="Simpan BOT/BTO" class="btn btn-lg btn-info"> </td>
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