<?php

require __DIR__ . '/vendor/autoload.php';

use Knp\Snappy\Pdf;

$snappy = new Pdf(__DIR__.'/vendor/h4cc/wkhtmltopdf-i386/bin/wkhtmltopdf-i386');
header('Content-Type: application/pdf');
$server="http://$_SERVER[HTTP_HOST]";
$output=$server."/checklistprint.php";
// header("Location: $output");
echo $snappy->getOutput($output);


?>