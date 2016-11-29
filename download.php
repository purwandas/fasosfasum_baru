<?php
if(isset($_GET['type'])&&isset($_GET['id'])){
	include 'config_dir.php';
	include 'koneksi.php';
	$field=$_GET['type'];
	$id=$_GET['id'];
	if($field=='a'){
		$field='idacuan';
	}else{
		$field='nobast';
	}
	$select="select * from upload where $field='$id'";
	$query=mysql_query($select);
	$data=mysql_fetch_array($query);
	$path = $data['path'];
	$file_name  = $data['nama_file'];
	$extention=explode(".",$file_name);
	if($extention['1']!="pdf"){
		echo"bukan file PDF".$extention['1'];
	}

	// $file_path  = $universal_path.$path.$file_name;
	$file_path  = $path.$file_name;
	$file=$file_path;
	
	if(file_exists($file)) {
		header('Content-Description: File Transfer');
		header('Content-Type: application/pdf');
		header('Content-Disposition: inline; filename='.basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		$file = @fopen($file_path,"rb");
		while(!feof($file))
		{
			print(@fread($file, 1024*8));
			ob_flush();
			flush();
		}
		exit;
	}
}
?>