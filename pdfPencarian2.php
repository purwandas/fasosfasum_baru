<?php
session_start();
if(isset($_SESSION['query'])){
    
    //create MySQL connection   
    $sql = $_SESSION['query'];
    if($_SESSION['kategori']==2){
        $select="select bast.nobast, bast.tglbast, dokumenacuan.jenisdokumen, bast.nodokacuan, detaildokacuan.tgldokacuan, bast.pengembangbast, peruntukan.deskripsi, dataaset.alamataset, dataaset.kelurahan, dataaset.kecamatan, dataaset.wilayah, akun.kategoriaset, akun.volume, akun.satuan, akun.nilaimix, bast.keterangan 
            from bast inner join detaildokacuan on bast.nodokacuan=detaildokacuan.nodokacuan
            inner join dokumenacuan on detaildokacuan.idkategori=dokumenacuan.idkategori
            inner join dataaset on bast.nobast=dataaset.nobastaset
            inner join peruntukan on dataaset.idaset=peruntukan.idaset
            inner join akun on peruntukan.idperuntukan=akun.idperuntukan ";
        $sql=$select.substr($sql,342);
    }

    include 'koneksi.php';  

    echo"
         <img src='img/kopdki.png' style='width:100%;'>
    ";

}
?>