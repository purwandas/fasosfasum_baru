<?php
	if(isset($_POST['peruntukan'])){
		//nobast cari dari id aset
  		function formatTahunBulanTanggal($tgl){
  			return substr($tgl,-4).'-'.substr($tgl,0,2).'-'.substr($tgl,3,2);
  		}
  //tglsertifikat,tglsk
		include "koneksi.php";
		foreach ($_POST['deskripsi'] as $key => $value) {
			if($_POST['idaset'][$key]!=''){
				$idaset=$_POST['idaset'][$key];
				$queryBast="select nobastaset from dataaset where idaset='$idaset'";
				$queryBast=mysql_query($queryBast);
				$dataNoBast=mysql_fetch_array($queryBast);
				$nobast=$dataNoBast['nobastaset'];
			}else{
				$nobast='';
			}
			// echo $nobast."<br>";
			if(substr($_POST['tglsertifikat'][$key],2,1)=='/')
			{
				$tglsertifikat=formatTahunBulanTanggal($_POST['tglsertifikat'][$key]);
			}else
			{
				$tglsertifikat=$_POST['tglsertifikat'][$key];
			}
			if(substr($_POST['tglsk'][$key],2,1)=='/')
			{
				$tglsk=formatTahunBulanTanggal($_POST['tglsk'][$key]);
			}else
			{
				$tglsk=$_POST['tglsk'][$key];
			}
			$queryUpdatePeruntukan="update peruntukan set
				deskripsi='{$value}',nodokacuan='{$_POST['nodokacuan'][$key]}',jenisfasos='{$_POST['jenisfasos'][$key]}',
				idaset='{$_POST['idaset'][$key]}',jenis='{$_POST['jenis'][$key]}',luas='{$_POST['luas'][$key]}',
				pemilik='{$_POST['pemilik'][$key]}',nokrk='{$_POST['nokrk'][$key]}',noimb='{$_POST['noimb'][$key]}',noblokplan='{$_POST['noblokplan'][$key]}',
				masaberlaku='{$_POST['masaberlaku'][$key]}',
				keterangan='{$_POST['keterangan'][$key]}',statuslaporankeuangan='{$_POST['statuslaporankeuangan'][$key]}',
				statusrecon='{$_POST['statusrecon'][$key]}',statussertifikat='{$_POST['statussertifikat'][$key]}',
				nosertifikat='{$_POST['nosertifikat'][$key]}',
				tglsertifikat='{$tglsertifikat}',luassertifikat='{$_POST['luassertifikat'][$key]}',
				statusplang='{$_POST['statusplang'][$key]}',
				statuspenggunaan='{$_POST['statuspenggunaan'][$key]}',nosk='{$_POST['nosk'][$key]}',
				tglsk='{$tglsk}',
				skpd='{$_POST['skpd'][$key]}',sensusfasos='{$_POST['sensusfasos'][$key]}', nobast='{$nobast}'
				where idperuntukan='{$_POST['idperuntukan'][$key]}'";
				// sertifikasi='{$_POST['sertifikasi'][$key]}',
				// jenissertifikat='{$_POST['jenissertifikat'][$key]}',
			mysql_query($queryUpdatePeruntukan);
			// echo "$queryUpdatePeruntukan<br>";
				header('Location: index.php?hal=tambahbast');
		}
		// deskripsi
		// nodokacuan
		// idperuntukan
		// jenisfasos
		// idaset
		// jenis
		// luas
		// sertifikasi
		// pemilik
		// jenissertifikat
		// masaberlaku
		// keterangan
		// statuslaporankeuangan
		// statusrecon
		// statussertifikat
		// nosertifikat
		// tglsertifikat
		// luassertifikat
		// statusplang
		// statuspenggunaan
		// nosk
		// tglsk
		// skpd
		// sensusfasos

	}
?>