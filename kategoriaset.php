 <?php
  if (isset($_POST['submit'])){

    $kategoriaset= $_POST['kategoriaset'];

    $deskripsikategori= $_POST['deskripsikategori'];

//simpan data ke database
    $query = mysql_query("insert into kategoriaset values('$kategoriaset', '$deskripsikategori')") or die(mysql_error());

    if ($query) {
     echo 'input kategori aset berhasil...........';

   }
 }
 
 ?>

<article class="col-sm-12 col-md-12 col-lg-6">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-0" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Kategori Aset</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<table class="table table-striped table-hover">
					           
					            <tr>
					              <td class="center">No.</td>        	
					              <td class="center">ID KATEGORI</td>
					              <td class="center">DESKRIPSI KATEGORI</td>
					              <td class="center">OPSI</td>
					            </tr>
					          
					          <?php
					          $query = mysql_query("select * from kategoriaset");

					          $no = 1;
					          while ($data = mysql_fetch_array($query)) {
					           ?>
					             <tr>
					               <td class="center"><?php echo $no; ?></td>
					               <td class="center"><?php echo $data['kategoriaset']; ?></td>
					               <td class="center"><?php echo $data['deskripsikategori']; ?></td>
					               <td class="center"><a href="kategoriasetDelete.php?kat=<?php echo $data["kategoriaset"];?>">Hapus</a></td></a></td>
					             </tr>
					           <?php
					           $no++;
					         }
					         ?>
					       </table>
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

<article class="col-sm-12 col-md-12 col-lg-6">

	<!-- Widget ID (each widget will need unique ID)-->
	<div class="jarviswidget jarviswidget-color-darken" id="wid-id-1" data-widget-editbutton="false" data-widget-colorbutton="false" data-widget-deletebutton="false">
	<header>
		<span class="widget-icon"> <i class="fa fa-file-text-o"></i></span>
		<h2>Kategori Aset</h2>
	</header>

		<!-- widget div-->
		<div class="smart-form">
			
			<div class="widget-body no-padding">
				<fieldset>
					<div class="row">
						<section class="col col-sm-12 col-md-12 col-lg-12">
							<form name="inputdokumenacuan" action="" method="post">
						      <table>
						        <tr>
						        	<td>Id Kategori</td>           
						          <td><input type="text" name="kategoriaset" maxlength="20" required="required"  /></td>
						        </tr>
						        <tr>
						         <td>Deskripsi Kategori </td>
						         <td><input type="text" name="deskripsikategori" maxlength="40" required="required" /></td>
						       </tr>
						       <tr>
						        <td><input type="submit" name="submit" value="Simpan"/> </td>
						      </tr>
						    </table>
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