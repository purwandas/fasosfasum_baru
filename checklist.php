<script type="text/javascript">
  $(document).ready(function(){
    $('#checklistSemua').change(function(){
      if($(this).is(":checked"))
      {
        $('.cbx').prop('checked',true);
      }else{
        $('.cbx').prop('checked',false);
      }
    });
  });
</script>

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
      <form action="checklistp.php" method="post">

      <div class="modal-header">
        <!-- <h4 class="modal-title">CheckList</h4> -->
      </div>
      <div class="modal-body smart-form" style="font-size: 15px;">
        <table class="table">
          <tr>
            <td><b>No.</b></td>
            <td><b>Nama Dokumen</b></td>
            <td><b>Keterangan</b></td>
            <td><b>Checklist</b></td>
          </tr>
          <?php
            $hiddenCode="";//untuk kasih tau form proses kalo datanya udah ada
            $sudah="";//untuk isi input jika sudah ada input sebelumnya
            $queryGroupCheckList=mysql_query("select * from checklistgroup");
            while ($dataGroupCheckList=mysql_fetch_array($queryGroupCheckList)) 
            {
              echo"
                <tr>
                  <td colspan=4> 
                    <b>$dataGroupCheckList[kodegroup]. $dataGroupCheckList[deskripsi]</b>
                  </td>
                </tr>
              ";
              $no=0;
              $queryCheckList=mysql_query("select * from checklist where idgroup='$dataGroupCheckList[kodegroup]'");
              if($_SESSION['SESS_LEVEL']=='1')
              {
                $jenisDokumen='walikota';
                if(isset($_GET['nobast']))
                $nobast="<input type='hidden' name='nobast' value='$_GET[nobast]'>";
              }
              else if($_SESSION['SESS_LEVEL']=='2')
              {
                $jenisDokumen='badanarsip';
                $nobast="<input type='hidden' name='nobast' value='$_GET[nobast]'>";
              }else{
                $jenisDokumen='penerimaanaset';
                $nobast="<input type='hidden' name='nobast' value='$_GET[nobast]'>";
              }
              while ($dataCheckList=mysql_fetch_array($queryCheckList)) 
              {
                $no++;
                echo"
                <tr>
                  <td>$no</td>
                  <td>$dataCheckList[ket]</td>
                  <td align='center'>$dataCheckList[$jenisDokumen]</td>
                  <td align='center'>
                    <label>
                      <input type='checkbox' $sudah name='checklist$dataCheckList[idchecklist]' value='1' class='cbx'>
                    </label>
                  </td>
                </tr>
                ";
              }
            }
          ?>
        </table>
      </div>
      <div class="modal-footer">
        <label align="right">
           <input type='checkbox' name='checklistSemua' id='checklistSemua' value='1'> Check Semua?
        </label>
        <center>
        <?php
        if(isset($nobast))
        {
          echo "$nobast";
        }
        ?>
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