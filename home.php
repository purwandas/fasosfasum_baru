<!-- NEW WIDGET START -->
<article class="col-sm-12 col-md-12 col-lg-6">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-3" data-widget-editbutton="false">
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
		<div>

			<table>
				<tr>
					<td style="width:100%">
						Total BAST:
					</td>
					<td style="width:100%">
						<a href='#'>1</a>
					</td>
				</tr>
				<tr>
					<td>
						Total BAST SIPPT:
					</td>
					<td>
						<a href='#'>2</a>
					</td>
				</tr>
				<tr>
					<td>
						Total BAST NON SIPPT:
					</td>
					<td>
						<a href='#'>3</a>
					</td>
				</tr>
				<tr>
					<td>
						Total BAST Gubernur:
					</td>
					<td>
						<a href='#'>4</a>
					</td>
				</tr>
				<tr>
					<td>
						Total BAST Walikota:
					</td>
					<td>
						<a href='#'>5</a>
					</td>
				</tr>
				<tr>
					<td>
						Total BAST Biro Perlengkapan:
					</td>
					<td>
						<a href='#'>6</a>
					</td>
				</tr>
				<tr>
					<td>
						Total BAST Sekwilda:
					</td>
					<td>
						<a href='#'>7</a>
					</td>
				</tr>
				<tr>
					<td>
						Total Luas Tanah:
					</td>
					<td>
						<a href='#'>8</a>
					</td>
				</tr>
				<tr>
					<td>
						Total HGB:
					</td>
					<td>
						<a href='#'>9</a>
					</td>
				</tr>
				<tr>
					<td>
						Total SHM:
					</td>
					<td>
						<a href='#'>10</a>
					</td>
				</tr>
				<tr>
					<td>
						Total SHP:
					</td>
					<td>
						<a href='#'>11</a>
					</td>
				</tr>
			</table>
		</div>
		<!-- end widget div -->

	</div>
	<!-- end widget -->

</article>
<!-- WIDGET END -->

<!-- NEW WIDGET START -->
<article class="col-sm-12 col-md-12 col-lg-6">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-2" data-widget-editbutton="false">
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
		<div>

			<!-- widget edit box -->
			<script type="text/javascript" src="js/jscharts.js"></script>

              <meta charset="utf-8">
              <meta name="viewport" content="width=device-width, initial-scale=1">

              <div id="graph">Loading...</div>

              

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

	    <script type="text/javascript">

	       var myChart = new JSChart('graph', 'pie');
	       myChart.setDataArray([['irisan pulomas',20],['irisan 129', 20 ],['irisan 54', 20 ],['irisan 101',20 ],['irisan 163', 20 ],['irisan lok.58', 20 ],['Tanpa Irisan', 20 ]]);
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