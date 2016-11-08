<!-- <script type="text/javascript" src="JS/jquery.min.js"></script> -->
<script type="text/javascript" src="JS/highcharts.js"></script>
<script type="text/javascript" src="JS/modules.data.js"></script>
<script type="text/javascript" src="JS/modules.drilldown.js"></script>

                <?php
                $query = mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast where wilayah='Jakarta Utara'");
              while ( $data = mysql_fetch_array($query)) {

                $hasil1= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data['wilayah']."'");
                $totalrowbast = mysql_num_rows($hasil1);

                $hasil2= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data['wilayah']."' && keterangan like '%nur%'");
                $totalrowgubernur = mysql_num_rows($hasil2);


                $hasil3= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data['wilayah']."' && keterangan like '%wali%'");
                $totalrowwalikota = mysql_num_rows($hasil3);

                $hasil4= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data['wilayah']."' && keterangan like '%lengkap%' ");
                $totalrowbiro = mysql_num_rows($hasil4);

              };

              $query2 = mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast where wilayah='Jakarta Selatan'");
              while ( $data2 = mysql_fetch_array($query2)) {

                $hasil12= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data2['wilayah']."'");
                $totalrowbast2 = mysql_num_rows($hasil12);

                $hasil22= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data2['wilayah']."' && keterangan like '%nur%'");
                $totalrowgubernur2 = mysql_num_rows($hasil22);


                $hasil32= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data2['wilayah']."' && keterangan like '%wali%'");
                $totalrowwalikota2 = mysql_num_rows($hasil32);

                $hasil42= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data2['wilayah']."' && keterangan like '%lengkap%' ");
                $totalrowbiro2 = mysql_num_rows($hasil42);

              }

              $query3 = mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast where wilayah='Jakarta Pusat'");
              while ( $data3 = mysql_fetch_array($query3)) {

                $hasil13= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data3['wilayah']."'");
                $totalrowbast3 = mysql_num_rows($hasil13);

                $hasil23= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data3['wilayah']."' && keterangan like '%nur%'");
                $totalrowgubernur3 = mysql_num_rows($hasil23);


                $hasil33= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data3['wilayah']."' && keterangan like '%wali%'");
                $totalrowwalikota3 = mysql_num_rows($hasil33);

                $hasil43= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data3['wilayah']."' && keterangan like '%lengkap%' ");
                $totalrowbiro3 = mysql_num_rows($hasil43);

              };

              $query4 = mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast where wilayah='Jakarta Barat'");
              while ( $data4 = mysql_fetch_array($query4)) {

                $hasil14= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data4['wilayah']."'");
                $totalrowbast4 = mysql_num_rows($hasil14);

                $hasil24= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data4['wilayah']."' && keterangan like '%nur%'");
                $totalrowgubernur4 = mysql_num_rows($hasil24);


                $hasil34= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data4['wilayah']."' && keterangan like '%wali%'");
                $totalrowwalikota4 = mysql_num_rows($hasil34);

                $hasil44= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data4['wilayah']."' && keterangan like '%lengkap%' ");
                $totalrowbiro4 = mysql_num_rows($hasil44);

              };

              $query5 = mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast where wilayah='Jakarta Timur'");
              while ( $data5 = mysql_fetch_array($query5)) {

                $hasil15= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data5['wilayah']."'");
                $totalrowbast5 = mysql_num_rows($hasil15);

                $hasil25= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data5['wilayah']."' && keterangan like '%nur%'");
                $totalrowgubernur5 = mysql_num_rows($hasil25);


                $hasil35= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data5['wilayah']."' && keterangan like '%wali%'");
                $totalrowwalikota5 = mysql_num_rows($hasil35);

                $hasil45= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data5['wilayah']."' && keterangan like '%lengkap%' ");
                $totalrowbiro5 = mysql_num_rows($hasil45);

              };

              $query6 = mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast where wilayah like '%seribu%'");
              while ( $data6 = mysql_fetch_array($query6)) {

                $hasil16= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data6['wilayah']."'");
                $totalrowbast6 = mysql_num_rows($hasil16);

                $hasil26= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data6['wilayah']."' && keterangan like '%nur%'");
                $totalrowgubernur6 = mysql_num_rows($hasil26);


                $hasil36= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data6['wilayah']."' && keterangan like '%wali%'");
                $totalrowwalikota6 = mysql_num_rows($hasil36);

                $hasil46= mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)a on a.nobastaset=b.nobast  where wilayah ='".$data6['wilayah']."' && keterangan like '%lengkap%' ");
                $totalrowbiro6 = mysql_num_rows($hasil46);

              };
              ?>

<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>


		<script type="text/javascript">
			$(function () {
    $('#container').highcharts({
        chart: {
            type: 'column'
        },
        title: {
            text: 'BAST PER-WILAYAH'
        },
        xAxis: {
            categories: [
                'Jakarta Utara',
                'Jakarta Selatan',
                'Jakarta Pusat',
                'Jakarta Barat',
                'Jakarta Timur',
                'Kepulauan Seribu'
            ],
            crosshair: true
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Jumlah BAST'
            }
        },
        tooltip: {
            headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
            pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                '<td style="padding:0"><b>{point.y:.1f} mm</b></td></tr>',
            footerFormat: '</table>',
            shared: true,
            useHTML: true
        },
        legend: {
          enabled: true
        },
        plotOptions: {
           
            series: {
              borderWidth: 0,
              dataLabels: {
                enabled: true,
                format: '{point.y:.1f}'
              }
            }
        },
        tooltip: {
          headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
          pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}</b> of total<br/>'
        },
        
        series: [
            <?php
                echo"
            {
            name: 'Total BAST',
            data: [$totalrowbast,$totalrowbast2,$totalrowbast3,$totalrowbast4,$totalrowbast5,$totalrowbast6]
            }, 
            {
            name: 'BAST Gubernur',
            data: [$totalrowgubernur,$totalrowgubernur2,$totalrowgubernur3,$totalrowgubernur4,$totalrowgubernur5,$totalrowgubernur6]
            }, 
            {
            name: 'BAST Walikota',
            data: [$totalrowwalikota,$totalrowwalikota2,$totalrowwalikota3,$totalrowwalikota4,$totalrowwalikota5,$totalrowwalikota6]
            }, 
            {
            name: 'BAST Biro',
            data: [$totalrowbiro,$totalrowbiro2,$totalrowbiro3,$totalrowbiro4,$totalrowbiro5,$totalrowbiro6]
            }
                ";
            ?>
        ]
    });
});

		</script>