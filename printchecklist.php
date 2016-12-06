<?php
session_start();
require __DIR__ . '/vendor/autoload.php';

use Knp\Snappy\Pdf;
$bagianAtas=$_SESSION['SESS_JABATAN']." ".$_SESSION['SESS_WILAYAH'];
$bagianBawah=$_SESSION['SESS_FIRST_NAME']." ".$_SESSION['SESS_LAST_NAME'];
$snappy = new Pdf(__DIR__.'/vendor/h4cc/wkhtmltopdf-i386/bin/wkhtmltopdf-i386');
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="checklist.pdf"');
$server="http://$_SERVER[HTTP_HOST]";
$output=$server."/checklistprint.php?a=$bagianAtas&b=$bagianBawah&p=$_GET[p]&s=$_GET[s]&bast=$_GET[bast]&j=$_SESSION[SESS_JABATAN]";
// header("Location: $output");
echo $snappy->getOutput($output);


?>