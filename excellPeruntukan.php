<?php
session_start();
if(isset($_SESSION['query'])){
    include "koneksi.php";     //MySQL Database Name  
    $filename = "data-peruntukan";         //File Name
    /*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/    
    //create MySQL connection   
    $sql = $_SESSION['query'];
    
    $result = mysql_query($sql) or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno());    
    $file_ending = "xls";
    //header info for browser
    header("Content-Type: application/xls");    
    header("Content-Disposition: attachment; filename=$filename.xls");  
    header("Pragma: no-cache"); 
    header("Expires: 0");
    /*******Start of Formatting for Excel*******/   
    //define separator (defines columns in excel & tabs in word)
    $sep = "\t"; //tabbed character
    echo "No. \t Deskripsi \t Jenis \t Luas \t Sertifikasi \t Pemilik \t Jenis Sertifikat \t Masa Berlaku \t Keterangan \t Status Laporan Keuangan \t Status Recon \t Status Sertifikat \t No. Sertifikat \t Tgl. Sertifikat \t Luas Sertifikat \t Status Plang \t Status Penggunaan \t No. SK \t Tgl. SK \t SKPD \t Sensus Fasos Fasum \t Jenis Fasos Fasum \t No. Dok. Acuan \t No. Bast \t Perihal BAST \t Tgl. BAST \t Pengembang BAST \t Penandatangan BAST \t Kode Arsip BAST \t Jenis Dok. Acuan \t Alamat Aset \t Wilayah Aset \t Kecamatan Aset \t Kelurahan Aset \t KIB";
    
    print("\n");    
        $no=1;
        while($row = mysql_fetch_row($result))
        {
            $schema_insert = "";
            echo $no."\t";
            for($j=0; $j<mysql_num_fields($result);$j++)
            {
                if(!isset($row[$j]))
                    $schema_insert .= "NULL".$sep;
                elseif ($row[$j] != "")
                {
                    $dataKolom = trim(preg_replace('/\t/', ' ', $row[$j]));
                    $schema_insert .= '"'.$dataKolom.'"'.$sep;
                }
                else
                    $schema_insert .= "".$sep;
            }
            $schema_insert = str_replace($sep."$", "", $schema_insert);
            $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
            $schema_insert .= "\t";
            print(trim($schema_insert));
            print "\n";
            $no++;
        }   
}
?>