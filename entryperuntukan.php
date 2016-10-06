<?php 
if(isset($_POST['id'])&&$_POST['id']!='')
{
	$id=$_POST['id'];
}
else if(isset($_GET['id'])&&$_GET['id']!='')
{
	$id=$_GET['id'];
}

$query = mysql_query("select * from dataaset where idaset='$id'") or die(mysql_error());

$data = mysql_fetch_array($query);
$query=mysql_query("select nodokacuan from bast where nobast='$data[nobastaset]'");
$d1=mysql_fetch_array($query);
?>
<script type="text/javascript">
function submit() {
  document.getElementById("kwjb").submit();
}
</script>

<article class="col-sm-12 col-md-12 col-lg-12">

  <!-- Widget ID (each widget will need unique ID)-->
  <div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
  <header>
    <span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
    <h2>Tambah Data BAST Peruntukan</h2>
  </header>

    <!-- widget div-->
    <div class="smart-form">
      
      <div class="widget-body no-padding">
        <fieldset>
          <div class="row">
            <section class="col col-sm-12 col-md-12 col-lg-6" style="float:right">
				<form method="post" name='kwjb' action="index.php?hal=entryperuntukan">
                <input type="hidden" name="id" value="<?php echo $id; ?>" />
                <?php
                  if(isset($_POST['param'])){
                    $param=1;
                  }else{
                    $param=0;
                  }
                ?>
                <input type="hidden" name="param" value="<?php echo $param; ?>" />
                <a href="index.php?hal=editacuan&nodokacuan=<?php echo $d1['nodokacuan']; ?>">Tambah Data Kewajiban?</a>
                <table class="table table-striped">
                 <tr>
                   <td>
                     Pilih
                   </td>
                   <td>
                     Deskripsi
                   </td>
                   <td>
                     Jenis Fasos Fasum
                   </td>
                   <td>
                     Luas
                   </td>
                 </tr>
                 <?php
                 
                 $query="select idperuntukan,idaset,deskripsi,jenisfasos,luas from peruntukan where nodokacuan='$d1[nodokacuan]' and (nobast='' or idaset='$id')";
                  // echo "$query";
                 $query=mysql_query($query);
                 $idx=0;

                 while ($d2=mysql_fetch_array($query)) {
                  $ckd="";
                  if(isset($_POST["wjb$d2[idperuntukan]"])){
                    $ckd="checked";
                    $peruntukan[$idx]=$_POST["wjb$d2[idperuntukan]"];
                    $idx++;
                  }else if($param==0){
                    if($data['idaset']==$d2['idaset']){
                    $ckd="checked";
                    $peruntukan[$idx]=$d2['idperuntukan'];
                    $idx++;
                    }
                  }
                  echo"
                  <tr>
                   <td>
                     <input type='checkbox' $ckd name='wjb$d2[idperuntukan]' onclick='submit()' value='$d2[idperuntukan]'>
                   </td>
                   <td>
                     $d2[deskripsi]
                   </td>
                   <td>
                     $d2[jenisfasos]
                   </td>
                   <td>
                     $d2[luas]
                   </td>
                 </tr>
                 ";
               }

               ?>
             </table>
           </form>	              
            </section>
	        <form name="peruntukan" action="entryperuntukan_p.php" method=post>
            <section class="col col-sm-12 col-md-12 col-lg-6">
				 <input type="hidden" name="nodokacuan" value='<?php echo "$d1[nodokacuan]";?>' />
		          <input type="hidden" name="id" value="<?php echo $idaset; ?>" />
		            <table>
		             <tr><td><b>No.BAST </b></td><td>:</td><td><input type="text" name="nobast" value="<?php echo $data['nobastaset']; ?>" /></td>
		               <td><a href="index.php?hal=viewdetailbast&id=<?php echo $data['nobastaset']; ?>">Lihat data klik disini</a></td>
		             </tr>
		             <tr><td><b>No.Aset</b></td><td>: </td><td><input type="text" name="noaset" value="<?php echo $data['idaset']; ?>" /></td>
		             </tr>
		           </table>
            </section>
            <section class="col col-sm-12 col-md-12 col-lg-12">
				<div style="width:100%; height:auto;overflow:auto;">  
                    
                    <table class="table table-striped table bordered" id=datatable1 width="800" border="1" >
                       <tr>
                         <td class="center">Peruntukan</td>
                         <td class="center">Jenis Fasos</td>
                         <td class="center">Jenis</td>
                         <td class="center">Luas Kwjbn (M2)</td>
                         <td class="center">Sertifikasi</td>
                         <td class="center">Pemilik</td>
                         <td class="center">Jenis Sertifikasi</td>
                         <td class="center">Masa Berlaku</td>
                         <td class="center">Keterangan</td>
                         <td class="center">Status Laporan Keuangan</td>
                         <td class="center">Status Recon</td>
                         <td class="center">Status Sertifikat</td>
                         <td class="center">No.Sertifikat</td>
                         <td class="center">Tgl. Sertifikat</td>
                         <td class="center">Luas Stfkt (M2)</td>
                         <td class="center">Status Plang</td>
                         <td class="center">Status Penggunaan</td>
                         <td class="center">No.SK</td>
                         <td class="center">Tgl. SK</td>
                         <td class="center">SKPD</td>
                         <td class="center">Sensus Fasos</td>
                       </tr>
                       <?php
                       if(isset($peruntukan))
                         foreach ($peruntukan as $key => $value) 
                         {
                          $query=mysql_query("select * from peruntukan where idperuntukan='$value'");
                          $d3=mysql_fetch_array($query);
                          ?>
                          <tr>

                           <td><input type='hidden' name='idperuntukan[]'<?php echo"value='$value'";?> >
                            <input type='text' name='deskripsi[]'<?php echo"value='$d3[deskripsi]'";?> >
                          </td>
                          <td>
                            <select name='jenisfasos[]'>
                              <?php
                              echo"
                              <option value='$d3[jenisfasos]'>$d3[jenisfasos]</option>
                              ";
                              $query=mysql_query("select display from ref_jenisfasosfasum order by id desc");
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
                          <td><select name='jenis[]'><?php echo"<option value='$d3[jenis]'>$d3[jenis]</option>"; ?><option value='Tanah'>Tanah</option><option value='Non-Tanah'>Non-Tanah</option></select></td> 
                          <td><input type='text' name='luas[]' <?php echo"value='$d3[luas]'";?> ></td>
                          <td><select name='sertifikasi[]'><?php echo"<option value='$d3[sertifikasi]'>$d3[sertifikasi]</option>"; ?><option>Non-Sertifikat</option><option>Sertifikat</option></select></td>
                          <td><input type='text' name='pemilik[]' <?php echo"value='$d3[pemilik]'";?> ></td>
                          <td><select name='jenissertifikat[]'><?php echo"<option value='$d3[jenissertifikat]'>$d3[jenissertifikat]</option>"; ?><option>Non-Sertifikat</option><option>SHM</option><option>HGB</option><option>DKI</option></select></td>

                          <td><input type='text' name='masaberlaku[]' <?php echo"value='$d3[masaberlaku]'";?> ></td>

                          <td><input type='text' name='keterangan[]' <?php echo"value='$d3[keterangan]'";?> ></td>
                          <td><input type='text' name='statuslaporankeuangan[]' <?php echo"value='$d3[statuslaporankeuangan]'";?> ></td>
                          <td><input type='text' name='statusrecon[]' <?php echo"value='$d3[statusrecon]'";?> ></td>  
                          <td>
                            <select name='statussertifikat[]'>
                              <?php
                              echo"
                              <option value='$d3[statussertifikat]'>$d3[statussertifikat]</option>
                              ";
                              $query=mysql_query("select display from ref_statussertifikat order by id desc");
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
                         <td><input type='text' name='nosertifikat[]' <?php echo"value='$d3[nosertifikat]'";?> ></td>
                         <td><input type='text' name='tglsertifikat[]' <?php echo"value='$d3[tglsertifikat]'";?> ></td>
                         <td><input type='text' name='luassertifikat[]' <?php echo"value='$d3[luassertifikat]'";?> ></td>   
                         <td>
                          <select name='statusplang[]'>
                            <?php
                            echo"
                            <option value='$d3[statusplang]'>$d3[statusplang]</option>
                            ";
                            $query=mysql_query("select display from ref_statusplangaset order by id desc");
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
                       <td>
                        <select name='statuspenggunaan[]'>
                          <?php
                          echo"
                          <option value='$d3[statuspenggunaan]'>$d3[statuspenggunaan]</option>
                          ";
                          $query=mysql_query("select display from ref_statuspenggunaanfasosfasum order by id desc");
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
                     <td><input type='text' name='nosk[]' <?php echo"value='$d3[nosk]'";?> ></td>
                     <td><input type='text' name='tglsk[]' <?php echo"value='$d3[tglsk]'";?> ></td>
                     <td><input type='text' name='skpd[]' <?php echo"value='$d3[skpd]'";?> ></td>  
                     <td>
                      <select name='sensusfasos[]'>
                        <?php
                        echo"
                        <option value='$d3[sensusfasos]'>$d3[sensusfasos]</option>
                        ";
                        $query=mysql_query("select display from ref_sensusfasosfasum order by id desc");
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

                 <?php
               }
               ?>
             </tr>
           </tbody>
         </table>
       </div>
       <br>
       <center><input type=submit name="submit" value="Simpan" class="btn btn-lg btn-info" /></center>
            </section>
            </form>
            
          </div>
        </fieldset>
      </div>
    </div>
    <!-- end widget div -->

  </div>
  <!-- end widget -->

</article>
<!-- WIDGET END -->
