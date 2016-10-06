<?php
include "koneksi.php";
$id = $_GET['id'];
$id2 = $_GET['id2'];

$query = mysql_query("delete from akun where idperuntukan='$id'") or die(mysql_error());

if ($query) {
    header("location:index.php?hal=akunshowdata&id=$id2");
}
?>