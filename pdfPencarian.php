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

    $header="<div style=\"display:block;\">
  <div style=\"float:left; width:33%; text-align:left;\">
         Left Header Text
         <img src='img/kopdki.png' style='width:100%;'>
  </div>
  <div style=\"float:left; width:33%; text-align:center;\">
         Center Header Text
  </div>
  <div style=\"float:left; width:33%; text-align:right;\">
       Right Header Text
   </div>
   <br style=\"clear:left;\"/>
</div>";
    $footer="";
    // echo $header;
    require('php/phpToPDF.php');

    //Set Your Options -- see documentation for all options
    $pdf_options = array(
          "source_type" => 'url',
          "source" => 'http://rc-fasosfasum.klakklik.id/lihatperuntukan.php',
          "action" => 'save',
          "save_directory" => 'Downloads/',
          "page_orientation" => 'landscape',
          "page_size" => 'A4',
          "header" => $header,
          "footer" => $footer,
          "file_name" => 'url_google.pdf');

    //Code to generate PDF file from options above
    phptopdf($pdf_options);

}
?>