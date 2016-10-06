<?php
	 include "koneksi.php";
	 $nama=$_GET['nama'];
	 $query = "SELECT * FROM kecamatan where wilayah='$nama'";
	 $hasil = mysql_query($query);
	 while ($data = mysql_fetch_array($hasil))
	 {
	    $output[]=$data['namakecamatan'];
	 }
	 echo json_encode($output);

?>