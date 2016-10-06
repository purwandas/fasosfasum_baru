<?php
	 include "koneksi.php";
	 $kec=$_GET['kec'];
	 $query = "SELECT * FROM kelurahan where namakecamatan='$kec'";
	 $hasil = mysql_query($query);
	 while ($data = mysql_fetch_array($hasil))
	 {
	    $output[]=$data['namakelurahan'];
	 }
	 echo json_encode($output);

?>