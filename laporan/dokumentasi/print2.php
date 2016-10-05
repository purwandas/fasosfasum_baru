    <?php
    
	include "koneksi.php";
    
    $query ="select nobastaset,alamataset,kecamatan,kelurahan, wilayah from dataaset";
    $db_query = mysql_query($query) or die("Query gagal");

    
    $i = 0;

   
    while($data=mysql_fetch_row($db_query))
    {
    $cell[$i][0] = $data[0];
    $cell[$i][1] = $data[1];
    $cell[$i][2] = $data[2];
    $cell[$i][3] = $data[3];
    $cell[$i][4] = $data[4];
    $cell[$i][5] = $data[5];
    $i++;
    }

    require_once ("../fpdf17/fpdf.php");

    class PDF extends FPDF
    {
   
    function Header()
    {
    
    $this->SetFont('Times','B',14); 
  
    $this->SetFillColor(255,255,255);

    
    $this->SetTextColor(0,0,0);

   
    $this->Cell(19,1,'Data Pribadi','TBLR',0,'C',1);
    }
    }

    
    $pdf = new PDF('P','cm’,'A4');
    $pdf->Open();
    $pdf->AddPage();


    //Ln() = untuk pindah baris
    $pdf->Ln();
    $pdf->SetFont('Times','B',12);

    $pdf->Cell(1,1,'No','LRTB',0,'C');
    $pdf->Cell(3,1,'NoBast','LRTB’,0,'C');
    $pdf->Cell(4,1,'Alamat','LRTB’,0,'C');
    $pdf->Cell(5,1,'Kecamatan','LRTB',0,'C');
    $pdf->Cell(6,1,'Kelurahan','LRTB',0,'C');
    $pdf->Cell(6,1,'Wilayah','LRTB',0,'C');
    $pdf->Ln();

    $pdf->SetFont('Times','',10);
    for($j=0;$j<$i;$j++)
    {
    //menampilkan data dari hasil query database
    $pdf->Cell(1,1,$j+1,'LBTR',0,’C');
    $pdf->Cell(3,1,$cell[$j][0],'LBTR',0,’C');
    $pdf->Cell(4,1,$cell[$j][1],'LBTR',0,’C');
    $pdf->Cell(5,1,$cell[$j][2],'LBTR',0,’C');
    $pdf->Cell(6,1,$cell[$j][3],'LBTR',0,’C');
    $pdf->Cell(6,1,$cell[$j][4],'LBTR',0,’C');
    $pdf->Cell(6,1,$cell[$j][5],'LBTR',0,’C');
    $pdf->Ln();
    }

    //menampilkan output berupa halaman PDF
    $pdf->Output();
    ?>