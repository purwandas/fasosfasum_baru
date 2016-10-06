<?php
ob_start();
    
include('laporan/pdfrekapjakpus.php');
    
$content = ob_get_clean();

    // convert to PDF
   
require_once('../fasosfasum/html2pdf/html2pdf.class.php');  
try
    
{
        

$html2pdf = new HTML2PDF('L', 'A4', 'fr', false, 'UTF-8',10);
    
$html2pdf->pdf->SetDisplayMode('fullpage');
        
$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        
$html2pdf->Output('rekapjakpus.pdf');
   
}
    
catch(HTML2PDF_exception $e) 
{
        
echo $e;
        
exit;
    
}
