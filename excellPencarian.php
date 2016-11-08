<?php
session_start();
if(isset($_SESSION['query'])){
    /*******EDIT LINES 3-8*******/
    $DB_Server = "localhost"; //MySQL Server    
    $DB_Username = "ff2016_repo"; //MySQL Username     
    $DB_Password = "g4KhtXLJ";             //MySQL Password     
    $DB_DBName = "ff2016_repo";         //MySQL Database Name  
    // $DB_TBLName = "bast"; //MySQL Table Name   
    $filename = "hasil_pencarian";         //File Name
    /*******YOU DO NOT NEED TO EDIT ANYTHING BELOW THIS LINE*******/    
    //create MySQL connection   
    $sql = $_SESSION['query'];
    // echo "$sql<hr>";
    if($_SESSION['kategori']==2){
        $select="select bast.nobast, bast.tglbast, dokumenacuan.jenisdokumen, bast.nodokacuan, detaildokacuan.tgldokacuan, bast.pengembangbast, peruntukan.deskripsi, dataaset.alamataset, dataaset.kelurahan, dataaset.kecamatan, dataaset.wilayah, akun.kategoriaset, akun.volume, akun.satuan, akun.nilaimix, bast.keterangan 
            from bast inner join detaildokacuan on bast.nodokacuan=detaildokacuan.nodokacuan
            inner join dokumenacuan on detaildokacuan.idkategori=dokumenacuan.idkategori
            inner join dataaset on bast.nobast=dataaset.nobastaset
            inner join peruntukan on dataaset.idaset=peruntukan.idaset
            inner join akun on peruntukan.idperuntukan=akun.idperuntukan ";
        $sql=$select.substr($sql,342);
    }
    // else{
    //     $select=""
    //     $sql=substr($sql,342);
    // }
    // echo $sql;
    $Connect = @mysql_connect($DB_Server, $DB_Username, $DB_Password) or die("Couldn't connect to MySQL:<br>" . mysql_error() . "<br>" . mysql_errno());
    //select database   
    $Db = @mysql_select_db($DB_DBName, $Connect) or die("Couldn't select database:<br>" . mysql_error(). "<br>" . mysql_errno());   
    //execute query 
    $result = @mysql_query($sql,$Connect) or die("Couldn't execute query:<br>" . mysql_error(). "<br>" . mysql_errno());    
    $file_ending = "xls";
    //header info for browser
    header("Content-Type: application/xls");    
    header("Content-Disposition: attachment; filename=$filename.xls");  
    header("Pragma: no-cache"); 
    header("Expires: 0");
    /*******Start of Formatting for Excel*******/   
    //define separator (defines columns in excel & tabs in word)
    
    //start of printing column names as names of MySQL fields
    // for ($i = 0; $i < mysql_num_fields($result); $i++) {
    // echo mysql_field_name($result,$i) . "\t";
    // }

    $sep = "\t"; //tabbed character
    echo "No. \tNo. BAST \tTgl. BAST \tDasar BAST \tNo. Dokumen Acuan \tTgl. Acuan \tPengembang \tPeruntukan \tAlamat \tKelurahan \tKecamatan \tWilayah \tKIB \tVolume \tSatuan \tNilai Rupiah \tPenandatangan BAST";
    
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
                    // $dataKolom = preg_replace("/,/", '.', $dataKolom);
                    $schema_insert .= '"'.$dataKolom.'"'.$sep;
                }
                else
                    $schema_insert .= "".$sep;
            }
            $schema_insert = str_replace($sep."$", "", $schema_insert);
            // $schema_insert = trim(preg_replace('/\t+/', ' ', $schema_insert));
            $schema_insert = preg_replace("/\r\n|\n\r|\n|\r/", " ", $schema_insert);
            $schema_insert .= "\t";
            print(trim($schema_insert));
            print "\n";
            $no++;
        }   
}
?>