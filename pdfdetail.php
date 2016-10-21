<?php
include "koneksi.php";
$id = $_GET['id'];

//Queri untuk Menampilkan data

	$query = "select deskripsi, jenis, luas, sertifikasi, pemilik, jenissertifikat, nosertifikat,luassertifikat, nosk, skpd,  tglsk, masaberlaku  from peruntukan where nobast='$id'";
    //deskripsi, jenis, luas, sertifikasi, pemilik, jenissertifikat, masaberlaku, keterangan, jenisfasos, statussertifikat, nosertifikat, tglsertifikat, luassertifikat, statusplang, statuspenggunaan, nosk, tglsk, skpd, sensusfasos
$db_query = mysql_query($query) or die("Query gagal");

$query2 = "select nobast, tglbast, pengembangbast, keterangan, nodokacuan from bast where nobast='$id'";
$db_query2 = mysql_query($query2) or die("Query gagal");


$query3= "select alamataset, kelurahan, kecamatan, wilayah from dataaset where nobastaset='$id'";
$db_query3 = mysql_query($query3) or die("Query gagal");

//Variabel untuk iterasi

$i = 0;

//Mengambil nilai dari query database

while($data=mysql_fetch_row($db_query))

 {

    $cell[$i][0] = $data[0];
    $cell[$i][1] = $data[1];
    $cell[$i][2] = $data[2];
    $cell[$i][3] = $data[3];
    $cell[$i][4] = $data[4];
    $cell[$i][5] = $data[5];
    $cell[$i][6] = $data[6];
    $cell[$i][7] = $data[7];
    $cell[$i][8] = $data[8];
    $cell[$i][9] = $data[9];
    $cell[$i][10] = $data[10];
    $cell[$i][11] = $data[11];
    // $cell[$i][12] = $data[12];
    // $cell[$i][13] = $data[13];
    // $cell[$i][14] = $data[14];
    // $cell[$i][15] = $data[15];
    // $cell[$i][16] = $data[16];
    // $cell[$i][17] = $data[17];
    // $cell[$i][18] = $data[18];
 $i++;

}

$k=42;
while($data2=mysql_fetch_row($db_query2))

 {

	$cell[$k][0] = $data2[0];
	$cell[$k][1] = $data2[1];
	$cell[$k][2] = $data2[2];
	$cell[$k][3] = $data2[3];
	$cell[$k][4] = $data2[4];
    
    
$k++;
}



$m=48;
while($data3=mysql_fetch_row($db_query3))

 {

	$cell[$m][0] = $data3[0];
	$cell[$m][1] = $data3[1];
	$cell[$m][2] = $data3[2];
	$cell[$m][3] = $data3[3];

    
    
$m++;
}




 require("fpdf17/fpdf.php");



class PDF extends FPDF

{

//Fungsi Untuk Membuat Header

function Header()

{
$this->Image('img/kopdki.png');
//Pilih font Arial bold 15

$this->SetFont('Arial','B',12);

 //Geser ke kanan

$this->Cell(80);

//Judul dalam bingkai

$this->Cell(30,10,'TEST',1,0,'C');

//Ganti baris

$this->Ln(1);

}



//Fungsi Untuk Membuat Footer

 function Footer()

{

 //Position at 1.5 cm from bottom

$this->SetY(-15);

//Arial italic 8

$this->SetFont('Arial','I',10);

//Page number

$this->Cell(0,27,'Halaman ke : '.$this->PageNo(),0,0,'C');

 }

}



$pdf = new PDF('L','cm','Legal');

 $pdf->Open();

$pdf->AddPage();

$pdf->setFillColor(222,222,222);

$pdf->Cell(18,1,'DATA BAST','LRTB',0,'C');
$pdf->Ln();

for($l=42;$l<$k;$l++)
{
$pdf->SetFont("Arial","B",10);
$pdf->Cell(8,1,'NO.BAST','LTB',0,'L');$pdf->Cell(10,1,$cell[$l][0],'LRTB',0,'L');
$pdf->Ln();
$pdf->Cell(8,1,'TGL.BAST','LTB',0,'L');$pdf->Cell(10,1,$cell[$l][1],'LRTB',0,'L');
$pdf->Ln();
$pdf->Cell(8,1,'PENGEMBANG','LTB',0,'L');$pdf->Cell(10,1,$cell[$l][2],'LRTB',0,'L');
$pdf->Ln();
$pdf->Cell(8,1,'KATEGORI','LTB',0,'L');$pdf->Cell(10,1,$cell[$l][3],'LRTB',0,'L');
$pdf->Ln();
$pdf->Cell(8,1,'NO.DOK.ACUAN','LTB',0,'L');$pdf->Cell(10,1,$cell[$l][4],'LRTB',0,'L');
$pdf->Ln();

}



$pdf->Ln();

$pdf->Cell(24,1,'ALAMAT ASET','LRTB',0,'C');
$pdf->Ln();


$pdf->SetFont("Arial","B",10);

$pdf->Cell(9,1,'Alamat','LTB',0,'C');
$pdf->Cell(5,1,'Kelurahan','LTB',0,'C');
$pdf->Cell(5,1,'Kecamatan','LTB',0,'C');
$pdf->Cell(5,1,'Wilayah','LTBR',0,'C');
$pdf->Ln();


for($n=48;$n<$m;$n++)
{

$pdf->Cell(9,1,$cell[$n][0],'LRTB',0,'L');
$pdf->Cell(5,1,$cell[$n][1],'LRTB',0,'C');
$pdf->Cell(5,1,$cell[$n][2],'LRTB',0,'C');
$pdf->Cell(5,1,$cell[$n][3],'LRTB',0,'C');
$pdf->Ln();
}


$pdf->Ln();

$pdf->Cell(33,1,'DATA PERUNTUKAN','LRTB',0,'C');
$pdf->Ln();

$pdf->SetFont('Arial','B',9);

$pdf->Cell(1,1,'No','LBTR',0,'C');
$pdf->Cell(7,1,'Peruntukan','LBTR',0,'C');
$pdf->Cell(2,1,'Jenis','LBTR',0,'C');
$pdf->Cell(2,1,'Luas','LBTR',0,'C');
$pdf->Cell(2.5,1,'Sertfikasi','LBTR',0,'C');
$pdf->Cell(2.5,1,'Pemilik','LBTR',0,'C');
$pdf->Cell(2,1,'Jns.Stfkt','LBTR',0,'C');
$pdf->Cell(2.5,1,'No.Stfkt','LBTR',0,'C');
$pdf->Cell(2,1,'LuasStfkt','LBTR',0,'C');
$pdf->Cell(2.5,1,'No. SK','LBTR',0,'C');
$pdf->Cell(2.5,1,'SKPD','LBTR',0,'C');
$pdf->Cell(2,1,'Tgl. SK','LBTR',0,'C');
$pdf->Cell(2.5,1,'Masa Berlaku','LBTR',0,'C');
// deskripsi, jenis, luas, sertifikasi, pemilik, jenissertifikat, nosertifikat, masaberlaku, luassertifikat, nosk, skpd
 $pdf->Ln();

$pdf->SetFont('Arial','',9);

for($j=0;$j<$i;$j++)

{

//menampilkan data dari hasil query database

    $pdf->Cell(1,1,$j+1,'LBTR',0,'C');
    $pdf->Cell(7,1,$cell[$j][0],'LBTR',0,'L');
    $pdf->Cell(2,1,$cell[$j][1],'LBTR',0,'L');
    $pdf->Cell(2,1,$cell[$j][2],'LBTR',0,'C');
    $pdf->Cell(2.5,1,$cell[$j][3],'LBTR',0,'C');
    $pdf->Cell(2.5,1,$cell[$j][4],'LBTR',0,'L');
    $pdf->Cell(2,1,$cell[$j][5],'LBTR',0,'C');
    $pdf->Cell(2.5,1,$cell[$j][6],'LBTR',0,'C');
    $pdf->Cell(2,1,$cell[$j][7],'LBTR',0,'C');
    $pdf->Cell(2.5,1,$cell[$j][8],'LBTR',0,'C');
    $pdf->Cell(2.5,1,$cell[$j][9],'LBTR',0,'C');
    $pdf->Cell(2,1,$cell[$j][10],'LBTR',0,'C');
    $pdf->Cell(2.5,1,$cell[$j][11],'LBTR',0,'C');

$pdf->Ln();

}

//menampilkan output berupa halaman PDF

$pdf->Output();

?>