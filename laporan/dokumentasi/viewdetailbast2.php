
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en" xml:lang="en">
<head>
<title>Fasos Fasum BPKD DKI Jakarta</title>

<link rel="stylesheet" type="text/css" href="view/stylesheet/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="view/javascript/jquery/ui/themes/ui-lightness/ui.all.css" />
<script type="text/javascript" src="view/javascript/jquery/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="view/javascript/jquery/ui/jquery-ui-1.8.9.custom.min.js"></script>
<link rel="stylesheet" type="text/css" href="view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.9.custom.css" />
<script type="text/javascript" src="view/javascript/jquery/ui/ui.core.js"></script>
<script type="text/javascript" src="view/javascript/jquery/superfish/js/superfish.js"></script>
<script type="text/javascript" src="view/javascript/jquerytab.js"></script>
<script type="text/javascript" src="view/javascript/jquery/ui/external/jquery.bgiframe-2.1.2.js"></script>

<script type="text/javascript" src="view/javascript/jquery/superfish/js/superfish.js"></script>
<script type="text/javascript">

</script>
</head>
<body>
<div id="container">
<div id="header">
  <div class="div1">
    <div class="div2"><img src="view/image/logo.png" title="Administrator" onclick="location = 'http://localhost/fasosfasum/'" /></div>
        <div class="div3"><img src="view/image/lock.png" alt="" style="position: relative; top: 3px;" />&nbsp;You are logged in as <span>Administrator</span></div>
      </div>

    <div id="menu">
    <ul class="left" style="display: none;">
      <li id="dashboard"><a href="#" class="top">Entry SIPPT</a></li>
      <li id="catalog"><a class="top">Master Data</a>
        <ul>
          <li><a href="dokacuan.php">Dokumen Acuan BAST</a></li>
          <li><a href="#">Data Pengembang</a></li>

          <li><a class="parent">Atribut Alamat</a>
            <ul>
              <li><a href="#">Data Wilayah</a></li>
              <li><a href="kecamatan.php">Data Kecamatan</a></li>
	      <li><a href="kelurahan.php">Data Kelurahan</a></li>
            </ul>
          </li>

        </ul>
      </li>
      </li>



      <li id="reports"><a class="top">Dokumen Acuan</a>
        <ul>
          <li><a class="parent">SIPPT</a>
            <ul>
              <li><a href="entrysippt.php">Entry SIPPT</a></li>
              <li><a href="#">Edit SIPPT</a></li>
              <li><a href="#">Data SIPPT</a></li>

            </ul>
          </li>
          <li><a class="parent">Non SIPPT</a>
            <ul>
              <li><a href="#">Entry Non SIPPT</a></li>
              <li><a href="#">Edit Non SIPPT</a></li>
              <li><a href="#">Data Non SIPPT</a></li>
            </ul>
          </li>
          <li><a href="#">Semua Dokumen Acuan</a>
          </li>          
        </ul>
      </li>
 

      <li id="bast"><a class="top">BAST</a>
        <ul>
          <li><a href="entrybast.php">Entry BAST</a></li> 
          <li><a href="#">BAST Gubernur</a></li> 
	  <li><a href="#">BAST Walikota</a></li> 
          <li><a href="#">Semua BAST</a></li> 
                   
        </ul>
      </li>


      <li id="reports"><a class="top">Laporan</a>
        <ul>
          <li><a class="parent">Laporan BAST</a>
            <ul>
              <li><a href="#">Data BAST</a></li>
              <li><a href="#">Data Lokasi Aset</a></li>
              <li><a href="#">Data Kewajiban</a></li>

            </ul>
          </li>
          <li><a class="parent">Laporan SIPPT</a>
            <ul>
              <li><a href="#">Data SIPPT</a></li>
              <li><a href="#">Data Non SIPPT</a></li>
              <li><a href="#">Data Kewajiban</a></li>
            </ul>
          </li>
          <li><a href="#">SIPPT vs BAST</a>
          </li>          
        </ul>
      </li>

    </ul>

    <ul class="right">
      <li id="store"><a onClick="window.open('http://demo.opencart.com/');" class="top">Store Front</a>
        <ul>
        </ul>

      </li>
      <li id="store"><a class="top" href="http://demo.opencart.com/admin/index.php?route=common/logout&amp;token=f3971cf311161ee5d81f2c2c13145c39">Logout</a></li>
    </ul>


    <script type="text/javascript"><!--
$(document).ready(function() {
	$('#menu > ul').superfish({
		hoverClass	 : 'sfHover',
		pathClass	 : 'overideThisToUse',
		delay		 : 0,
		animation	 : {height: 'show'},
		speed		 : 'normal',
		autoArrows   : false,
		dropShadows  : false, 
		disableHI	 : false, /* set to true to disable hoverIntent detection */
		onInit		 : function(){},
		onBeforeShow : function(){},
		onShow		 : function(){},
		onHide		 : function(){}
	});
	
	$('#menu > ul').css('display', 'block');
});
 
function getURLVar(urlVarName) {
	var urlHalves = String(document.location).toLowerCase().split('?');
	var urlVarValue = '';
	
	if (urlHalves[1]) {
		var urlVars = urlHalves[1].split('&');

		for (var i = 0; i <= (urlVars.length); i++) {
			if (urlVars[i]) {
				var urlVarPair = urlVars[i].split('=');
				
				if (urlVarPair[0] && urlVarPair[0] == urlVarName.toLowerCase()) {
					urlVarValue = urlVarPair[1];
				}
			}
		}
	}
	
	return urlVarValue;
} 

$(document).ready(function() {
	route = getURLVar('route');
	
	if (!route) {
		$('#dashboard').addClass('selected');
	} else {
		part = route.split('/');
		
		url = part[0];
		
		if (part[1]) {
			url += '/' + part[1];
		}
		
		$('a[href*=\'' + url + '\']').parents('li[id]').addClass('selected');
	}
});



//--></script>
 
  </div>
  </div>


<div id="content">
  <div class="breadcrumb">
        <a href="index.php">Home</a>

      </div>

             <div class="box">
    <div class="heading">
      <h1><img src="view/image/home.png" alt="" />Detail Dokumen</h1>
<P align=right><span>
<a target="_blank" href="print.php" ></li>
<img alt=" " src="view/image/printer.gif" border=0></a>&nbsp;
<a target="_blank" href="print.php">
Print this page
</a></span>

<a target="_blank" href="../bast/contoh.pdf" ></li>
<img alt=" " src="view/image/order.png" border=0></a>&nbsp;
<a target="_blank" href="../bast/contoh.pdf">document attch

</a></span></P>







    </div>
    <div class="content">

	<?php 
	include "koneksi.php";
	$id = $_GET['id'];
	$query = mysql_query("select * from bast b inner join detaildokacuan d on b.nodokacuan=d.nodokacuan inner join dataaset a on b.nobast=a.nobastaset where nobast='$id'") or die(mysql_error());
	$data = mysql_fetch_array($query);
	?>

        <div class="statistic">
        <div class="dashboard-heading">Detail BAST</div>
        <div class="dashboard-content">
 
  		<table>
		<input type="hidden" name="id" value="<?php echo $nobast; ?>"
		<tr>
		<td>No.BAST </td><td>: </td><td><?php echo $data['nobast']; ?></td><td><a href="editbast.php?id=<?php echo $data['nobast']; ?>">[ Edit ]</a></td>

		</tr>
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
		</table>
        </div>
        </div>
	

      <div class="statistic">
        <div class="dashboard-heading">Detail Acuan</div>
        <div class="dashboard-content">
  		<table>
		<tr>
		<td>Jenis Acuan </td><td>: </td><td><?php echo $data['idkategori']; ?></td><td><a href="editsippt.php?nodokacuan=<?php echo $data['nodokacuan']; ?>">[ Edit ]</a></td>
		</tr>
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
		</table><br>
        </div>
        </div>



    <div class="latest">
        <div class="dashboard-heading">Detail Peruntukan</div>
        <div class="dashboard-content">

	<?php 
	include "koneksi.php";
	$id = $_GET['id'];
	$query3 = mysql_query("select * from dataaset where nobastaset='$id'") or die(mysql_error());
	while ($data3 = mysql_fetch_array($query3)){
	?>


          <table>
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


	<tr>
          <table class="list" cellpadding="5" cellspacing="5">
	   
            <thead>
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
		<td class="center">Action</td>
		
                
              	</tr>
            </thead>


	
            <tbody>
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
		<td class="center"><a href="editperuntukan.php?idperuntukan=<?php echo $data2['idperuntukan']; ?>">Edit</a></td>
		
	</tr>
	<?php
 	$no++;
	}
	?>
              </tbody>
          </table>


	</tr>

	<?php
 	
	}
	?>


          </table>







    </div>
    </div>


</div>


  </div>
</div>
<!--[if IE]>
<script type="text/javascript" src="view/javascript/jquery/flot/excanvas.js"></script>
<![endif]--> 

</div>
<div id="footer"><a href="http://www.dineshjay.co.id">dinesh consultant</a> &copy; 2009-2012 All Rights Reserved.<br />Version 1.0</div>
</body></html>