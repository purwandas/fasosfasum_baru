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

<article class="col-sm-12 col-md-12 col-lg-12">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-18" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>BOT vs SKPD</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
						<section class="col col-sm-12 col-md-12 col-lg-12" style="overflow:auto">
							<table class="table table-striped table-bordered table-hover" cellpadding="5" cellspacing="5">
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
				                <td class="center">ALAMAT BOT/BTO</td>
				                <td class="center">VOL BOT/BTO</td>
				                <td class="center">NILAI BOT/BTO</td>
				                <!-- <td class="center">Action</td> -->
				              </tr>
				            
				            <?php
				            $query = mysql_query("SELECT * FROM bot a inner join akun n on a.idperuntukan=n.idperuntukan inner join bast b on a.nobast=b.nobast  inner join dataaset s on a.idaset=s.idaset inner join peruntukan p on a.idperuntukan=p.idperuntukan  ");

				            $no = 1;
				            while ($data = mysql_fetch_array($query)) {
				             ?>
				               <tr>
				                 <td class="center"><?php echo $no; ?></td>
				                 <td class="left"><?php echo $data['idperuntukan']; ?></td>
				                 <td class="left"><?php echo $data['nobast']; ?></td>
				                 <td class="left"><?php echo $data['alamataset']; ?></td>
				                 <td class="left"><?php echo $data['kelurahan']; ?></td>
				                 <td class="left"><?php echo $data['kecamatan']; ?></td>
				                 <td class="left"><?php echo $data['deskripsi']; ?></td>
				                 <td class="center"><?php echo $data['volume']; ?></td>
				                 <td class="left"><?php  print number_format  ($data['nilaimix'],2); ?></td>
				                 <td class="center"><?php echo $data['pengguna']; ?></td>
				                 <td class="center"><?php echo $data['alamatbot']; ?></td>
				                 <td class="center"><?php echo $data['luasbot']; ?></td>
				                 <td class="left"><?php  print number_format  ($data['nilaibot'],2); ?></td>
				                 <!--<td class="center"><a href="#">Edit</a>.|.<a href="bothapus.php?id=<?php //echo $data['idperuntukan']; ?>
				                 <!--" onClick="return konfirmasi()">Hapus</a></td>-->
				               </tr>
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