<?php
	if(isset($_POST['peruntukan'])){
  		function formatTahunBulanTanggal($tgl){
  			return substr($tgl,-4).'-'.substr($tgl,0,2).'-'.substr($tgl,3,2);
  		}
  		function jin_date_sql($date){
			$exp = explode('/',$date);
			if(count($exp) == 3) {
				$date = $exp[2].'-'.$exp[1].'-'.$exp[0];
			}
			return $date;
		}
		include "koneksi.php";
		$nobast=$_POST['nobast'];
		$cariTglBast=mysql_query("select tglbast from bast where nobast='$nobast'");
		$cariTglBast=mysql_fetch_array($cariTglBast);
		$tglsql=jin_date_sql($cariTglBast['tglbast']);
		foreach ($_POST['deskripsi'] as $key => $value) 
		{
			if($_POST['idaset'][$key]!='')
			{
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
				
				$idperuntukan=mysql_query("SELECT idperuntukan FROM `peruntukan` ORDER BY `idperuntukan` DESC");
				$idperuntukan=mysql_fetch_array($idperuntukan);
				$idperuntukan2=$idperuntukan['idperuntukan']+1;
				$queryInsertPeruntukan="
				INSERT INTO `peruntukan` 
				(`idperuntukan`, `deskripsi`, `jenis`,
				 `luas`, `nokrk`, `noimb`,
				 `noblokplan`, `sertifikasi`, `pemilik`,
				 `jenissertifikat`, `nosertifikat`, `masaberlaku`,
				 `luassertifikat`, `keterangan`, `nobast`,
				 `idaset`, `tglsertifikat`, `nosk`,
				 `tglsk`, `skpd`, `statussertifikat`,
				 `statusplang`, `statuspenggunaan`, `sensusfasos`,
				 `jenisfasos`, `statuslaporankeuangan`, `statusrecon`,
				 `nodokacuan`, `idkewajiban`) 
				 VALUES 
				 ('$idperuntukan2', '{$value}', '{$_POST['jenis'][$key]}',
				 '{$_POST['luas'][$key]}', '{$_POST['nokrk'][$key]}', '{$_POST['noimb'][$key]}',
				 '{$_POST['noblokplan'][$key]}', '-', '{$_POST['pemilik'][$key]}',
				 '-', '{$_POST['nosertifikat'][$key]}', '{$_POST['masaberlaku'][$key]}',
				 '{$_POST['luassertifikat'][$key]}', '{$_POST['keterangan'][$key]}', '{$nobast}',
				 '{$_POST['idaset'][$key]}', '{$tglsertifikat}', '{$_POST['nosk'][$key]}',
				 '$tglsk', '{$_POST['skpd'][$key]}', '{$_POST['statussertifikat'][$key]}',
				 '{$_POST['statusplang'][$key]}', '{$_POST['statuspenggunaan'][$key]}', '{$_POST['sensusfasos'][$key]}',
				 '{$_POST['jenisfasos'][$key]}', '{$_POST['statuslaporankeuangan'][$key]}', '{$_POST['statusrecon'][$key]}',
				 '{$_POST['nodokacuan'][$key]}', '{$_POST['idkewajiban'][$key]}')
				";
				
				
				$queryInsertAkun="
				INSERT INTO akun VALUES(
				'$idperuntukan2','$nobast','$tglsql',
				'{$_POST['idaset'][$key]}','{$_POST['kategori'][$key]}','{$_POST['luas'][$key]}',
				'{$_POST['satuan'][$key]}','{$_POST['nilainjop'][$key]}','{$_POST['nilaibast'][$key]}',
				'{$_POST['nilaimix'][$key]}','nilaiapp','{$_POST['jmlnjop'][$key]}',
				'0','{$_POST['ketakun'][$key]}','0',
				'0','0','0',
				'Tidak Ada Perubahan')
				";
				$sisaKewajiban=$_POST['kewajiban'][$key]-$_POST['luas'][$key];
				$queryUpdateKewajiban="Update kewajiban set pelunasan = '{$_POST['luas'][$key]}', luas='$sisaKewajiban' where idkewajiban='{$_POST['idkewajiban'][$key]}'";
				// echo "$queryInsertPeruntukan<br>$queryInsertAkun<br>$queryUpdateKewajiban<hr>";
				$queryInsertPeruntukan=mysql_query($queryInsertPeruntukan);
				$queryInsertAkun=mysql_query($queryInsertAkun);
				$queryUpdateKewajiban=mysql_query($queryUpdateKewajiban);
			}
		}
		//update total total di akun yang bast nya ini, per id aset
		$querySelectAset="select idaset from dataaset where nobastaset='$nobast'";
		// echo "<br> ->$querySelectAset <br>";
		$querySelectAset=mysql_query($querySelectAset);
		while ($dataAset=mysql_fetch_array($querySelectAset)) 
		{
			$querySelectAkun="select * from akun where idaset='$dataAset[idaset]'";
			// echo "<br> -> $querySelectAkun <br>";
			$querySelectAkun=mysql_query($querySelectAkun);
			$total=$total1=$total2=0;
			while ($dataAkun=mysql_fetch_array($querySelectAkun)) 
			{
				$total+=$dataAkun['nilainjop']*$dataAkun['volume'];
				$total1+=$dataAkun['nilaibast'];
				$total2+=$dataAkun['nilaimix'];
				// echo "$total-$total1-$total2<br>";
				$updateAkunAset="update akun set totnjop='$total', totbast='$total1', totmix='$total2' where idaset='$dataAset[idaset]'";
				// echo "<br> ->$updateAkunAset<br>";
				$updateAkunAset=mysql_query($updateAkunAset);
			}
		}
		header('Location: index.php?hal=tambahbast');
	}
?>

