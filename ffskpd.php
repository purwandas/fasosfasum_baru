<article class="col-sm-12 col-md-12 col-lg-12">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Data Fasos Fasum vs SKPD
</h2>
<script language="JavaScript">

              function konfirmasi(){
               var pilihan = confirm("Are you sure want to delete this data ?");
               if(pilihan){
                return true
              }else{
                return false
              }
            }
          </script>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
						<section class="col col-sm-12 col-md-12 col-lg-12" style="font-size:16px;">
							
							<strong>Fasos Fasum yang telah masuk SKPD</strong>

						</section>
						
					</div>

					<div class="row" style="overflow:auto;">
						<section class="col col-sm-12 col-md-12 col-lg-12" >
							
							<table class="table-hover table-bordered table" cellpadding="5" cellspacing="5">

					            <thead>
					              <tr>
					                <td class="center">NO.</td>        	
					                <td class="center">ID</td>
					                <td class="center">NOBAST</td>
					                <td class="center">ALAMAT</td>
					                <td class="center">KELURAHAN</td>
					                <td class="center">KECAMATAN</td>
					                
					                <td class="center">PERUNTUKAN</td>
					                <td class="center">VOL FF</td>
					                <td class="center">NILAI FF</td>
					                <td class="center">PENGGUNA </td>
					                <td class="center">ALAMAT SKPD</td>
					                <td class="center">VOL SKPD</td>
					                <td class="center">NILAI SKPD</td>
					                <td class="center">Action</td>


					              </tr>
					            </thead>



					            
					            <?php
					            include "koneksi.php";

					            $query = mysql_query("SELECT * FROM skpd a inner join akun n on a.idperuntukan=n.idperuntukan inner join bast b on a.nobast=b.nobast  inner join dataaset s on a.idaset=s.idaset inner join peruntukan p on a.idperuntukan=p.idperuntukan  ");
					          

					            $no = 1;
					            while ($data = mysql_fetch_array($query)) {
					             ?>
					             <tbody>
					               <tr>
					                 <td class="center"><?php echo $no; ?></td>
					                 <td class="left"><?php echo $data['idperuntukan']; ?></td>
					                 <td class="left"><?php echo $data['nobast']; ?></td>
					                 <td class="left"><?php echo $data['alamataset']; ?></td>
					                 <td class="left"><?php echo $data['kelurahan']; ?></td>
					                 <td class="left"><?php echo $data['kecamatan']; ?></td>
					                 
					                 <td class="left"><?php echo $data['deskripsi']; ?></td>
					                 <td class="center"><?php echo $data['volume']; ?></td>
					                 
					                 <td class="left"><?php print number_format  ($data['nilaimix'],2); ?></td>

					                 <td class="center"><?php echo $data['pengguna']; ?></td>
					                 <td class="center"><?php echo $data['alamatskpd']; ?></td>
					                 <td class="center"><?php echo $data['luasskpd']; ?></td>
					                 <td class="left"><?php print number_format  ($data['nilaiskpd'],2);; ?></td>
					                 <td class="center">
					                 <!--<a href="#">Edit</a>.|.--><a href="skpdhapus.php?id=<?php echo $data['idperuntukan']; ?>" onClick="return konfirmasi()">Hapus</a><br>
					                 <!--<span style="font-size:10px;">note : edit belum bisa</span>-->
					                 </td>


					                 
					                 
					               </tr>
					             </tbody>
					             <?php
					             $no++;
					           }

					           
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