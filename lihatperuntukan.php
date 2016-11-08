<link href="css/pagination.css" rel="stylesheet" type="text/css" />
<link href="css/B_blue.css" rel="stylesheet" type="text/css" />
<script type="text/javascript">
	function submit() {
	  document.getElementById("formperuntukan").submit();
	}
	$( function() {
    	$( "#tglsertifikat" ).datepicker();
    	$( "#tglsk" ).datepicker();
  	} );
</script>
<article class="col-sm-12 col-md-12 col-lg-12">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Lihat Data Peruntukan</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<form method="get" action="index.php?hal=lihatperuntukan" id="formperuntukan">
							<input type="hidden" name="hal" value="lihatperuntukan">
							
						      <div id="content" class="box">
						        
						          <?php
						          include("koneksi.php");
						          $queryperuntukan="select peruntukan.idperuntukan, peruntukan.deskripsi, peruntukan.jenis, peruntukan.luas, peruntukan.sertifikasi, peruntukan.pemilik, peruntukan.jenissertifikat, peruntukan.masaberlaku, peruntukan.keterangan as ket_peruntukan, peruntukan.statuslaporankeuangan, peruntukan.statusrecon, peruntukan.statussertifikat, peruntukan.nosertifikat, peruntukan.tglsertifikat, peruntukan.luassertifikat, peruntukan.statusplang, peruntukan.statuspenggunaan, peruntukan.nosk, peruntukan.tglsk, peruntukan.skpd, peruntukan.sensusfasos, peruntukan.jenisfasos, peruntukan.nodokacuan, peruntukan.nobast, peruntukan.idaset from peruntukan ";
						          $queryperuntukan=substr($queryperuntukan, 0, -16)." ,
						          bast.perihalbast, bast.tglbast, bast.pengembangbast, bast.keterangan as ket_bast, bast.kodearsip,
						          dokumenacuan.jenisdokumen,
						          dataaset.alamataset, dataaset.wilayah, dataaset.kecamatan, dataaset.kelurahan,
						          akun.kategoriaset
						          from peruntukan
						          inner join akun on peruntukan.idperuntukan=akun.idperuntukan inner join detaildokacuan on peruntukan.nodokacuan=detaildokacuan.nodokacuan inner join dokumenacuan on dokumenacuan.idkategori=detaildokacuan.idkategori inner join bast on peruntukan.nobast=bast.nobast inner join dataaset on dataaset.nobastaset=bast.nobast";
						          // echo "$queryperuntukan";
						          
if(isset($_GET['deskripsi'])){
		function formatTahunBulanTanggal($tgl){
  			return substr($tgl,-4).'-'.substr($tgl,0,2).'-'.substr($tgl,3,2);
  		}
$cek='0';
if($_GET['deskripsi']!=''){$deskripsi="peruntukan.deskripsi like '%$_GET[deskripsi]%'";$cek='1';}else{$deskripsi='';}
if($_GET['jenis']!=''){$jenis="peruntukan.jenis like '%$_GET[jenis]%'";if($cek!='0'){$jenis=' and '.$jenis;}$cek='1';}else{$jenis='';}
if($_GET['luas']!=''){$luas="peruntukan.luas like '%$_GET[luas]%'";if($cek!='0'){$luas=' and '.$luas;}$cek='1';}else{$luas='';}
if($_GET['sertifikasi']!=''){$sertifikasi="peruntukan.sertifikasi like '%$_GET[sertifikasi]%'";if($cek!='0'){$sertifikasi=' and '.$sertifikasi;}$cek='1';}else{$sertifikasi='';}
if($_GET['pemilik']!=''){$pemilik="peruntukan.pemilik like '%$_GET[pemilik]%'";if($cek!='0'){$pemilik=' and '.$pemilik;}$cek='1';}else{$pemilik='';}
if($_GET['jenissertifikat']!=''){$jenissertifikat="peruntukan.jenissertifikat like '%$_GET[jenissertifikat]%'";if($cek!='0'){$jenissertifikat=' and '.$jenissertifikat;}$cek='1';}else{$jenissertifikat='';}
if($_GET['masaberlaku']!=''){$masaberlaku="peruntukan.masaberlaku like '%$_GET[masaberlaku]%'";if($cek!='0'){$masaberlaku=' and '.$masaberlaku;}$cek='1';}else{$masaberlaku='';}
if($_GET['keterangan']!=''){$keterangan="peruntukan.keterangan like '%$_GET[keterangan]%'";if($cek!='0'){$keterangan=' and '.$keterangan;}$cek='1';}else{$keterangan='';}
if($_GET['statuslaporankeuangan']!=''){$statuslaporankeuangan="peruntukan.statuslaporankeuangan like '%$_GET[statuslaporankeuangan]%'";if($cek!='0'){$statuslaporankeuangan=' and '.$statuslaporankeuangan;}$cek='1';}else{$statuslaporankeuangan='';}
if($_GET['statusrecon']!=''){$statusrecon="peruntukan.statusrecon like '%$_GET[statusrecon]%'";if($cek!='0'){$statusrecon=' and '.$statusrecon;}$cek='1';}else{$statusrecon='';}
if($_GET['statussertifikat']!=''){$statussertifikat="peruntukan.statussertifikat like '%$_GET[statussertifikat]%'";if($cek!='0'){$statussertifikat=' and '.$statussertifikat;}$cek='1';}else{$statussertifikat='';}
if($_GET['nosertifikat']!=''){$nosertifikat="peruntukan.nosertifikat like '%$_GET[nosertifikat]%'";if($cek!='0'){$nosertifikat=' and '.$nosertifikat;}$cek='1';}else{$nosertifikat='';}
if($_GET['tglsertifikat']!=''){$tglsertifikat=formatTahunBulanTanggal($_GET['tglsertifikat']);$tglsertifikat="peruntukan.tglsertifikat like '%$tglsertifikat%'";if($cek!='0'){$tglsertifikat=' and '.$tglsertifikat;}$cek='1';}else{$tglsertifikat='';}
if($_GET['luassertifikat']!=''){$luassertifikat="peruntukan.luassertifikat like '%$_GET[luassertifikat]%'";if($cek!='0'){$luassertifikat=' and '.$luassertifikat;}$cek='1';}else{$luassertifikat='';}
if($_GET['statusplang']!=''){$statusplang="peruntukan.statusplang like '%$_GET[statusplang]%'";if($cek!='0'){$statusplang=' and '.$statusplang;}$cek='1';}else{$statusplang='';}

if($_GET['statuspenggunaan']!=''){$statuspenggunaan="peruntukan.statuspenggunaan like '%$_GET[statuspenggunaan]%'";if($cek!='0'){$statuspenggunaan=' and '.$statuspenggunaan;}$cek='1';}else{$statuspenggunaan='';}
if($_GET['nosk']!=''){$nosk="peruntukan.nosk like '%$_GET[nosk]%'";if($cek!='0'){$nosk=' and '.$nosk;}$cek='1';}else{$nosk='';}
if($_GET['tglsk']!=''){$tglsk=formatTahunBulanTanggal($_GET['tglsk']);$tglsk="tglsk like '%$tglsk%'";if($cek!='0'){$tglsk=' and '.$tglsk;}$cek='1';}else{$tglsk='';}
if($_GET['skpd']!=''){$skpd="peruntukan.skpd like '%$_GET[skpd]%'";if($cek!='0'){$skpd=' and '.$skpd;}$cek='1';}else{$skpd='';}
if($_GET['sensusfasos']!=''){$sensusfasos="peruntukan.sensusfasos like '%$_GET[sensusfasos]%'";if($cek!='0'){$sensusfasos=' and '.$sensusfasos;}$cek='1';}else{$sensusfasos='';}
if($_GET['jenisfasos']!=''){$jenisfasos="peruntukan.jenisfasos like '%$_GET[jenisfasos]%'";if($cek!='0'){$jenisfasos=' and '.$jenisfasos;}$cek='1';}else{$jenisfasos='';}
if($_GET['nodokacuan']!=''){$nodokacuan="peruntukan.nodokacuan like '%$_GET[nodokacuan]%'";if($cek!='0'){$nodokacuan=' and '.$nodokacuan;}$cek='1';}else{$nodokacuan='';}
if($_GET['nobast']!=''){$nobast="peruntukan.nobast like '%$_GET[nobast]%'";if($cek!='0'){$nobast=' and '.$nobast;}$cek='1';}else{$nobast='';}
// if($_GET['idaset']!=''){$idaset="peruntukan.idaset like '%$_GET[idaset]%'";if($cek!='0'){$idaset=' and '.$idaset;}$cek='1';}else{$idaset='';}
if($_GET['perihalbast']!=''){$perihalbast="bast.perihalbast like '%$_GET[perihalbast]%'";if($cek!='0'){$perihalbast=' and '.$perihalbast;}$cek='1';}else{$perihalbast='';}
if($_GET['tglbast']!=''){$tglbast="bast.tglbast like '%$_GET[tglbast]%'";if($cek!='0'){$tglbast=' and '.$tglbast;}$cek='1';}else{$tglbast='';}
if($_GET['pengembangbast']!=''){$pengembangbast="bast.pengembangbast like '%$_GET[pengembangbast]%'";if($cek!='0'){$pengembangbast=' and '.$pengembangbast;}$cek='1';}else{$pengembangbast='';}
if($_GET['keteranganbast']!=''){$keteranganbast="bast.keterangan like '%$_GET[keteranganbast]%'";if($cek!='0'){$keteranganbast=' and '.$keteranganbast;}$cek='1';}else{$keteranganbast='';}
if($_GET['kodearsip']!=''){$kodearsip="bast.kodearsip like '%$_GET[kodearsip]%'";if($cek!='0'){$kodearsip=' and '.$kodearsip;}$cek='1';}else{$kodearsip='';}
if($_GET['jenisdokumen']!=''){$jenisdokumen="dokumenacuan.jenisdokumen like '%$_GET[jenisdokumen]%'";if($cek!='0'){$jenisdokumen=' and '.$jenisdokumen;}$cek='1';}else{$jenisdokumen='';}
if($_GET['alamataset']!=''){$alamataset="dataaset.alamataset like '%$_GET[alamataset]%'";if($cek!='0'){$alamataset=' and '.$alamataset;}$cek='1';}else{$alamataset='';}
if($_GET['wilayah']!=''){$wilayah="dataaset.wilayah like '%$_GET[wilayah]%'";if($cek!='0'){$wilayah=' and '.$wilayah;}$cek='1';}else{$wilayah='';}
if($_GET['kecamatan']!=''){$kecamatan="dataaset.kecamatan like '%$_GET[kecamatan]%'";if($cek!='0'){$kecamatan=' and '.$kecamatan;}$cek='1';}else{$kecamatan='';}
if($_GET['kelurahan']!=''){$kelurahan="dataaset.kelurahan like '%$_GET[kelurahan]%'";if($cek!='0'){$kelurahan=' and '.$kelurahan;}$cek='1';}else{$kelurahan='';}
if($_GET['kategoriaset']!=''){$kategoriaset="akun.kategoriaset like '%$_GET[kategoriaset]%'";if($cek!='0'){$kategoriaset=' and '.$kategoriaset;}$cek='1';}else{$kategoriaset='';}


	$cekIsi="$deskripsi $jenis $luas $sertifikasi $pemilik $jenissertifikat $masaberlaku $keterangan $statuslaporankeuangan $statusrecon $statussertifikat $nosertifikat $tglsertifikat $luassertifikat $statusplang $statuspenggunaan $nosk $tglsk $skpd $sensusfasos $jenisfasos $nodokacuan $nobast $perihalbast $tglbast $pengembangbast $keteranganbast $jenisdokumen $alamataset $wilayah $kecamatan $kelurahan $kategoriaset";
	// $idaset 
	// echo $cekIsi."llol";
	
	if(trim($cekIsi)!='')//23 sps
	{
	  $queryperuntukan.=" where $cekIsi ";
	}
	// echo "$queryperuntukan";
}

						          $reclimit=20;
						          if(isset($_GET['page'])){
						            $offset=($_GET['page']-1)*$reclimit;
						          }else{
						            $offset=0;
						          }
						          if(empty($_GET)){
						            $qr='?';
						          }else{
						            $qr='&';
						          }
						          include ("pagination.php");
						          if(isset($_GET['page'])){
						            $plng=strlen($_GET['page']);
						            $pth=substr("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",0,strlen("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]")-(5+$plng));
						            $cp=$_GET['page'];
						          }else{
						            $pth="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]$qr";
						            $cp=1;
						          }
						          $limit=" LIMIT $offset, $reclimit";
						          $totalData=mysql_num_rows(mysql_query($queryperuntukan));
						          $page=ceil(mysql_num_rows(mysql_query($queryperuntukan))/$reclimit);
						          $qpaging=$queryperuntukan;
						          $_SESSION['query']=$queryperuntukan;
						          $queryperuntukan.=$limit;
						          // echo $queryperuntukan.'lal';

						          $no=$offset+1;
						          echo "<div class='col-md-12'>".pagination($qpaging,$reclimit,$cp,"$pth")."</div>";
									echo "<br><div class='col-md-12'> <b>*) $totalData Data ditemukan</b> </div>";


						          ?>
						          <!-- <div class="col col-2" style="float: right;">BELUM!!
					                <a href=excellPeruntukan.php target=_blank style='margin-left:20px;'><img alt=' ' height='20px' src='img/excell.png' border='0'>Buat File Excell</a> 
					             </div>
					             <div class="col col-2" style="float: right;">BELUM!!
					                <a href="snappy.php?q=<?php echo $qpaging; ?>" target=_blank style='margin-left:20px;'><img alt=' ' height='20px' src='img/pdf.png' border='0'>Buat File PDF</a> 
					              </div> -->
						        <div style="overflow:auto" class="col-md-12 col-sm-12 col-lg-12">

						          <table class="table table-striped table-hover">
						            
						            <tr>
						              <td><b>No.</b></td>
						              <td><b>Deskripsi</b></td>
						              <td><b>Jenis</b></td>
						              <td><b>Luas</b></td>
						              <td><b>Sertifikasi</b></td>
						              <td><b>Pemilik</b></td>
						              <td><b>Jenis Sertifikat</b></td>
						              <td><b>Masa Berlaku</b></td>
						              <td><b>Keterangan</b></td>
						              <td><b>Status Laporan Keuangan</b></td>
						              <td><b>Status Recon</b></td>
						              <td><b>Status Sertifikat</b></td>
						              <td><b>No. Sertifikat</b></td>
						              <td><b>Tgl. Sertifikat</b></td>
						              <td><b>Luas Sertifikat</b></td>
						              <td><b>Status Plang</b></td>
						              <td><b>Status Penggunaan</b></td>
						              <td><b>No. SK</b></td>
						              <td><b>Tgl. SK</b></td>
						              <td><b>SKPD</b></td>
						              <td><b>Sensus Fasos Fasum</b></td>
						              <td><b>Jenis Fasos Fasum</b></td>
						              <td><b>No. Dok. Acuan</b></td>
						              <td><b>No. Bast</b></td>
						              <td><b>Perihal BAST</b></td>
						              <td><b>Tgl. BAST</b></td>
						              <td><b>Pengembang BAST</b></td>
						              <td><b>Penandatangan BAST</b></td>
						              <td><b>Kode Arsip BAST</b></td>
						              <td><b>Jenis Dok. Acuan</b></td>
						              <!-- <td><b>ID Aset</b></td> -->
						              <td><b>Alamat Aset</b></td>
						              <td><b>Wilayah Aset</b></td>
						              <td><b>Kecamatan Aset</b></td>
						              <td><b>Kelurahan Aset</b></td>
						              <td><b>KIB</b></td>
						              <td><b>Act.</b></td>
						            </tr>
						            <tr>
						              <td><i class="fa fa-search"></i></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['deskripsi'])){echo $_GET['deskripsi'];} ?>" name="deskripsi" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['jenis'])){echo $_GET['jenis'];} ?>" name="jenis" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['luas'])){echo $_GET['luas'];} ?>" name="luas" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['sertifikasi'])){echo $_GET['sertifikasi'];} ?>" name="sertifikasi" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['pemilik'])){echo $_GET['pemilik'];} ?>" name="pemilik" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['jenissertifikat'])){echo $_GET['jenissertifikat'];} ?>" name="jenissertifikat" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['masaberlaku'])){echo $_GET['masaberlaku'];} ?>" name="masaberlaku" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['keterangan'])){echo $_GET['keterangan'];} ?>" name="keterangan" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['statuslaporankeuangan'])){echo $_GET['statuslaporankeuangan'];} ?>" name="statuslaporankeuangan" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['statusrecon'])){echo $_GET['statusrecon'];} ?>" name="statusrecon" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['statussertifikat'])){echo $_GET['statussertifikat'];} ?>" name="statussertifikat" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['nosertifikat'])){echo $_GET['nosertifikat'];} ?>" name="nosertifikat" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['tglsertifikat'])){echo $_GET['tglsertifikat'];} ?>" name="tglsertifikat" onchange="submit()" id="tglsertifikat"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['luassertifikat'])){echo $_GET['luassertifikat'];} ?>" name="luassertifikat" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['statusplang'])){echo $_GET['statusplang'];} ?>" name="statusplang" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['statuspenggunaan'])){echo $_GET['statuspenggunaan'];} ?>" name="statuspenggunaan" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['nosk'])){echo $_GET['nosk'];} ?>" name="nosk" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['tglsk'])){echo $_GET['tglsk'];} ?>" name="tglsk" onchange="submit()" id="tglsk"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['skpd'])){echo $_GET['skpd'];} ?>" name="skpd" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['sensusfasos'])){echo $_GET['sensusfasos'];} ?>" name="sensusfasos" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['jenisfasos'])){echo $_GET['jenisfasos'];} ?>" name="jenisfasos" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['nodokacuan'])){echo $_GET['nodokacuan'];} ?>" name="nodokacuan" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['nobast'])){echo $_GET['nobast'];} ?>" name="nobast" onchange="submit()"></label></td>
						              
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['perihalbast'])){echo $_GET['perihalbast'];} ?>" name="perihalbast" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['tglbast'])){echo $_GET['tglbast'];} ?>" name="tglbast" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['pengembangbast'])){echo $_GET['pengembangbast'];} ?>" name="pengembangbast" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['keteranganbast'])){echo $_GET['keteranganbast'];} ?>" name="keteranganbast" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['kodearsip'])){echo $_GET['kodearsip'];} ?>" name="kodearsip" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['jenisdokumen'])){echo $_GET['jenisdokumen'];} ?>" name="jenisdokumen" onchange="submit()"></label></td>
						              <!-- <td><label class='input'><input type="text" value="<?php //if(isset($_GET['idaset'])){echo $_GET['idaset'];} ?>" name="idaset" onchange="submit()"></label></td> -->
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['alamataset'])){echo $_GET['alamataset'];} ?>" name="alamataset" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['wilayah'])){echo $_GET['wilayah'];} ?>" name="wilayah" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['kecamatan'])){echo $_GET['kecamatan'];} ?>" name="kecamatan" onchange="submit()"></label></td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['kelurahan'])){echo $_GET['kelurahan'];} ?>" name="kelurahan" onchange="submit()"></label>
						              </td>
						              <td><label class='input'><input type="text" value="<?php if(isset($_GET['kategoriaset'])){echo $_GET['kategoriaset'];} ?>" name="kategoriaset" onchange="submit()"></label></td>
						              <td></td>
						            </tr>

						            <?php
						            $queryperuntukan=mysql_query($queryperuntukan);
						            while ($dataperuntukan=mysql_fetch_array($queryperuntukan)) {
						              echo "
						              <tr>
						                <td>$no</td>
						                <td>$dataperuntukan[deskripsi]</td>
						                <td>$dataperuntukan[jenis]</td>
						                <td>$dataperuntukan[luas]</td>
						                <td>$dataperuntukan[sertifikasi]</td>
						                <td>$dataperuntukan[pemilik]</td>
						                <td>$dataperuntukan[jenissertifikat]</td>
						                <td>$dataperuntukan[masaberlaku]</td>
						                <td>$dataperuntukan[ket_peruntukan]</td>
						                <td>$dataperuntukan[statuslaporankeuangan]</td>
						                <td>$dataperuntukan[statusrecon]</td>
						                <td>$dataperuntukan[statussertifikat]</td>
						                <td>$dataperuntukan[nosertifikat]</td>
						                <td>$dataperuntukan[tglsertifikat]</td>
						                <td>$dataperuntukan[luassertifikat]</td>
						                <td>$dataperuntukan[statusplang]</td>
						                <td>$dataperuntukan[statuspenggunaan]</td>
						                <td>$dataperuntukan[nosk]</td>
						                <td>$dataperuntukan[tglsk]</td>
						                <td>$dataperuntukan[skpd]</td>
						                <td>$dataperuntukan[sensusfasos]</td>
						                <td>$dataperuntukan[jenisfasos]</td>
						                <td>$dataperuntukan[nodokacuan]</td>
						                <td>$dataperuntukan[nobast]</td>
						                <td>$dataperuntukan[perihalbast]</td>
						                <td>$dataperuntukan[tglbast]</td>
						                <td>$dataperuntukan[pengembangbast]</td>
						                <td>$dataperuntukan[ket_bast]</td>
						                <td>$dataperuntukan[kodearsip]</td>
						                <td>$dataperuntukan[jenisdokumen]</td>
						                
						                <td>$dataperuntukan[alamataset]</td>
						                <td>$dataperuntukan[wilayah]</td>
						                <td>$dataperuntukan[kecamatan]</td>
						                <td>$dataperuntukan[kelurahan]</td>
						                <td>$dataperuntukan[kategoriaset]</td>
						                <td>
						              		<a href='index.php?hal=editperuntukan&idperuntukan=$dataperuntukan[idperuntukan]&p=lihatperuntukan' target='_blank'>
							              	ubah
							              	</a>
							            </td>
						              </tr>
						              ";
						              // bast.perihalbast, bast.tglbast, bast.pengembangbast, bast.keterangan, bast.kodearsip,
// 						          dokumenacuan.jenisdokumen,
// 						          dataaset.alamataset, dataaset.wilayah, dataaset.kecamatan, dataaset.kelurahan,
// 						          akun.kategoriaset
						              $no++;
						            }
						            ?>
						          </table>

						        </div>
						        <?php
									echo "<div class='col-md-12'> <b>*) $totalData Data ditemukan</b> </div>";
				                	echo "<div class='col-md-12'>".pagination($qpaging,$reclimit,$cp,"$pth")."</div>";
				                ?>
						      </div>
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