<link rel="stylesheet" type="text/css" href="view/stylesheet/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="view/javascript/jquery/ui/themes/ui-lightness/ui.all.css" />
<link rel="stylesheet" type="text/css" href="view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.9.custom.css" />


	<?php 
	include "koneksi.php";
	$id = $_GET['id'];
	$query = mysql_query("select * from bast b inner join detaildokacuan d on b.nodokacuan=d.nodokacuan inner join dataaset a on b.nobast=a.nobastaset where nobast='$id'") or die(mysql_error());
	$data = mysql_fetch_array($query);
	?>
 
  		<table>
		
		<tr>
		<td>No.BAST </td><td>: </td><td><?php echo $data['nobast']; ?></td></tr>

		<tr>
		<tr><td>Tgl. BAST </td><td>: </td><td><?php echo $data['tglbast']; ?></td>
		</tr>
                <tr>
		<td>Pengembang </td><td>: </td><td><?php echo $data['pengembangbast']; ?></td>
		</tr>
		<tr>
		<td>Perihal</td><td>:</td><td><?php echo $data['perihalbast']; ?></td> 
		</tr>
		<tr>
		<td>Kategori </td><td>:</td><td><?php echo $data['keterangan']; ?></td> 
		</tr>
		<tr>
		<td>Kode Arsip </td><td>: </td><td><?php echo $data['kodearsip']; ?></td>
		</tr>
		
		<tr>
		<td>Jenis Acuan </td><td>: </td><td><?php echo $data['idkategori']; ?></td>
		</tr>
		<tr>
		<td>No.Dok Acuan </td><td>: </td><td><?php echo $data['nodokacuan']; ?></td>
		</tr>
		<tr><td>Tgl.Dok Acuan </td><td>: </td><td><?php echo $data['tgldokacuan']; ?></td>
		</tr>
                <tr>
		<td>Pemegang</td><td>: </td><td><?php echo $data['pemegangdokacuan']; ?></td>
		</tr>
		<tr>
		<td>Perihal</td><td>:</td><td><?php echo $data['haldokacuan']; ?></td> 
		</tr>
		<tr>
		<td>Keterangan </td><td>:</td><td><?php echo $data['ketdokacuan']; ?></td> 
		</tr>
		


	<?php 
	include "koneksi.php";
	$id = $_GET['id'];
	$query3 = mysql_query("select * from dataaset where nobastaset='$id'") or die(mysql_error());
	while ($data3 = mysql_fetch_array($query3)){
	?>

          
            <tr>
              <td>Alamat lokasi</td><td>:</td><td><?php echo $data3['alamataset']; ?></td>
            </tr>
	    <tr>
	      <td>Wilayah</td><td>:</td><td><?php echo $data3['wilayah']; ?></td>
	    </tr>
	    <tr>
	      <td>Kecamatan</td><td>:</td><td><?php echo $data3['kecamatan']; ?></td>
	    </tr>
	    <tr>
	      <td>Kelurahan</td><td>:</td><td><?php echo $data3['kelurahan']; ?></td>
	    </tr>
	<?php
	}
	?>
	

	


           
    		<tr>
                <td class="center">No.</td>        	
                <td class="center">Peruntukan</td>
                <td class="center">Jenis</td>
        	<td class="center">Luas.BAST(m2)</td>
		<td class="center">No.KRK</td>
		<td class="center">No.IMB</td>
		<td class="center">No.BlokPlan</td>
		<td class="center">Sertifikasi</td>
                <td class="center">Pemilik</td>
        	<td class="center">Jns Sertifikat</td>
		<td class="center">No.Sertifikat</td>
		<td class="center">MasaBerlaku</td>
		<td class="center">Luas(Stfkt)</td>
		<td class="center">Keterangan</td>            
              	</tr>
           

	
            
	<?php 
	include "koneksi.php";
	$id = $_GET['id'];
	$query2 = mysql_query("select * from peruntukan where idaset='".$data3['idaset']."'") or die(mysql_error());
	
	$no = 1;
	while ($data2 = mysql_fetch_array($query2)){
	?>
	
	<input type="hidden" name="id" value="<?php echo $nobast; ?>"
    	<tr>
        	<td class="center"><?php echo $no; ?></td>
        	<td class="left"><?php echo $data2['deskripsi']; ?></td>
        	<td class="center"><?php echo $data2['jenis']; ?></td>
        	<td class="right"><?php echo $data2['luas']; ?></td>
		<td class="center"><?php echo $data2['nokrk']; ?></td>
		<td class="left"><?php echo $data2['noimb']; ?></td>
		<td class="left"><?php echo $data2['noblokplan']; ?></td>
		<td class="left"><?php echo $data2['sertifikasi']; ?></td>
        	<td class="left"><?php echo $data2['pemilik']; ?></td>
        	<td class="center"><?php echo $data2['jenissertifikat']; ?></td>
        	<td class="left"><?php echo $data2['nosertifikat']; ?></td>
		<td class="center"><?php echo $data2['masaberlaku']; ?></td>
		<td class="right"><?php echo $data2['luassertifikat']; ?></td>
		<td class="left"><?php echo $data2['keterangan']; ?></td>
	
	<?php
 	$no++;
	}
	?>
	</tr>
              
 

          </table>







