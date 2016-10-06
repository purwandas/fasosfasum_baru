
<link href="css/pagination.css" rel="stylesheet" type="text/css" />
<link href="css/B_blue.css" rel="stylesheet" type="text/css" />

<style type="text/css">
	.data{
		float: right;
	}
	.term{
	}
	#closeButton{
		position:absolute;
		top:0;
		right:0;
		z-index: 1;
		cursor: pointer;
        cursor: hand;
	}
	#showButton{
		position:absolute;
		top:30px;
		left:0;
		z-index: 1;
		cursor: pointer;
        cursor: hand;
        transform: rotate(180deg);
        display: none;
	}
	#closeButton span, #showButton span{
		display: none;
	}
	#closeButton:hover span, #showButton:hover span{
		display: block;
		position: absolute;
		width: auto;
		height: auto;
		background-color: #404040;
		border-radius: 5px;
		color: white;
		z-index: 2;
	}
	#showButton:hover span{
        transform: rotate(180deg);
		right:33px;

	}
	.rowdata{
        cursor: pointer;
        cursor: hand;
    }
    .rowdetail{
        display: none;
    }
    .rowdata, .rowdetail{
		color: black;
    }
    .padding10{
    	padding: 10px;
    }
    .padding5{
    	padding: 5px;
    }
</style>
<script type="text/javascript">
	$(document).ready(function(){
        $(".rowdata").click(function(){
          $(this).closest('tr').next().toggle();
        });
        $("#thnsippt,#thnsippt2").change(function(){
          if($('#thnsippt').val()!='' && $('#thnsippt2').val()!=''){
            document.getElementById("formpencarian").submit();   
          }
        });
        $("#thnbast,#thnbast2").change(function(){
          if($('#thnbast').val()!='' && $('#thnbast2').val()!=''){
            document.getElementById("formpencarian").submit();   
          }
        });
        $("#thnpkk,#thnpkk2").change(function(){
          if($('#thnpkk').val()!='' && $('#thnpkk2').val()!=''){
            document.getElementById("formpencarian").submit();   
          }
        });
        $("#bthnsippt").click(function(){
          $("#thnsippt").empty();
          $("#thnsippt2").empty();
          $("#thnsippt").append("<option value='' > -pilih- </option>");
          $("#thnsippt2").append("<option value='' > -pilih- </option>");
          document.getElementById("formpencarian").submit();   
        });
        $("#bthnbast").click(function(){
          $("#thnbast").empty();
          $("#thnbast2").empty();
          $("#thnbast").append("<option value='' > -pilih- </option>");
          $("#thnbast2").append("<option value='' > -pilih- </option>");
          document.getElementById("formpencarian").submit();   
        });
        $("#bthnpkk").click(function(){
          $("#thnpkk").empty();
          $("#thnpkk2").empty();
          $("#thnpkk").append("<option value='' > -pilih- </option>");
          $("#thnpkk2").append("<option value='' > -pilih- </option>");
          document.getElementById("formpencarian").submit();   
        });

      });
	function submit() {
      document.getElementById("formpencarian").submit();
    }
	function closeFil() {
        document.getElementById("filter").style.display = "none";
        document.getElementById("data").style.width = "100%";
        document.getElementById("showButton").style.display = "block";
    }
      function showFil() {
        document.getElementById("filter").style.display = "block";
        document.getElementById("filter").style.width = "17%";
        document.getElementById("data").style.width = "83%";
        document.getElementById("showButton").style.display = "none";
      }
</script>
<form action="index.php?hal=pencarian" method="get" id="formpencarian">
<input type="hidden" name="hal" value="pencarian">
<!-- NEW WIDGET START -->
<article class="col-sm-12 col-md-12 col-lg-12 term">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false" data-widget-fullscreenbutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-search"></i> </span>
		<h2>Pencarian Data Fasos Fasum</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
						<section class="col col-2">
						<label class="select">
							<select name='kategori' onchange="submit()">
            <?php
            $query2c="";
            if(isset($_GET['kategori'])){
              if($_GET['kategori']=='dokacuan'){
                $note='Input Nomor Dok. Acuan atau Nama Pemegang Dok. atau Jenis Dok. Acuan';
                $query='select nodokacuan, tgldokacuan, haldokacuan, pemegangdokacuan, ketdokacuan, jenisdokumen from detaildokacuan inner join dokumenacuan on detaildokacuan.idkategori=dokumenacuan.idkategori ';
              }else{
                $note='Input Nomor Bast atau Nama Pengembang atau Jenis Dok. Acuan';
                $query="select bast.nobast, bast.keterangan, bast.tglbast, bast.pengembangbast, detaildokacuan.nodokacuan, detaildokacuan.pemegangdokacuan,dokumenacuan.jenisdokumen, detaildokacuan.tgldokacuan from bast inner join detaildokacuan on bast.nodokacuan=detaildokacuan.nodokacuan inner join dokumenacuan on detaildokacuan.idkategori=dokumenacuan.idkategori ";
              }
              echo"
              <option value='$_GET[kategori]'>
               -".strtoupper("$_GET[kategori]")."
             </option>
             ";
           }else{
                $note='Input Nomor Bast atau Nama Pengembang atau Jenis Dok. Acuan';
            $query="select bast.nobast, bast.keterangan, bast.tglbast, bast.pengembangbast, detaildokacuan.nodokacuan, detaildokacuan.pemegangdokacuan, dokumenacuan.jenisdokumen, detaildokacuan.tgldokacuan from bast inner join detaildokacuan on bast.nodokacuan=detaildokacuan.nodokacuan inner join dokumenacuan on detaildokacuan.idkategori=dokumenacuan.idkategori ";
          }
          ?>
								<option value="bast">BAST</option>
								<option value="aset">Aset</option>
								<option value="akun">Akun</option>
								<option value="dokacuan">Dokumen Acuan</option>
							</select> <i></i> </label>
						</section>
						<section class="col col-2">
							<label class="input"> <i class="icon-append fa fa-question-circle"></i>
								<input type="text" name="term" placeholder="Kata Pencarian" <?php if(isset($_GET['term'])){echo "value='".$_GET['term']."'";} ?>>
								<b class="tooltip tooltip-bottom-right">
								<i class="fa fa-warning txt-color-teal"></i> 
								<?php
									echo $note;
								?>
								</b> 
							</label>
						</section>
						<section class="col col-2">
							<label class="input"> 
								<button type="submit" class="btn btn-sm btn-primary">
									Cari
								</button>
							</label>
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

<!-- NEW WIDGET START -->
<article class="col-sm-12 col-md-12 col-lg-2 filter" id="filter">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">

		<!-- widget div-->
		<div class="smart-form" style="border-style: solid;border-top-color: #CCC !important;">
			<div id="closeButton" onclick="closeFil()" >
				<span>Sembunyikan Filter</span>
				<i class="icon-append fa fa-chevron-left"></i>
			</div>
			<div class="widget-body no-padding">
				<fieldset>
<?php

$submit=" onclick='submit()' ";
$submitch=" onchange='submit()' ";
$jmlFilter=0;
if(isset($_GET['kategori'])){
  $kategori=$_GET['kategori'];
}
else
{
  $kategori='bast';
}

$qr="select tabel, nama, `name`, ref_table, ref_field, ket, kategori from ref_master where kategori like '%$kategori%'";
				            // echo $qr;
$qfilter_m=mysql_query($qr);
$dan=0;
				            // $query='';
if(isset($_GET['term'])&&$_GET['term']!='')
{
  $term=$_GET['term'];
  $dan=1;
  $dan2=1;
  if($_GET['kategori']=='dokacuan')
  {
    $query.=" where (detaildokacuan.nodokacuan like '%$term%'  or detaildokacuan.pemegangdokacuan like '%$term%' or dokumenacuan.jenisdokumen  like '%$term%')";
    $filter[$jmlFilter]="Kata Pencarian";
    $jmlFilter++;
  }
  else
  {
    $query.=" where  (bast.nobast like '%$term%' or bast.pengembangbast like '%$term%' or dokumenacuan.jenisdokumen  like '%$term%')";
    $filter[$jmlFilter]="Kata Pencarian";
    $jmlFilter++;
  }
}

while ($dfilter_m=mysql_fetch_array($qfilter_m)) 
{

  if($dan==0)
  {
    $ope=" where ";
  }
  else
  {
    $ope=" and ";
  }

  echo"<hr /><b>$dfilter_m[nama]</b><br />";

  if($dfilter_m['ket']=='dataaset')
  {//beda tampiloan beda query
    $qfilter=mysql_query("select display, name from $dfilter_m[tabel]");
  }
  else if($dfilter_m['ket']=='tahun')
  {//beda tampilan beda query
    $qfilter=mysql_query("select name, display, ref_table, ref_field, clause from $dfilter_m[tabel] where kategori like '%$kategori%'");
  }
  else
  {
    $qfilter=mysql_query("select keyword, display, name from $dfilter_m[tabel]");
  }

  $dan2=0;
  
  while ($dfilter=mysql_fetch_array($qfilter)) 
  {

    if($dfilter_m['ket']=='dataaset')
    {//beda tampiloan beda query

      if(isset($_GET["$dfilter_m[name]$dfilter[name]"])&&$_GET["$dfilter_m[name]$dfilter[name]"]!="$dfilter_m[name]$dfilter[name]")
      {
        $wp=$_GET["$dfilter_m[name]$dfilter[name]"];
        if($dan2==0)
        {
          $dan=1;
          $dan2=1;
          $query.=" $ope ((nobast in (select nobastaset from $dfilter_m[ket] where $dfilter_m[name] like '%$wp%')))";
          $filter[$jmlFilter]="$dfilter_m[nama]";
          $jmlFilter++;
        }
        else
        {
          $query=substr($query,0,-2).") or (nobast in (select nobastaset from $dfilter_m[ket] where $dfilter_m[name] like '%$wp%')))";
          $filter[$jmlFilter]="$dfilter_m[nama]";
          $jmlFilter++;
        }
        $ck="checked";
        $dply="block";

      }
      else
      {
        $ck='';
        $dply="none";
      }
        echo"
          <style>
              #$dfilter_m[ref_table]$dfilter[name], #$dfilter_m[ref_field]$dfilter[name]{
            display:$dply;
          }
        </style>
        ";

        echo"
        <label>
          <input type='checkbox' $ck $submit name='$dfilter_m[name]$dfilter[name]'  id='$dfilter_m[name]$dfilter[name]' value='$dfilter[display]'> $dfilter[display]
        </label><br>
        "; 

        $tingkat2=mysql_query("select * from $dfilter_m[ref_table] where $dfilter_m[name] like '%$dfilter[display]%'");
        echo"
        <select $submitch name='$dfilter_m[ref_table]$dfilter[name]' id='$dfilter_m[ref_table]$dfilter[name]' style='width:90%'>
          ";
        
        if(isset($_GET["$dfilter_m[ref_table]$dfilter[name]"])&&$_GET["$dfilter_m[ref_table]$dfilter[name]"]!="$dfilter_m[ref_table]$dfilter[name]"&&$_GET["$dfilter_m[ref_table]$dfilter[name]"]!=""&&$ck=="checked")
        {
          $wp=$_GET["$dfilter_m[ref_table]$dfilter[name]"];
          $query=substr($query,0,-3)." and $dfilter_m[ket].$dfilter_m[ref_table] like '%$wp%')))";
          $ctingkat3="where nama$dfilter_m[ref_table] like '%$wp%'";
          echo"
          <option value='$wp'>
            $wp
          </option>
          ";
        }
        else
        {
          $ctingkat3="";
          echo"
          <option value=''>
            -Pilih ".ucwords($dfilter_m['ref_table'])."
          </option>
          ";
        }

          while($dting2=mysql_fetch_array($tingkat2)){
            $fieldnya="nama".$dfilter_m['ref_table'];
            echo"
            <option value='$dting2[$fieldnya]'>
              $dting2[$fieldnya]
            </option>
            ";
          }

          echo"
        </select>
        ";

          $tingkat3=mysql_query("select * from $dfilter_m[ref_field] $ctingkat3");
          echo"<select $submitch name='$dfilter_m[ref_field]$dfilter[name]' id='$dfilter_m[ref_field]$dfilter[name]' style='width:90%'>";
          
          if(isset($_GET["$dfilter_m[ref_field]$dfilter[name]"])&&$_GET["$dfilter_m[ref_field]$dfilter[name]"]!="$dfilter_m[ref_field]$dfilter[name]"&&$_GET["$dfilter_m[ref_field]$dfilter[name]"]!=""&&$ck=="checked")
          {
            $wp=$_GET["$dfilter_m[ref_field]$dfilter[name]"];
            $query=substr($query,0,-3)." and $dfilter_m[ket].$dfilter_m[ref_field] like '%$wp%')))";
            echo"
            <option value='$wp'>
              $wp
            </option>
            ";
            $filter[$jmlFilter]="$dfilter_m[nama]";
            $jmlFilter++;
          }else{
            echo"
            <option value=''>
              -Pilih ".ucwords($dfilter_m['ref_field'])."
            </option>
            ";
          }

          while($dting3=mysql_fetch_array($tingkat3)){
            $fieldnya="nama".$dfilter_m['ref_field'];
            echo"
            <option value='$dting3[$fieldnya]'>
              $dting3[$fieldnya]
            </option>
            ";
          }
          
          echo"
        </select>
        ";

      }
      else if($dfilter_m['ket']=='multi')
      {//sama tampilan beda query
        if(isset($_GET["$dfilter_m[name]$dfilter[name]"])){

          if($dfilter_m['kategori']=='dokacuan'){
            $wp=$_GET["$dfilter_m[name]$dfilter[name]"];

            if($dan2==0){
              $dan=1;
              $dan2=1;
              $query.="$ope (detaildokacuan.nodokacuan in (SELECT DISTINCT $dfilter_m[ref_table].nodokacuan FROM $dfilter_m[ref_table] WHERE nobast='' and ($dfilter_m[ref_table].$dfilter_m[ref_field] like '%$wp%')))";
              $filter[$jmlFilter]="$dfilter_m[nama]";
              $jmlFilter++;
            }else{
              $query=substr($query,0,-3)." or $dfilter_m[ref_table].$dfilter_m[ref_field] like '%$wp%')))";
              $filter[$jmlFilter]="$dfilter_m[nama]";
              $jmlFilter++;
            }

          }else{
            $wp=$_GET["$dfilter_m[name]$dfilter[name]"];

            if($dan2==0){
              $dan=1;
              $dan2=1;
              $query.="$ope (bast.nobast in (select DISTINCT $dfilter_m[ref_table].nobast from $dfilter_m[ref_table] where $dfilter_m[ref_table].$dfilter_m[ref_field] like '%$wp%'))";
              $filter[$jmlFilter]="$dfilter_m[nama]";
              $jmlFilter++;
            }else{
              $query=substr($query,0,-2)." or $dfilter_m[ref_table].$dfilter_m[ref_field] like '%$wp%'))";
              $filter[$jmlFilter]="$dfilter_m[nama]";
              $jmlFilter++;
            }
            
          }
          $ck="checked";
        }else{
          $ck='';
        }
        echo"
        <label>
          <input type='checkbox' $ck $submit name='$dfilter_m[name]$dfilter[name]' value='$dfilter[display]'> $dfilter[display]
        </label><br>
        "; 
      }
      else if($dfilter_m['ket']=='tahun')
      {//beda tampilan beda query
        if(isset($_GET["$dfilter_m[name]$dfilter[name]"])&&$_GET["$dfilter_m[name]$dfilter[name]"]!=''&&(isset($_GET["$dfilter_m[name]$dfilter[name]2"])&&$_GET["$dfilter_m[name]$dfilter[name]2"]!='')){
          if($dan2==0){
            $dan=1;
            $dan2=1;
            $ye1=$_GET["$dfilter_m[name]$dfilter[name]"];
            $ye2=$_GET["$dfilter_m[name]$dfilter[name]2"];
            $query.=" $ope ((year(STR_TO_DATE($dfilter[ref_table].$dfilter[ref_field], '%d/%m/%Y')) between '$ye1' and '$ye2') $dfilter[clause])";
            $filter[$jmlFilter]="$dfilter_m[nama] $dfilter[display]";
            $jmlFilter++;
          }else{
            $query=substr($query,0,-1)." or (year(STR_TO_DATE($dfilter[ref_table].$dfilter[ref_field], '%d/%m/%Y')) between '$ye1' and '$ye2') $dfilter[clause])";
            $filter[$jmlFilter]="$dfilter_m[nama] $dfilter[display]";
            $jmlFilter++;
          }
          $ck="checked";
        }else{
          $ck='';
        }
        echo "$dfilter[display]<br/>";
        echo"<select name=$dfilter_m[name]$dfilter[name] id=$dfilter_m[name]$dfilter[name]>";

        if(isset($_GET["$dfilter_m[name]$dfilter[name]"])&&$_GET["$dfilter_m[name]$dfilter[name]"]!=''){
          $ye=$_GET["$dfilter_m[name]$dfilter[name]"];
          echo"
          <option value='$ye'>$ye</option>
          ";
        }else{
          echo"
          <option value=''>-pilih-</option>
          ";
        }
        for($i=1980;$i<=date("Y");$i++){
          echo"
          <option value='$i'>$i</option>
          ";
        }
        echo"</select> s/d <select name=$dfilter_m[name]$dfilter[name]2 id=$dfilter_m[name]$dfilter[name]2>";
        if(isset($_GET["$dfilter_m[name]$dfilter[name]2"])&&$_GET["$dfilter_m[name]$dfilter[name]2"]!=''){
          $ye=$_GET["$dfilter_m[name]$dfilter[name]2"];
          echo"
          <option value='$ye'>$ye</option>
          ";
        }else{
          echo"
          <option value=''>-pilih-</option>
          ";
        }
        for($i=date("Y");$i>=1980;$i--){
          echo"
          <option value='$i'>$i</option>
          ";
        }
        echo"
      </select><br>
      ";
      echo "<div align='right'><button id='b$dfilter_m[name]$dfilter[name]' class='btn btn-default'>Clear</button></div>";

      }else{//ini normalnya
        if(isset($_GET["$dfilter_m[name]$dfilter[name]"])){
          $wp=$_GET["$dfilter_m[name]$dfilter[name]"];
          if($dan2==0){
            $dan=1;
            $dan2=1;
            $query.=" $ope ($dfilter_m[ref_table].$dfilter_m[ref_field] like '%$wp%')";
            $filter[$jmlFilter]="$dfilter_m[nama]";
            $jmlFilter++;
          }else{
            $query=substr($query,0,-1)." or $dfilter_m[ref_table].$dfilter_m[ref_field] like '%$wp%')";
            $filter[$jmlFilter]="$dfilter_m[nama]";
            $jmlFilter++;
          }
          $ck="checked";
        }else{
          $ck='';
        }
        echo"
        <label>
          <input type='checkbox' $ck $submit name='$dfilter_m[name]$dfilter[name]' value='$dfilter[keyword]'> $dfilter[display]
        </label><br>
        "; 
      }
    }
  }
?>
				</fieldset>
			</div>
		</div>
		<!-- end widget div -->

	</div>
	<!-- end widget -->

</article>
<!-- WIDGET END -->

<!-- NEW WIDGET START -->
<article class="col-sm-12 col-md-12 col-lg-10 data" id="data">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-2" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">

		<!-- widget div-->
		<div class="smart-form" style="border-style: solid;border-top-color: #CCC !important;">
			<div id="showButton" onclick="showFil()">
				<span>Tampilkan Filter</span>
				<i class="icon-append fa fa-chevron-left"></i>
			</div>
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
						<div>
							<section class="col col-2">
								<label class="select">
			<?php
				if(isset($_GET['order'])&&$_GET['order']!='')
                {
                  $order=$_GET['order'];
                  $disp='';
                  if($order=='nobast')
                  {
                    $order=' bast.nobast ';
                    $disp='No. BAST';
                  }
                  else if($order=='tglbast')
                  {
                    $order=" year(STR_TO_DATE(bast.tglbast,'%d/%m/%Y')) ";
                    $disp='Tgl. BAST';
                  }
                  else if($order=='nodokacuan')
                  {
                    $order=' detaildokacuan.nodokacuan ';
                    $disp='No. Dok. Acuan';
                  }
                  else
                  {
                    $order=" year(STR_TO_DATE(detaildokacuan.tgldokacuan,'%d/%m/%Y')) ";
                    $disp='Tgl. Dok. Acuan';
                  }
                  $order=" order by ".$order." asc";
                  if($_GET['kategori']=='dokacuan'&&!isset($_GET['doka'])&&($order=='nobast'||$order=='tglbast')){
                  	$order='';
                  	$disp=' Sort By -';
                  	echo "<input type='hidden' name='doka' value='1'>";
                  }
            echo"
            <select name='order' onchange='submit()'>
                  <option value='$order'>
                    -$disp
                  </option>
                  ";
                }
                else
                {
                  $order='';
                  echo"
                  <select name='order' onchange='submit()'>
                  <option value=''>
                    -Sort By-
                  </option>
                  ";
                }

                if(!isset($_GET['kategori'])||$_GET['kategori']!='dokacuan')
                {
                  echo"
                  <option value='nobast'>
                    No. BAST
                  </option>
                  <option value='tglbast'>
                    Tgl. BAST
                  </option>
                  ";
                }

                $reclimit=20;
                if(isset($_GET['page']))
                {
                  $offset=($_GET['page']-1)*$reclimit;
                }
                else
                {
                  $offset=0;
                }
                if(empty($_GET)){
                  $qr='?';
                }else{
                  $qr='&';
                }
                
                include ("pagination.php");
                
                if(isset($_GET['page']))
                {
                  $plng=strlen($_GET['page']);
                  $pth=substr("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]",0,strlen("http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]")-(5+$plng));
                  $cp=$_GET['page'];
                }
                else
                {
                  $pth="http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]$qr";
                  $cp=1;
                }

                $limit=" LIMIT $offset, $reclimit";
                $query.=$order;
                $_SESSION['query']=$query;
                $qpaging=$_SESSION['query'];
                $totalData=mysql_num_rows(mysql_query($qpaging));
                $page=ceil(mysql_num_rows(mysql_query($query))/$reclimit);
                $query.=$limit;
                $no=$offset+1;
                echo"
                <option value='nodokacuan'>
                  No. Dok. Acuan
                </option>
                <option value='tgldokacuan'>
                  Tgl. Dok. Acuan
                </option>
              </select> ";
              ?>

								</label>
							</section>
              <section class="col col-2">
                <a href=excellPencarian.php target=_blank style='margin-left:20px'><img alt=' ' src='img/excel.jpg' border='0'>Buat File Excell</a> 
              </section>
						</div>
						<br>
				<?php
					// echo "$query<--";
                    $qs=mysql_query($query);
                    $sudah="<i class='fa fa-check-circle' aria-hidden='true' style='color:green'></i>";
                    $belum="<i class='fa fa-times-circle' aria-hidden='true' style='color:red'></i>";
                    echo "<div align='right'>".pagination($qpaging,$reclimit,$cp,"$pth")."</div><br>";
				?>
						<div class="table-responsive" style="float:left;">
							<center>
				<?php
        // echo"ini<hr>";
        for($i=0;$i<$jmlFilter;$i++){
          // echo $filter[$i].", ";
        }
				// echo "<hr>$query->$totalData";
                if($totalData>0)
                {
                  echo"
                  <table class='table-hover table-bordered table' style='font-size: 120%;'>
                    ";
                    if(isset($_GET['kategori'])&&$_GET['kategori']=='dokacuan')
                    {
                      echo"
                        <tr>
                          <td class='text-center'><b>No.</b></td>
                          <td class='text-center'><b>No.Dok Acuan</b></td>
                          <td class='text-center'><b>Tgl. Dok Acuan</b></td>
                          <td class='text-center'><b>Perihal</b></td>
                          <td class='text-center'><b>Pemegang</b></td>

                          <td class='text-center'><b>Keterangan</b></td>
                          <td class='text-center'><b>Jenis Dok Acuan</b></td>
                        </tr>
                      ";
                    }
                    else
                    {
                      echo"
                        <tr>
                          <td class='text-center'><b>No.</b></td>
                          <td class='text-center'><b>No.BAST</b></td>
                          <td class='text-center'><b>Tgl.BAST</b></td>
                          <td class='text-center'><b>Pengembang</b></td>
                          <td class='text-center'><b>Dok Acuan</b></td>

                          <td class='text-center'><b>No.Dok Acuan</b></td>
                          <td class='text-center'><b>Pemegang SIPPT</b></td>
                          <td class='text-center'><b>Kategori BAST</b></td>
                          <td class='text-center'><b>Act.</b></td>
                        </tr>
                      ";
                    }
                    

                    while ($data=mysql_fetch_array($qs)) {

                      if(isset($_GET['kategori'])&&$_GET['kategori']=='dokacuan')
                      {
                      	if($no%2==0){
                        		$bgColor="warning";
                        	}else{
                        		$bgColor="";
                        	}
                        echo "
                        <tr class='rowdata $bgColor'>
                          <td class='text-center'>$no</td>
                          <td><a href='index.php?hal=bastbysippt&id=$data[nodokacuan]'>$data[nodokacuan]</a></td>
                          <td align='center'>$data[tgldokacuan]</td>
                          <td>$data[haldokacuan]</td>
                          <td align='center'>$data[pemegangdokacuan]</td>

                          <td>$data[ketdokacuan]</td>
                          <td align='center'>$data[jenisdokumen]</td>

                        </tr>
                        ";
                        $number=0;
                      $query2=mysql_query("select * from peruntukan where nodokacuan='$data[nodokacuan]'");//nobast='' and 
                      $mxrow=mysql_num_rows($query2);
                      if($mxrow>0){
                        echo"
                        <tr class='rowdetail'><td colspan=7><center>
                          List Kewajiban
                          <table class='table table-striped'>
                            <tr>
                              <td>
                                No.
                              </td>
                              <td>
                                Jenis Fasos Fasum
                              </td>
                              <td>
                                Deskripsi
                              </td>
                              <td>
                                Luas (m<sup>2</sup>)
                              </td>
                              <td align='center'>
                                Status Kewajiban
                              </td>
                            </tr>
                            ";
                          }
                          while ($data2=mysql_fetch_array($query2)) {
                            $number++;
                            if($data2['nobast']==''){
                              $sttskewajiban=$belum;
                            }else{
                              $sttskewajiban=$sudah;
                            }
                            echo "
                            <tr>
                              <td>$number</td>
                              <td>$data2[jenisfasos]</td>
                              <td>$data2[deskripsi]</td>
                              <td>$data2[luas]</td>
                              <td align='center'>$sttskewajiban</td>
                            </tr>
                            ";
                          }
                          if($mxrow>0){
                            echo"</table></center></td></tr>";
                          }
                        }
                        else
                        {
                        	if($no%2==0){
                        		$bgColor="warning";
                        	}else{
                        		$bgColor="";
                        	}
                          echo "
                          <tr class='rowdata $bgColor'>
                            <td class='text-center'>$no</td>
                            <td>$data[nobast]</td>
                            <td class='text-center'>$data[tglbast]</td>
                            <td>$data[pengembangbast]</td>
                            <td class='text-center'>$data[jenisdokumen]</td>

                            <td><a href='index.php?hal=bastbysippt&id=$data[nodokacuan]'>$data[nodokacuan]</a></td>
                            <td>$data[pemegangdokacuan]</td>
                            <td>$data[keterangan]</td>
                            <td class='text-center'><a href='index.php?hal=viewdetailbast&id=$data[nobast]'><img alt='Lihat Detail' src='img/viewdetail.gif' border=0></a></td>
                          </tr>
                          <tr class='rowdetail'>
                            <td colspan=9>
                              <center>
                                ";
                                $query2=mysql_query("select dataaset.idaset,dataaset.wilayah,dataaset.kecamatan,dataaset.kelurahan,detaildokacuan.tgldokacuan from bast inner join dataaset on bast.nobast=dataaset.nobastaset  inner join detaildokacuan on bast.nodokacuan=detaildokacuan.nodokacuan where bast.nobast='$data[nobast]'");
                                while ($data2=mysql_fetch_array($query2)) {      
                                  echo "
                                  <table border=1 style='border-collapse: collapse;' class='table table-striped'>
                                    <tr>
                                      <td colspan=9>
                                        <b>Wilayah</b>: $data2[wilayah], $data2[kecamatan], $data2[kelurahan]<br> <b>Tgl. Dokacuan</b>: $data2[tgldokacuan]
                                      </td>
                                    </tr>
                                    <tr>
                                      <td>No.</td>
                                      <td>Jenis Fasos Fasum</td>
                                      <td>Status Sertifikat<br>(SHP Pemprov)</td>
                                      <td>Status Penggunaan</td>
                                      <td>Status Plang</td>
                                      <td>Sensus Fasos Fasum</td>
                                      <td>Status Laporan Keuangan</td>
                                      <td>Status Recon</td>
                                      <td align='center'>KIB</td>
                                    </tr>
                                    ";
                                    $query3=mysql_query("select peruntukan.jenisfasos, peruntukan.statussertifikat, peruntukan.statuspenggunaan, peruntukan.statusplang, peruntukan.sensusfasos, peruntukan.statuslaporankeuangan, peruntukan.statusrecon, akun.kategoriaset from dataaset inner join peruntukan on dataaset.idaset=peruntukan.idaset inner join akun on peruntukan.idperuntukan=akun.idperuntukan where dataaset.idaset='$data2[idaset]'");
                                    $nomor=0;
                                    while ($data3=mysql_fetch_array($query3)) {
                                      if($data3['statussertifikat']=='SHP Pemprov. DKI Jakarta'){
                                        $statussertifikat=$sudah;
                                      }else{
                                        $statussertifikat=$belum;
                                      }
                                      if($data3['statusplang']=='Sudah'){
                                        $statusplang=$sudah;
                                      }else{
                                        $statusplang=$belum;
                                      }
                                      if($data3['sensusfasos']=='Telah dilakukan Sensus'){
                                        $sensusfasos=$sudah;
                                      }else{
                                        $sensusfasos=$belum;
                                      }
                                      if($data3['statuslaporankeuangan']=='Masuk Laporan Keuangan'){
                                        $statuslaporankeuangan=$sudah;
                                      }else{
                                        $statuslaporankeuangan=$belum;
                                      }
                                      if($data3['statusrecon']=='Sudah'){
                                        $statusrecon=$sudah;
                                      }else{
                                        $statusrecon=$belum;
                                      }
                                      $nomor++;
                                      echo "
                                      <tr>
                                        <td align='center'>$nomor</td>
                                        <td align='center'>$data3[jenisfasos]</td>
                                        <td align='center'>$statussertifikat</td>
                                        <td align='center'>$data3[statuspenggunaan]</td>
                                        <td align='center'>$statusplang</td>
                                        <td align='center'>$sensusfasos</td>
                                        <td align='center'>$statuslaporankeuangan</td>
                                        <td align='center'>$statusrecon</td>
                                        <td align='center'>".substr($data3['kategoriaset'],-1)."</td>
                                      </tr>
                                      ";
                                    }
                                    echo"
                                  </table>
                                  <hr/>
                                  ";
                                }
                                echo"
                              </center>
                            </td>
                          </tr>
                          ";
                        }
                        $no++;
                      }
                      echo"
                    </table>
                    ";
                  }
                  
                  ?>								
							</center>
						</div>
						<?php
							echo "<br><div align='left'> <b>*) $totalData Data ditemukan</b> </div>";
		                	echo "<div align='right'>".pagination($qpaging,$reclimit,$cp,"$pth")."</div>";
		                ?>
					</div>
				</fieldset>
			</div>
		</div>
		<!-- end widget div -->

	</div>
	<!-- end widget -->

</article>
<!-- WIDGET END -->
</form>


