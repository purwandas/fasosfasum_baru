<?php
require_once('auth.php');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="en" xml:lang="en">
<head>
  <title>Fasos Fasum BPKD DKI Jakarta</title>

  <link rel="stylesheet" type="text/css" href="view/stylesheet/stylesheet.css" />
  <link rel="stylesheet" type="text/css" href="view/javascript/jquery/ui/themes/ui-lightness/ui.all.css" />
  <script type="text/javascript" src="view/javascript/jquery/jquery-1.3.2.min.js"></script>
  <script type="text/javascript" src="view/javascript/jquery/ui/jquery-ui-1.8.9.custom.min.js"></script>
  <link rel="stylesheet" type="text/css" href="view/javascript/jquery/ui/themes/ui-lightness/jquery-ui-1.8.9.custom.css" />
  <script type="text/javascript" src="view/javascript/jquery/ui/ui.core.js"></script>
  <script type="text/javascript" src="view/javascript/jquery/superfish/js/superfish.js"></script>
  <script type="text/javascript" src="view/javascript/jquerytab.js"></script>
  <script type="text/javascript" src="view/javascript/jquery/ui/external/jquery.bgiframe-2.1.2.js"></script>

  <script type="text/javascript" src="view/javascript/jquery/superfish/js/superfish.js"></script>
  <script type="text/javascript">

  </script>
</head>
<body>
  <div id="container">
    <div id="header">
      <div class="div1">
        <div class="div2"><img src="view/image/logo.png" title="Administration" onclick="location = 'http://localhost/fasosfasum/'" /></div>
        <div class="div3"><img src="view/image/lock.png" alt="" style="position: relative; top: 3px;" />&nbsp;Welcome <?php echo $_SESSION['SESS_FIRST_NAME'];?>, you are logged in as <span>user</span></div>
      </div>


      <?php
        include("menu.php");
      ?>
</div>
<div id="content">
  <div class="breadcrumb">
    <a href="home.php">Home</a>

  </div>
  <div class="box">
    <div class="heading">
      <h1><img src="view/image/home.png" alt="" />Rekon Irisan </h1>
    </div>

    <div class="content">
      


      <div class="latest">
        <div class="dashboard-heading">BAST Rekon Irisan </div>
        <div class="dashboard-content">

          <table class="list" cellpadding="5" cellspacing="5">

            <thead>
              <tr>
                <td class="center">No.</td>        	
                <td class="center">No.BAST</td>
                <td class="center">Tgl.BAST</td>
                <td class="center">Pengembang</td>
                <td class="center">Wilayah</td>
                <td class="center">Rekon 163</td>
                <td class="center">Rekon 54</td>
                <td class="center">Rekon 129</td>
                <td class="center">Rekon 101</td>
                <td class="center">Action</td>
              </tr>
            </thead>



            
            <?php


            include "koneksi.php";

            $query = mysql_query("select * from bast b inner join (select distinct nobastaset, wilayah from dataaset)d on b.nobast=d.nobastaset inner join lokasidokumen l on b.nobast=l.nobastlokasi order by wilayah asc");

            $no = 1;
            while ($data = mysql_fetch_array($query)) {
             ?>
             <tbody>
               <tr>
                 <td class="center"><?php echo $no; ?></td>
                 <td class="left"><?php echo $data['nobast']; ?></td>
                 <td class="center"><?php echo $data['tglbast']; ?></td>
                 <td class="left"><?php echo $data['pengembangbast']; ?></td>
                 <td class="center"><?php echo $data['wilayah']; ?></td>
                 <td class="left"><?php echo $data['rekon163']; ?></td>
                 <td class="left"><?php echo $data['rekon54']; ?></td>
                 <td class="left"><?php echo $data['rekon129']; ?></td>
                 <td class="left"><?php echo $data['rekon101']; ?></td>
                 <td class="center"><a href="viewdetailbast.php?id=<?php echo $data['nobast']; ?>">view</a></td>
               </tr>
             </tbody>
             <?php
             $no++;
           }

           ?>


         </table>


       </div>
     </div>
   </div>

 </div>
</div>
<!--[if IE]>
<script type="text/javascript" src="view/javascript/jquery/flot/excanvas.js"></script>
<![endif]--> 

</div>
<div id="footer"><a href="http://www.dineshjay.co.id">dinesh consultant</a> &copy; 2009-2012 All Rights Reserved.<br />Version 1.0</div>
</body></html>