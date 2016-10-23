		<!-- PAGE RELATED PLUGIN(S) 
		<script src="..."></script>-->
		<script src="JS/plugin/chartjs/chart.min.js"></script><!-- NEW WIDGET START -->
<article class="col-sm-12 col-md-12 col-lg-6">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false">
		<!-- widget options:
		usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

		data-widget-colorbutton="false"
		data-widget-editbutton="false"
		data-widget-togglebutton="false"
		data-widget-deletebutton="false"
		data-widget-fullscreenbutton="false"
		data-widget-custombutton="false"
		data-widget-collapsed="true"
		data-widget-sortable="false"

		-->
		<header>
			<span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
			<h2>Resume Data</h2>

		</header>

		<!-- widget div-->
		<center>
		<div style="line-height: 20px; height: 250px; margin: 0; padding-top: 10px; padding-right: 10px; padding-left: 10px;border-width: 1px 1px 2px;border-style: solid;border-top: none;border-right-color: #CCC !important;border-bottom-color: #CCC !important;border-left-color: #CCC !important;">

			<?php
           $hasil1= mysql_query("select * from bast");
           $totalrowbast = mysql_num_rows($hasil1);

           $hasilnonsippt= mysql_query("select idkategori from bast b inner join detaildokacuan d on b.nodokacuan = d.nodokacuan where idkategori !='1'");
           $totalrowbastnonsippt = mysql_num_rows($hasilnonsippt);	

           $hasilsippt= mysql_query("select idkategori from bast b inner join detaildokacuan d on b.nodokacuan = d.nodokacuan where idkategori ='1'");
           $totalrowbastsippt = mysql_num_rows($hasilsippt);	


           $hasil2= mysql_query("select * from peruntukan where jenissertifikat='HGB'");
           $totalrowHGB = mysql_num_rows($hasil2);


           $hasil3= mysql_query("select * from peruntukan where jenissertifikat='SHM'");
           $totalrowSHM = mysql_num_rows($hasil3);

           $hasil4= mysql_query("select * from peruntukan where jenissertifikat like '%DKI%'");
           $totalrowDKI = mysql_num_rows($hasil4);

           $hasil5= mysql_query("select * from peruntukan where sertifikasi='Non-Sertifikat'");
           $totalrowNonSertifikat = mysql_num_rows($hasil5);

           $hasil6= mysql_query("select * from peruntukan where sertifikasi='Sertifikat'");
           $totalrowSertifikat = mysql_num_rows($hasil6);


           $hasil7= mysql_query("select * from bast where keterangan like '%nur%' or keterangan like '%Gub%'");
           $totalrowgubernur = mysql_num_rows($hasil7);

           $hasil8= mysql_query("select * from bast where keterangan like '%Wali%' or keterangan like '%kota%'");
           $totalrowwalikota = mysql_num_rows($hasil8);

           $hasil9= mysql_query("select * from bast where keterangan like '%lengkap%' or keterangan like '%Biro%'");
           $totalrowbiro = mysql_num_rows($hasil9);

           $hasil10= mysql_query("select * from bast where keterangan like '%Sek%' or keterangan like '%wilda%'");
           $totalrowsekwilda = mysql_num_rows($hasil10);

           $r=mysql_query("select sum(luas) as tot from peruntukan where jenis='Tanah'");
           $b=mysql_fetch_array($r);

           $m=mysql_query("select sum(luas) as totnon from peruntukan where jenis='Non-Tanah'");
           $n=mysql_fetch_array($m);

           ?>
           <table border="0">
            <tr>
              <td style="width:50%">Total BAST:</td>
              <td align="right" style="width:50%"><?php echo $totalrowbast; ?></td>
            </tr>
            <tr>
              <td>Total BAST  SIPPT:</td>
              <td align="right"><a href="bastsippt.php"><?php echo $totalrowbastsippt; ?></a></td>
            </tr>
            <tr>
              <td>Total BAST NON SIPPT:</td>
              <td align="right"><a href="bastnonsippt.php"><?php echo $totalrowbastnonsippt; ?></a></td>
            </tr>
            <tr>
              <td>Total BAST Gubernur:</td>
              <td align="right"><a href="bastgubernur.php"><?php echo $totalrowgubernur; ?></a></td>
            </tr>
            <tr>
              <td>Total BAST Walikota:</td>
              <td align="right"><a href="bastwalikota.php"><?php echo $totalrowwalikota; ?></a></td>
            </tr>
              <tr>
                <td>Total BAST Biro Perlengkapan:</td>
                <td align="right"><a href="bastbiro.php"><?php echo $totalrowbiro; ?></a></td>
              </tr>
              <tr>
                <td>Total BAST Sekwilda:</td>
                <td align="right"><a href="bastsekwilda.php"><?php echo $totalrowsekwilda; ?></a></td>
              </tr>
              <tr>
                <td>Total Luas Tanah:</td>
                <td align="right"><?php print number_format($b['tot'],2); ?> m2</td>
              </tr>
              <tr>
                <td>Total HGB:</td>
                <td align="right"><a href="hgb.php"><?php echo $totalrowHGB; ?></a></td>
              </tr>
              <tr>
                <td>Total SHM:</td>
                <td align="right"><a href="shm.php"><?php echo $totalrowSHM; ?></a></td>
              </tr>

              <tr>
                <td>Total SHP:</td>
                <td align="right"><a href="shp.php"><?php echo $totalrowDKI; ?></a></td>
              </tr>
              </table>
		</div>
		</center>
		<!-- end widget div -->

	</div>
	<!-- end widget -->

</article>
<!-- WIDGET END -->

<!-- NEW WIDGET START -->
<article class="col-sm-12 col-md-12 col-lg-6" style="z-index:1">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false">
		<!-- widget options:
		usage: <div class="jarviswidget" id="wid-id-0" data-widget-editbutton="false">

		data-widget-colorbutton="false"
		data-widget-editbutton="false"
		data-widget-togglebutton="false"
		data-widget-deletebutton="false"
		data-widget-fullscreenbutton="false"
		data-widget-custombutton="false"
		data-widget-collapsed="true"
		data-widget-sortable="false"

		-->
		<header>
			<span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
			<h2>Pie Chart Lokasi DTR </h2>

		</header>

		<!-- widget div-->
		<div style="height:250px">

			<!-- widget edit box -->
			<script type="text/javascript" src="JS/jscharts.js"></script>

              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">
              <center>
              <div id="graph">Loading...</div>
              </center>
              

			<!-- end widget content -->

		</div>
		<!-- end widget div -->

	</div>
	<!-- end widget -->

</article>
<!-- WIDGET END -->

<!-- NEW WIDGET START -->
<article class="col-sm-12 col-md-12 col-lg-12">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-2" data-widget-editbutton="false">
		
		<header>
			<span class="widget-icon"> <i class="fa fa-bar-chart-o"></i> </span>
			<h2>Grafik BAST Wilayah</h2>

		</header>

		<!-- widget div-->
		<div style="padding: 0 0 0;">

			<!-- widget edit box -->
	           
	           <center>
	           	<?php
	           	include "barChart.php";
	           	?>
	            
	         </center>

			<!-- end widget content -->

		</div>
		<!-- end widget div -->

	</div>
	<!-- end widget -->

</article>
<!-- WIDGET END -->
		<?php
			$query = mysql_query("select * from lokasidokumen ");
            $record = mysql_fetch_array($query);

            $irisanpulomas= mysql_query("select * from lokasidokumen where dtr ='1' and pulomas='1'");
            $jmlirpm = mysql_num_rows($irisanpulomas);

            $irisan129= mysql_query("select * from lokasidokumen where dtr ='1' and rekon129='1' ");
            $jmlir129 = mysql_num_rows($irisan129);

            $irisan54= mysql_query("select * from lokasidokumen where dtr ='1' and rekon54='1' ");
            $jmlir54 = mysql_num_rows($irisan54);

            $irisan101= mysql_query("select * from lokasidokumen where dtr ='1' and rekon101='1'");
            $jmlir101 = mysql_num_rows($irisan101);

            $irisan163= mysql_query("select * from lokasidokumen where dtr ='1' and rekon163='1'");
            $jmlir163 = mysql_num_rows($irisan163);

            $irisan58= mysql_query("select * from lokasidokumen where dtr ='1' and lokasi58='1' ");
            $jmlir58 = mysql_num_rows($irisan58);

            $tanpairisan= mysql_query("select * from lokasidokumen where dtr ='1' && pulomas='0' && rekon129='0' && rekon54='0' && rekon101='0' && rekon163='0' && lokasi58='0'");
            $jmldtr = mysql_num_rows($tanpairisan);
		?>

	    <script type="text/javascript">

	       var myChart = new JSChart('graph', 'pie');
	       myChart.setDataArray([['irisan pulomas',<?php echo $jmlirpm; ?>],['irisan 129', <?php echo $jmlir129; ?> ],['irisan 54', <?php echo $jmlir54; ?> ],['irisan 101',<?php echo $jmlir101; ?> ],['irisan 163', <?php echo $jmlir163; ?> ],['irisan lok.58', <?php echo $jmlir58; ?> ],['Tanpa Irisan', <?php echo $jmldtr; ?> ]]);
	       myChart.colorize(['#8B008B','#FFFF00','#0000FA','#F8CC00','#F89900','#00FF00','#FF0000']);
	       myChart.setSize(500, 208);
	       myChart.setTitle('Lokasi DTR');
	       myChart.setTitleFontFamily('Arial');
	       myChart.setTitleFontSize(11);
	       myChart.setTitleColor('#0F0F0F');
	       myChart.setPieRadius(90);
	       myChart.setPieValuesColor('#800000');
	       myChart.setPieValuesFontSize(10);
	       myChart.setPiePosition(150, 100);
	       myChart.setShowXValues(true);
	       myChart.setLegend('#8B008B', 'irisan pulomas');
	       myChart.setLegend('#FFFF00', 'irisan 129');
	       myChart.setLegend('#0000FA', 'irisan 54');
	       myChart.setLegend('#F8CC00', 'irisan 101');
	       myChart.setLegend('#F89900', 'irisan 163');
	       myChart.setLegend('#00FF00', 'irisan lok.58');
	       myChart.setLegend('#FF0000', 'Tanpa Irisan');
	       myChart.setLegendShow(true);
	       myChart.setLegendFontFamily('Arial');
	       myChart.setLegendFontSize(9);
	       myChart.setLegendPosition(350, 60);
	       myChart.setPieAngle(40);
	       myChart.set3D(true);
	       myChart.draw();

	     </script>