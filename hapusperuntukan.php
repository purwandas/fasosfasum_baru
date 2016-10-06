<?php
include('koneksi.php');
 
$idperuntukan = $_GET['idperuntukan'];
 
$query = mysql_query("update peruntukan set idaset='', nobast='' where idperuntukan='$idperuntukan'") or die(mysql_error());
// $query2 = mysql_query("select * from peruntukan where idperuntukan='$idperuntukan'") or die(mysql_error());
// $data = mysql_fetch_array($query2);

if ($query) {
	// echo"<script>alert('Data peruntukan dihilangkan dari BAST ini');</script>";
	header("location:index.php?hal=viewdetailbast&id=$_GET[id]");
    }
?>

