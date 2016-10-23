<?php

require __DIR__ . '/vendor/autoload.php';

use Knp\Snappy\Pdf;

// $snappy = new Pdf('/vendor/h4cc/wkhtmltopdf-i386/bin/wkhtmltopdf');

// // or you can do it in two steps
// $snappy = new Pdf();
// $snappy->setBinary('/vendor/h4cc/wkhtmltopdf-i386/bin/wkhtmltopdf');

// Display the resulting pdf in the browser
// by setting the Content-type header to pdf
// $snappy = new Pdf(__DIR__ . '/vendor/h4cc/wkhtmltopdf-i386/bin/wkhtmltopdf');
// $snappy = new Pdf('/usr/bin/wkhtmltopdf');
// $snappy = new Pdf('/vendor/h4cc/wkhtmltopdf-i386/bin/wkhtmltopdf');
// $snappy = new Pdf(__DIR__.'/vendor/h4cc/wkhtmltopdf-i386/bin/wkhtmltopdf');
$snappy = new Pdf(__DIR__.'/vendor/h4cc/wkhtmltopdf-i386/bin/wkhtmltopdf-i386');
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="file.pdf"');
echo $snappy->getOutput('http://fasosfasum.dev/pdfPencarian2.php?q='.$_GET['q'].'&k='.$_GET['k']);


// // Merge multiple urls into one pdf
// // by sending an array of urls to getOutput()
// $snappy = new Pdf('/vendor/h4cc/wkhtmltopdf-i386/bin/wkhtmltopdf');
// header('Content-Type: application/pdf');
// header('Content-Disposition: attachment; filename="file.pdf"');
// echo $snappy->getOutput(array('http://www.github.com','http://www.knplabs.com','http://www.php.net'));

// // .. or simply save the PDF to a file
// $snappy = new Pdf('/vendor/h4cc/wkhtmltopdf-i386/bin/wkhtmltopdf');
// $snappy->generateFromHtml('<h1>Bill</h1><p>You owe me money, dude.</p>', '/tmp/bill-123.pdf');

// // Pass options to snappy
// // Type wkhtmltopdf -H to see the list of options
// $snappy = new Pdf('/vendor/h4cc/wkhtmltopdf-i386/bin/wkhtmltopdf');
// $snappy->setOption('disable-javascript', true);
// $snappy->setOption('no-background', true);
// $snappy->setOption('allow', array('/path1', '/path2'));
// $snappy->setOption('cookie', array('key' => 'value', 'key2' => 'value2'));
// $snappy->setOption('cover', 'pathToCover.html');
// // .. or pass a cover as html
// $snappy->setOption('cover', '<h1>Bill cover</h1>');
// $snappy->setOption('toc', true);
// $snappy->setOption('cache-dir', '/path/to/cache/dir');

?>