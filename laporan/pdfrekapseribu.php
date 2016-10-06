<link rel="stylesheet" type="text/css" href="view/stylesheet/stylesheet.css" />
<link rel="stylesheet" type="text/css" href="view/javascript/jquery/ui/themes/ui-lightness/ui.all.css" />

<link rel="stylesheet" type="text/css" href="view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.9.custom.css" />

<body>
<page_footer>
<table style="width: 100%; border: solid 0.5px black;">
            
<tr>
                
<td style="text-align: left;    width: 50%">Arsip Fasos Fasum/PemanfaatanAset/BPKD/DKI</td>
                
<td style="text-align: right;    width: 50%">page [[page_cu]]/[[page_nb]]</td>
            </tr>
        
</table>
    
</page_footer>

<p><IMG SRC="view/image/kopdki.png" hspace=10 vspace=10 align=left border=2></p><br><br><br><br><br>
<div align="center" ><span style="font-size: 18px; font-weight: bold">REKAPITULASI DATA BAST KEPULAUAN SERIBU</span></div><br>

          <table class="list" align="center" cellpadding="5" cellspacing="5">

            <thead>
    		<tr bgcolor="yellow">
                <td class="center">No</td>    
		<td class="center">No.BAST</td>
		<td class="center">Tgl.BAST</td>
		<td class="center">Pengembang</td>
		<td class="center">Wilayah</td>    	
		<td class="center">Kategori</td>
		</tr>
            </thead>



	
<?php
mysql_connect("localhost","root","");
mysql_select_db("bpkd2012");
$query = mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast where wilayah='Kepulauan Seribu'");
	$no = 1;
	while ($data = mysql_fetch_array($query)) {
?>
	<tbody>            
    	<tr>
        	<td class="center"><?php echo $no; ?></td>
        	<td class="left"><?php echo $data['nobast']; ?></td>
        	<td class="center"><?php echo $data['tglbast']; ?></td>
        	<td class="left"><?php echo $data['pengembangbast']; ?></td>
		<td class="center"><?php echo $data['wilayah']; ?></td>
		<<td class="center"><?php echo $data['keterangan']; ?></td>
		
	</tr>
	</tbody>     
	<?php
 	$no++;
	}

	?>
          </table>




</body>
