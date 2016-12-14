
<div id='main' role='main'>
  <?php
    if(isset($_GET['e']))
    echo "
      <p class='alert alert-warning' style='margin-top:-50px;'>
        Mohon Lengkapi Dokumen
      </p>
    ";
  ?>
  <div class="modal-dialog demo-modal" style="width:70%;">
    <div class="modal-content">
    <?php
    $level=$_SESSION['SESS_LEVEL'];
      if($level=='1'){
    ?>
      <form action="" id="optional-form" method="post">
      <div class="modal-header">
        Jenis CheckList: &nbsp&nbsp
        <select name="optional" id="optional" class="btn btn-info">
          <option value="1" <?php echo ( $_POST['optional'] == '1' ? 'selected="selected"' : '' );?>>Tanah dan Konstruksi</option>
          <option value="2" <?php echo ( $_POST['optional'] == '2' ? 'selected="selected"' : '' );?>>Tanah saja</option>
          <option value="3" <?php echo ( $_POST['optional'] == '3' ? 'selected="selected"' : '' );?>>Konstruksi saja</option>
        </select>
      </div>
      </form>
      <?php
        }
      ?>
      <form action="checklistp.php" method="post">
      <input type="hidden" name="jenisInput" value="<?php if(isset($_POST['optional'])){ echo $_POST['optional'];} else if(isset($_GET['optional'])){ echo $_GET['optional'];}else{echo '1';}?>">
      <div class="modal-body smart-form" style="font-size: 15px;">
      <center>
      <table>
          <tr>
            <td align="center" colspan="3">
              <h3>
                <STRONG>
                  DOKUMEN ADMINISTRASI SEBAGAI LAMPIRAN</BR>
                  BERITA ACARA SERAH TERIMA
                </STRONG>
              </h3>
            </td>
          </tr>
          <tr>
            <td valign="top" width="25%">
              <h6>Yang Diserahkan</h6>
            </td>
            <td valign="top">
              <h6>:</h6>
            </td>
            <td width="73%">
              <h6>Tanah Kosong / Taman / Jalan / Saluran / Gedung / Bangunan Utilitas Umum - Sosial</h6>
            </td>
          </tr>
          <tr>
            <td valign="top">
              <h6>Nama Pengembang</h6>
            </td>
            <td valign="top">
              <h6>:</h6>
            </td>
            <td>
              <h6><?php echo $_GET['p']; ?></h6>
            </td>
          </tr>
          <tr>
            <td valign="top">
              <h6>Nomor SIPPT</h6>
            </td>
            <td valign="top">
              <h6>:</h6>
            </td>
            <td>
              <h6><?php echo $_GET['s']; ?></h6>
            </td>
          </tr>
          <tr>
            <td valign="top">
              <h6>Nomor BAST</h6>
            </td>
            <td valign="top">
              <h6>:</h6>
            </td>
            <td>
              <h6><?php echo $_GET['nobast']; ?></h6>
              <input type="hidden" name="nobast" value="<?php echo $_GET['nobast'];?>">
            </td>
          </tr>
          <tr>
            <td valign="top">
              <h6>Alamat</h6>
            </td>
            <td valign="top">
              <h6>:</h6>
            </td>
            <td>
              <h6>
                <?php 
                  $ala=0;
                  $nobast=$_GET['nobast']; 
                  $qalamat="select * from dataaset where nobastaset='$nobast'";
                  // echo "$qalamat";
                  $qalamat=mysql_query($qalamat);
                  while ($dalamat=mysql_fetch_array($qalamat)) 
                  {
                    $ala++;
                    if($ala>1)
                    {
                      echo "<br>";
                    }
                    echo "
                      $dalamat[alamataset], Kel. $dalamat[kelurahan], Kec. $dalamat[kecamatan], $dalamat[wilayah]. 
                    ";
                  }
                ?>
              </h6>
            </td>
          </tr>
        </table>
        <br>
      </center>
        <table class="table">
          <tr>
            <td><b>No.</b></td>
            <td><b>Nama Dokumen</b></td>
            <td><b>Keterangan</b></td>
            <td align="center"><b>Checklist</b></td>
          </tr>
          <?php
          

            $hiddenCode="";//untuk kasih tau form proses kalo datanya udah ada
            if(isset($_POST['optional']) || isset($_GET['optional']))
            {
              if (isset($_POST['optional'])) {
                $optional=$_POST['optional'];
              }else{
                $optional=$_GET['optional'];
              }
              if($optional=='1'){
                $optional='';
              }else if($optional=='2'){
                $optional=" where kodegroup!='B' ";
              }else if($optional=='3'){
                $optional=" where kodegroup!='A' ";
              }
            }else{
              $optional='';
            }
            $group[0]='A';
            $group[1]='B';
            $group[2]='C';
            $nogroup=0;
            $queryGroupCheckList=mysql_query("select * from checklistgroup $optional");
            while ($dataGroupCheckList=mysql_fetch_array($queryGroupCheckList)) 
            {

              echo"
                <tr>
                  <td colspan=4> 
                    <b>".$group[$nogroup].". $dataGroupCheckList[deskripsi]</b>
                  </td>
                </tr>
              ";
              $nogroup++;
              
              if($level=='1'){
                $jenisDokumen='walikota';
              }else if($level=='2'){
                $jenisDokumen='badanarsip';
              }else{
                $jenisDokumen='penerimaanaset';
              }
              $no=0;
              $queryCheckList=mysql_query("select * from checklist where idgroup='$dataGroupCheckList[kodegroup]'");
              while ($dataCheckList=mysql_fetch_array($queryCheckList)) 
              {
                $no++;

                if(isset($_GET['upd']))
                {
                  if($level=='1')
                  {
                    $usr='user1';
                  }else if($level=='2'){
                    $usr='user2';
                  }else{
                    $usr='user3';
                  }
                  $querySudah=mysql_query("select * from checklistdetail where nobast='$nobast' and idchecklist='$dataCheckList[idchecklist]'");
                  // echo"select * from checklistdetail where nobast='$nobast' and idchecklist='$dataCheckList[idchecklist]'<hr>";
                  $querySudah=mysql_fetch_array($querySudah);
                  $isiCheck="value='$querySudah[user1k]'";
                  $sudah=$querySudah[$usr];
                  if($sudah=='1')
                  {
                    if($level=='1'){
                      if($querySudah['user1k']!=''){
                        $sudah="checked onclick='return false;' onkeydown='e = e || window.event; if(e.keyCode !== 9) return false;'";
                      }else{
                        $sudah='';
                      }
                    }else{
                      $sudah="checked onclick='return false;' onkeydown='e = e || window.event; if(e.keyCode !== 9) return false;'";
                    }
                  }else{
                    $sudah='';
                  }
                }else{
                  $sudah="";//untuk isi input jika sudah ada input sebelumnya
                }

                  if($level!='1')
                  {
                    $queryDetail=mysql_query("select user1k from checklistdetail where idchecklist='$dataCheckList[idchecklist]' and nobast='$nobast'");
                    $queryDetail=mysql_fetch_array($queryDetail);
                    if($queryDetail['user1k']=='')
                    {
                      $rincian='-';
                    }else{
                      $rincian=$queryDetail['user1k'];
                    }
                echo"
                <tr>
                  <td>$no</td>
                  <td>$dataCheckList[ket]</td>
                  <td align='center'>$dataCheckList[$jenisDokumen]</td>
                  <td align='center'>
                    <label  class='col col-sm-12 col-md-12 col-lg-12 text-left'>
                      <input type='checkbox' $sudah readonly name='checklist$dataCheckList[idchecklist]' value='1' class='cbx' id='checkbox$dataCheckList[idchecklist]'>
                      $rincian
                    </label>
                  </td>
                </tr>
                ";
                  }else{
                echo"
                <tr>
                  <td>$no</td>
                  <td>$dataCheckList[ket]</td>
                  <td align='center'>$dataCheckList[$jenisDokumen]</td>
                  <td align='center'>
                    <div class='col col-sm-12 col-md-12 col-lg-12'>
                    <label class='col col-sm-1 col-md-1 col-lg-1'>
                      <input type='checkbox' $sudah readonly name='checklist$dataCheckList[idchecklist]' value='1' class='cbx' id='checkbox$dataCheckList[idchecklist]'>
                    </label>
                    <label class='col col-sm-10 col-md-10 col-lg-10'>
                      <input type='text' name='input$dataCheckList[idchecklist]'  id='input$dataCheckList[idchecklist]' $isiCheck>
                    </label>
                    </div>
                  </td>
                </tr>
                ";
                  }
              }
            }
          ?>
        </table>
      </div>
      <div class="modal-footer">
        <center>
        <button type="submit" class="btn btn-lg btn-default">
          Simpan
        </button>
        </center>
      </div>
      </form>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div>
<!-- END MAIN PANEL -->

<script type="text/javascript">
  
  $(function() {
    $("#optional").change(function(){
      $("#optional-form").submit();
    });
  <?php

if($level=='1')
{
  $queryGroupCheckList=mysql_query("select * from checklistgroup");
  while ($dataGroupCheckList=mysql_fetch_array($queryGroupCheckList)) 
  {
    $queryCheckList=mysql_query("select * from checklist where idgroup='$dataGroupCheckList[kodegroup]'");
    while ($dataCheckList=mysql_fetch_array($queryCheckList)) 
    {
      echo "
        $('#input$dataCheckList[idchecklist]').change(function(){
          if ($('#input$dataCheckList[idchecklist]').val()!='') {
            $('#checkbox$dataCheckList[idchecklist]').removeAttr('disabled');
            $('#checkbox$dataCheckList[idchecklist]').attr('checked', true);
          } else {
            $('#checkbox$dataCheckList[idchecklist]').attr('disabled', true);
            $('#checkbox$dataCheckList[idchecklist]').attr('checked', false);
          }
        });
      ";
    }
  }

  $queryGroupCheckList=mysql_query("select * from checklistgroup");
  while ($dataGroupCheckList=mysql_fetch_array($queryGroupCheckList)) 
  {
    $queryCheckList=mysql_query("select * from checklist where idgroup='$dataGroupCheckList[kodegroup]'");
    while ($dataCheckList=mysql_fetch_array($queryCheckList)) 
    {
      echo "
          if ($('#input$dataCheckList[idchecklist]').val()!='') {
            $('#checkbox$dataCheckList[idchecklist]').removeAttr('disabled');
            $('#checkbox$dataCheckList[idchecklist]').attr('checked', true);
          } else {
            $('#checkbox$dataCheckList[idchecklist]').attr('disabled', true);
          }
      ";
    }
  }
}
  ?>
  });



</script>