<article class="col-sm-12 col-md-12 col-lg-12">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Marking BOT</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
							<form method="post" action="" name="form1" id="form1" >
						<section class="col col-sm-12 col-md-12 col-lg-4">
			                  <!-- <b>Masukan Kata Pencarian berikut :</b><br><br>    -->
			                  <b>Kata Pencarian  </b> 
			                  <!-- <input type="text" name="term" /> -->
									<section class="col col-sm-12 col-md-12 col-lg-10">
										<label class="input"> <i class="icon-append fa fa-question-circle"></i>
										<input type="text" name="term" placeholder="Kata Pencarian" <?php if(isset($_POST['term'])){echo "value='".$_POST['term']."'";} ?>>
										<b class="tooltip tooltip-bottom-right">
										<i class="fa fa-warning txt-color-teal"></i> 
										Input No BAST, Pengembang Bast, Kelurahan, Alamat Aset, Volume, Deskripsi, Kategoriaset 
										</b> 
									</label>
									</section>
									<section class="col col-sm-12 col-md-12 col-lg-2">
					                  <input type="submit" name="submit2" value="Cari" class="btn btn-sm btn-info" />
					                  </section>


		                </section>
			                </form>
	                </div>
					<div class="row">
						<section class="col col-sm-12 col-md-12 col-lg-12">
							
			                <div style="overflow:auto">
			                <table class="table table-striped table-hover table-bordered" cellpadding="5" cellspacing="5">

			                    <tr>
			                      <td class="center">NO.</td>        	
			                      <td class="center">NO BAST</td>
			                      <td class="center">TGL.BAST</td>
			                      <td class="center">ALAMAT</td>
			                      <td class="center">KELURAHAN</td>
			                      <td class="center">KECAMATAN</td>
			                      <td class="center">WILAYAH</td>
			                      <td class="center">PERUNTUKAN</td>
			                      <td class="center">VOLUME</td>
			                      <td class="center">SATUAN</td>
			                      <td class="center">NILAI</td>
			                      <td class="center">Action</td>

			                      
			                    </tr>

			                  
			                  <?php
			                   include "koneksi.php";
			                  
			                  if(isset($_REQUEST['submit2'])) {

			                   $term = $_POST['term']; 
			                   
			                   $query = mysql_query ("SELECT * FROM akun a inner join bast b on a.nobast=b.nobast inner join detaildokacuan d on b.nodokacuan=d.nodokacuan inner join dataaset s on a.idaset=s.idaset inner join peruntukan p on a.idperuntukan=p.idperuntukan inner join lokasidokumen l on a.nobast=l.nobastlokasi where pengembangbast like '%$term%' or kelurahan like '%$term%' or alamataset like '%$term%' or volume like '%$term%' or deskripsi like '%$term%' or kategoriaset like '%$term%' or a.nobast like '%$term%'");

			                 }else


			                 $query = mysql_query("SELECT * FROM akun a inner join bast b on a.nobast=b.nobast inner join detaildokacuan d on b.nodokacuan=d.nodokacuan inner join dataaset s on a.idaset=s.idaset inner join peruntukan p on a.idperuntukan=p.idperuntukan inner join lokasidokumen l on a.nobast=l.nobastlokasi ");


			                 $no = 1;
			                 while ($data = mysql_fetch_array($query)) {
			                   ?>
			                     <tr>
			                       <td class="center"><?php echo $no; ?></td>
			                       <td class="left"><?php echo $data['nobast']; ?></td>
			                       <td class="left"><?php echo $data['tglbast']; ?></td>
			                       <td class="left"><?php echo $data['alamataset']; ?></td>
			                       <td class="left"><?php echo $data['kelurahan']; ?></td>
			                       <td class="left"><?php echo $data['kecamatan']; ?></td>
			                       <td class="left"><?php echo $data['wilayah']; ?></td>
			                       <td class="left"><?php echo $data['deskripsi']; ?></td>
			                       <td class="center"><?php echo $data['volume']; ?></td>
			                       <td class="center"><?php echo $data['satuan']; ?></td>
			                       <td class="left"><?php  print number_format  ($data['nilaimix'],2); ?></td>

			                       <td class="center"><a href="index.php?hal=entrybot&id=<?php echo $data['idperuntukan']; ?>" class="btn btn-info">Marking BOT/BTO</a></td>
			                     </tr>
			                   <?php
			                   $no++;
			                 }

			                 
			                 ?>

			               </table>
			               </div>
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