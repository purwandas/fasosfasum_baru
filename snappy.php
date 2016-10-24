<?php

require __DIR__ . '/vendor/autoload.php';

use Knp\Snappy\Pdf;

// "http://$_SERVER[HTTP_HOST]/pdfPencarian2.php?q=".$_GET['q'].'&k='.$_GET['k']
$snappy = new Pdf(__DIR__.'/vendor/h4cc/wkhtmltopdf-i386/bin/wkhtmltopdf-i386');
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="file.pdf"');
$server="http://$_SERVER[HTTP_HOST]";
$output=$server."/pdfPencarian2.php?q=".$_GET['q']."&k=".$_GET['k'];
// header("Location: $output");
echo $snappy->getOutput($output);


?>